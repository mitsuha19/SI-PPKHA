<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Answer;


class ReportController extends Controller
{
    public function showTracerStudyStats()
    {
        // 1. Identify the question used for "current status" or tracer study data
        $questionId = 1;  // adjust as needed

        // 2. Get all alumni user IDs (Spatie's role-based approach)
        //    e.g., "alumni" is the name of the role you assigned for alumni
        $alumniUserIds = User::role('alumni')->pluck('id');
        $totalAlumni   = $alumniUserIds->count();

        // 3. Group answers by prodi_id, counting distinct user_ids
        //    We only consider users in $alumniUserIds
        $answers = DB::table('answers')
            ->where('question_id', $questionId)
            ->whereIn('answers.user_id', $alumniUserIds)
            ->join('users', 'answers.user_id', '=', 'users.id')
            ->select('users.prodi_id', DB::raw('COUNT(DISTINCT answers.user_id) as total'))
            ->groupBy('users.prodi_id')
            ->get();

        // Build arrays for chart
        $labels = [];
        $data   = [];
        $answeredCount = 0;

        foreach ($answers as $row) {
            $prodiName = 'Unknown';
            if ($row->prodi_id) {
                // Lookup Prodi name
                $prodi = Prodi::find($row->prodi_id);
                $prodiName = $prodi ? $prodi->name : 'Unknown';
            }
            $labels[] = $prodiName;
            $data[]   = $row->total;
            $answeredCount += $row->total;  // Sum up how many alumni answered
        }

        // Data for the "Jumlah Mahasiswa Tiap Kategori" chart (grouped by prodi)
        $jumlah_mahasiswa_tiap_kategori = [
            'labels' => $labels,
            'data'   => $data,
        ];

        // 4. Mengisi vs Belum Mengisi
        $sudahMengisi = $answeredCount;           // total alumni who answered
        $belumMengisi = $totalAlumni - $answeredCount;

        // Data for "Perbandingan Pengisian Kuesioner"
        $perbandingan_pengisian_questioner = [
            'labels' => ['Mengisi', 'Belum Mengisi'],
            'data'   => [$sudahMengisi, $belumMengisi],
        ];

        // 5. Return view with the chart data and numeric stats
        return view('admin.dashboard', compact(
            'jumlah_mahasiswa_tiap_kategori',
            'perbandingan_pengisian_questioner',
            'totalAlumni',
            'sudahMengisi',
            'belumMengisi'
        ));
    }

    public function unduhCSV($formId)
    {
        // 1. Fetch all answers for questions in the given form.
        $answers = \App\Models\Answer::whereHas('question.section.form', function ($query) use ($formId) {
            $query->where('id', $formId);
        })
            ->with(['question', 'user.fakultas', 'user.prodi'])
            ->get();

        // 2. Get a unique list of question texts.
        $questions = $answers->map(function ($ans) {
            return $ans->question->question_body;
        })->filter()->unique()->values();

        // Debug: Uncomment to check question headers
        // dd($questions->toArray());

        // 3. Build CSV header: fixed columns + question headers.
        $header = array_merge(['Name', 'NIM', 'Fakultas', 'Prodi'], $questions->toArray());

        // 4. Create a unique filename.
        $filename = "responden_form_{$formId}_" . time() . ".csv";
        $handle = fopen($filename, 'w+');

        // Optionally, do NOT write BOM to avoid Excel issues:
        // fwrite($handle, "\xEF\xBB\xBF");

        // Write the header row first.
        fputcsv($handle, $header);

        // 5. Group answers by user_id.
        $groupedData = $answers->groupBy('user_id');
        foreach ($groupedData as $userId => $responses) {
            if (!$userId) continue;
            $firstResponse = $responses->first();
            $user = $firstResponse->user;

            $row = [
                $user->name ?? '',
                $user->nim ?? '',
                $user->fakultas->name ?? '',
                $user->prodi->name ?? '',
            ];

            // For each question header, add the answer from this user.
            foreach ($questions as $questionText) {
                $answer = $responses->firstWhere('question.question_body', $questionText)?->answer_value ?? '';
                $row[] = $answer;
            }
            fputcsv($handle, $row);
        }

        fclose($handle);

        // Return download response.
        return response()->download($filename, 'response.csv', [
            'Content-Type' => 'text/csv',
        ])->deleteFileAfterSend(true);
    }
}
