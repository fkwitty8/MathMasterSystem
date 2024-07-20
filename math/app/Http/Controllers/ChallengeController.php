<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Challenge;

class ChallengeController extends Controller
{
    public function first()
    {
        $challenges = Challenge::all();
        return view('first', compact('challenges'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number_of_questions' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'duration' => 'required|integer',
        ]);

        Challenge::create([
            'name' => $request->name,
            'number_of_questions' => $request->number_of_questions,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'duration' => $request->duration,
        ]);

        return redirect()->route('first');
    }
}