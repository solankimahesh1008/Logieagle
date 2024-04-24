@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ isset($question) ? 'Edit Question' : 'Create Question' }}</h2>
        <form action="{{ isset($question) ? route('questions.update', $question->id) : route('questions.store') }}" method="POST">
            @csrf
            @if(isset($question))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="question">Question:</label>
                <input type="text" class="form-control" id="question" name="question" value="{{ isset($question) ? $question->question : '' }}">
            </div>
            <div class="form-group">
                <label for="survey_id">Survey Title:</label>
                <select class="form-control" id="question_id" name="question_id">
                    @foreach($surveys as $survey)
                        <option value="{{ $survey->id }}" {{ isset($survey) && $survey->survey_id == $survey->id ? 'selected' : '' }}>{{ $survey->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <select class="form-control" id="type" name="type">
                    <option value="text" {{ isset($question) && $question->type === 'text' ? 'selected' : '' }}>Text Input</option>
                    <option value="checkbox" {{ isset($question) && $question->type === 'checkbox' ? 'selected' : '' }}>Checkboxes</option>
                    <option value="radio" {{ isset($question) && $question->type === 'radio' ? 'selected' : '' }}>Radio Buttons</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($question) ? 'Update' : 'Create' }}</button>
        </form>
    </div>
@endsection
