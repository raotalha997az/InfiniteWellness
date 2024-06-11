@extends('layouts.app')
@section('title')
    Functional Medicine Record
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Functional Medicine Record</h3>
            </div>
            <div class="card-body">
                <p><strong>Patient:</strong> {{ $functionalMedicine->patient->user->first_name }} | {{ $functionalMedicine->patient->MR }}</p>
                <p><strong>Details:</strong></p>
                <div>{!! $functionalMedicine->details !!}</div>
            </div>
            <div class="card-footer">
                <a href="{{ route('functional-medicine.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
