@extends('BackEnd.Admin.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <a href="" class="btn btn-primary">Danh mục sản phẩm</a>
                    <a href="{{ route('user.create')  }}" class="btn btn-primary">Tạo người dùng</a>
                </div>
            </div>
        </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Danh sách người dùng</div>
                    <div class="panel-body">
                        @if(session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                            @endif
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Created</th>
                                <th>Date Updated</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($users)>0)
                                @foreach($users as $user )
                                    <tr>
                                        <td>{{ $user ->id }}</td>
                                        <td>{{ $user ->name }}</td>
                                        <td>{{ $user ->email }}</td>
                                        <td>{{ $user ->created_at }}</td>
                                        <td>{{ $user ->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('user.edit',['id'=> $user->id]) }}"
                                               class="btn btn-primary">Edit</a>
                                            <a href="{{ route('user.delete',['id'=> $user->id]) }}"
                                               class="btn btn-danger">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif


                            </tbody>

                        </table>

                    </div>

                </div>
                <div style="text-align: center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection