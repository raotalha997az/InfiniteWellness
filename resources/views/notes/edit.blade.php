@extends('layouts.app')

@section('title')
    {{ __('messages.edit_note') }}
@endsection

@section('content')
    @include('flash::message')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Edit Note</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('notes.update', $note->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="note" class="form-label">Notes</label>
                        <textarea name="note" id="note" class="form-control" rows="4" required></textarea>

                        @error('note')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary me-2" disabled>Update</button>
                    <a href="{{ route('notes.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
      setTimeout(function() {

        CKEDITOR.replace('note');

        CKEDITOR.on('instanceReady', function() {
            var noteEditor = CKEDITOR.instances.note;
            var submitBtn = document.querySelector('button[type="submit"]');

            // Set CKEditor content dynamically
            setTimeout(function() {
                noteEditor.setData(@json($note->notes));
            },1000);
            

            function enableSubmitButton() {
                submitBtn.disabled = !noteEditor.getData().trim();
            }

            noteEditor.on('change', enableSubmitButton);
            enableSubmitButton(); // Check on page load
        });
    

}, 1000);
</script>
@endsection
