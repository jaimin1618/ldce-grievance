@extends('common.main')

@section('title',"Dashboard")
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    {{-- <link rel="stylesheet" href="{{ asset('css/pagination.css') }}" />     --}}

    
@endsection

@section('content')
<div class="full-container  d-f-c">
    <div class="container">
        <div class="dasboard-filter" style="padding-left: 0px">
            <div class="dashboard-filter-box">
                @if (isset($departments) && !empty($departments))
                    <select name="department_of_list" id="department_of_list">
                        <option value="-1">All-department</option>
                        @foreach ($departments as $department)
                        <option value="{{ $department['department_id'] }}">{{ $department['department_name'] }}</option>
                        @endforeach
                    </select>
                @endif
                @if (isset($roles) && !empty($roles))
                    <select name="department_of_list" id="department_of_list">                      
                        @foreach ($roles as $key=>$rolename)
                        <option value="{{ $key }}">{{ $rolename }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/pagination.js') }}"></script>
@endsection