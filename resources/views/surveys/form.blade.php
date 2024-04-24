@extends('layouts.app')

@section('content')
    <h1>{{ isset($survey) ? 'Edit Survey' : 'Create Survey' }}</h1>
    <form action="{{ isset($survey) ? route('surveys.update', $survey->id) : route('surveys.store') }}" method="POST">
        @csrf
        @if(isset($survey))
            @method('PUT')
        @endif
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ isset($survey) ? $survey->title : old('title') }}">
        </div>
        <div class="form-group">
            <label for="user_name">User Name</label>
            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ isset($survey) ? $survey->user_name : old('user_name') }}">
        </div>
        <div class="form-group">
            <label for="user_age">User Age</label>
            <input type="number" class="form-control" id="user_age" name="user_age" value="{{ isset($survey) ? $survey->user_age : old('user_age') }}">
        </div>
        <div class="form-group">
            <label for="user_sex">User Sex</label>
            <select class="form-control" id="user_sex" name="user_sex">
                <option value="Male" {{ (isset($survey) && $survey->user_sex == 'Male') ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ (isset($survey) && $survey->user_sex == 'Female') ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ (isset($survey) && $survey->user_sex == 'Other') ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($survey) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
