<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container pt-5">
        <div class="row">
            @if (session()->has('success'))
                <div class="col-12">
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="col-lg-4">
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
                    <form action="{{ route('store') }}" method="POST">
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
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        Student List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-responsive">
                                <thead class="text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Created at</th>
                                        <th scope="col">Updated at</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($all_students as $key => $student)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->created_at->format('d-m-Y , h-i-a') }}</td>
                                            <td>{{ $student->updated_at->format('d-m-Y , h-i-a') }}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('edit', $student->id) }}" class="btn btn-success">Edit</a>
                                                    <a href="{{ route('delete', $student->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this student ?')">
                                                        Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="btn-toolbar justify-content-end" role="toolbar"
                            aria-label="Toolbar with button groups">
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
