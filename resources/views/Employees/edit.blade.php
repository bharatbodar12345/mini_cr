@extends('layouts.admin')
@section('title', 'Employees Edit')
@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Employees</h1>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger border-left-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">



        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Employees Edit</h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('employee.update', $Employee->id) }}" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <h6 class="heading-small text-muted mb-4">Edit Employee Details</h6>

                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="firstname">First Name<span
                                                class="small text-danger">*</span></label>
                                        <input type="text" id="firstname"
                                            class="form-control  @error('firstname') is-invalid @enderror" name="firstname"
                                            placeholder="First Name"
                                            value="{{ $Employee->firstname ? $Employee->firstname : old('firstname') }}">
                                        @error('firstname')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="lastname">Last name<span
                                            class="small text-danger">*</span></label>
                                        <input type="text" id="lastname"
                                            class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                            placeholder="Last name"
                                            value="{{ $Employee->lastname ? $Employee->lastname : old('lastname') }}">
                                        @error('lastname')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email address<span
                                                class="small text-danger">*</span></label>
                                        <input type="email" id="email"
                                            class="form-control  @error('email') is-invalid @enderror" name="email"
                                            placeholder="example@example.com"
                                            value="{{ $Employee->email ? $Employee->email : old('email') }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="phone">Phone<span
                                            class="small text-danger">*</span></label>
                                        <input type="number" id="phone"
                                            class="form-control  @error('phone') is-invalid @enderror" name="phone"
                                            placeholder="Phone"
                                            value="{{ $Employee->phone ? $Employee->phone : old('phone') }}">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="companie_id">companies<span
                                            class="small text-danger">*</span></label>
                                        <select class="form-select form-control  @error('companie_id') is-invalid @enderror"
                                            aria-label="Default select example" name="companie_id" id="companie_id">
                                            @foreach ($Companies as $Companie)
                                                <option @if ($Employee->companie_id == $Companie->id) {{ 'selected' }} @endif
                                                    value="{{ $Companie->id }}">{{ $Companie->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('companie_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                    <a href="{{ route('employee.index') }}" class="btn btn-secondary">Back</a>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>


@endsection
