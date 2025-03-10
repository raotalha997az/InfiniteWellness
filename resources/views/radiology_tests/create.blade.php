@extends('layouts.app')
@section('title')
    {{ __('messages.radiology_test.new_radiology_test') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('radiology.test.index') }}"
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
                {{ Form::hidden('radiologyTestUrl', url('radiology-tests'), ['class' => 'radiologyTestActionURL']) }}
                <div class="card-body p-12">
                    {{ Form::open(['route' => 'radiology.test.store', 'id' => 'createRadiologyTest']) }}

                    @include('radiology_tests.fields')

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- 
    JS File :- assets/js/radiology_tests/create-edit.js
               assets/js/custom/input_price_format.js 
 --}}
