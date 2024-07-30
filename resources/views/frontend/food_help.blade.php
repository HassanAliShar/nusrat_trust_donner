@extends('frontend.layouts.main')

@section('main-container')




<br>
<br>

                    <div class="pcoded-content mt-3">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Dashboard</h5>
                                            <p class="m-b-0">Welcome to NUSRAT TRUET</p>
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
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-red">00</h4>
                                                                <h6 class="text-muted m-b-0">Paid Donner</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-calendar-check-o f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-purple">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Pay Donation</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-red">00</h4>
                                                                <h6 class="text-muted m-b-0">Not Paid Donner</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-calendar-check-o f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-purple">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">Not paid</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col-8">
                                                                <h4 class="text-c-red">00</h4>
                                                                <h6 class="text-muted m-b-0">Total Donners</h6>
                                                            </div>
                                                            <div class="col-4 text-right">
                                                                <i class="fa fa-calendar-check-o f-28"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer bg-c-purple">
                                                        <div class="row align-items-center">
                                                            <div class="col-9">
                                                                <p class="text-white m-b-0">TOTAL DONNERS</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </div>

                                            <div style="text-align:center;" class="col-sm-12">
                                                <div class="row">
                                                @if(session()->has('message'))
                                                    <div class="col-md-12">
                                                        <div class="alert alert-success">
                                                            {{ session()->get('message') }}
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-sm-3">
                                                    <button type="button" data-toggle="modal" data-target="#exampleModal_add" class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">Add New Donner</button>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">Send Message</button>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">Show Monthly Details</button>
                                                </div>
                                                <div class="col-sm-3">
                                                    <button class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">download List</button>
                                                </div>
                                            </div>
                                            </div>
                                            <br><br>
                                            <br>
                                            <!-- Single Open Accordion ends -->




                                            <div class="col-lg-12 ">
                                                <div class="card">
                                                    <div style="text-align:center;" class="card-header bg-primary">
                                                        <h5 class="card-header-text text-white"><button class="btn-danger">Food Help Scheme Donners</button></h5>
                                                    </div>
                                                    <div class="card-block accordion-block">
                                                        <div class="card">
                                                            <div class="card-header">

                                                                <span>Search <code><input type="text"></code><button class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square">Show All List</i></button> </span>
                                                                <div class="card-header-right">
                                                                    <ul class="list-unstyled card-option">
                                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                                        <li><i class="fa fa-trash close-card"></i></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="card-block table-border-style">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Selected</th>
                                                                                <th>S.No</th>
                                                                                <th>No.Child</th>
                                                                                <th>Name</th>
                                                                                <th>Contact</th>
                                                                                <th>Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($donors ?? [] as $key => $row)
                                                                                <tr>
                                                                                    <th><input type="checkbox"></th>
                                                                                    <th scope="row">{{ $row->id ?? '' }}</th>
                                                                                    <th>{{ $row->children ?? 0 }}</th>
                                                                                    <td>{{ $row->name ?? 'Guest' }}</td>
                                                                                    <td>{{ $row->contact_no ?? '' }}</td>
                                                                                    <td>
                                                                                        <button type="button" onclick="document.getElementById('donner_id').value = {{ $row->id }}" data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-sm"><i class="fa-regular fa-pen-to-square"></i>Paid</button>
                                                                                        <button type="button" data-toggle="modal" data-target="#exampleModal_update" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square">UpDate</i></button>
                                                                                        <button class="btn btn-danger btn-sm">View Details</button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
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


                <!-- start Status paid modal box -->

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('food_help.payments.store') }}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pay Food_Help Scheme</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <input type="hidden" name="donor_id" id="donner_id" class="form-control">
                                        <div class="col-sm-6">
                                            <input type="text" name="recept_no" class="form-control" placeholder="Raseed No">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="date" name="payment_date" class="form-control" placeholder="Donner Name">
                                        </div>
                                        <div class="col-sm-12 mt-4">
                                            <label>Choose Months To Donate Them:</label>
                                            <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="months[]" type="checkbox" value="01" id="january">
                                                    <label class="form-check-label" for="january">1-January</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="months[]" type="checkbox" value="02" id="february">
                                                    <label class="form-check-label" for="february">2-February</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="months[]" type="checkbox" value="03" id="march">
                                                    <label class="form-check-label" for="march">3-March</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="months[]" type="checkbox" value="04" id="april">
                                                    <label class="form-check-label" for="april">4-April</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="months[]" type="checkbox" value="05" id="may">
                                                    <label class="form-check-label" for="may">5-May</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="months[]" type="checkbox" value="06" id="june">
                                                    <label class="form-check-label" for="june">6-June</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="months[]" type="checkbox" value="07" id="july">
                                                    <label class="form-check-label" for="july">7-July</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" name="months[]" type="checkbox" value="08" id="august">
                                                    <label class="form-check-label" for="august">8-August</label>
                                                </div>

                                            </div>

                                                <div class="col-sm-4">

                                                    <div class="form-check">
                                                        <input class="form-check-input" name="months[]" type="checkbox" value="09" id="september">
                                                        <label class="form-check-label" for="september">9-September</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="months[]" type="checkbox" value="10" id="october">
                                                        <label class="form-check-label" for="october">10-October</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="months[]" type="checkbox" value="11" id="november">
                                                        <label class="form-check-label" for="november">11-November</label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="months[]" type="checkbox" value="12" id="december">
                                                        <label class="form-check-label" for="december">12-December</label>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer justify-content center">
                                    <center>
                                        <button type="submit" class="btn btn-primary d-flex justify-content-center">Pay Donation</button>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Status paid modal box -->




                <div class="modal fade" id="exampleModal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="{{ route('food_help.store') }}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Donner Food_Help Scheme</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group-row">
                                        {{-- show validation error messages here --}}
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3">
                                            <input type="text" name="children" class="form-control" placeholder="Child">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" name="name" class="form-control" placeholder="Donner Name">
                                        </div>
                                        <div class="col-sm-5">
                                            <input type="text" name="contact_no" class="form-control" placeholder="Donner Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <center>
                                        <button type="submit" class="btn btn-primary d-flex justify-content-center">Add Donner</button>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>





                <!-- End Update Model Box here -->




                <!-- Start Add new Donner Model Box here -->


                <!-- End Add new donner Model Box here -->






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
