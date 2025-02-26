@extends('layouts.app')

@section('title')
    {{ __('messages.appointments') }}
@endsection

@section('content')
    @include('flash::message')

    <div class="container">
        <div class="card">
            <div class="card-header">
                {{-- <h3>{{ __('messages.add_note') }}</h3> --}}
                <h3>Add Notes</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('notes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="note" class="form-label">Notes</label>
                        <textarea name="note" id="note" class="form-control" rows="4" required></textarea>

                        @error('note')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                    <button type="submit" id="submit" class="btn btn-primary" disabled>Save</button>
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
            var submitBtn = document.getElementById('submit');
            var noteEditor = CKEDITOR.instances.note;
    
            function enableSubmitButton() {
                if (noteEditor.getData().trim()) {
                    submitBtn.disabled = false;
                } else {
                    submitBtn.disabled = true;
                }
            }
    
            noteEditor.on('change', enableSubmitButton);
            enableSubmitButton(); // Run on page load
        }
    );
    }, 1000);
    
</script>

@endsection
