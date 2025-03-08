<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\Section;
use App\Models\Question;
use App\Models\TypeQuestion;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TracerStudyController extends Controller
{
    public function mainTracerStudy()
    {
        $pagination = Form::paginate(5)->withQueryString();
        $forms = Form::latest()->filter(request(['search']))->paginate(5)->withQueryString();
        return view('admin.tracerStudy.tracerStudy', compact('forms', 'pagination'));
    }

    public function createTracerStudy()
    {
        $typeQuestions = TypeQuestion::all();
        return view('admin.tracerStudy.tambahPertanyaan', compact('typeQuestions'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'judul_form' => 'required|string|max:255',
                'deskripsi_form' => 'nullable|string',
                'sections' => 'required|array',
            ]);

            $form = Form::create([
                'judul_form' => $request->judul_form,
                'deskripsi_form' => $request->deskripsi_form,
            ]);

            $sectionIds = [];
            $questionIds = [];

            foreach ($request->sections as $sectionIndex => $sectionData) {
                $section = Section::create([
                    'form_id' => $form->id,
                    'section_name' => $sectionData['section_name'],
                    'section_order' => $sectionIndex,
                ]);

                $sectionIds[$sectionIndex] = $section->id;

                if (isset($sectionData['questions']) && is_array($sectionData['questions'])) {
                    foreach ($sectionData['questions'] as $questionIndex => $questionData) {
                        $question = Question::create([
                            'section_id' => $section->id,
                            'question_body' => $questionData['question_body'],
                            'type_question_id' => $questionData['type_question_id'],
                            'is_required' => isset($questionData['is_required']) ? 1 : 0,
                            'question_order' => $questionIndex,
                        ]);

                        if (!isset($questionIds[$sectionIndex])) {
                            $questionIds[$sectionIndex] = [];
                        }
                        $questionIds[$sectionIndex][$questionIndex] = $question->id;
                    }
                }
            }

            foreach ($request->sections as $sectionIndex => $sectionData) {
                if (isset($sectionData['questions']) && is_array($sectionData['questions'])) {
                    foreach ($sectionData['questions'] as $questionIndex => $questionData) {
                        $question_id = $questionIds[$sectionIndex][$questionIndex];
                        $needsOptions = in_array($questionData['type_question_id'], [3, 4, 5, 6]);

                        if ($needsOptions && isset($questionData['options']) && is_array($questionData['options'])) {
                            foreach ($questionData['options'] as $optionIndex => $optionData) {
                                $labelAngka = null;
                                if ($questionData['type_question_id'] == 6 && isset($optionData['label_angka'])) {
                                    $labelAngka = $optionData['label_angka'];
                                }

                                $nextSectionId = null;
                                if ($questionData['type_question_id'] == 3 && isset($optionData['next_section_id'])) {
                                    if ($optionData['next_section_id'] === 'submit') {
                                        $nextSectionId = null;
                                    } elseif (!empty($optionData['next_section_id'])) {
                                        $nextSectionId = $sectionIds[$optionData['next_section_id']];
                                    }
                                }

                                Option::create([
                                    'question_id' => $question_id,
                                    'option_body' => $optionData['option_body'],
                                    'next_section_id' => $nextSectionId,
                                    'option_order' => $optionIndex,
                                    'label_angka' => $labelAngka,
                                ]);
                            }
                        }
                    }
                }
            }

            DB::commit();
            Alert::success('Success', 'Form berhasil dibuat!');
            return redirect()->route('admin.tracerStudy.tracerStudy');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    public function edit($id)
    {
        $form = Form::with(['sections.questions.options', 'sections.questions.typeQuestion'])->findOrFail($id);
        $typeQuestions = TypeQuestion::all();

        return view('admin.tracerStudy.editTracerStudy', compact('form', 'typeQuestions'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'judul_form' => 'required|string|max:255',
                'deskripsi_form' => 'nullable|string',
                'sections' => 'required|array',
            ]);

            $form = Form::findOrFail($id);

            $form->update([
                'judul_form' => $request->judul_form,
                'deskripsi_form' => $request->deskripsi_form,
            ]);

            $form->sections()->delete();

            foreach ($request->sections as $sectionIndex => $sectionData) {
                $section = Section::create([
                    'form_id' => $form->id,
                    'section_name' => $sectionData['section_name'],
                    'section_order' => $sectionIndex,
                ]);

                if (isset($sectionData['questions']) && is_array($sectionData['questions'])) {
                    foreach ($sectionData['questions'] as $questionIndex => $questionData) {
                        $question = Question::create([
                            'section_id' => $section->id,
                            'question_body' => $questionData['question_body'],
                            'type_question_id' => $questionData['type_question_id'],
                            'is_required' => isset($questionData['is_required']) ? 1 : 0,
                            'question_order' => $questionIndex,
                        ]);

                        $needsOptions = in_array($questionData['type_question_id'], [3, 4, 5, 6]);

                        if ($needsOptions && isset($questionData['options']) && is_array($questionData['options'])) {
                            foreach ($questionData['options'] as $optionIndex => $optionData) {
                                $labelAngka = null;
                                if ($questionData['type_question_id'] == 6 && isset($optionData['label_angka'])) {
                                    $labelAngka = $optionData['label_angka'];
                                }

                                $nextSectionId = null;
                                if ($questionData['type_question_id'] == 3 && isset($optionData['next_section_id'])) {
                                    $nextSectionId = $optionData['next_section_id'];
                                }

                                Option::create([
                                    'question_id' => $question->id,
                                    'option_body' => $optionData['option_body'],
                                    'next_section_id' => $nextSectionId,
                                    'option_order' => $optionIndex,
                                    'label_angka' => $labelAngka,
                                ]);
                            }
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->route('admin.tracerStudy.tracerStudy')->with('success', 'Form berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['msg' => 'Terjadi kesalahan: ' . $e->getMessage()])->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $form = Form::findOrFail($id);
            $form->delete();
            return response()->json(['message' => 'Form berhasil dihapus!'], 200);
        } catch (\Exception $e) {

            return response()->json(['error' => 'Terjadi kesalahan saat menghapus.'], 500);
        }
    }



    public function getSections($formId)
    {
        $sections = Section::where('form_id', $formId)->orderBy('section_order')->get();
        return response()->json($sections);
    }

    public function getAvailableSections($formId, $currentSectionId)
    {
        $currentSection = Section::findOrFail($currentSectionId);
        $sections = Section::where('form_id', $formId)
            ->where('section_order', '>', $currentSection->section_order)
            ->orderBy('section_order')
            ->get();

        return response()->json($sections);
    }
}
