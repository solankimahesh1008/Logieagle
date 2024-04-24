<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $answers = Answer::all();
        return view('answers.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $questions = Question::all();
        return view('answers.form', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'answer' => 'required',
            'question_id' => 'required|exists:questions,id',
        ]);

        Answer::create($request->all());

        return redirect()->route('answers.index')->with('success', 'Answer created successfully.');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answer $answer)
    {
        $questions = Question::all();
        return view('answers.form', compact('answer', 'questions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Answer $answer)
    {
        $request->validate([
            'answer' => 'required',
            'question_id' => 'required|exists:questions,id',
        ]);

        $answer->update($request->all());

        return redirect()->route('answers.index')->with('success', 'Answer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answer $answer)
    {
        $answer->delete();

        return redirect()->route('answers.index')->with('success', 'Answer deleted successfully.');
    }
}
