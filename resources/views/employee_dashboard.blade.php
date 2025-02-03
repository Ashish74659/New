@extends('layouts.master')

@section('title')
    Employee Dashboard
@endsection
@section('page-title')
    <!-- dashboard-->
@endsection

@section('body')

    <body data-sidebar="colored">
    @endsection
    @section('content')
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="dash-widget">
                    <div class="d-flex">
                        <div class="dash-widgetimg">
                            <span><img src="{{ URL::asset('build/images/pos-img/dash1.svg') }}"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5 class="mb-0">$307144</h5>
                            <p class="text-muted mb-0">Total Income</p>
                        </div>
                    </div>


                    <div class="flex-shrink-0 align-self-start text-end">
                        <div class="dropdown">
                            <a class="dropdown-toggle btn-icon border rounded-circle" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-more-2-fill text-muted font-size-16"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Yearly</a>
                                <a class="dropdown-item" href="#">Monthly</a>
                                <a class="dropdown-item" href="#">Weekly</a>
                                <a class="dropdown-item" href="#">Today</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="dash-widget dash1">
                    <div class="d-flex">
                        <div class="dash-widgetimg">
                            <span><img src="{{ URL::asset('build/images/pos-img/dash2.svg') }}"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5 class="mb-0">$4385</h5>
                            <p class="text-muted mb-0">Total Orders</p>
                        </div>
                    </div>

                    <div class="flex-shrink-0 align-self-start text-end">
                        <div class="dropdown">
                            <a class="dropdown-toggle btn-icon border rounded-circle" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-more-2-fill text-muted font-size-16"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Yearly</a>
                                <a class="dropdown-item" href="#">Monthly</a>
                                <a class="dropdown-item" href="#">Weekly</a>
                                <a class="dropdown-item" href="#">Today</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-md-6">
                <div class="dash-widget dash2">
                    <div class="d-flex">
                        <div class="dash-widgetimg">
                            <span><img src="{{ URL::asset('build/images/pos-img/dash3.svg') }}"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5 class="mb-0">215</h5>
                            <p class="text-muted mb-0">New Customer</p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 align-self-start text-end">
                        <div class="dropdown">
                            <a class="dropdown-toggle btn-icon border rounded-circle" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-more-2-fill text-muted font-size-16"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Yearly</a>
                                <a class="dropdown-item" href="#">Monthly</a>
                                <a class="dropdown-item" href="#">Weekly</a>
                                <a class="dropdown-item" href="#">Today</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="dash-widget dash3">
                    <div class="d-flex">
                        <div class="dash-widgetimg">
                            <span><img src="{{ URL::asset('build/images/pos-img/dash4.svg') }}"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5 class="mb-0">$4385</h5>
                            <p class="text-muted mb-0">Total Expense </p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 align-self-start text-end">
                        <div class="dropdown">
                            <a class="dropdown-toggle btn-icon border rounded-circle" href="#"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-more-2-fill text-muted font-size-16"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Yearly</a>
                                <a class="dropdown-item" href="#">Monthly</a>
                                <a class="dropdown-item" href="#">Weekly</a>
                                <a class="dropdown-item" href="#">Today</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-xl-7 col-sm-12 col-12 d-flex">
                <div class="card flex-fill card-bod">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Daily Sales</h5>
                        <div class="graph-sets">
                            <ul class="mb-0">
                                <li>
                                    <span>Sales</span>
                                </li>
                                <li>
                                    <span>Purchase</span>
                                </li>
                            </ul>

                            <div class="btn-group" role="group">
                                <button id="btnGroupVerticalDrop1" type="button" class="btn btn-sm btn-light rounded-1"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Year <i class="mdi mdi-chevron-down"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" style="">
                                    <a class="dropdown-item" href="#">Year</a>
                                    <a class="dropdown-item" href="#">Month</a>
                                    <a class="dropdown-item" href="#">Week</a>
                                    <a class="dropdown-item" href="#">Today</a>
                                    <a class="dropdown-item" href="#">Yesterday</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="sales_charts"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-sm-12 col-12 d-flex">
                <div class="card flex-fill default-cover mb-4 card-bod">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Best Employee</h4>
                        <div class="view-all-link">
                            <a href="javascript:void(0);" class="view-all d-flex align-items-center">
                                View All<span class="ps-2 d-flex align-items-center"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-arrow-right feather-16">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg></span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <tbody>
                                    <tr>
                                        <td style="width: 50px;"><img
                                                src="{{ URL::asset('build/images/users/avatar-2.jpg') }}"
                                                class="rounded-circle avatar-sm" alt=""></td>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                    class="text-dark">Daniel Canales</a></h5>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="javascript: void(0);"
                                                    class="badge bg-primary font-size-11">Frontend</a>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="mdi mdi-circle-medium font-size-18 text-success align-middle"></i>
                                            Online
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ URL::asset('build/images/users/avatar-1.jpg') }}"
                                                class="rounded-circle avatar-sm" alt=""></td>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                    class="text-dark">Jennifer Walker</a></h5>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="javascript: void(0);" class="badge bg-primary font-size-11">UI /
                                                    UX</a>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="mdi mdi-circle-medium font-size-18 text-warning align-middle"></i>
                                            Busy
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="avatar-sm">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary text-white font-size-14">
                                                    C
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                    class="text-dark">Carl Mackay</a></h5>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="javascript: void(0);"
                                                    class="badge bg-primary font-size-11">Backend</a>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="mdi mdi-circle-medium font-size-18 text-success align-middle"></i>
                                            Online
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}"
                                                class="rounded-circle avatar-sm" alt=""></td>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                    class="text-dark">Janice Cole</a></h5>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="javascript: void(0);"
                                                    class="badge bg-primary font-size-11">Frontend</a>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="mdi mdi-circle-medium font-size-18 text-success align-middle"></i>
                                            Online
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="avatar-sm">
                                                <span
                                                    class="avatar-title rounded-circle bg-primary text-white font-size-14">
                                                    T
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                    class="text-dark">Tony Brafford</a></h5>
                                        </td>
                                        <td>
                                            <div>
                                                <a href="javascript: void(0);"
                                                    class="badge bg-primary font-size-11">Backend</a>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="mdi mdi-circle-medium font-size-18 text-secondary align-middle"></i>
                                            Offline
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card card-bod">
                    <div class="card-header border-0 align-items-center">
                        <h4 class="card-title mb-0 flex-grow-1">Recent Transaction</h4>

                    </div>
                    <div class="card-body pt-2">
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Invoice No.</th>
                                        <th>Invoice Date</th>
                                        <th>Order Type</th>
                                        <th>Payment Mode</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">#MB2540</a> </td>
                                        <td> 09 Dec 2024</td>
                                        <td><span class="badge badge-outline-warning">Order Type</span></td>
                                        <td>
                                            <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                        </td>
                                        <td> $400</td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">#MB2540</a> </td>
                                        <td> 09 Dec 2024</td>
                                        <td><span class="badge badge-outline-warning">Order Type</span></td>
                                        <td>
                                            <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                        </td>
                                        <td> $400</td>
                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">#MB2540</a> </td>
                                        <td> 09 Dec 2024</td>
                                        <td><span class="badge badge-outline-warning">Order Type</span></td>
                                        <td>
                                            <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                        </td>
                                        <td> $400</td>


                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">#MB2540</a> </td>
                                        <td> 09 Dec 2024</td>
                                        <td><span class="badge badge-outline-warning">Order Type</span></td>
                                        <td>
                                            <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                        </td>
                                        <td> $400</td>

                                    </tr>
                                    <tr>
                                        <td><a href="javascript: void(0);" class="text-body">#MB2540</a> </td>
                                        <td> 09 Dec 2024</td>
                                        <td><span class="badge badge-outline-warning">Order Type</span></td>
                                        <td>
                                            <i class="fab fa-cc-mastercard me-1"></i> Mastercard
                                        </td>
                                        <td> $400</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- end table-responsive -->
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script>
            if ($('#sales_charts').length > 0) {
                var options = {
                    series: [{
                        name: 'Sales',
                        data: [130, 210, 300, 290, 150, 50, 210, 280, 105],
                    }, {
                        name: 'Purchase',
                        data: [-150, -90, -50, -180, -50, -70, -100, -90, -105]
                    }],
                    colors: ['#28C76F', '#EA5455'],
                    chart: {
                        type: 'bar',
                        height: 320,
                        stacked: true,

                        zoom: {
                            enabled: true
                        }
                    },
                    responsive: [{
                        breakpoint: 280,
                        options: {
                            legend: {
                                position: 'bottom',
                                offsetY: 0
                            }
                        }
                    }],
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            borderRadius: 4,
                            borderRadiusApplication: "end", // "around" / "end"
                            borderRadiusWhenStacked: "all", // "all"/"last"
                            columnWidth: '20%',
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    // stroke: {
                    // width: 5,
                    // colors: ['#fff']
                    // },
                    yaxis: {
                        min: -200,
                        max: 300,
                        tickAmount: 5,
                    },
                    xaxis: {
                        categories: [' Jan ', 'Feb', 'Mar', 'Apr',
                            'May', 'Jun', 'Jul', 'Aug', 'Sep'
                        ],
                    },
                    legend: {
                        show: false
                    },
                    fill: {
                        opacity: 1
                    }
                };

                var chart = new ApexCharts(document.querySelector("#sales_charts"), options);
                chart.render();
            }
        </script>
    @endsection
