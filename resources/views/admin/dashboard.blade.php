@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat ic-bg-dashboard-card text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <i class="fa fa-users bx-fade-right fa-2x pt-3"></i>

                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">{{ __('Students') }}</h5>
                        <h4 class="fw-medium font-size-24">
                          {{-- {{ $student_count }}  --}}
                        </h4>

                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            {{-- <a href="{{ route('students.index') }}" class="text-white-50"><i
                                    class="mdi mdi-arrow-right h5"></i></a> --}}
                            <a href="#" class="text-white-50"><i
                                    class="mdi mdi-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">{{ __('Total Student In Application') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-blue-grey text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <i class="fa fa-list bx-fade-right fa-2x pt-3"></i>

                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">{{ __('Instructors') }}</h5>
                        <h3 class="fw-medium font-size-24">
                          {{-- {{ $instructor_count }} --}}
                        </h3>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            {{-- <a href="{{ route('instructors.index') }}" class="text-white-50"><i
                                    class="mdi mdi-arrow-right h5"></i></a> --}}
                            <a href="#" class="text-white-50"><i
                                    class="mdi mdi-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">{{ __('Total Instructor In Application') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-primary text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <span class="fa-2x fw-bold">&#2547;</span>
                        </div>
                        <h6 class="font-size-16 text-uppercase text-white-50">{{ __('Other course') }}</h6>
                        <h4 class="fw-medium font-size-24">
                            {{-- {{ $purchase_history->total_other_course_purchase }} --}}
                        </h4>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">{{ __('Total other purchase') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat bg-info text-white">
                <div class="card-body">
                    <div class="mb-4">
                        <div class="float-start mini-stat-img me-4">
                            <span class="fa-2x fw-bold">&#2547;</span>
                        </div>
                        <h5 class="font-size-16 text-uppercase text-white-50">{{ __('Ged course') }}</h5>
                        <h4 class="fw-medium font-size-24">
                          {{-- {{ $purchase_history->total_ged_course_purchase }}  --}}
                        </h4>
                    </div>
                    <div class="pt-2">
                        <div class="float-end">
                            <a href="#" class="text-white-50"><i class="mdi mdi-arrow-right h5"></i></a>
                        </div>

                        <p class="text-white-50 mb-0 mt-1">{{ __('Total ged course purchase price') }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">{{ __('Student Analysis') }}</h4>

                    <div class="row justify-content-center">
                        <div class="col-sm-4">
                            <div class="text-center">
                                <h5 class="mb-0 font-size-20">
                                  {{-- {{ $student_this_month }} --}}
                                </h5>

                                <p class="text-muted">{{ __('This Month') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center">
                                <h5 class="mb-0 font-size-20"> 
                                  {{-- {{ $student_last_six_month }} --}}
                                </h5>
                                <p class="text-muted">{{ __('Last 6 Month') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center">
                                <h5 class="mb-0 font-size-20">
                                  {{-- {{ $student_this_year }} --}}
                                </h5>
                                <p class="text-muted">{{ __('This Year') }}</p>
                            </div>
                        </div>
                    </div>

                    <canvas id="lineChart" height="300"></canvas>

                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-4">{{ __('Purchase history') }}</h4>

                    <div class="row justify-content-center">
                        <div class="col-sm-4">
                            <div class="text-center">
                                <h5 class="mb-0 font-size-20">৳ 
                                  {{-- {{ $purchase_history->curent_month }} --}}
                                </h5>
                                <p class="text-muted">{{ __('This Month') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center">
                                <h5 class="mb-0 font-size-20"> ৳ 
                                  {{-- {{ $purchase_history->last_six_month }} --}}
                                </h5>
                                <p class="text-muted">{{ __('Last 6 Month') }}</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center">
                                <h5 class="mb-0 font-size-20">৳ 
                                  {{-- {{ $purchase_history->current_year }} --}}
                                </h5>
                                <p class="text-muted">{{ __('This Year') }}</p>
                            </div>
                        </div>
                    </div>

                    <canvas id="bar" height="300"></canvas>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@push('style')
    <link href="{{ asset('libs/morris.js/morris.css') }}?v={{\Carbon\Carbon::now()->timestamp}}" rel="stylesheet">
    <!--Morris Chart-->
@endpush
@push('script')
    <script src="{{ asset('libs/morris.js/morris.min.js') }}?v={{\Carbon\Carbon::now()->timestamp}}"></script>
    <script src="{{ asset('libs/raphael/raphael.min.js') }}?v={{\Carbon\Carbon::now()->timestamp}}"></script>

    <!-- Init js -->
    <script src="{{ asset('assets/js/pages/morris.init.js') }}?v={{\Carbon\Carbon::now()->timestamp}}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('libs/chart.js/Chart.bundle.min.js') }}?v={{\Carbon\Carbon::now()->timestamp}}"></script>
    
    <script>
        $(document).ready(function() {
            ! function(d) {
                "use strict";

                function r() {}

                r.prototype.respChart = function(r, o, e, a) {
                    Chart.defaults.global.defaultFontColor = "#adb5bd", Chart.defaults.scale.gridLines.color =
                        "rgba(108, 120, 151, 0.1)";
                    var t = r.get(0).getContext("2d"),
                        n = d(r).parent();

                    function i() {
                        r.attr("width", d(n).width());
                        switch (o) {
                            case "Line":
                                new Chart(t, {
                                    type: "line",
                                    data: e,
                                    options: a
                                });
                                break;
                            case "Bar":
                                new Chart(t, {
                                    type: "bar",
                                    data: e,
                                    options: a
                                });
                                break;
                        }
                    }

                    d(window).resize(i), i()
                }, r.prototype.init = function() {
                    this.respChart(d("#lineChart"), "Line", {
                            labels: ["January", "February", "March", "April", "May", "June", "July",
                                "August", "September", "October", "November", "December"
                            ],
                            datasets: [{
                                label: "User Created",
                                type: "line",
                                fill: !0,
                                lineTension: .5,
                                backgroundColor: "rgba(60, 76, 207, 0.2)",
                                borderColor: "#3c4ccf",
                                borderCapStyle: "butt",
                                borderDash: [],
                                borderDashOffset: 0,
                                borderJoinStyle: "miter",
                                pointBorderColor: "#3c4ccf",
                                pointBackgroundColor: "#fff",
                                pointBorderWidth: 1,
                                pointHoverRadius: 5,
                                pointHoverBackgroundColor: "#3c4ccf",
                                pointHoverBorderColor: "#fff",
                                pointHoverBorderWidth: 2,
                                pointRadius: 2,
                                pointStyle: 'circle',
                                pointHitRadius: 10,
                                data: [65, 59, 80, 81, 56, 55, 40, 34, 45, 66, 70, 80]
                            }, ]
                        },
                        // {scales: {yAxes: [{ticks: {max: 100, min: 20, stepSize: 10}}]}}
                    );
                    this.respChart(d("#bar"), "Bar", {
                        labels: ["January", "February", "March", "April", "May", "June", "July",
                            "August", "September", "October", "November", "December"
                        ],
                        datasets: [{
                                label: "Other course",
                                backgroundColor: "#6B8CD8", //
                                borderColor: "#6B8CD8",
                                borderWidth: 4,
                                hoverBackgroundColor: "#0AE107",
                                hoverBorderColor: "#0A8A08",
                                data: [45, 56, 70, 80, 60, 50, 45, 65, 70, 75, 80, 90]
                            },
                            {
                                label: "Ged course",
                                backgroundColor: "#93F89C", //
                                borderColor: "#93F89C",
                                borderWidth: 4,
                                hoverBackgroundColor: "#077AE1",
                                hoverBorderColor: "#04447E",
                                data: [30, 40, 55, 65, 70, 60, 50, 45, 60, 70, 75, 85]
                            }
                        ]
                    });
                }, d.ChartJs = new r, d.ChartJs.Constructor = r
            }(window.jQuery),
            function() {
                "use strict";
                window.jQuery.ChartJs.init()
            }();
        })
    </script>
@endpush

