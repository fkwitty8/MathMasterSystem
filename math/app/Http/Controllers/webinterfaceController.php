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



   //DAVIS DAVIS START HERE 


    // Method to show worst performing schools for a specific challenge
    
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





// DAVIS  END HERE







//JOSEPH JOSEPH START HERR




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

//END HERE







//  FAHAD  FAHAD FAHAD FAHAD FAHAD


    public function homeF(){



         // THESE LINES PF CODE GETS US THE SCHOOL RANKINGS //

          // Retrieves all unique SchoolRegNo from the submissions table
        $schoolRegNo = DB::table('challengesubmission')->pluck('SchoolRegNo')->all();
    
        // Calculates total marks for each SchoolRegNo and group by SchoolRegNo
        $submissionTable = challengesubmission::whereIn('SchoolRegNo', $schoolRegNo)
            ->groupBy('SchoolRegNo')
            ->select('SchoolRegNo', DB::raw('SUM(QnMarks) as Totalmarks'))
            ->get()
            ->pluck('Totalmarks', 'SchoolRegNo');
    
        // Calculates number of pupils for each SchoolRegNo and group by SchoolRegNo
        $TotalNumber = challengesubmission::whereIn('SchoolRegNo', $schoolRegNo)
            ->groupBy('SchoolRegNo')
            ->select('SchoolRegNo', DB::raw('COUNT(PupilID) as NumberOfPupil'))
            ->get()
            ->pluck('NumberOfPupil', 'SchoolRegNo');
    
        // Retrieves school names using SchoolRegNo from the schools table
        $schoolNames = DB::table('school')
            ->whereIn('SchoolRegNo', $schoolRegNo)
            ->pluck('name', 'SchoolRegNo');
    
        // Calculates average marks per school 
        $averageMarks = [];
        foreach ($schoolRegNo as $regNo) {
            if (isset($submissionTable[$regNo]) && isset($TotalNumber[$regNo]) && isset($schoolNames[$regNo])) {
                $averageMarks[$regNo] = [
                    'SchoolName' => $schoolNames[$regNo],
                    'AverageMarks' => $TotalNumber[$regNo] > 0 ? round($submissionTable[$regNo] / $TotalNumber[$regNo], 2) : 0
                ];
       
            }
        }
// Sorts $averageMarks by AverageMarks in descending order
usort($averageMarks, function($a, $b) {
    return $b['AverageMarks'] <=> $a['AverageMarks'];
});

//FAHAD END HERE







// this gets for  us the  challenge id  and challange names of closed challenges such that the challenges displayed for reports are the ones that are closed 
         $currentDate = date('Y-m-d H:i:s');

         $closingDates = Challenge::where('end_date', '<' ,$currentDate)->get()->pluck('end_date');
 
         $challengesDetails = Challenge::whereIn('end_date',$closingDates)->get();










         //FAHAAD  START AGAIN HERE  make them as different commits at diffrent functionalities required
 
//this code works with the sorted average to get the top stated

$topTenSchools = array_slice($averageMarks, 0, 3);
$topSchools = array_slice($averageMarks, 0, 3);


//  STOP HERE




//DAVIS START HERE



$Unfinished = challengesubmission::where('Challenge_FinishedStatus', "UNFINISHED")->distinct()->pluck("PupilID");
$UFpupildetails = participant::whereIn('pupilID', $Unfinished)->get();

      //END HERE  
         
        return view('home',compact( 'challengesDetails','averageMarks','topSchools','UFpupildetails'));

    }







    //JOSEPH START HERE 
    //THIS FUNCTION FINDS FOR US THE BEST TWO PUPIL PER CHALLENGE AND RETURNS A VIEW bestTwo

    public function bestTwoPupil(){
     
    /*$topPupils = DB::table('submissions')
        ->select('pupilID', DB::raw('SUM(QnMarks) as total_marks'))
        ->whereIn('challengeID', $challengeIDs)
        ->groupBy('pupilID')
        ->orderBy('total_marks', 'desc')
        ->take(2)
        ->get();  */
        $currentDate = date('Y-m-d H:i:s');

        $closingDates = Challenge::where('end_date', '<' ,$currentDate)->get()->pluck('end_date');

        $challengesDetails = Challenge::whereIn('end_date',$closingDates)->get()->pluck('id','name');


    
    
        $bestTwoPupilsPerChallenge = [];
    
    
        // Calculate total marks per pupil for the current challenge ID
        $totalMarks = challengesubmission::whereIn('ChID', $challengesDetails)
            ->groupBy('pupilID')
            ->selectRaw('pupilID, AVG(QnMarks) as total_marks')
            ->orderByDesc('total_marks')
            ->get();
    
        //  Identify top two pupils for the current challenge
    
        $topTwoPupils = $totalMarks->take(2); 
        $marks=$totalMarks->pluck('total_marks','pupilID');
        // Top two pupils for the current challenge
    
        // Retrieve pupil details from participants table
        $pupilIDs = $topTwoPupils->pluck('pupilID')->toArray();
        $topTwoPupilDetails = Participant::whereIn('pupilID', $pupilIDs)->get();
    
        // Storing the results for the current challenge
       

    //THIS IS END OF FUNCTION BEST TWO
    
    return view('bestwo', compact('topTwoPupilDetails','topTwoPupils', 'marks'));
    
    }






   // jOSEPH STOP HERE
    public function setParameter(){
       
        
       return view('parameter');

   }
   public function load(){
       
        
    return view('upload');

}
}