@extends('admin.layouts.master')
@section('content')
    <section>
        <form method="POST" action="{{route('users.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h4>Create Employee</h4>
            <div >
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required>
                    @if ($errors->has('name'))
                        <p class="text-alert">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                    @if ($errors->has('email'))
                        <p class="text-alert">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address" required></textarea>
                    @if ($errors->has('address'))
                        <p class="text-alert">{{ $errors->first('address') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Birthday</label>
                    <input type="date" name="birthday" class="form-control" required>
                    @if ($errors->has('birthday'))
                        <p class="text-alert">{{ $errors->first('birthday') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label>Avatar</label>
                    <input type="file" name="avatar" value="{{old('avatar')}}">
                </div>
            </div>
            <div >
                <input type="submit" class="btn btn-info" value="Save">
            </div>
        </form>

    </section>
@endsection

