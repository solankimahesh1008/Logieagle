@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Answers</h2>
        <a href="{{ route('answers.create') }}" class="btn btn-primary mb-3">Create New Answer</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($answers as $answer)
                <tr>
                    <td>{{ $answer->id }}</td>
                    <td>{{ $answer->question_id }}</td>
                    <td>{{ $answer->answer }}</td>
                    <td>
                        <a href="{{ route('answers.edit', $answer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('answers.destroy', $answer->id) }}" method="POST" style="display: inline;">
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
