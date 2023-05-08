@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add user</h1>
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

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.user.store') }}" method="POST" class="w-25">
                            @csrf
                            <div class="form-group">
                                <!-- Name -->
                                <label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="User name">
                                </label>
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <!-- Email -->
                                <label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                                </label>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <!-- Password -->
                                <label>
                                    <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password">
                                </label>
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group w-50">
                                    <label>Choose a role </label>
                                    <select name="role" class="custom-select">
                                        @foreach($roles as $id => $role)
                                            <option value="{{ $id }}"
                                                {{ $id == old('role') ? 'selected' : '' }}
                                            >{{ $role }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Add">
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

