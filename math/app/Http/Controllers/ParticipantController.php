<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
   
    
    public function show($id)
{
    $participant = DB::table('participant')->where('PupilID', $id)->first();

    $performanceData = DB::table('challengesubmission')
        ->where('PupilID', $participant->PupilID)
        ->select(
            DB::raw('YEAR(DateSubmitted) as year'),
            DB::raw('SUM(QnMarks) as totalMarks'),
            DB::raw('COUNT(DISTINCT ChID) as challengesCount'),
            DB::raw('(SUM(QnMarks) / COUNT(DISTINCT ChID)) as averageScore'),
            DB::raw('((SUM(QnMarks) / COUNT(DISTINCT ChID)) / 30) * 100 as percentageScore')
        )
        ->groupBy('year')
        ->orderBy('year', 'asc')
        ->get();

    return view('school.show', compact('participant', 'performanceData'));
}

}
