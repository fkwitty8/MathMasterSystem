<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolListController extends Controller
{
    public function index()
    {
        $schools = DB::table('school')->get();
        return view('school.index', compact('schools'));
    }

    public function showParticipants($id)
    {
        $school = DB::table('school')->where('id', $id)->first();
        $participants = DB::table('participant')
            ->where('schoolRegNo', $school->schoolRegNo)
            ->get();
        return view('school.participants', compact('school', 'participants'));
    }
}
