@extends('layouts.master')
@section('title', 'Edit Student')
@section('content')
    <div class="col-lg-6 m-auto col-12 py-5">
        <div class="card">
            <div class="card-header">
                Edit Student
            </div>
            {{-- Show all field error in one section --}}
            {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
            <form action="{{ route('update', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your name</label>
                        <input type="text" class="form-control" name="name" value="{{ $student->name }}">
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" class="form-control" name="email" value="{{ $student->email }}">
                        @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Your prevoius image</label>
                        <img src="{{ asset('uploads/' . $student->image) }}" alt="student image"
                            class="img-fluid rounded mx-auto " style="width: 80px">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload your new image</label>
                        <input class="form-control" type="file" name="image">
                        @error('image')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('home') }}" class="btn btn-info me-2">Home</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
