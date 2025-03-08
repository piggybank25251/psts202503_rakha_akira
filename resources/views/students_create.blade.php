@extends('layouts.app_modern', ['title' => 'Add Students Data'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Students Form</div>
                    <div class="card-body">
                        <h5 class="card-title">Add Students</h5>
                        <form action="/students" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-1 mb-3">
                                <label for="name">Students Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group mt-1 mb-3">
                                <label for="gender">Gender</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="laki_laki"
                                        value="male" {{ old('gender') === 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="laki_laki">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="female"
                                    value="female" {{ old('gender') === 'female' ? 'checked' : '' }}>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <span class="text-danger">{{ $errors->first('gender') }}</span>
                        </div>
                            <div class="form-group mt-1 mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group mt-1 mb-3">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" value="{{ old('phone') }}">
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                            <div class="form-group mt-1 mb-3">
                                <label for="grade">Grade</label>
                                <input type="text" class="form-control @error('grade') is-invalid @enderror"
                                    id="grade" name="grade" value="{{ old('grade') }}">
                                <span class="text-danger">{{ $errors->first('grade') }}</span>
                            </div>
                            <button type="submit" class="btn btn-primary">SAVE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection