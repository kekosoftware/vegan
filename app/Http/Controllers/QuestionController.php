<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Answer;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$questions = Question::withCount('answers_totals')->get();
        
        $questions = Question::withCount('answers_rela')
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('questions.index', [
            'questions' => $questions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suggestion = Suggestion::inRandomOrder()->first();
        
        return view('questions.create',[
            'suggestion' => $suggestion
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => ['regex:/^.*?\?$/', 'required', 'min:5'],
        ], [
            'description.regex' => "The question should ent with the character '?'",
            'description.required' => "This field is required",
            'description.min' => "The question must be at least 5 characters",
        ]);

        Question::create($request->all());

        return redirect()->route('questions.index')
            ->with('success', 'Question created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        $answers = Answer::query()
            ->where('question_id', $question->id)
            ->orderBy('id', 'asc')
            ->get();
        
        return view('questions.show', [
            'questions' => $question,
            'answers_list' => $answers
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index')
            ->with('success', 'Question deleted successfully');
    }
}
