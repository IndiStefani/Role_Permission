@extends('layouts.master')
@section('content')

<div class="main-content">
    <div class="card-body d-flex justify-content-between align-items-center mb-3">
        <h5 class="card-title">User Management</h5>
        <a href="{{ route('user_management.create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="content-wrapper">
        <div class="row same-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="table-id" class="table dt-responsive display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset('assets/images/avatar/' . $user->avatar) }}" alt="Avatar" style="width: 50px; height: 50px;"></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('user_management.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>

                                        <form action="{{ route('user_management.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection