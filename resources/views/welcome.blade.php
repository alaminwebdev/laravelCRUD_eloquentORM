@extends('layouts.master')
@section('title', 'Home')

@section('content')
    <div class="col-lg-4 col-12 pb-5">
        <div class="card">
            <div class="card-header">
                Add Student
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
            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Your name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload your image</label>
                        <input class="form-control" type="file" name="image">
                        @error('image')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-8 col-12 pb-5 ">
        <div class="card">
            <div class="card-header">
                Student List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-responsive align-middle">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($all_students as $key => $student)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                    <td>
                                        <img src="{{ asset('uploads/' . $student->image) }}" alt="student image"
                                            class="img-fluid rounded mx-auto " style="width: 80px">
                                    </td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>

                                    <td>{{ $student->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('edit', $student->id) }}" class="btn btn-success">Edit</a>
                                            <a href="{{ route('soft.delete', $student->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Are you sure to delete this student ?')">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <th scope="row">1</th>
                                    <td colspan="5">No student found !</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="btn-toolbar justify-content-end" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-2" role="group" aria-label="First group">
                        <button type="button" class="btn btn-outline-secondary">1</button>
                        <button type="button" class="btn btn-outline-secondary">2</button>
                        <button type="button" class="btn btn-outline-secondary">3</button>
                        <button type="button" class="btn btn-outline-secondary">4</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
