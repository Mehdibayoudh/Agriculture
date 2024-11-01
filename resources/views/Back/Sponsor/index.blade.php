@extends('layouts_Admin.app')

@section('content')
    <div class="container">
        <h2>Sponsors</h2>
        <a href="{{ route('sponsoradmin.create') }}" class="btn btn-primary mb-3">Add Sponsor</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Industry</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sponsors as $sponsor)
                <tr>
                    <td>{{ $sponsor->name }}</td>
                    <td>{{ $sponsor->industry }}</td>
                    <td>{{ $sponsor->phone }}</td>
                    <td>
                        <a href="{{ route('sponsoradmin.edit', $sponsor->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sponsoradmin.destroy', $sponsor->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this sponsor?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
