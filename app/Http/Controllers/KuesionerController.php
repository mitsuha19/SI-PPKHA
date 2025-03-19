<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Answer;
use App\Models\Option;
use App\Models\Section;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KuesionerController extends Controller
{
    /**
     * Menampilkan halaman pertama kuisioner (Section pertama dari Form dengan ID terkecil).
     */
    public function show()
    {
        // Ambil form dengan ID paling kecil
        $form = Form::orderBy('id')->first();

        if (!$form) {
            return view('ppkha.kuisioner', ['form' => null, 'firstSection' => null]);
        }

        // Ambil section pertama dari form tersebut
        $firstSection = Section::where('form_id', $form->id)->orderBy('section_order')->first();

        if (!$firstSection) {
            return view('ppkha.kuisioner', ['form' => $form, 'firstSection' => null]);
        }

        return view('ppkha.kuisioner', compact('form', 'firstSection'));
    }

    public function nextSection(Request $request, $sectionId)
    {
        $nextSectionId = null;

        // Simpan jawaban user
        foreach ($request->input('answers', []) as $questionId => $answerValue) {
            if (is_array($answerValue)) {
                $answerValue = json_encode($answerValue); // Jika multiple choice, simpan sebagai JSON
            }

            Answer::create([
                'question_id' => $questionId,
                'user_id' => Auth::id(),
                'answer_value' => $answerValue,
            ]);

            // Ambil next_section_id dari opsi pilihan ganda
            $option = Option::where('question_id', $questionId)
                ->where('id', $answerValue)
                ->first();

            if ($option && $option->next_section_id) {
                $nextSectionId = $option->next_section_id;
            }
        }

        // Ambil form berdasarkan section saat ini
        $currentSection = Section::find($sectionId);
        if (!$currentSection) {
            return redirect()->route('kuesioner.submit'); // Jika tidak ada section, anggap selesai
        }

        $form = Form::find($currentSection->form_id);

        // **LOGIKA PENGAMBILAN SECTION BERIKUTNYA**
        if ($nextSectionId) {
            // Jika ada `next_section_id` dari jawaban, gunakan itu dan simpan di session
            session(['next_section_id' => $nextSectionId]);
            $nextSection = Section::find($nextSectionId);
        } else {
            $excludedSections = Option::whereNotNull('next_section_id')->pluck('next_section_id')->toArray();

            $nextSection = Section::where('form_id', $currentSection->form_id)
                ->where('section_order', '>', $currentSection->section_order)
                ->whereNotIn('id', $excludedSections) // Hindari section yang menjadi tujuan dari `next_section_id`
                ->orderBy('section_order')
                ->first();
        }

        if ($nextSection) {
            session()->forget('next_section_id'); // Reset session agar tidak digunakan lagi

            return view('ppkha.kuisioner', [
                'form' => $form,
                'firstSection' => $nextSection
            ]);
        }

        // Jika tidak ada section berikutnya, anggap selesai
        return redirect()->route('kuesioner.submit');
    }



    /**
     * Halaman setelah kuisioner selesai diisi.
     */
    public function submit()
    {
        return view('ppkha.kuisionerSubmit');
    }
}
