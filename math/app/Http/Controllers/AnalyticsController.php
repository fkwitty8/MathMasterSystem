<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function percentage()
    {
        // Fetch total submissions grouped by question and challenge
        $submissions = DB::table('challengesubmission')
            ->select('ChID', 'QnID', DB::raw('count(*) as selection_count'))
            ->groupBy('ChID', 'QnID')
            ->get();

        // Calculate total submissions per challenge
        $totalSubmissions = DB::table('challengesubmission')
            ->select('ChID', DB::raw('count(*) as total'))
            ->groupBy('ChID')
            ->get()
            ->keyBy('ChID');

        // Calculate percentage of each question's selection
        $analytics = $submissions->map(function($submission) use ($totalSubmissions) {
            $submission->percentage = ($submission->selection_count / $totalSubmissions[$submission->ChID]->total) * 100;
            return $submission;
        });

        return view('percentage', compact('analytics'));
    }
}

