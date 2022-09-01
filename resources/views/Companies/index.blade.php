@extends('layouts.admin')
@section('title', 'Companies List')
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
    @if (session('error'))
        <div class="alert alert-danger border-left-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
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
    <div class="row">



        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Companies List</h6>
                    <a href="{{ route('companie.create') }}" class="btn btn-primary float-right">Add Companies</a>
                </div>

                <div class="card-body">

                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table p-4 table-bordered dataTable" id="dataTable"
                                    aria-describedby="dataTable_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                            <th>Logo</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Companies as $Companie)
                                            <tr class="odd">
                                                <td class="sorting_1">{{ $Companie['id'] }}</td>
                                                <td>{{ $Companie['name'] }}</td>
                                                <td>{{ $Companie['email'] }}</td>
                                                <td>{{ $Companie['website'] }}</td>
                                                <td> <img src="{{ asset($Companie['logo']) }}" width="50px"
                                                        height="50px" alt=""></td>
                                                <td><a href="{{ route('companie.show', $Companie->id) }}"
                                                    class="btn btn-success">View</a>
                                                    <a href="{{ route('companie.edit', $Companie->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a class="btn btn-danger" href="#" data-toggle="modal"
                                                        data-target="#Companie_delete_{{ $Companie->id }}">Delete</a>
                                                    <div class="modal fade" id="Companie_delete_{{ $Companie->id }}"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Delete Item</h5>
                                                                    <button class="close" type="button"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">Do You Want To Really Delete
                                                                    This Item?</div>
                                                                <div class="modal-footer">
                                                                    <form
                                                                        action="{{ route('companie.destroy', $Companie->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="button"
                                                                            class="btn btn-outline-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {!! $Companies->links() !!}
                    </div>

                </div>
            </div>

        </div>

    </div>


@endsection
