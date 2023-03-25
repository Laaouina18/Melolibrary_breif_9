@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <h1 class="mb-4">Edit Artist</h1>
    <form action="{{ url('artist/'.$artist->id) }}" method="POST" enctype="multipart/form-data">
    {!! csrf_field() !!}
    {{ method_field('PATCH') }}

    <div class="row mb-3">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter artist name" value="{{ $artist->name }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputCountry" class="col-sm-2 col-form-label">Country</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputCountry" name="country" placeholder="Enter country name" value="{{ $artist->country }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea class="form-control" id="inputDescription" name="description" rows="3" placeholder="Enter artist description">{{ $artist->description }}</textarea>
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="inputImage" name="image">
        </div>
    </div>

    <div class="row mb-3">
        <label for="inputBirthday" class="col-sm-2 col-form-label">Birthday</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="inputBirthday" name="birthday" value="{{ $artist->birthday }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
</div>
@endsection