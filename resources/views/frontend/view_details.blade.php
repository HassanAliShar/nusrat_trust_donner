@extends('frontend.layouts.main')

@section('main-container')

<body>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">



            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">




                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Dashboard</h5>
                                            <p class="m-b-0">Welcome to NUSRAT TRUE</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <!-- task, page, download counter  start -->



                                            <!-- task, page, download counter  end -->



                                            <div style="text-align:center;" class="col-lg-12">
                                                <div class="card bg-primary">
                                                    <div class="card-header">
                                                        <h4 class="card-header-text text-white">NUSRAT TRUST FOR SPECIAL
                                                            CHILDREN DONNERS LIST</h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <div style="text-align:center;" class="col-lg-12 d-flex">

                                                <div class="col-lg-3">

                                                    <button
                                                        class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">Add
                                                        New Donner</button>
                                                </div>
                                                <div class="col-lg-3">
                                                    <button
                                                        class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">Send
                                                        Message</button>
                                                </div>
                                                <div class="col-lg-3">
                                                    <button
                                                        class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">Show
                                                        Monthly Details</button>
                                                </div>
                                                <div class="col-lg-3">
                                                    <button
                                                        class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">download
                                                        List</button>
                                                </div>

                                            </div>
                                            <br><br>
                                            <br>
                                            <!-- Single Open Accordion ends -->




                                            <div class="col-lg-12 ">
                                                <div class="card">
                                                    <div style="text-align:center;" class="card-header bg-primary">
                                                        <h5 class="card-header-text text-white"><button
                                                                class="btn-danger">Food Help Scheme Donners</button>
                                                        </h5>
                                                    </div>
                                                    <div class="card-block accordion-block">
                                                        <div class="card">
                                                            <div class="card-header">

                                                                <span>Search <code><input type="text"></code> <button
                                                                        class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">download
                                                                        Details</button></span>
                                                                <div class="card-header-right">
                                                                    <ul class="list-unstyled card-option">
                                                                        <li><i
                                                                                class="fa fa fa-wrench open-card-option"></i>
                                                                        </li>
                                                                        <li><i
                                                                                class="fa fa-window-maximize full-card"></i>
                                                                        </li>
                                                                        <li><i class="fa fa-minus minimize-card"></i>
                                                                        </li>
                                                                        <li><i class="fa fa-refresh reload-card"></i>
                                                                        </li>
                                                                        <li><i class="fa fa-trash close-card"></i></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="card-block table-border-style">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Child</th>
                                                                                <th>Doner Details</th>

                                                                                <th>Jan</th>
                                                                                <th>Feb</th>
                                                                                <th>Mar</th>
                                                                                <th>April</th>
                                                                                <th>May</th>
                                                                                <th>Jun</th>
                                                                                <th>July</th>
                                                                                <th>Aug</th>
                                                                                <th>Sep</th>
                                                                                <th>Oct</th>
                                                                                <th>Nov</th>
                                                                                <th>Dec</th>

                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>

                                                                                <td>2</td>
                                                                                <td>Akash/0348-2248944</td>
                                                                                <td>Res.122<br>27-7-2024</td>

                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>




                                                        <!-- END SECTION FOR SHOW DATA NOT PAID -->





                                                    </div>
                                                </div>
                                                <!-- Page-body end -->
                                            </div>
                                            <div id="styleSelector"> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Warning Section Starts -->
                <!-- Older IE warning message -->
                <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
    <![endif]-->
                <!-- Warning Section Ends -->



                @endsection
