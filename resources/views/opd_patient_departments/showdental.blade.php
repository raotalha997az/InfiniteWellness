@extends('layouts.app')
@section('title')
    Dental OPD 
@endsection
@section('header_toolbar')

    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                <a href="{{ url()->previous() }}"
                   class="custombackButton">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                {{Form::hidden('visitedOPDPatients',route('opd.patient.index'),['id'=>'showVisitedOPDPatients'])}}
                {{Form::hidden('opdPatientUrl',url('opds'),['id'=>'showOpdPatientUrl'])}}
                {{Form::hidden('doctorUrl',url('doctors'),['id'=>'showOpdDoctorUrl'])}}
                {{Form::hidden('patient_id',$opdPatientDepartment->patient_id,['id'=>'showOpdPatientId'])}}
                {{Form::hidden('opdPatientDepartmentId',$opdPatientDepartment->id,['id'=>'showOpdPatientDepartmentId'])}}
                {{Form::hidden('defaultDocumentImageUrl',asset('assets/img/default_image.jpg'),['id'=>'showOpdDefaultDocumentImageUrl', 'class' => 'defaultDocumentImageUrl'])}}
                {{Form::hidden('opdDiagnosisCreateUrl',route('opd.diagnosis.store'),['id'=>'showOpdDiagnosisCreateUrl'])}}
                {{Form::hidden('opdDiagnosisUrl',route('dentalOpd.diagnosis.destroy'),['id'=>'showOpdDiagnosisUrl'])}}
                {{Form::hidden('downloadDiagnosisDocumentUrl',url('opd-diagnosis-download'),['id'=>'showOpdDownloadDiagnosisDocumentUrl'])}}
                {{Form::hidden('opdTimelineCreateUrl',route('opd.timelines.store'),['id'=>'showOpdTimelineCreateUrl'])}}
                {{Form::hidden('opdTimelinesUrl',route('opd.timelines.index'),['id'=>'showOpdTimelinesUrl'])}}
                {{-- {{Form::hidden('opdPatientCaseDate',$opdPatientDepartment->patientCase->date,['id'=>'showOpdPatientCaseDate'])}} --}}
                {{Form::hidden('id',$opdPatientDepartment->id,['id'=>'showOpdId'])}}
                {{Form::hidden('appointmentDate',$opdPatientDepartment->appointment_date,['id'=>'showOpdAppointmentDate'])}}
                {{Form::hidden('opdPatients',__('messages.opd_patient.opd_patient'),['id'=>'opdPatients'])}}
                {{Form::hidden('opdDiagnosis',__('messages.opd_diagnosis'),['id'=>'opdDiagnosisDeleteBtn'])}}
                {{Form::hidden('opdTimeline',__('messages.opd_timeline'),['id'=>'opdTimeline'])}}
                {{ Form::hidden('deleteVariable', __('messages.common.delete'), ['class' => 'deleteVariable']) }}
                {{ Form::hidden('yesVariable', __('messages.common.yes'), ['class' => 'yesVariable']) }}
                {{ Form::hidden('noVariable', __('messages.common.no'), ['class' => 'noVariable']) }}
                {{ Form::hidden('cancelVariable', __('messages.common.cancel'), ['class' => 'cancelVariable']) }}
                {{ Form::hidden('confirmVariable', __('messages.common.are_you_sure_want_to_delete_this'), ['class' => 'confirmVariable']) }}
                {{ Form::hidden('deletedVariable', __('messages.common.deleted'), ['class' => 'deletedVariable']) }}
                {{ Form::hidden('hasBeenDeletedVariable', __('messages.common.has_been_deleted'), ['class' => 'hasBeenDeletedVariable']) }}

                <div class="col-12">
                    @include('flash::message')
                </div>
            </div>
            @include('dentalOpd_patient_departments.show_fields')
            @include('dentalopd_diagnoses.add_modal')
            @include('dentalopd_diagnoses.edit_modal')
            @include('dentalopd_diagnoses.templates.templates')
            @include('dentalOpd_patient_departments.templates.templates')
            @include('dentalopd_timelines.add_modal')
            @include('dentalopd_timelines.edit_modal')
        </div>
    </div>
@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
    // Initialize CKEditor
    CKEDITOR.replace('opdDiagnosisDescription');

    // Ensure CKEditor initializes properly when the modal opens
    $('#add_opd_diagnoses_modal').on('shown.bs.modal', function () {
        if (CKEDITOR.instances.opdDiagnosisDescription) {
            CKEDITOR.instances.opdDiagnosisDescription.setData(''); // Clear editor content
            CKEDITOR.instances.opdDiagnosisDescription.focus();
        }
    });

    // Enable/Disable submit button based on CKEditor content
    CKEDITOR.instances.opdDiagnosisDescription.on('change', function () {
        var submitBtn = document.getElementById('btnOpdDiagnosisSave');
        var editorData = CKEDITOR.instances.opdDiagnosisDescription.getData().trim();
        submitBtn.disabled = !editorData;
    });

    // Ensure CKEditor data is sent with form submission
    document.querySelector('#add_opd_diagnoses_modal form').addEventListener('submit', function () {
        document.getElementById('opdDiagnosisDescription').value = CKEDITOR.instances.opdDiagnosisDescription.getData();
    });
});


    </script>
    {{-- assets/js/opd_tab_active/opd_tab_active.js--}}
    {{-- assets/js/opd_patients/visits.js --}}
    {{-- assets/js/opd_diagnosis/opd_diagnosis.js--}}
    {{-- assets/js/opd_timelines/opd_timelines.js --}}
@endsection
