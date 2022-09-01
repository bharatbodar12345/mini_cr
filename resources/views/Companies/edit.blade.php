@extends('layouts.admin')
@section('title', 'Companies Edit')
@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Companies</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Companie Edit</h6>
                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('companie.update',$Companie->id) }}" autocomplete="off"
                        enctype="multipart/form-data">
                        @method('PUT')
                        <h6 class="heading-small text-muted mb-4">Edit Companie Details</h6>
                        @csrf
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="name">Name<span
                                                class="small text-danger">*</span></label>
                                        <input type="text" id="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            placeholder="Name" value="{{ $Companie->name ? $Companie->name : old('name') }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label " for="email">Email address<span
                                                class="small text-danger">*</span></label>
                                        <input type="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            placeholder="example@example.com" value="{{ $Companie->email ? $Companie->email : old('email') }}">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="website">Website<span
                                            class="small text-danger">*</span></label>
                                        <input type="text" id="website"
                                            class="form-control @error('website') is-invalid @enderror" name="website"
                                            placeholder="Website" value="{{ $Companie->website ? $Companie->website : old('website') }}">
                                        @error('website')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="logo" class="form-label">Logo<span
                                            class="small text-danger">*</span></label>
                                        <input class="form-control @error('logo') is-invalid @enderror" type="file"
                                            id="logo" name="logo">
                                    </div>
                                    @error('logo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-3">
                                    <img src="{{ asset($Companie->logo) }}" alt="">
                                </div>
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                    <a href="{{ route('companie.index') }}" class="btn btn-secondary">Back</a>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>


@endsection
