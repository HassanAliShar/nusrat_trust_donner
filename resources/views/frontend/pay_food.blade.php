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
                                            <h4 class="text-c-red">{{ $totalPaidDonors ?? 00 }}</h4>

                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-calendar-check-o f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-purple">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0"><a class="text-white" href="/paid-food">PAID DONNOR</a></p>
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
                                            <h4 class="text-c-red">{{ $totalUnpaidDonors ?? 00 }}</h4>

                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-calendar-check-o f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-purple">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">UNPAID DONNOR</p>
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
                                            <h4 class="text-c-red">{{ $totalDonors ?? 00 }}</h4>

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
                                <div class="alert alert-success alert-dismissible">
                                    {{ session()->get('message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            @endif

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

                                        <span>Search <code><input id="myInput" type="text" placeholder="Search.."></code><button class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square">Show All List</i></button> </span>
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

                                                        <th>S.No</th>
                                                        <th>No.Child</th>
                                                        <th>Name</th>
                                                        <th>Contact</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="myTable">
                                                    @foreach($food_help_donners ?? [] as $key => $row)
                                                    <tr>

                                                        <th scope="row">{{ $row->donor->id ?? '' }}</th>
                                                        <th>{{ $row->children ?? 0 }}</th>
                                                        <td>{{ $row->donor->name ?? 'Guest' }}</td>
                                                        <td>{{ $row->donor->contact_no ?? '' }}</td>
                                                        <td>
                                                            <button type="button" onclick="document.getElementById('donner_id').value = {{ $row->donor->id }}" data-toggle="modal" data-target="#exampleModal_paid" class="btn btn-success btn-sm"><i class="fa-regular fa-pen-to-square"></i>Paid</button>
                                                            <a class="btn btn-danger btn-sm" href="{{ route('view.details',['food_help', $row->donor->id]) }}">View Details</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<!-- start Status paid modal box -->
<div class="modal fade" id="exampleModal_paid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('pay_food.payments.store') }}" method="post">
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
                        <input type="hidden" name="type" id="food_help_scheme_id" class="form-control" value="food_help">
                        <div class="col-sm-4">
                            <input type="text" name="recept_no" class="form-control" placeholder="Receipt No">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="amount" class="form-control" placeholder="Amount">
                        </div>
                        <div class="col-sm-4">
                            <input type="date" name="payment_date" class="form-control" placeholder="Payment Date">
                        </div>
                        <div class="container">
                            <div class="col-sm-12 mt-4">
                                <label>Choose Months To Donate Them:</label>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <input class="form-check-input" name="months[]" type="checkbox" value="{{ date('Y') }}-01" id="january">
                                            <label class="form-check-label" for="january">1-January</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="months[]" type="checkbox" value="{{ date('Y') }}-02" id="february">
                                            <label class="form-check-label" for="february">2-February</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="months[]" type="checkbox" value="{{ date('Y') }}-03" id="march">
                                            <label class="form-check-label" for="march">3-March</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="months[]" type="checkbox" value="{{ date('Y') }}-04" id="april">
                                            <label class="form-check-label" for="april">4-April</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <input class="form-check-input" name="months[]" type="checkbox" value="{{ date('Y') }}-05" id="may">
                                            <label class="form-check-label" for="may">5-May</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="months[]" type="checkbox" value="{{ date('Y') }}-06" id="june">
                                            <label class="form-check-label" for="june">6-June</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="months[]" type="checkbox" value="{{ date('Y') }}-07" id="july">
                                            <label class="form-check-label" for="july">7-July</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="months[]" type="checkbox" value="{{ date('Y') }}-08" id="august">
                                            <label class="form-check-label" for="august">8-August</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <input class="form-check-input" name="months[]" type="checkbox" value="{{ date('Y') }}-09" id="september">
                                            <label class="form-check-label" for="september">9-September</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="months[]" type="checkbox" value="{{ date('Y') }}-10" id="october">
                                            <label class="form-check-label" for="october">10-October</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="months[]" type="checkbox" value="{{ date('Y') }}-11" id="november">
                                            <label class="form-check-label" for="november">11-November</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="months[]" type="checkbox" value="{{ date('Y') }}-12" id="december">
                                            <label class="form-check-label" for="december">12-December</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn btn-primary">Pay Donation</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Status paid modal box -->
@endsection