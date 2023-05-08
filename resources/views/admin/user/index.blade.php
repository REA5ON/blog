@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="col-6">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-1">
                        <a href="{{ route('admin.user.create') }}" class="mb-3 btn btn-block btn-primary">Add</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created</th>
                                        <th>Updated</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>
                                                <div class="row">

                                                    <a href="{{ route('admin.user.show', $user) }} ">
                                                        <ion-icon name="eye-outline"></ion-icon>
                                                    </a>
                                                    <div class="ml-3">
                                                        <a href="{{ route('admin.user.edit', $user) }}"
                                                           class="text-green">
                                                            <ion-icon name="create-outline"></ion-icon>
                                                        </a>
                                                    </div>
                                                    <div class="ml-3">
                                                        <form action="{{ route('admin.user.delete', $user) }}"
                                                              method="POST">
                                                            @csrf
                                                            @method('Delete')
                                                            <button type="submit"
                                                                    class="border-0 bg-transparent text-red">
                                                                <ion-icon name="trash-outline"></ion-icon>
                                                            </button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

