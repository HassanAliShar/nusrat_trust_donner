@extends('frontend.layouts.main')

@section('main-container')



<br><br>

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
                        <!-- task, page, download counter  start -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-red">{{ $totalPaidDonors ?? 00 }}</h4>
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
                                            <h4 class="text-c-red">{{ $totalUnpaidDonors ?? 00 }}</h4>
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
                                            <h4 class="text-c-red">{{ $totalDonors ?? 00 }}</h4>
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

                    <div style="text-align:center;" class="col-lg-12 d-flex">
                        <div class="col-lg-3">
                            <button class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">Send
                                Message</button>
                        </div>
                        <div class="col-lg-3">
                            <button class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">Show
                                Monthly Details</button>
                        </div>
                        <div class="col-lg-3">
                            <button class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">download
                                List</button>
                        </div>

                    </div>
                    <br><br>
                    <br>
                    <!-- Single Open Accordion ends -->




                    <div class="col-lg-12 ">
                        <div class="card">
                            <div style="text-align:center;" class="card-header bg-primary">
                                <h5 class="card-header-text text-white"><button class="btn-danger">Mahana Kifalat Donnors</button></h5>
                            </div>
                            <div class="card-block accordion-block">
                                <div class="card">
                                    <div class="card-header">

                                        <span>Search <code><input id="myInput" type="text" placeholder="Search.."></code></span>
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
                                            <table class="table justify-content-center">
                                                <thead>
                                                    <tr>
                                                        <th>No.families</th>
                                                        <th>Name</th>
                                                        <th>Contact</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="myTable">
                                                @foreach($mahana_kifalat_donners   ?? [] as $key => $row)
                                                    <tr>
                                                     <td>{{ $row->families ?? 0 }}</td>
                                                     <td>{{ $row->donor->name ?? 'Guest' }}</td>
                                                     <td>{{ $row->donor->contact_no ?? '' }}</td>
                                                        <td>
                                                            <a href="{{ route('view.details',['mahana_kifalat',$row->donor->id]) }}" class="btn btn-danger btn-sm">View Details</a>
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
                        <!-- Page-body end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
