@extends('layouts.app')

@section('title')
    {{ __('messages.appointments') }}
@endsection

@section('content')
    @include('flash::message')

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User_id</th>
                        <th>Notes</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- {{ dd($notes) }} --}}

                    @foreach($notes as $note)
                        <tr>
                            <td>{{ $note->id }}</td>
                            <td>{{ $note->user_id }}</td>
                            <td>{{ $note->notes }}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Add any custom scripts here -->
@endsection
