<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
//use App\Models\UnverifiedSchoolRepresentative;
use Maatwebsite\Excel\Facades\Excel;

class SchoolController extends Controller
{     //function for uploading the schools
    public function uploadSchools(Request $request)
    {
        $request->validate([
            'schoolsFile' => 'required|mimes:xlsx,xls,csv',
        ]);

        $schoolsFile = $request->file('schoolsFile');

        // Process the uploaded file and store schools .....directing you to the processSchoolsFile function
        $this->processSchoolsFile($schoolsFile);

        return redirect()->route('view.schools');
    }
        //fuction for processing the school's file
    private function processSchoolsFile($schoolsFile)
    {
        // Read the file into an array
        $schools = Excel::toArray([], $schoolsFile)[0];//The 0 indicates only one file being uploaded

        // Skip the header row (assuming it's the first row)
        $header = array_shift($schools);

        foreach ($schools as $school) {
            // Create the SchoolRepresentative
            School::create([
                'Name' => $school[0], // Adjust index based on your file structure(Excel file)
                'district' => $school[1],
                'schoolRegistrationNumber' => $school[2],
                'RepID' => $school[3],
                'RepEmail' => $school[4],
                'RepFirstName' => $school[5],
                'RepLastName' => $school[6],
            ]);

        }
    }
    // Function for viewing the schools 
    public function viewSchools()
    {
        $schools = School::all();
        return view('view-schools', compact('schools'));
    }
    //Function for editing the schools
    public function editSchool($id)
    {
        $school = School::findOrFail($id);
        return view('edit-school', compact('school'));
    }
     // Function for updating the schools
    public function updateSchool(Request $request, $id)
    {
        $school = School::findOrFail($id);

        $school->update([
            'Name' => $request->Name,
            'district' => $request->district,
            'schoolRegistrationNumber' => $request->schoolRegistrationNumber,
            'RepID' => $request->RepID,
            'RepEmail' => $request->RepEmail,
            'RepFirstName' => $request->RepFirstName,
            'RepLastName' => $request->RepLastName,
        ]);

        return redirect()->route('view.schools');//redirects the Admin to view schools after uploading
    }

    public function deleteSchool($id)
    {
        $school = School::findOrFail($id);
        $school->delete();

        return redirect()->route('view.schools');
    }
}

