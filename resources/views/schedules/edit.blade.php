@extends('layouts.app')
@section('title')
    {{ __('messages.schedule.edit') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('schedules.index') }}"
               class="custombackButton">{{ __('messages.common.back') }}</a>
        </div>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {{Form::hidden('hospitalSchedule',json_encode($data['hospitalSchedule']),['id'=>'editHospitalSchedule','class'=>'hospitalSchedule'])}}

                    {{ Form::model($schedule, ['route' => ['schedules.update', $schedule->id], 'method' => 'patch', 'id' => 'editScheduleForm' ,'class'=>'scheduleForm']) }}
                    @include('schedules.fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
{{--   assets/js/schedules/create-edit.js --}}
@endsection
