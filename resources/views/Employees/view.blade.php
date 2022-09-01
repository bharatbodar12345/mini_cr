@extends('layouts.admin')
@section('title', 'Employees View')
@section('main-content')
@php use App\Models\Companies; @endphp
    <h1 class="h3 mb-4 text-gray-800">Employees</h1>
    <div class="row">



        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Employees View</h6>
                </div>

                <div class="card-body">


                    <h6 class="heading-small text-muted mb-4">View Employee Details</h6>

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="firstname">First Name</label>
                                    <input readonly type="text" id="firstname" class="form-control"
                                        value="{{ $Employee->firstname ? $Employee->firstname : '' }}">

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="lastname">Last name</label>
                                    <input readonly type="text" id="lastname" class="form-control"
                                        value="{{ $Employee->lastname ? $Employee->lastname : '' }}">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="email">Email address</label>
                                    <input readonly type="email" id="email" class="form-control"
                                        value="{{ $Employee->email ? $Employee->email : '' }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="phone">Phone</label>
                                    <input readonly type="number" id="phone" class="form-control "
                                        value="{{ $Employee->phone ? $Employee->phone : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="companie_id">companie</label>
                                    <input readonly type="text" id="companie_id" class="form-control "
                                        value="{{  Companies::get_Companie_by_id($Employee->companie_id)->name }}">

                                </div>
                            </div>


                        </div>
                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col">

                                <a href="{{ route('employee.index') }}" class="btn btn-secondary">Back</a>
                            </div>

                        </div>
                    </div>


                </div>

            </div>

        </div>

    </div>


@endsection
