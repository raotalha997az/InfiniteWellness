@extends('layouts.app')
@section('title')
    {{__('messages.common.edit')}} {{__('messages.admins')}}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-7">
            <h1 class="mb-0">@yield('title')</h1>
            <a href="{{ route('admins.index') }}"
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
                {{ Form::hidden('utilsScript', asset('assets/js/int-tel/js/utils.min.js'), ['class' => 'utilsScript']) }}
                {{ Form::hidden('isEdit', true, ['class' => 'isEdit']) }}
                <div class="card-body p-12">
                    {!! Form::model($admin, ['route' => ['admins.update', $admin->id], 'method' => 'patch', 'files' => 'true', 'id' => 'editAdminForm']) !!}

                    @include('admins.edit_fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
