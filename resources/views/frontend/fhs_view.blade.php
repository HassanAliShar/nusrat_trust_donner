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
                                            <div style="text-align:center;" class="col-lg-12">
                                                <div class="card bg-primary">
                                                    <div class="card-header">
                                                        <h4 class="card-header-text text-white">NUSRAT TRUST FOR SPECIAL
                                                            CHILDREN DONNERS LIST</h4>
                                                    </div>
                                                </div>
                                            </div>


                                            <br><br>
                                            <br>
                                            <!-- Single Open Accordion ends -->
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

                                                    <div class="col-lg-12 ">
                                                        <div class="card">
                                                            <div style="text-align:center;" class="card-header bg-primary">
                                                                <h5 class="card-header-text text-white"><button class="btn-danger">Food Help Scheme Donners</button>
                                                                </h5>
                                                            </div>
                                                            <div class="card-block accordion-block">
                                                                <div class="card">
                                                                    <div class="card-header">

                                                                        <span><input id="myInput" type="text" placeholder="Search.."><code></code>DONOR DETAILS</span>
                                                                        <div class="card-header-right">
                                                                            <ul class="list-unstyled card-option">
                                                                                <li><i class="fa fa fa-wrench open-card-option"></i>
                                                                                </li>
                                                                                <li><i class="fa fa-window-maximize full-card"></i>
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
                                                                            <table id="myTable" class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>No Child</th>
                                                                                        <th>Name</th>
                                                                                        <th>contact</th>
                                                                                        <th>Actions</th>

                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach($donors as $row)
                                                                                    <tr>
                                                                                        <td>{{ $row->children }}</td>
                                                                                        <td>{{ $row->name }}</td>
                                                                                        <td>{{ $row->contact_no }}</td>
                                                                                        <td>
                                                                                            <button type="button" onclick="document.getElementById('donner_id').value = {{ $row->id }}" data-toggle="modal" data-target="#exampleModal_update" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square">UpDate</i></button>
                                                                                            <button class="btn btn-success btn-sm" type="button"><a class="text-white" href="{{ route('view.details',$row->id) }}">View Details</a></button>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('food_help.update') }}" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pay Food_Help Scheme</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <input type="hidden" name="id" value="{{ $row->id}}" class="form-control">
                                                <div class="col-sm-4">
                                                    <input type="text" name="children" class="form-control" value="{{ $row->children  }}">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" name="name" class="form-control" value="{{ $row->name}}">
                                                </div>

                                                <div class="col-sm-4">
                                                    <input type="text" name="contact_no" class="form-control" value="{{ $row->contact_no }}">
                                                </div>


                                            </div>

                                        </div>
                                        <div class="modal-footer justify-content center">
                                            <center>
                                                <button type="submit" class="btn btn-primary d-flex justify-content-center">Update Details</button>
                                            </center>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End end update modal box -->



                        @endsection