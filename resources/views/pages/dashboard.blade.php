    @include('components.layouts.header')
    @include('components.layouts.sidebar')

    <!--**********************************
            Content body start
        ***********************************-->

    <head>
        <style>
            /* Card Styles */
            .card {
                position: relative;
                overflow: hidden;
                border-radius: 8px;
                transition: all 0.3s ease-in-out;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            /* Card Link Styling */
            .card-link {
                text-decoration: none;
                color: inherit;
            }

            /* Hover Effect */
            .card:hover {
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                transform: translateY(-5px);
                background-color: #99f6f4
            }

            /* Stat Content */
            .stat-widget-two.card-body {
                padding: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
                /* background-color: #d4f1f5; */
                border-radius: 8px;
            }

            /* Stat Text */
            .stat-text {
                font-size: 1.25rem;
                font-weight: 600;
                color: #333;
                margin-bottom: 15px;
                transition: color 0.3s ease;
            }

            .card:hover .stat-text {
                color: #007bff;
            }

            /* Stat Digit */
            .stat-digit {
                font-size: 2rem;
                font-weight: 700;
                color: #333;
                margin-bottom: 10px;
                transition: color 0.3s ease;
            }

            .card:hover .stat-digit {
                color: #007bff;
            }

            /* Box Shadow */
            .card:hover .stat-widget-two.card-body {
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            }

            /* Progress Bar Styles */
            .progress {
                height: 8px;
                border-radius: 10px;
                background-color: #f0f0f0;
                margin-top: 15px;
            }

            /* Progress Bar Inner */
            .progress-bar {
                height: 100%;
                background-color: #28a745;
                transition: width 0.3s ease;
            }

            /* Title under Stat */
            h4 {
                font-size: 1rem;
                color: #777;
                margin-top: 10px;
            }

            /* Hover effect for the entire card */
            .card:hover .stat-widget-two.card-body a {
                color: #007bff;
                text-decoration: underline;
            }
        </style>
    </head>
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('pages.dutyreport.index') }}" class="card-link">
                        <div class="card" style="background-color: rgb(255, 255, 136)">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">တာဝန်မှူးအစီရင်ခံစာ</div>
                                    <div class="stat-digit">
                                        <a href="{{ route('pages.dutyreport.index') }}">{{ $dutyReports }}</a>
                                    </div>
                                    <div>
                                        <h4>Report</h4>
                                    </div>
                                </div>
                                {{-- <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar"
                                        style="width: {{ $progress }}%;" 
                                        aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100">
                                        {{ round($progress) }}%
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('caseFile.index') }}">
                        <div class="card" style="background-color: rgb(171, 252, 171)">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">အမှုတွဲ တွဲသည့်ဖိုင်များ</div>
                                    <div class="stat-digit"><a
                                            href="{{ route('caseFile.index') }}">{{ $caseFiles }}</a>
                                    </div>
                                    <div>
                                        <h4>Files</h4>
                                    </div>
                                </div>
                                {{-- <div class="progress">
                                    <div class="progress-bar progress-bar-primary w-75" role="progressbar"
                                        aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> --}}
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('caseList.index') }}">
                        <div class="card" style="background-color: rgb(248, 200, 165)">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">အမှုတွဲများ</div>
                                    <div class="stat-digit"><a
                                            href="{{ route('caseList.index') }}">{{ $caseLists }}</a>
                                    </div>
                                    <div>
                                        <h4>Cases</h4>
                                    </div>
                                </div>
                                {{-- <div class="progress">
                                <div class="progress-bar progress-bar-warning w-50" role="progressbar"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div> --}}
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('department.index') }}">
                        <div class="card" style="background-color: rgb(164, 214, 246)">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">ဌာနများ</div>
                                    <div class="stat-digit"><a
                                            href="{{ route('department.index') }}">{{ $departments }}</a></div>
                                    <div>
                                        <h4>Departments</h4>
                                    </div>
                                </div>
                                {{-- <div class="progress">
                                    <div class="progress-bar progress-bar-danger w-65" role="progressbar"
                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> --}}
                            </div>
                        </div>
                    </a>
                    <!-- /# card -->
                </div>

                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('department.index') }}">
                        <div class="card" style="background-color: rgb(164, 214, 246)">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">ကိုယ်ရေးအချက်အလက်များ</div>
                                    <div class="stat-digit"><a
                                            href="{{ route('personnel.index') }}">{{ $personnelData }}</a></div>
                                    <div>
                                        <h4>PersonnelData</h4>
                                    </div>
                                </div>
                                {{-- <div class="progress">
                                    <div class="progress-bar progress-bar-danger w-65" role="progressbar"
                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> --}}
                            </div>
                        </div>
                    </a>
                    <!-- /# card -->
                </div>
                <!-- /# column -->
            </div>

        </div>
    </div>
    <!--**********************************
            Content body end
        ***********************************-->

    @include('components.layouts.footer')
