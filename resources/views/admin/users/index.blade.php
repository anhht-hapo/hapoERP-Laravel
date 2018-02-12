@extends('admin.layouts.master')
@section('content')
<section>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                @include('admin.users.error')
                @if (session()->has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{{ session()->get('success') }}</li>
                    </ul>
                </div>
                @endif
                <div class="col-sm-6">
                    <h2>Manage <b>Employees</b></h2>
                </div>
                <div class="col-sm-6">
                    <a href="#addEmployeeModal" id="#addButton" class="btn btn-success" data-toggle="modal">
                        <i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                    <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                        <i class="material-icons">&#xE15C;</i> <span>Delete</span></a>
                    <a href="#" class="btn btn-primary btn-filter">
                        <i class="material-icons">&#xE152;</i><span>Filter</span></a>
                </div>
            </div>
        </div>
        <div id="list_users">
            @include('admin.users.list')
        </div>
    </div>
</section>
@endsection

