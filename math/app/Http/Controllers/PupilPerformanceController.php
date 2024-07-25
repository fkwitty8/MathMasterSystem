<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\School;
use Carbon\Carbon;

class PupilPerformanceController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('pupils.index', compact('schools'));
    }

    
    public function showPupils($id)
{
    $school = School::findOrFail($id);

    $pupilPerformances = DB::table('participant')
        ->join('challengesubmission', 'participant.PupilID', '=', 'challengesubmission.PupilID')
        ->where('participant.schoolRegNo', $school->schoolRegNo)
        ->select(
            'participant.PupilID',
            'participant.FirstName',
            'participant.LastName',
            DB::raw('YEAR(challengesubmission.DateSubmitted) as year'),
            DB::raw('SUM(challengesubmission.QnMarks) as totalMarks'),
            DB::raw('COUNT(DISTINCT challengesubmission.ChID) as challengesCount'),
            DB::raw('(SUM(challengesubmission.QnMarks) / COUNT(DISTINCT challengesubmission.ChID)) as averageScore'),
            DB::raw('((SUM(challengesubmission.QnMarks) / COUNT(DISTINCT challengesubmission.ChID)) / 30) * 100 as percentageScore')
        )
        ->groupBy('participant.PupilID', 'participant.FirstName', 'participant.LastName', 'year')
        ->orderBy('year', 'asc')
        ->get();

    return view('pupils.show', compact('school', 'pupilPerformances'));
}

}
