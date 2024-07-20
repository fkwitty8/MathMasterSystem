<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
//use App\Models\UnverifiedSchoolRepresentative;
use Maatwebsite\Excel\Facades\Excel;

class SchoolController extends Controller
{     
    public function uploadSchools(Request $request)
    {
        $request->validate([
            'schoolsFile' => 'required|mimes:xlsx,xls,csv',
        ]);

        $schoolsFile = $request->file('schoolsFile');

        // Process the uploaded file and store schools and representatives
        $this->processSchoolsFile($schoolsFile);

        return redirect()->route('view.schools');
    }

    private function processSchoolsFile($schoolsFile)
    {
        // Read the file into an array
        $schools = Excel::toArray([], $schoolsFile)[0];

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
    
    public function viewSchools()
    {
        $schools = School::all();
        return view('view-schools', compact('schools'));
    }
    public function editSchool($id)
    {
        $school = School::findOrFail($id);
        return view('edit-school', compact('school'));
    }

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

        return redirect()->route('view.schools');
    }

    public function deleteSchool($id)
    {
        $school = School::findOrFail($id);
        $school->delete();

        return redirect()->route('view.schools');
    }
}

