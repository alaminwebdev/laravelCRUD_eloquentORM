@extends('layouts.master')
@section('title', 'Trash')

@section('content')
    <div class="col-lg-8 col-12 pb-5 mx-auto ">
        <div class="card">
            <div class="card-header">
                Trash Student List
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
                            @forelse ($trash_data as $key => $student)
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
                                            <a href="{{ route('restore', $student->id) }}"
                                                class="btn btn-success">Restore</a>
                                            <a href="{{ route('force.delete', $student->id) }}" class="btn btn-danger"
                                                onclick="return confirm('Are you sure to delete this student ?')">
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @empty 
                                <tr>
                                    <th scope="row">1</th>
                                    <td colspan="5">No trash found !</td>
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
