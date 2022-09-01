@extends('layouts.admin')
@section('title', 'Employees List')
@section('main-content')
    @php use App\Models\Companies; @endphp
    <h1 class="h3 mb-4 text-gray-800">Employees</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Employees List</h6>
                    <a href="{{ route('employee.create') }}" class="btn btn-primary float-right">Add Employees</a>
                </div>

                <div class="card-body">

                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">

                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table p-4 table-bordered " aria-describedby="dataTable_info">
                                    <thead>
                                        <tr role="row">
                                            <th>Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>companie </th>
                                            <th>Phone </th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Employees as $employee)
                                            <tr class="odd">
                                                <td class="sorting_1">{{ $employee['id'] }}</td>
                                                <td>{{ $employee['firstname'] }}</td>
                                                <td>{{ $employee['lastname'] }}</td>
                                                <td>{{ $employee['email'] }}</td>
                                                <td>{{ Companies::get_Companie_by_id($employee->companie_id)->name }}
                                                </td>
                                                <td>{{ $employee['phone'] }}</td>

                                                <td><a href="{{ route('employee.show', $employee->id) }}"
                                                        class="btn btn-success">View</a>
                                                    <a href="{{ route('employee.edit', $employee->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a class="btn btn-danger" href="#" data-toggle="modal"
                                                        data-target="#employee_delete_{{ $employee->id }}">Delete</a>
                                                    <div class="modal fade" id="employee_delete_{{ $employee->id }}"
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
                                                                        action="{{ route('employee.destroy', $employee->id) }}"
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
                        {!! $Employees->links() !!}
                    </div>

                </div>
            </div>

        </div>

    </div>


@endsection
