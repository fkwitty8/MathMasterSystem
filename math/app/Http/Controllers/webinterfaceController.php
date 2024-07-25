<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Charts\studentperformancechart;
use App\models\schools;
use App\models\QnAns;
use App\models\challengesubmission;
use App\models\challenge;
use App\models\participant;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class webinterfaceController extends Controller{

// this function generates the worst performing schools per challenge 

    public function show($id)
    {
       
           $worstPerfom = challengesubmission::where('ChID', $id) 
            ->select('ChID', 'SchoolRegNo', DB::raw('AVG(QnMarks) as avMarks'))
            ->groupBy('ChID', 'SchoolRegNo')      // Includes all selected columns that are not aggregated
            ->orderBy('avMarks', 'asc')
            ->get(); 
            $CDetails = challenge::where('id', $id)->get()->pluck('name','id'); 
          
        return view('see', compact('CDetails','id','worstPerfom'));
}









//this  function finds the best done question per challenge

public function showMostPassed($id)
    {
       
           $BestDoneQn = challengesubmission::where('ChID', $id) 
            ->select('ChID', 'QnID', DB::raw('SUM(QnMarks) as TotalMarks'))
            ->groupBy('ChID', 'QnID') // Includes all selected columns that are not aggregated
            ->orderBy('TotalMarks', 'asc')
            ->get(); 
            $QuestionIDs = $BestDoneQn ->pluck("QnID") ;
            $CDetails = challenge::where('id', $id)->get()->pluck('name','id'); 

            $QuestionDetails =  QnAns::where('QnID',$QuestionIDs)->get()->pluck('Qn','QnID');

         
        return view('pass', compact('id', 'BestDoneQn', "QuestionIDs",'CDetails','QuestionDetails'));
    }



//more mkljnh




    public function homeF(){





//DAVIS START HERE



$Unfinished = challengesubmission::where('Challenge_FinishedStatus', "UNFINISHED")->distinct()->pluck("PupilID");
$UFpupildetails = participant::whereIn('pupilID', $Unfinished)->get();

     //END HERE  
        
       return view('home',compact( 'challengesDetails','averageMarks','topSchools','UFpupildetails'));

   }


   



         




    //THIS FUNCTION FINDS FOR US THE BEST TWO PUPIL PER CHALLENGE AND RETURNS A VIEW bestTwo

    public function bestTwoPupil(){
        $dt = Carbon::now('Africa/Nairobi');
    $currentDate = date('Y-m-d H:i:s');
    $closingDates = Challenge::where('end_date', '<' ,$currentDate)->get()->pluck('end_date');
    $challengeIDs = Challenge::whereIn('end_date',$closingDates)->get()->pluck('ID');
    /*$topPupils = DB::table('submissions')
        ->select('pupilID', DB::raw('SUM(QnMarks) as total_marks'))
        ->whereIn('challengeID', $challengeIDs)
        ->groupBy('pupilID')
        ->orderBy('total_marks', 'desc')
        ->take(2)
        ->get();  */
        $currentDate = date('Y-m-d H:i:s');

        $closingDates = Challenge::where('end_date', '<' ,$currentDate)->get()->pluck('end_date');

        $challengesDetails = Challenge::whereIn('end_date',$closingDates)->get();


    
    
        $bestTwoPupilsPerChallenge = [];
    
    foreach ($challengeIDs as $challengeID) {
        // Calculate total marks per pupil for the current challenge ID
        $totalMarks = challengesubmission::where('ChID', $challengeID)
            ->groupBy('pupilID')
            ->selectRaw('pupilID, SUM(Qnmarks) as total_marks')
            ->orderByDesc('total_marks')
            ->get();
    
        //  Identify top two pupils for the current challenge
    
        $topTwoPupils = $totalMarks->take(2); // Top two pupils for the current challenge
    
        // Retrieve pupil details from participants table
        $pupilIDs = $topTwoPupils->pluck('pupilID')->toArray();
        $topTwoPupilDetails = Participant::whereIn('pupilID', $pupilIDs)->get();
    
        // Storing the results for the current challenge
        $bestTwoPupilsPerChallenge[$challengeID] = $topTwoPupilDetails;
    }

    //THIS IS END OF FUNCTION BEST TWO
    
    return view('bestwo', compact('bestTwoPupilsPerChallenge'));
    
    }






   // jOSEPH STOP HERE
    public function setParameter(){
       
        
       return view('parameter');

   }
}