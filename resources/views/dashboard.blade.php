@extends('layouts.dashboard')

@section('content')
{{--    <div class="fade-in">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-6 col-lg-3">--}}
{{--                <div class="card text-white bg-gradient-primary">--}}
{{--                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">--}}
{{--                        <div>--}}
{{--                            <div class="text-value-lg">9.823</div>--}}
{{--                            <div>Members online</div>--}}
{{--                        </div>--}}
{{--                        <div class="btn-group">--}}
{{--                            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <svg class="c-icon">--}}
{{--                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="3.4.0.html#">Action</a><a class="dropdown-item" href="3.4.0.html#">Another action</a><a class="dropdown-item" href="3.4.0.html#">Something else here</a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">--}}
{{--                        <canvas class="chart" id="card-chart1" height="70"></canvas>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-sm-6 col-lg-3">--}}
{{--                <div class="card text-white bg-gradient-info">--}}
{{--                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">--}}
{{--                        <div>--}}
{{--                            <div class="text-value-lg">9.823</div>--}}
{{--                            <div>Members online</div>--}}
{{--                        </div>--}}
{{--                        <div class="btn-group">--}}
{{--                            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <svg class="c-icon">--}}
{{--                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="3.4.0.html#">Action</a><a class="dropdown-item" href="3.4.0.html#">Another action</a><a class="dropdown-item" href="3.4.0.html#">Something else here</a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">--}}
{{--                        <canvas class="chart" id="card-chart2" height="70"></canvas>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-sm-6 col-lg-3">--}}
{{--                <div class="card text-white bg-gradient-warning">--}}
{{--                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">--}}
{{--                        <div>--}}
{{--                            <div class="text-value-lg">9.823</div>--}}
{{--                            <div>Members online</div>--}}
{{--                        </div>--}}
{{--                        <div class="btn-group">--}}
{{--                            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <svg class="c-icon">--}}
{{--                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="3.4.0.html#">Action</a><a class="dropdown-item" href="3.4.0.html#">Another action</a><a class="dropdown-item" href="3.4.0.html#">Something else here</a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="c-chart-wrapper mt-3" style="height:70px;">--}}
{{--                        <canvas class="chart" id="card-chart3" height="70"></canvas>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-sm-6 col-lg-3">--}}
{{--                <div class="card text-white bg-gradient-danger">--}}
{{--                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">--}}
{{--                        <div>--}}
{{--                            <div class="text-value-lg">9.823</div>--}}
{{--                            <div>Members online</div>--}}
{{--                        </div>--}}
{{--                        <div class="btn-group">--}}
{{--                            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                <svg class="c-icon">--}}
{{--                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-settings"></use>--}}
{{--                                </svg>--}}
{{--                            </button>--}}
{{--                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="3.4.0.html#">Action</a><a class="dropdown-item" href="3.4.0.html#">Another action</a><a class="dropdown-item" href="3.4.0.html#">Something else here</a></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">--}}
{{--                        <canvas class="chart" id="card-chart4" height="70"></canvas>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--        <div class="card">--}}
{{--            <div class="card-body">--}}
{{--                <div class="d-flex justify-content-between">--}}
{{--                    <div>--}}
{{--                        <h4 class="card-title mb-0">Traffic</h4>--}}
{{--                        <div class="small text-muted">September 2019</div>--}}
{{--                    </div>--}}
{{--                    <div class="btn-toolbar d-none d-md-block" role="toolbar" aria-label="Toolbar with buttons">--}}
{{--                        <div class="btn-group btn-group-toggle mx-3" data-toggle="buttons">--}}
{{--                            <label class="btn btn-outline-secondary">--}}
{{--                                <input id="option1" type="radio" name="options" autocomplete="off"> Day--}}
{{--                            </label>--}}
{{--                            <label class="btn btn-outline-secondary active">--}}
{{--                                <input id="option2" type="radio" name="options" autocomplete="off" checked=""> Month--}}
{{--                            </label>--}}
{{--                            <label class="btn btn-outline-secondary">--}}
{{--                                <input id="option3" type="radio" name="options" autocomplete="off"> Year--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        <button class="btn btn-primary" type="button">--}}
{{--                            <svg class="c-icon">--}}
{{--                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cloud-download"></use>--}}
{{--                            </svg>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="c-chart-wrapper" style="height:300px;margin-top:40px;">--}}
{{--                    <canvas class="chart" id="main-chart" height="300"></canvas>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-footer">--}}
{{--                <div class="row text-center">--}}
{{--                    <div class="col-sm-12 col-md mb-sm-2 mb-0">--}}
{{--                        <div class="text-muted">Visits</div><strong>29.703 Users (40%)</strong>--}}
{{--                        <div class="progress progress-xs mt-2">--}}
{{--                            <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md mb-sm-2 mb-0">--}}
{{--                        <div class="text-muted">Unique</div><strong>24.093 Users (20%)</strong>--}}
{{--                        <div class="progress progress-xs mt-2">--}}
{{--                            <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md mb-sm-2 mb-0">--}}
{{--                        <div class="text-muted">Pageviews</div><strong>78.706 Views (60%)</strong>--}}
{{--                        <div class="progress progress-xs mt-2">--}}
{{--                            <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md mb-sm-2 mb-0">--}}
{{--                        <div class="text-muted">New Users</div><strong>22.123 Users (80%)</strong>--}}
{{--                        <div class="progress progress-xs mt-2">--}}
{{--                            <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md mb-sm-2 mb-0">--}}
{{--                        <div class="text-muted">Bounce Rate</div><strong>40.15%</strong>--}}
{{--                        <div class="progress progress-xs mt-2">--}}
{{--                            <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row">--}}
{{--            <div class="col-sm-6 col-lg-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header bg-facebook content-center">--}}
{{--                        <svg class="c-icon c-icon-3xl text-white my-4">--}}
{{--                            <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-facebook-f"></use>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <div class="card-body row text-center">--}}
{{--                        <div class="col">--}}
{{--                            <div class="text-value-xl">89k</div>--}}
{{--                            <div class="text-uppercase text-muted small">friends</div>--}}
{{--                        </div>--}}
{{--                        <div class="c-vr"></div>--}}
{{--                        <div class="col">--}}
{{--                            <div class="text-value-xl">459</div>--}}
{{--                            <div class="text-uppercase text-muted small">feeds</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-sm-6 col-lg-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header bg-twitter content-center">--}}
{{--                        <svg class="c-icon c-icon-3xl text-white my-4">--}}
{{--                            <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-twitter"></use>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <div class="card-body row text-center">--}}
{{--                        <div class="col">--}}
{{--                            <div class="text-value-xl">973k</div>--}}
{{--                            <div class="text-uppercase text-muted small">followers</div>--}}
{{--                        </div>--}}
{{--                        <div class="c-vr"></div>--}}
{{--                        <div class="col">--}}
{{--                            <div class="text-value-xl">1.792</div>--}}
{{--                            <div class="text-uppercase text-muted small">tweets</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-sm-6 col-lg-4">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header bg-linkedin content-center">--}}
{{--                        <svg class="c-icon c-icon-3xl text-white my-4">--}}
{{--                            <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-linkedin"></use>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <div class="card-body row text-center">--}}
{{--                        <div class="col">--}}
{{--                            <div class="text-value-xl">500+</div>--}}
{{--                            <div class="text-uppercase text-muted small">contacts</div>--}}
{{--                        </div>--}}
{{--                        <div class="c-vr"></div>--}}
{{--                        <div class="col">--}}
{{--                            <div class="text-value-xl">292</div>--}}
{{--                            <div class="text-uppercase text-muted small">feeds</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--        <div class="row">--}}
{{--            <div class="col-md-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">Traffic &amp; Sales</div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-6">--}}
{{--                                        <div class="c-callout c-callout-info"><small class="text-muted">New Clients</small>--}}
{{--                                            <div class="text-value-lg">9,123</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-6">--}}
{{--                                        <div class="c-callout c-callout-danger"><small class="text-muted">Recuring Clients</small>--}}
{{--                                            <div class="text-value-lg">22,643</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                                <hr class="mt-0">--}}
{{--                                <div class="progress-group mb-4">--}}
{{--                                    <div class="progress-group-prepend"><span class="progress-group-text">Monday</span></div>--}}
{{--                                    <div class="progress-group-bars">--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 34%" aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="progress-group mb-4">--}}
{{--                                    <div class="progress-group-prepend"><span class="progress-group-text">Tuesday</span></div>--}}
{{--                                    <div class="progress-group-bars">--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 56%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 94%" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="progress-group mb-4">--}}
{{--                                    <div class="progress-group-prepend"><span class="progress-group-text">Wednesday</span></div>--}}
{{--                                    <div class="progress-group-bars">--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 12%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="progress-group mb-4">--}}
{{--                                    <div class="progress-group-prepend"><span class="progress-group-text">Thursday</span></div>--}}
{{--                                    <div class="progress-group-bars">--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 91%" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="progress-group mb-4">--}}
{{--                                    <div class="progress-group-prepend"><span class="progress-group-text">Friday</span></div>--}}
{{--                                    <div class="progress-group-bars">--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 73%" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="progress-group mb-4">--}}
{{--                                    <div class="progress-group-prepend"><span class="progress-group-text">Saturday</span></div>--}}
{{--                                    <div class="progress-group-bars">--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 53%" aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="progress-group mb-4">--}}
{{--                                    <div class="progress-group-prepend"><span class="progress-group-text">Sunday</span></div>--}}
{{--                                    <div class="progress-group-bars">--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 9%" aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 69%" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-sm-6">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-6">--}}
{{--                                        <div class="c-callout c-callout-warning"><small class="text-muted">Pageviews</small>--}}
{{--                                            <div class="text-value-lg">78,623</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-6">--}}
{{--                                        <div class="c-callout c-callout-success"><small class="text-muted">Organic</small>--}}
{{--                                            <div class="text-value-lg">49,123</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                                <hr class="mt-0">--}}
{{--                                <div class="progress-group">--}}
{{--                                    <div class="progress-group-header">--}}
{{--                                        <svg class="c-icon progress-group-icon">--}}
{{--                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>--}}
{{--                                        </svg>--}}
{{--                                        <div>Male</div>--}}
{{--                                        <div class="mfs-auto font-weight-bold">43%</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress-group-bars">--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="progress-group mb-5">--}}
{{--                                    <div class="progress-group-header">--}}
{{--                                        <svg class="c-icon progress-group-icon">--}}
{{--                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user-female"></use>--}}
{{--                                        </svg>--}}
{{--                                        <div>Female</div>--}}
{{--                                        <div class="mfs-auto font-weight-bold">37%</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress-group-bars">--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="progress-group">--}}
{{--                                    <div class="progress-group-header align-items-end">--}}
{{--                                        <svg class="c-icon progress-group-icon">--}}
{{--                                            <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-google"></use>--}}
{{--                                        </svg>--}}
{{--                                        <div>Organic Search</div>--}}
{{--                                        <div class="mfs-auto font-weight-bold mfe-2">191.235</div>--}}
{{--                                        <div class="text-muted small">(56%)</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress-group-bars">--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 56%" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="progress-group">--}}
{{--                                    <div class="progress-group-header align-items-end">--}}
{{--                                        <svg class="c-icon progress-group-icon">--}}
{{--                                            <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-facebook-f"></use>--}}
{{--                                        </svg>--}}
{{--                                        <div>Facebook</div>--}}
{{--                                        <div class="mfs-auto font-weight-bold mfe-2">51.223</div>--}}
{{--                                        <div class="text-muted small">(15%)</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress-group-bars">--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="progress-group">--}}
{{--                                    <div class="progress-group-header align-items-end">--}}
{{--                                        <svg class="c-icon progress-group-icon">--}}
{{--                                            <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-twitter"></use>--}}
{{--                                        </svg>--}}
{{--                                        <div>Twitter</div>--}}
{{--                                        <div class="mfs-auto font-weight-bold mfe-2">37.564</div>--}}
{{--                                        <div class="text-muted small">(11%)</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress-group-bars">--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 11%" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="progress-group">--}}
{{--                                    <div class="progress-group-header align-items-end">--}}
{{--                                        <svg class="c-icon progress-group-icon">--}}
{{--                                            <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-linkedin"></use>--}}
{{--                                        </svg>--}}
{{--                                        <div>LinkedIn</div>--}}
{{--                                        <div class="mfs-auto font-weight-bold mfe-2">27.319</div>--}}
{{--                                        <div class="text-muted small">(8%)</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress-group-bars">--}}
{{--                                        <div class="progress progress-xs">--}}
{{--                                            <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 8%" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <br>--}}
{{--                        <table class="table table-responsive-sm table-hover table-outline mb-0">--}}
{{--                            <thead class="thead-light">--}}
{{--                            <tr>--}}
{{--                                <th class="text-center">--}}
{{--                                    <svg class="c-icon">--}}
{{--                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>--}}
{{--                                    </svg>--}}
{{--                                </th>--}}
{{--                                <th>User</th>--}}
{{--                                <th class="text-center">Country</th>--}}
{{--                                <th>Usage</th>--}}
{{--                                <th class="text-center">Payment Method</th>--}}
{{--                                <th>Activity</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            <tr>--}}
{{--                                <td class="text-center">--}}
{{--                                    <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/1.jpg" alt="user@email.com"><span class="c-avatar-status bg-success"></span></div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div>Yiorgos Avraamu</div>--}}
{{--                                    <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <svg class="c-icon c-icon-xl">--}}
{{--                                        <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-us"></use>--}}
{{--                                    </svg>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="clearfix">--}}
{{--                                        <div class="float-left"><strong>50%</strong></div>--}}
{{--                                        <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress progress-xs">--}}
{{--                                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <svg class="c-icon c-icon-xl">--}}
{{--                                        <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-mastercard"></use>--}}
{{--                                    </svg>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="small text-muted">Last login</div><strong>10 sec ago</strong>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td class="text-center">--}}
{{--                                    <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/2.jpg" alt="user@email.com"><span class="c-avatar-status bg-danger"></span></div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div>Avram Tarasios</div>--}}
{{--                                    <div class="small text-muted"><span>Recurring</span> | Registered: Jan 1, 2015</div>--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <svg class="c-icon c-icon-xl">--}}
{{--                                        <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-br"></use>--}}
{{--                                    </svg>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="clearfix">--}}
{{--                                        <div class="float-left"><strong>10%</strong></div>--}}
{{--                                        <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress progress-xs">--}}
{{--                                        <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <svg class="c-icon c-icon-xl">--}}
{{--                                        <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-visa"></use>--}}
{{--                                    </svg>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="small text-muted">Last login</div><strong>5 minutes ago</strong>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td class="text-center">--}}
{{--                                    <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/3.jpg" alt="user@email.com"><span class="c-avatar-status bg-warning"></span></div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div>Quintin Ed</div>--}}
{{--                                    <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <svg class="c-icon c-icon-xl">--}}
{{--                                        <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-in"></use>--}}
{{--                                    </svg>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="clearfix">--}}
{{--                                        <div class="float-left"><strong>74%</strong></div>--}}
{{--                                        <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress progress-xs">--}}
{{--                                        <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 74%" aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <svg class="c-icon c-icon-xl">--}}
{{--                                        <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-stripe"></use>--}}
{{--                                    </svg>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="small text-muted">Last login</div><strong>1 hour ago</strong>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td class="text-center">--}}
{{--                                    <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/4.jpg" alt="user@email.com"><span class="c-avatar-status bg-secondary"></span></div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div>Enéas Kwadwo</div>--}}
{{--                                    <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <svg class="c-icon c-icon-xl">--}}
{{--                                        <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-fr"></use>--}}
{{--                                    </svg>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="clearfix">--}}
{{--                                        <div class="float-left"><strong>98%</strong></div>--}}
{{--                                        <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress progress-xs">--}}
{{--                                        <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 98%" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <svg class="c-icon c-icon-xl">--}}
{{--                                        <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-paypal"></use>--}}
{{--                                    </svg>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="small text-muted">Last login</div><strong>Last month</strong>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td class="text-center">--}}
{{--                                    <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/5.jpg" alt="user@email.com"><span class="c-avatar-status bg-success"></span></div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div>Agapetus Tadeáš</div>--}}
{{--                                    <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <svg class="c-icon c-icon-xl">--}}
{{--                                        <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-es"></use>--}}
{{--                                    </svg>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="clearfix">--}}
{{--                                        <div class="float-left"><strong>22%</strong></div>--}}
{{--                                        <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress progress-xs">--}}
{{--                                        <div class="progress-bar bg-gradient-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <svg class="c-icon c-icon-xl">--}}
{{--                                        <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-apple-pay"></use>--}}
{{--                                    </svg>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="small text-muted">Last login</div><strong>Last week</strong>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            <tr>--}}
{{--                                <td class="text-center">--}}
{{--                                    <div class="c-avatar"><img class="c-avatar-img" src="assets/img/avatars/6.jpg" alt="user@email.com"><span class="c-avatar-status bg-danger"></span></div>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div>Friderik Dávid</div>--}}
{{--                                    <div class="small text-muted"><span>New</span> | Registered: Jan 1, 2015</div>--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <svg class="c-icon c-icon-xl">--}}
{{--                                        <use xlink:href="vendors/@coreui/icons/svg/flag.svg#cif-pl"></use>--}}
{{--                                    </svg>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="clearfix">--}}
{{--                                        <div class="float-left"><strong>43%</strong></div>--}}
{{--                                        <div class="float-right"><small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small></div>--}}
{{--                                    </div>--}}
{{--                                    <div class="progress progress-xs">--}}
{{--                                        <div class="progress-bar bg-gradient-success" role="progressbar" style="width: 43%" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <svg class="c-icon c-icon-xl">--}}
{{--                                        <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-amex"></use>--}}
{{--                                    </svg>--}}
{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <div class="small text-muted">Last login</div><strong>Yesterday</strong>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}


            <div class="fade-in">
                <div class="card-columns cols-2">
{{--                    <div class="card">--}}
{{--                        <div class="card-header">Line Chart--}}
{{--                            <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted">docs</small></a></div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="c-chart-wrapper">--}}
{{--                                <canvas id="canvas-1"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="card">
                        <div class="card-header">Semester Wise
                            <div class="card-header-actions"><small class="text-muted" style="background: #00FF00; color:black;padding: 10px">Mid Term</small><small class="text-muted" style="color:black;padding: 10px; background: #006400">Final</small></div>
                        </div>
                        <div class="card-body">
                            <div class="c-chart-wrapper">
                                <canvas id="canvas-2"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Exam Type
                            <div class="card-header-actions"></div>
                        </div>
                        <div class="card-body">
                            <div class="c-chart-wrapper">
                                <canvas id="canvas-3"></canvas>
                            </div>
                        </div>
                    </div>
{{--                    <div class="card">--}}
{{--                        <div class="card-header">Radar Chart--}}
{{--                            <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted">docs</small></a></div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="c-chart-wrapper">--}}
{{--                                <canvas id="canvas-4"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">Pie Chart--}}
{{--                            <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted">docs</small></a></div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="c-chart-wrapper">--}}
{{--                                <canvas id="canvas-5"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-header">Polar Area Chart--}}
{{--                            <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted">docs</small></a></div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body">--}}
{{--                            <div class="c-chart-wrapper">--}}
{{--                                <canvas id="canvas-6"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <canvas id="myChart" width="400" height="400"></canvas>--}}
{{--                    </div>--}}
                </div>
            </div>


@endsection
@push('scripts')

    <script>
    var labels = [<?php echo $semesterData[0]; ?>];
    var value = [<?php echo $semesterData[1]; ?>];
    var value2 = [<?php echo $semesterData[2]; ?>];
    var barChart = new Chart(document.getElementById("canvas-2"), {
        type: "bar",
        data: {
            labels: labels,
            datasets: [ {
                backgroundColor: "rgba(0,255,0, 0.5)",
                borderColor: "rgba(220, 220, 220, 0.8)",
                highlightFill: "rgba(220, 220, 220, 0.75)",
                highlightStroke: "rgba(220, 220, 220, 1)",
                data: value
            }, {
                backgroundColor: "rgba(0,100,0, 0.5)",
                borderColor: "rgba(151, 187, 205, 0.8)",
                highlightFill: "rgba(151, 187, 205, 0.75)",
                highlightStroke: "rgba(151, 187, 205, 1)",
                data: value2
            } ]
        },
        options: {
            responsive: true
        }
    });

    //exam type wise chart
    var value = [<?php echo $examData[0]; ?>];
    var backgroundColor = [<?php echo $examData[2]; ?>];
    var hoverBackgroundColor = [<?php echo $examData[3]; ?>];
       var doughnutChart = new Chart(document.getElementById("canvas-3"), {
        type: "doughnut",

        data: {
            labels: value,
            datasets: [ {
                data: [ {{$examData[1]}} ],
                backgroundColor: backgroundColor,
                hoverBackgroundColor: hoverBackgroundColor
            } ]
        },
        options: {
            responsive: true
        }
    });

</script>
@endpush
