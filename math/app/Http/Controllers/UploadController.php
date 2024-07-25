<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QnAns;
use Maatwebsite\Excel\Facades\Excel;

class UploadController extends Controller
{
    public function uploadFiles(Request $request)
    {
        $request->validate([
            'questionsFile' => 'required|file|mimes:xlsx,xls',
            'answersFile' => 'required|file|mimes:xlsx,xls',
        ]);

        $questionsFile = $request->file('questionsFile');
        $answersFile = $request->file('answersFile');

        // Process the uploaded files and store the data in the database
        $this->processFiles($questionsFile, $answersFile);

        return redirect()->route('meseter');
    }

    private function processFiles($questionsFile, $answersFile)
    {
        // Assuming both files have headers
        $questions = Excel::toArray([], $questionsFile)[0];
        $answers = Excel::toArray([], $answersFile)[0];

        foreach ($questions as $index => $question) {
            if ($index === 0) continue; // Skip the header row

            $qnID = $question[0];
            $qn = $question[1];

            $answer = $answers[$index];
            $ansID = $answer[1];
            $ans = $answer[2];
            $marks = $answer[3];

            QnAns::create([
                'QnID' => $qnID,
                'Qn' => $qn,
                'AnsID' => $ansID,
                'Ans' => $ans,
                'Marks' => $marks,
            ]);
        }
    }
    public function viewQnAns()
    {
      $qnans = QnAns::all();
      return view('view-qnans', compact('qnans'));
    }
   public function editQnAns($id)
    {
      $qnans = QnAns::findOrFail($id);
      return view('edit-qnans', compact('qnans'));
    }

    public function updateQnAns(Request $request, $id)
    {
      $qnans = QnAns::findOrFail($id);
      $qnans->update($request->all());
      return redirect()->route('view.qnans');
    }

    public function deleteQnAns($id)
    {
    QnAns::findOrFail($id)->delete();
    return redirect()->route('view.qnans');
    }

}
