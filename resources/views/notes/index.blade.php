@extends('layouts.app')
@section('title')
    Notes
@endsection
@section('content')
<div class="container-fluid">
    <div class="d-flex flex-column">
        @include('flash::message')
        {{-- @role('Admin|Nurse|Receptionist') --}}
        <div class="mb-5 col-md-12 text-end">
            <a href="{{ route('notes.create') }}" class="btn btn-primary btn-sm float-end">Add Note</a>
        </div>
        {{-- @endrole --}}
        <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Notes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notes as $note)
                        <tr>
                            <td>{{ $note->id }}</td>
                            <td>{!! $note->notes !!}</td>
                            <td>
                                <a href="{{ route('notes.edit', $note->id) }}" class="me-1 ms-1 btn btn-sm btn-primary"><i class="bi bi-pencil"></i></a>

                                <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger delete-note"
                                            data-id="{{ $note->id }}">
                                        <i class="bi bi-trash"></i>
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
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).on('click', '.delete-note', function () {
        let noteId = $(this).data('id');

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/notes/destroy/${noteId}`,  // ✅ Make sure this matches the route
                    type: 'POST',  // ✅ Laravel requires POST when using _method override
                    data: {
                        _method: 'DELETE',  // ✅ Correct method override
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your note has been deleted.",
                            icon: "success",
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload(); // ✅ Refresh the page to reflect changes
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            title: "Error!",
                            text: "There was an issue deleting the note. " + xhr.responseText,
                            icon: "error"
                        });
                    }
                });

            }
        });
    });
</script>

@endsection
