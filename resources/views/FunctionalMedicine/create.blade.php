@extends('layouts.app')
@section('title')
Functional Medicine
@endsection
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Functional Medicine</h3>
            <a href="{{ route('functional-medicine.index') }}" class="btn btn-secondary">Back</a>
        </div>
        <form action="{{ route('functional-medicine.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="mt-5 mb-5 row">
                    <div class="col-md-12">
                        <label for="patient_id" class="form-label">Patient</label>
                        <select name="patient_id" id="patient_id" class="form-select">
                            <option value="">Select patient</option>
                            @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->user->first_name }} {{
                                $patient->user->last_name }} |
                                {{ $patient->MR }}</option>
                            @endforeach
                        </select>
                        @error('patient_id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-12">
                        <label for="details" class="form-label">Functional Medicine</label>
                        <textarea name="details" id="details" class="form-control"></textarea>
                        @error('details')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" id="submit" disabled class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    // document.addEventListener("DOMContentLoaded", function() {
    //         CKEDITOR.replace('details');
    //     });

    document.addEventListener("DOMContentLoaded", function() {
    // Replace the textarea with CKEditor
    CKEDITOR.replace('details');

    var submitBtn = document.getElementById('submit');
    var patientId = document.getElementById('patient_id');
    var details = document.getElementById('details');

    if (submitBtn && patientId && details) {

        function enableSubmitButton() {
            if (patientId.value && CKEDITOR.instances.details.getData()) {
                submitBtn.disabled = false;
                console.log("Submit button enabled.");
            } else {
                submitBtn.disabled = true;
            }
        }

        patientId.addEventListener('change', enableSubmitButton);
        CKEDITOR.instances.details.on('change', enableSubmitButton);

    } else {
        console.error("One or more elements not found.");
    }
});


</script>
@endsection