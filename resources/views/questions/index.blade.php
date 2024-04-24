
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Questions</h2>
        <a href="{{ route('questions.create') }}" class="btn btn-primary mb-3">Create New Question</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Survey ID</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($questions as $question)
                <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->survey_id }}</td>
                    <td>{{ $question->type }}</td>
                    <td>
                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
