@extends('admin.layouts.master')
@section('content')
    <section>
        @include('admin.users.error');
        <form method="POST" action="{{route('users.store')}}">
            {{ csrf_field() }}
            <h4>Edit Employee</h4>
            <div >
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control"  required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" required></textarea>
                </div>
                <div class="form-group">
                    <label>Birthday</label>
                    <input type="date" name="birthday" class="form-control" required>
                </div>
            </div>
            <div >
                <input type="submit" class="btn btn-info" value="Save">
            </div>
        </form>
    </section>
@endsection

