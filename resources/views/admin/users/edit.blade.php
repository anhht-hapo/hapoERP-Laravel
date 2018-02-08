@extends('admin.layouts.master')
@section('content')
    <section>
        @include('admin.users.error')
        <form method="POST" action="{{route('users.update',$user->id)}}">
            {{ method_field('PUT') }}
               {{ csrf_field() }}
            <h4>Edit Employee</h4>
            <div >
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{old('email)}}" disabled>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" required>{{old('address')}}</textarea>
                </div>
                <div class="form-group">
                    <label>Birthday</label>
                    <input type="date" name="birthday" class="form-control" value="{{old('birthday')}}" required>
                </div>
            </div>
            <div >
                <input type="submit" class="btn btn-info" value="Save">
            </div>
        </form>
    </section>
@endsection

