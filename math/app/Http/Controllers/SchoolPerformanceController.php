<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\School;
use Carbon\Carbon;

class SchoolPerformanceController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('schools.index', compact('schools'));
    }

    public function show($id)
    {
        $school = School::findOrFail($id);

        $performanceData = DB::table('challengesubmission')
            ->join('participant', 'challengesubmission.PupilID', '=', 'participant.PupilID')
            ->where('participant.schoolRegNo', $school->schoolRegNo)
            ->select(
                DB::raw('YEAR(DateSubmitted) as year'),
                DB::raw('SUM(QnMarks) as totalMarks'),
                DB::raw('COUNT(DISTINCT participant.PupilID) as pupilCount'),
                DB::raw('SUM(QnMarks) / COUNT(DISTINCT participant.PupilID) as averageMarks')
            )
            ->groupBy('year')
            ->orderBy('year')
            ->get();

        return view('schools.show', compact('school', 'performanceData'));
    }
}

