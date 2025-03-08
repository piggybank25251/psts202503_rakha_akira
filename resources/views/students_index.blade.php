@extends('layouts.app_modern', ['title' => 'Students Data'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3 mt-3">
                            <div class="col-md-3 h3">
                                Students Data
                            </div>
                            <div class="col-md-6">
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" name="p" placeholder="Find Name, Gender, Email or Phone" value="{{ request('p') }}" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <a href="/students/create" class="btn btn-primary btn-md float-end">
                                    Add Data
                                </a>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Grade</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->gender }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->grade }}</td>
                                        <td>
                                            <a href="/students/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">
                                                Edit
                                            </a>
                                            <form action="/students/{{ $item->id }}" method="post" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm ml-2"
                                                    onclick="return confirm('are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $students->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection