<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|min:5'
        ], [
            'description.min' => "The answer must be at least 5 characters",
        ]);

        Answer::create($request->all());
   
        return redirect()->route('questions.index')
            ->with('success', 'Answer added successfully');
    }

}
