@extends('layouts.app')

@section('title', 'Edit Functional Medicine')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>Edit Functional Medicine Record</h3>
                <a href="{{ route('functional-medicine.index') }}" class="btn btn-secondary">Back</a>
            </div>
            <form action="{{ route('functional-medicine.update', $functionalMedicine->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="mt-5 mb-5 row">
                        <div class="col-md-12">
                            <label for="patient_id" class="form-label">Patient</label>
                            <select name="patient_id" id="patient_id" class="form-select">
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}" {{ $functionalMedicine->patient_id == $patient->id ? 'selected' : '' }}>
                                        {{ $patient->user->first_name }} {{ $patient->user->last_name }} | {{ $patient->MR }}
                                    </option>
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
                            <textarea name="details" id="details" class="form-control">{{ old('details', $functionalMedicine->details) }}</textarea>
                            @error('details')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            CKEDITOR.replace('details');
        });
    </script>
@endsection
