@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ isset($answer) ? 'Edit Answer' : 'Create Answer' }}</h2>
        <form action="{{ isset($answer) ? route('answers.update', $answer->id) : route('answers.store') }}" method="POST">
            @csrf
            @if(isset($answer))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="question_id">Select Question:</label>
                <select class="form-control" id="question_id" name="question_id">
                    @foreach($questions as $question)
                        <option value="{{ $question->id }}" {{ isset($answer) && $answer->question_id == $question->id ? 'selected' : '' }}>{{ $question->question }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="answer">Answer:</label>
                <input type="text" class="form-control" id="answer" name="answer" value="{{ isset($answer) ? $answer->answer : '' }}">
            </div>
            <button type="submit" class="btn btn-primary">{{ isset($answer) ? 'Update' : 'Create' }}</button>
        </form>
    </div>
@endsection
