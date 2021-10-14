@extends('common.main')

@section('title', 'Dashboard')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}" />
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
    <style>
        input,
        select {
            background-color: white
        }

    </style>

@endsection

@section('content')

    <div class="full-container  d-f-c">
        <div class="container">
            <div class="title">
                <h1 class="">Dashboard</h1>
                <div class="underline">
                    <svg xmlns="http://www.w3.org/2000/svg" id="underline" width="335.07" height="23.452"
                        viewBox="0 0 335.07 23.452">
                        <path id="Path_1" data-name="Path 1"
                            d="M420.126-143.73a57.268,57.268,0,0,0-5.557,4.717c-2.021,1.99-3.978,3.611-4.294,3.611a11.227,11.227,0,0,1-3.031-1.474c-3.6-2.137-6.946-2.58-9.535-1.253l-2.21,1.106,3.473.074c3.41.074,8.84,2.285,8.84,3.611,0,1.4-5.3,3.464-8.9,3.464-3.283,0-3.536.074-2.273.884,2.336,1.548,7.2,1.179,10.608-.884l3.094-1.769,3.852,3.685c7.135,7,9.977,7.591,13.955,2.948l2.463-2.948,2.021,1.4c2.526,1.843,4.609,1.843,7.577.074l2.336-1.4,2.778,3.243c3.915,4.643,6.567,4.275,13.008-1.843,1.579-1.474,3.283-3.1,3.852-3.611.884-.737,1.642-.59,4.42.958a14.463,14.463,0,0,0,6.567,1.843c4.546,0,5.683-1.179,1.452-1.621-3.473-.295-8.4-2.58-8.4-3.906,0-1.253,4.736-3.538,8.082-3.906,3.852-.442,2.715-1.621-1.642-1.621a12.87,12.87,0,0,0-6.188,1.843c-3.094,1.843-3.22,1.843-4.609.59-8.272-7.518-8.651-7.812-11.429-8.181-2.715-.295-3.031-.147-5.367,2.727-1.894,2.285-2.652,2.8-2.9,1.99a6.137,6.137,0,0,0-2.526-2.285,6.685,6.685,0,0,0-7.7,1.032c-1.452,1.253-1.515,1.179-3.915-1.548C425.367-145.278,423.283-145.72,420.126-143.73Zm6.819,6.265c2.273,3.169,2.147,5.38-.442,8.4-1.579,1.843-2.715,2.506-4.294,2.506-2.21,0-6.82-2.948-8.84-5.675-1.073-1.327-1.01-1.474,2.021-4.2C420.694-141.151,423.914-141.446,426.945-137.466Zm27.215-1.327a19.543,19.543,0,0,1,4.42,3.39l2.336,2.432-1.7,2.064c-2.589,3.1-6.756,5.307-9.029,4.717-1.831-.442-5.746-4.791-5.746-6.338,0-1.474,1.894-5.012,3.284-6.117C449.487-140.119,451.445-140.119,454.16-138.792Zm-15.154,1.253c3.031,2.8,1.389,8.771-2.463,8.771-1.957,0-4.736-3.022-4.736-5.159,0-1.916,2.715-5.159,4.294-5.159A5.47,5.47,0,0,1,439.006-137.539Z"
                            transform="translate(-268.84 144.937)" fill="#283891" />
                        <path id="Path_2" data-name="Path 2"
                            d="M649.674-135.132l-1.287,2.847H590.528c-57.39,0-57.9,0-58.561-1.627-1.522-3.741-4.448,0-3.472,4.473.585,2.6,2.224,3.5,3.16,1.708.624-1.22,5.813-1.3,58.912-1.3h58.249L649.6-127c1.092,2.928,3.472,2.847,4.565-.081,1.365-3.66.936-7.808-1.014-9.922C651.781-138.547,651.04-138.141,649.674-135.132Z"
                            transform="translate(-319.886 143.089)" fill="#283891" />
                        <path id="Path_3" data-name="Path 3"
                            d="M70.613-135.321c-1.687,3.61-.863,10.075,1.412,11.25,1.1.588,3.1-1.259,3.412-3.274.235-1.091,6.471-1.259,58.518-1.259,51.3,0,58.361.168,58.871,1.259,1.569,3.358,4.275-.756,3.373-5.037-.628-2.938-2.236-3.61-3.373-1.343l-.863,1.763H133.837c-38.476,0-58.125-.252-58.125-.84,0-1.931-1.608-4.2-2.942-4.2A2.584,2.584,0,0,0,70.613-135.321Z"
                            transform="translate(-69.718 142.206)" fill="#283891" />
                    </svg>
                </div>
            </div>
            <div class="dasboard-filter">

                <div class="dashboard-filter-box">
                    @if (isset($departments) && !empty($departments))
                        <span>Department : </span>

                        <select name="department_chart" id="department_chart">
                            <option value="-1">All</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department['department_id'] }}">{{ $department['department_name'] }}
                                </option>
                            @endforeach

                        </select>
                    @else
                        <input type="hidden" name="department_chart" id="department_chart"
                            value="{{ Auth::user()->department }}">
                    @endif

                </div>

                <div class="dashboard-filter-box">
                    <input type="date" name="start_date_chart" id="start_date_chart" value="@if (isset($last_month_date)){{ $last_month_date }}@endif" />
                    -
                    <input type="date" name="end_date_chart" id="end_date_chart" max="@if (isset($today_date)){{ $today_date }}@endif" value="@if (isset($today_date)){{ $today_date }}@endif">
                </div>
            </div>
            <div class="analysis d-f-c" style="position: relative" id="analysis_container">
                <div class="inner_loader_container" id="chart_loader">
                    <div class="inner_loader_box">
                        <img src="{{ asset('images/common/loader.gif') }}" alt="">
                    </div>
                </div>
                <div class="analysis-grid-container">
                    <div class="analysis-grid ">
                        <div class="card d-f-c">
                            <h3>All</h3>
                            <span id="charts_all"><span class="text" id="chart_category_all">0</span></span>
                        </div>
                    </div>
                    <div class="analysis-grid ">
                        <div class="card d-f-c">
                            <h3>pending</h3>
                            <span>
                                <div class="color" style="background: orange"></div><span class="text"
                                    id="chart_category_pending">0</span>
                            </span>
                        </div>
                    </div>
                    <div class="analysis-grid ">
                        <div class="card d-f-c">
                            <h3>Rejected</h3>
                            <span>
                                <div class="color" style="background: red"></div><span class="text"
                                    id="chart_category_rejected">0</span>
                            </span>
                        </div>
                    </div>
                    <div class="analysis-grid ">
                        <div class="card d-f-c">
                            <h3>Not actioned</h3>
                            <span>
                                <div class="color" style="background: gray"></div><span class="text"
                                    id="chart_category_not_actioned">0</span>
                            </span>
                        </div>
                    </div>
                    <div class="analysis-grid ">
                        <div class="card d-f-c">
                            <h3>In Progress</h3>
                            <span>
                                <div class="color" style="background: green"></div><span class="text"
                                    id="chart_category_in_progress">0</span>
                            </span>
                        </div>
                    </div>
                    <div class="analysis-grid ">
                        <div class="card d-f-c">
                            <h3>Completed</h3>
                            <span>
                                <div class="color" style="background: navy"></div><span class="text"
                                    id="chart_category_completed">0</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="analysis-grid-chart">
                    <div class="card">

                        <div class="wrapper">
                            <div class="pie-charts">
                                <div class="pieID--status pie-chart--wrapper">
                                    <div class="pie-chart">
                                        <div class="pie-chart__pie"></div>
                                        <ul class="pie-chart__legend" id="dashboard_pie_chart" style="display: none">
                                            <li class="for_pending"><span>1</span></li>
                                            <li class="for_rejected"><span>2</span></li>
                                            <li class="for_not_actioned"><span>20</span></li>
                                            <li class="for_in_progress"><span>5 </span></li>
                                            <li class="for_completed"><span>3</span></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="full-container  d-f-c" style="margin-top: 50px">
        <div class="title">
            <h1 class="">Grievance List</h1>
            <div class="underline">
                <svg xmlns="http://www.w3.org/2000/svg" id="underline" width="335.07" height="23.452"
                    viewBox="0 0 335.07 23.452">
                    <path id="Path_1" data-name="Path 1"
                        d="M420.126-143.73a57.268,57.268,0,0,0-5.557,4.717c-2.021,1.99-3.978,3.611-4.294,3.611a11.227,11.227,0,0,1-3.031-1.474c-3.6-2.137-6.946-2.58-9.535-1.253l-2.21,1.106,3.473.074c3.41.074,8.84,2.285,8.84,3.611,0,1.4-5.3,3.464-8.9,3.464-3.283,0-3.536.074-2.273.884,2.336,1.548,7.2,1.179,10.608-.884l3.094-1.769,3.852,3.685c7.135,7,9.977,7.591,13.955,2.948l2.463-2.948,2.021,1.4c2.526,1.843,4.609,1.843,7.577.074l2.336-1.4,2.778,3.243c3.915,4.643,6.567,4.275,13.008-1.843,1.579-1.474,3.283-3.1,3.852-3.611.884-.737,1.642-.59,4.42.958a14.463,14.463,0,0,0,6.567,1.843c4.546,0,5.683-1.179,1.452-1.621-3.473-.295-8.4-2.58-8.4-3.906,0-1.253,4.736-3.538,8.082-3.906,3.852-.442,2.715-1.621-1.642-1.621a12.87,12.87,0,0,0-6.188,1.843c-3.094,1.843-3.22,1.843-4.609.59-8.272-7.518-8.651-7.812-11.429-8.181-2.715-.295-3.031-.147-5.367,2.727-1.894,2.285-2.652,2.8-2.9,1.99a6.137,6.137,0,0,0-2.526-2.285,6.685,6.685,0,0,0-7.7,1.032c-1.452,1.253-1.515,1.179-3.915-1.548C425.367-145.278,423.283-145.72,420.126-143.73Zm6.819,6.265c2.273,3.169,2.147,5.38-.442,8.4-1.579,1.843-2.715,2.506-4.294,2.506-2.21,0-6.82-2.948-8.84-5.675-1.073-1.327-1.01-1.474,2.021-4.2C420.694-141.151,423.914-141.446,426.945-137.466Zm27.215-1.327a19.543,19.543,0,0,1,4.42,3.39l2.336,2.432-1.7,2.064c-2.589,3.1-6.756,5.307-9.029,4.717-1.831-.442-5.746-4.791-5.746-6.338,0-1.474,1.894-5.012,3.284-6.117C449.487-140.119,451.445-140.119,454.16-138.792Zm-15.154,1.253c3.031,2.8,1.389,8.771-2.463,8.771-1.957,0-4.736-3.022-4.736-5.159,0-1.916,2.715-5.159,4.294-5.159A5.47,5.47,0,0,1,439.006-137.539Z"
                        transform="translate(-268.84 144.937)" fill="#283891" />
                    <path id="Path_2" data-name="Path 2"
                        d="M649.674-135.132l-1.287,2.847H590.528c-57.39,0-57.9,0-58.561-1.627-1.522-3.741-4.448,0-3.472,4.473.585,2.6,2.224,3.5,3.16,1.708.624-1.22,5.813-1.3,58.912-1.3h58.249L649.6-127c1.092,2.928,3.472,2.847,4.565-.081,1.365-3.66.936-7.808-1.014-9.922C651.781-138.547,651.04-138.141,649.674-135.132Z"
                        transform="translate(-319.886 143.089)" fill="#283891" />
                    <path id="Path_3" data-name="Path 3"
                        d="M70.613-135.321c-1.687,3.61-.863,10.075,1.412,11.25,1.1.588,3.1-1.259,3.412-3.274.235-1.091,6.471-1.259,58.518-1.259,51.3,0,58.361.168,58.871,1.259,1.569,3.358,4.275-.756,3.373-5.037-.628-2.938-2.236-3.61-3.373-1.343l-.863,1.763H133.837c-38.476,0-58.125-.252-58.125-.84,0-1.931-1.608-4.2-2.942-4.2A2.584,2.584,0,0,0,70.613-135.321Z"
                        transform="translate(-69.718 142.206)" fill="#283891" />
                </svg>
            </div>
        </div>
        <div class="card container" style="margin-top: 30px">
            <div class="dasboard-filter" style="margin: 0px">
                <div>
                    <form onsubmit="getExportData()" style="width:100px" id="export_grivance" method="POST" action="{{ route('getData') }}">
                        @csrf
                        <input type="submit" class="btn  navy" style="" name="export" value="Export">
                    </form>
                </div>
                <div class="dashboard-filter-box">
                    <input type="search" id="search" style="cursor:text" placeholder="search...">
                </div>
            </div>
            <div class="dasboard-filter" style="padding-left: 0px">
                <div class="dashboard-filter-box">
                    @if (isset($departments) && !empty($departments))
                        <select name="department_of_list" id="department_of_list">
                            <option value="-1">All-department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department['department_id'] }}">{{ $department['department_name'] }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <input type="hidden" name="department_of_list" id="department_of_list"
                            value="{{ Auth::user()->department }}">
                    @endif
                    @if (isset($sort_by) && !empty($sort_by))
                        <select name="sort_by" id="sort_by">
                            @foreach ($sort_by as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    @endif

                    <select name="by_status" id="by_status">
                        <option value="">All Status</option>
                        <option value="{{ config('constants.PENDING') }}" @if (isset($default_status) && $default_status == config('constants.PENDING')) {{ 'selected' }} @endif>Pending</option>
                        <option value="{{ config('constants.REJECTED') }}" @if (isset($default_status) && $default_status == config('constants.REJECTED')) {{ 'selected' }} @endif>Rejected</option>
                        <option value="{{ config('constants.APPROVED') }}" @if (isset($default_status) && $default_status == config('constants.APPROVED')) {{ 'selected' }} @endif>Not actioned</option>
                        <option value="{{ config('constants.IN_PROGRESS') }}" @if (isset($default_status) && $default_status == config('constants.IN_PROGRESS')) {{ 'selected' }} @endif>In progress
                        </option>
                        <option value="{{ config('constants.COMPLETED') }}" @if (isset($default_status) && $default_status == config('constants.COMPLETED')) {{ 'selected' }} @endif>Completed</option>
                    </select>
                </div>
                <div class="dashboard-filter-box">
                    <input type="date" name="start_date_table" id="start_date_table" value="@if (isset($last_month_date)){{ $last_month_date }}@endif" />
                    -
                    <input type="date" name="end_date_table" id="end_date_table" max="@if (isset($today_date)){{ $today_date }}@endif" value="@if (isset($today_date)){{ $today_date }}@endif" />
                    
                </div>
                

                
            </div>
            <div class="dashboard-table" style="position: relative;min-height:300px">
                <div class="inner_loader_container" id="table_loader">
                    <div class="inner_loader_box">
                        <img src="{{ asset('images/common/loader.gif') }}" alt="">
                    </div>
                </div>
                <div class="table ">
                    <div class="t-row t-heading">
                        <div class="td">id</div>
                        <div class="td">Grievance</div>
                        <div class="td">Status</div>
                        <div class="td">View more</div>
                        @if (Auth::user()->role != config('constants.STUDENT_ROLE'))
                            <div class="td">Action</div>
                        @endif
                    </div>
                    <div class="t-body" id="grievance_table_body">

                    </div>
                </div>
            </div>
            <input type="hidden" id="page_no" value="1">
            <div id="myPagination" class="pagination-area">
            </div>
        </div>
    </div>
    <div class="pop-up-container" id="viewMorePopUp" style="display: none">
        <div class="pop-up-inner-container">
            <div class="pop-up-gray-area" onclick="dashboard.closeViewMore()"></div>
            <div class="pop-up-box">
                <div class="header">
                    <div class="header-box">
                        <div class="img-box">
                            <img id="sender_img"
                                src="https://cdn.dribbble.com/users/1041205/screenshots/3636353/dribbble.jpg" alt="">
                        </div>
                        <h3 id="sender_name">Unknown person</h3>
                    </div>
                    <div class="header-box" id="date_box" style="justify-content: flex-end">
                        <span class="date" id="pop-up-date">yyyy-mm-dd</span>
                    </div>
                </div>
                <div class="pop-up-body">
                    <div class="pop-up-row">
                        <span class="title">
                            Title :
                        </span>
                        <span class="value" style="flex-direction: column" id="pop-up-grievance-title">
                            no grievance
                        </span>
                    </div>
                    <div class="pop-up-row">
                        <span class="title">
                            Grievance :
                        </span>
                        <span class="value report-area" style="flex-direction: column" id="pop-up-grievance">
                            no grievance
                        </span>
                    </div>
                    <div class="pop-up-row" id="grivance-img">
                        <span class="title">
                            Image :
                        </span>
                        <span class="value">
                            <img src="https://cdn.riffre.com/filmbees/wallpapers/2015/01/27/11673/full/Avtar-11673.jpg"
                                alt="" id="pop-up-grievance-img">
                        </span>
                    </div>
                    <div class="pop-up-row">
                        <span class="title ">
                            Status :
                        </span>
                        <span class="value" id="pop-up-status">
                            <span class="status danger" id="pop-up-status">pending </span>
                        </span>
                    </div>
                    <div class="pop-up-row">
                        <span class="title ">
                            Allocated Department :
                        </span>
                        <span class="value" id="allocated_department">
                            <span class="status danger" id="pop-up-status">pending </span>
                        </span>
                    </div>
                    <div class="pop-up-row">
                        <span class="title">
                            Officer's message :
                        </span>
                        <span class="value report-area" style="flex-direction: column" id="pop-up-officer-msg">

                        </span>
                    </div>
                    <div class="pop-up-row">
                        <span class="title">
                            Return message :
                        </span>
                        <span class="value report-area" style="flex-direction: column" id="pop-up-return-msg">

                        </span>
                    </div>

                    <div class="pop-up-row">
                        <div class="btn-area" id="pop-up-btn">
                            <button class="primary-color">
                                change
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>





    <div class="pop-up-container" id="actionPopUp" style="display: none">
        <div class="pop-up-inner-container">
            <div class="pop-up-gray-area" onclick="dashboard.closeActionPopUp()"></div>
            <div class="pop-up-box">
                <div class="header">
                    <div class="header-box">
                        <h3 id="action_message_heading">Are you sure to approve!!</h3>
                    </div>
                </div>
                <div class="pop-up-body">
                    <div class="pop-up-row">
                        <input type="hidden" name="action_status" id="action_status">
                        <input type="hidden" name="action_complain_id" id="action_complain_id">
                        <span class="title" id="action_message">
                            Message :
                        </span>
                        <span class="value" style="position: relative;display:block" id="pop-up-grievance">
                            <textarea name="" id="editor" cols="30" rows="10"></textarea>
                        </span>
                    </div>
                    <div class="pop-up-row">
                        <div class="btn-area" id="action-pop-up-btn">
                            {{-- <button class="primary-color">
                                change
                            </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('scripts')
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/pagination.js') }}"></script>
    <script>
        $(document).ready(() => {
            var height = $(".analysis-grid-container").css('height');
            $(".analysis-grid-chart").css('height', height);
            dashboard.initialize();

        })



        // data = {
        // name:,
        // sender_img:,
        // date:,
        // grievance:,
        // grievance_img:,
        // status:,
        // officer_msg:,
        // return_msg:,
        // show_identity:,
        // role:,
        // }
        var dashboard = {
            default_img: "images/avtar1.jpg",
            base_path: "{{ asset('') }}",
            grivance_img_folder: "storage/images/grievanceimages/",
            editor: "",
            initialize: function() {
                dashboard.getRequestCount();
                $("#export_grivance").on('submit', function() {
                    dashboard.getExportData(this)
                    return true;
                });
                dashboard.getGrivanceList(1);
                $("#department_chart").on('change', function() {
                    dashboard.getRequestCount();
                })
                $("#start_date_chart").on('change', function() {
                    dashboard.getRequestCount();
                })
                $("#end_date_chart").on('change', function() {
                    dashboard.getRequestCount();
                })
                $("#search").on('input', function() {
                    dashboard.getGrivanceList(1);
                })
                $("#department_of_list").on('change', function() {
                    dashboard.getGrivanceList(1);
                })
                $("#sort_by").on('change', function() {
                    dashboard.getGrivanceList(1);
                })
                $("#by_status").on('change', function() {
                    dashboard.getGrivanceList(1);
                })
                $("#start_date_table").on('change', function() {
                    dashboard.getGrivanceList(1);
                })
                $("#end_date_table").on('change', function() {
                    dashboard.getGrivanceList(1);
                });

                dashboard.initializeEditor();


            },
            initializeEditor: function() {
                ClassicEditor
                    .create(document.querySelector('#editor'), {
                        toolbar: {
                            items: [
                                'heading',
                                '|',
                                'alignment', // <--- ADDED
                                'bold',
                                'italic',
                                'bulletedList',
                                'numberedList',
                                'blockQuote',
                                'undo',
                                'redo'
                            ]
                        }
                    })
                    .then((editor) => {
                        dashboard.editor = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            },
            destroyEditor: function() {
                dashboard.editor.destroy();
            },
            openActionPopUp(action, id) {
                $("body").css("overflow", "hidden");
                $("#actionPopUp").show();
                dashboard.destroyEditor();
                dashboard.initializeEditor();
                dashboard.editor.setData("");

                $("#action_complain_id").val(id);
                if (action == "approve") {
                    $("#action_status").val({{ config('constants.APPROVED') }});
                    $("#action_message_heading").html("Are You sure to Approve!!");
                    $("#action-pop-up-btn").html(
                        "<button onClick='dashboard.updateStatus()' class='success' >Approve</button>");
                } else if (action == "rejected") {
                    $("#action_status").val({{ config('constants.REJECTED') }});
                    $("#action_message_heading").html("Are You sure to Reject!!");
                    $("#action-pop-up-btn").html(
                        "<button onClick='dashboard.updateStatus()' class='danger'>Declane</button>");
                } else if (action == "in_progress") {
                    $("#action_status").val({{ config('constants.IN_PROGRESS') }});
                    $("#action_message_heading").html("Are You sure to set in progress!!");
                    $("#action-pop-up-btn").html(
                        "<button onClick='dashboard.updateStatus()' class='success'>Add to progress</button>");
                } else if (action == "complete") {
                    $("#action_status").val({{ config('constants.COMPLETED') }});
                    $("#action_message_heading").html("Are You sure to Complete!!");
                    $("#action-pop-up-btn").html(
                        "<button onClick='dashboard.updateStatus()' class='success'>Complete</button>");
                }

            },
            closeActionPopUp() {
                $("#actionPopUp").fadeOut();
                dashboard.editor.setData("");
                $("body").css('overflow', 'auto')
            },
            openViewMore: function(data) {
                // data = JSON.parse(data);
                // console.log(data);
                $("body").css("overflow", "hidden");
                if (data.show_identity == true) {
                    $("#sender_img").attr('src', dashboard.base_path + data.sender_img);
                    $("#sender_name").html(data.name);
                } else {
                    $("#sender_img").attr('src', dashboard.base_path + dashboard.default_img);
                    $("#sender_name").html("Unknown Person");
                }

                // $("#depart")
                if (data.grievance_img && data.grievance_img != "") {
                    $("#grivance-img").css('display', 'flex');
                    $("#pop-up-grievance-img").attr('src', dashboard.base_path + dashboard.grivance_img_folder +
                        data.grievance_img);
                } else {
                    $("#grivance-img").css('display', 'none');
                }

                (data.date && data.date != "") ? $("#pop-up-date").html(data.date.slice(0, 10)): $("#pop-up-date")
                    .html("");
                $("#pop-up-grievance-title").html(data.title)
                $("#pop-up-grievance").html(data.grievance);
                $("#pop-up-status").html(dashboard.setStatus(data.status));
                $("#allocated_department").html(data.department_name);
                // console.log(data)

                (data.officer_msg && data.officer_msg != "") ? $("#pop-up-officer-msg").html(data.officer_msg): $(
                    "#pop-up-officer-msg").html("No message for now");
                (data.return_msg && data.return_msg != "") ? $("#pop-up-return-msg").html(data.return_msg): $(
                    "#pop-up-return-msg").html("No message for now");
                $("#pop-up-btn").html(dashboard.setButtonByRoleAndStatus(data.role, data.status, data.id));
                $("#viewMorePopUp").css("display", "flex");
                $("#viewMorePopUp").css("opacity", "1");

            },
            setButtonByRoleAndStatus: function(role, status, id) {

                if (role == {{ config('constants.OFFICER_ROLE') }} && status ==
                    {{ config('constants.PENDING') }}) {
                    return '<button class="success" style="margin-right:5px" onclick="dashboard.openActionPopUp(`approve`,' +
                        id +
                        ')">approve</button><button class="danger" onclick="dashboard.openActionPopUp(`rejected`,' +
                        id + ')">declaine</button>';
                }
                if (role == {{ config('constants.HOD_ROLE') }} && status ==
                    {{ config('constants.APPROVED') }}) {
                    return '<button class="success" style="margin-right:5px" onclick="dashboard.openActionPopUp(`in_progress`,' +
                        id + ')">add to progress</button>';
                }
                if (role == {{ config('constants.HOD_ROLE') }} && status ==
                    {{ config('constants.IN_PROGRESS') }}) {
                    return '<button class="success" style="margin-right:5px" onclick="dashboard.openActionPopUp(`complete`,' +
                        id + ')">complete</button>';
                }
                if ((role == {{ config('constants.PRINCIPAL_ROLE') }} || role ==
                        {{ config('constants.PRINCIPAL_ROLE') }}) && status ==
                    {{ config('constants.PENDING') }}) {
                    return '<button class="success"  style="margin-right:5px" onclick="dashboard.openActionPopUp(`approve`,' +
                        id +
                        ')">approve</button><button class="danger" onclick="dashboard.openActionPopUp(`rejected`,' +
                        id + ')">declaine</button>';
                }
                if ((role == {{ config('constants.PRINCIPAL_ROLE') }} || role ==
                        {{ config('constants.PRINCIPAL_ROLE') }}) && status ==
                    {{ config('constants.APPROVED') }}) {
                    return '<button class="success" style="margin-right:5px" onclick="dashboard.openActionPopUp(`in_progress`,' +
                        id + ')">add to progress</button>';
                }
                if ((role == {{ config('constants.PRINCIPAL_ROLE') }} || role ==
                        {{ config('constants.PRINCIPAL_ROLE') }}) && status ==
                    {{ config('constants.IN_PROGRESS') }}) {
                    return '<button class="success" style="margin-right:5px" onclick="dashboard.openActionPopUp(`complete`,' +
                        id + ')">complete</button>';
                }

                return "";
            },
            setStatus: function(status) {
                switch (parseInt(status)) {
                    case {{ config('constants.PENDING') }}:
                        return '<span class="status orange" >pending </span>';
                        break;
                    case {{ config('constants.REJECTED') }}:
                        return '<span class="status danger" >Rejected </span>';
                        break;
                    case {{ config('constants.APPROVED') }}:
                        return '<span class="status success" >approved </span>';
                        break;
                    case {{ config('constants.SEEN') }}:
                        return '<span class="status gray" >not actioned</span>';
                        break;
                    case {{ config('constants.IN_PROGRESS') }}:
                        return '<span class="status success" >In progress </span>';
                        break;
                    case {{ config('constants.COMPLETED') }}:
                        return '<span class="status navy" >Completed</span>';
                        break;
                }

            },
            closeViewMore: function() {
                $("body").css("overflow", "auto");
                $("#viewMorePopUp").fadeOut(300);
                setTimeout(() => {
                    $("#sender_img").attr('src', dashboard.base_path + dashboard.default_img);
                    $("#sender_name").html("Unknown Person");
                    $("#pop-up-date").html("");
                    $("#pop-up-grievance").html("no grivance");
                    $("#pop-up-grievance-img").attr('src', "");
                    $("#pop-up-status").html("");
                    $("#pop-up-officer-msg").html("No message");
                    $("#pop-up-return-msg").html("No message");
                    $("#pop-up-btn").html("");
                }, 300)

            },
            makeRow: function(rowData, id, noMessage = false) {
                var row = "";
                var data = {
                    id: rowData.id,
                    department_name: rowData.department_name,
                    title: rowData.title,
                    name: rowData.name,
                    sender_img: rowData.profile_pic,
                    date: rowData.created_at,
                    grievance: rowData.message,
                    grievance_img: rowData.image,
                    status: rowData.status,
                    officer_msg: rowData.officer_message,
                    return_msg: rowData.return_message,
                    show_identity: rowData.show_identity,
                    role: {{ Auth::user()->role }},
                }
                if (noMessage == false) {
                    row += '<div class="t-row">';
                    row += '<div class="td">' + id + '</div>';
                    row += '<div class="td">' + rowData.title + '</div>';
                    row += '<div class="td">' + dashboard.setStatus(rowData.status) + '</div>';
                    // row +=      `<div class='td'><button class='view-more navy' onclick="dashboard.openViewMore()">view more</button></div>`;
                    row += '<div class="td"><button class="view-more navy" onclick="dashboard.openViewMore(' + JSON
                        .stringify(data).replace(/'/g, '&apos;').replace(/"/g, '&quot;') + ')">' + 'view more' +
                        '</button></div>'
                    if (data.role != {{ config('constants.STUDENT_ROLE') }}) {
                        row += '<div class="td">' + dashboard.setButtonByRoleAndStatus({{ Auth::user()->role }},
                            rowData.status, rowData.id) + '</div>';
                    }

                    row += '</div>';

                } else {
                    row += '<div class="t-row">';
                    row += '<div class="td">No data found</div>';
                    row += '</div>';
                }
                return row;
            },
            setCount: function(data) {

                var status_count = {
                    all: 0,
                    pending: 0,
                    rejected: 0,
                    not_actioned: 0,
                    in_progress: 0,
                    completed: 0
                }
                var count = 0;
                for (let temp of data) {

                    switch (parseInt(temp.status)) {
                        case {{ config('constants.PENDING') }}:
                            status_count['pending'] = temp.total;
                            break;
                        case {{ config('constants.REJECTED') }}:
                            status_count['rejected'] = temp.total;
                            break;
                        case {{ config('constants.APPROVED') }}:
                            status_count['not_actioned'] = temp.total;
                            break;
                        case {{ config('constants.IN_PROGRESS') }}:
                            status_count['in_progress'] = temp.total;
                            break;
                        case {{ config('constants.COMPLETED') }}:
                            status_count['completed'] = temp.total;
                            break;
                    }

                    count += temp.total;
                }
                status_count['all'] = count;
                return status_count;
            },
            renderChartsInDOM: function(counts) {
                // console.log(counts);
                $("#chart_category_all").html(counts.all);
                $("#chart_category_pending").html(counts.pending);
                $("#chart_category_rejected").html(counts.rejected);
                $("#chart_category_not_actioned").html(counts.not_actioned);
                $("#chart_category_in_progress").html(counts.in_progress);
                $("#chart_category_completed").html(counts.completed);
                $("#dashboard_pie_chart").html("");
                if (counts.all != 0) {
                    var HTML_DOM = "<li><span class='for_pending'>" + counts.pending + "</span></li>";
                    HTML_DOM += "<li><span class='for_rejected'>" + counts.rejected + "</span></li>";
                    HTML_DOM += "<li><span class='for_not_actioned'>" + counts.not_actioned + "</span></li>";
                    HTML_DOM += "<li><span class='for_in_progress'>" + counts.in_progress + "</span></li>";
                    HTML_DOM += "<li><span class='for_completed'>" + counts.completed + "</span></li>";
                    $("#dashboard_pie_chart").html(HTML_DOM);
                } else {
                    var HTML_DOM = "<li><span class='for_pending'>" + 1 + "</span></li>";
                    HTML_DOM += "<li><span class='for_rejected'>" + 1 + "</span></li>";
                    HTML_DOM += "<li><span class='for_not_actioned'>" + 1 + "</span></li>";
                    HTML_DOM += "<li><span class='for_in_progress'>" + 1 + "</span></li>";
                    HTML_DOM += "<li><span class='for_completed'>" + 1 + "</span></li>";
                    $("#dashboard_pie_chart").html(HTML_DOM);
                }
                createPieCharts();

            },
            getRequestCount: function() {
                var data = {
                    'department': $("#department_chart").val(),
                    'from_date': $("#start_date_chart").val(),
                    'end_date': $("#end_date_chart").val(),
                    "_token": "{{ csrf_token() }}",
                }
                $("#chart_loader").css('display', 'flex');
                $.ajax({
                    url: "{{ route('getCount') }}",
                    method: "POST",
                    data: data,
                    success: function(data) {

                        var StatusDeatails = JSON.parse(data);
                        if (StatusDeatails.status == true) {
                            var counts = dashboard.setCount(StatusDeatails.data);
                            dashboard.renderChartsInDOM(counts);
                        } else {
                            dashboard.renderChartsInDOM({
                                all: 0,
                                pending: 0,
                                rejected: 0,
                                not_actioned: 0,
                                in_progress: 0,
                                completed: 0
                            });
                        }
                        $("#chart_loader").hide();

                    }

                })
            },
            getGrivanceList: function(page_no) {
                $("#table_loader").css('display', 'flex');

                var data = {
                    'department': $("#department_of_list").val(),
                    'from_date': $("#start_date_table").val(),
                    'end_date': $("#end_date_table").val(),
                    "sort_by": $("#sort_by").val(),
                    "page_no": page_no,
                    "status": $("#by_status").val(),
                    "search": $("#search").val(),
                    "_token": "{{ csrf_token() }}",
                }
                $.ajax({
                    url: "{{ route('getData') }}",
                    method: "POST",
                    data: data,
                    success: function(data) {
                        var GrivanceData = JSON.parse(data);
                        if (GrivanceData.status == true) {
                            if (GrivanceData.count == 0) {
                                $("#grievance_table_body").html(
                                    '<div class="t-row"><div class="not-found-message">No Grievance found</div></div>'
                                )
                            } else {
                                var count = 1;
                                var tbody = "";
                                for (let temp of GrivanceData.data) {
                                    tbody += dashboard.makeRow(temp, ((page_no - 1) * 10) + count);
                                    count++;
                                }
                                $("#grievance_table_body").html(
                                    tbody
                                )

                            }
                            pagination.initialize(GrivanceData.count, (id) => {
                                dashboard.getGrivanceList(id)
                            }, "myPagination");

                        } else {
                            $("#grievance_table_body").html(
                                '<div class="t-row"><div class="not-found-message">No Grievance found</div></div>'
                            )
                        }
                        $("#table_loader").hide();
                    }


                })
            },
            getExportData: function(form) {
                $("#table_loader").css('display', 'flex');
                var formData = new FormData(form);
                $("#export_grivance").html("");
                $("<input />").attr("type", "hidden").attr("name", "department").attr("value", $("#department_of_list").val()).appendTo("#export_grivance");
                $("<input />").attr("type", "hidden").attr("name", "from_date").attr("value", $("#start_date_table").val()).appendTo("#export_grivance");
                $("<input />").attr("type", "hidden").attr("name", "end_date").attr("value", $("#end_date_table").val()).appendTo("#export_grivance");
                $("<input />").attr("type", "hidden").attr("name", "sort_by").attr("value", $("#sort_by").val()).appendTo("#export_grivance");
                $("<input />").attr("type", "hidden").attr("name", "all_data").attr("value", true).appendTo("#export_grivance");
                $("<input />").attr("type", "hidden").attr("name", "from_export").attr("value", true).appendTo("#export_grivance");
                $("<input />").attr("type", "hidden").attr("name", "status").attr("value", $("#by_status").val()).appendTo("#export_grivance");
                $("<input />").attr("type", "hidden").attr("name", "search").attr("value", $("#search").val()).appendTo("#export_grivance");
                $("<input />").attr("type", "hidden").attr("name", "_token").attr("value", "{{ csrf_token() }}").appendTo("#export_grivance");
                $("<input />").attr("type", "submit").attr("class", "btn navy").attr("value", "Export").appendTo("#export_grivance");                
                $("#table_loader").css('display', 'none');
                                                
            },
            updateStatus() {
                var data = {
                    status: $("#action_status").val(),
                    complain_id: $("#action_complain_id").val(),
                    message: dashboard.editor.getData(),
                    "_token": "{{ csrf_token() }}",
                }
                $.ajax({
                    url: "{{ route('updateStatus') }}",
                    method: "POST",
                    data: data,
                    success: function(data) {
                        var UpdateStatus = JSON.parse(data);
                        if (UpdateStatus.status == true) {
                            dashboard.getGrivanceList(1);
                            dashboard.getRequestCount();
                            // alert(UpdateStatus.message);
                            showAlert(UpdateStatus.message, "success");
                            dashboard.closeViewMore();
                            dashboard.closeActionPopUp();

                        } else {
                            showAlert(UpdateStatus.message, "fail");
                            //    alert(UpdateStatus.message)
                        }
                    }

                })

            }
        }
    </script>
@endsection
