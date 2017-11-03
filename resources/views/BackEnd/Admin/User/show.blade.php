@extends('BackEnd.Admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <a href="" class="btn btn-primary">Danh sách người dùng</a>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Update người dùng</div>
                    <div class="panel-body">
                        <form action="{{route('user.update',['id'=> $user->id])}}" method="post">
                            {{csrf_field()}}
                            {{method_field('put')}}
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" >
                                <label for="name">Họ và Tên</label>
                                <input type="name" class="form-control" id="name" name="name" placeholder="name" value="{{$user->name}}">
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{$user->email}}">
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                                <span class="help-block">{{ $errors->first('password') }}</span>

                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Re-password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-Password">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>


                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection