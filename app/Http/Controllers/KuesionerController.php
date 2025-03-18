<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;
use App\Models\Section;
use App\Models\Question;
use App\Models\Option;
use App\Models\Answer;

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
            return redirect()->route('home')->with('error', 'Tidak ada kuisioner yang tersedia.');
        }

        // Ambil section pertama dari form tersebut
        $firstSection = Section::where('form_id', $form->id)->orderBy('section_order')->first();

        if (!$firstSection) {
            return redirect()->route('home')->with('error', 'Form tidak memiliki section.');
        }

        return view('ppkha.kuisioner', compact('form', 'firstSection'));
    }

    /**
     * Menampilkan section berikutnya berdasarkan jawaban user.
     */
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
                'answer_value' => $answerValue,
            ]);

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

        if ($nextSectionId) {
            $nextSection = Section::find($nextSectionId);
        } else {
            // Jika tidak ada next_section_id, cari section berikutnya berdasarkan section_order
            $nextSection = Section::where('form_id', $currentSection->form_id)
                ->where('section_order', '>', $currentSection->section_order)
                ->orderBy('section_order')
                ->first();
        }

        // Jika ada section berikutnya, tampilkan kuisioner
        if ($nextSection) {
            return view('ppkha.kuisioner', [
                'form' => $form,
                'firstSection' => $nextSection
            ]);
        }

        // Jika tidak ada next_section_id atau tidak ditemukan, anggap selesai
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
