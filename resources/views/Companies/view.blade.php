@extends('layouts.admin')
@section('title', 'Companies View')
@section('main-content')

    <h1 class="h3 mb-4 text-gray-800">Companies</h1>
    <div class="row">
        <div class="col-lg-12 order-lg-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Companie View</h6>
                </div>
                <div class="card-body">
                    <h6 class="heading-small text-muted mb-4">View Companie Details</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Name</label>
                                    <input readonly type="text" id="name" class="form-control"
                                        value="{{ $Companie->name ? $Companie->name : '' }}">

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label " for="email">Email address</label>
                                    <input readonly type="email" id="email" class="form-control" name="email"
                                        value="{{ $Companie->email ? $Companie->email : '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="website">Website</label>
                                    <input readonly type="text" id="website" class="form-control"
                                        value="{{ $Companie->website ? $Companie->website : '' }}">

                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="logo" class="form-label">Logo</label>
                                </div>

                                <div class="col-lg-3">
                                    <img width="50px" src="{{ asset($Companie->logo) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col">

                                <a href="{{ route('companie.index') }}" class="btn btn-secondary">Back</a>
                            </div>

                        </div>
                    </div>


                </div>

            </div>

        </div>

    </div>


@endsection
