@extends('layouts.app')
@section('title')
    Functional Medicine
@endsection
@section('content') 
<div class="container-fluid">
    <div class="d-flex flex-column">
        @include('flash::message')
        @role('Admin|Nurse|Receptionist')
        <div class="mb-5 col-md-12 text-end">
            <a href="{{ route('functional-medicine.create') }}" target="_blank"><button class="btn btn-primary">Add+</button></a>
        </div>
        @endrole
        <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#.</th>
                            <th>Paitent MR No.</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($FunctionalMedicine as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->patient->MR }}</td>
                                <td class="text-center">
                                    <a href="{{ route('functional-medicine.show', $data->id) }}" target="_blank"><button class="btn btn-primary">View</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
