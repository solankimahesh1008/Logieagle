@extends('layouts.app')

@section('content')
    <h1>Surveys</h1>
    <a href="{{ route('surveys.create') }}" class="btn btn-primary">Create Survey</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>User Name</th>
                <th>User Age</th>
                <th>User Sex</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surveys as $survey)
            <tr>
                <td>{{ $survey->title }}</td>
                <td>{{ $survey->user_name }}</td>
                <td>{{ $survey->user_age }}</td>
                <td>{{ $survey->user_sex }}</td>
                <td>
                    <a href="{{ route('surveys.edit', $survey->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('surveys.destroy', $survey->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
