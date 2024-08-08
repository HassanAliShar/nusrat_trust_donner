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
                        <!-- task, page, download counter  start -->
                        <div class="col-xl-3 col-md-6">
                            <div class="card">
                                <div class="card-block">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h4 class="text-c-red">00</h4>
                                            <h6 class="text-muted m-b-0">Waqaf Qurbani</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-calendar-check-o f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-purple">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">Waqaf Qurbani</p>
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
                                            <h6 class="text-muted m-b-0">Ijtamai Qurbani</h6>
                                        </div>
                                        <div class="col-4 text-right">
                                            <i class="fa fa-calendar-check-o f-28"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-c-purple">
                                    <div class="row align-items-center">
                                        <div class="col-9">
                                            <p class="text-white m-b-0">Ijtamai Qurbani</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div style="text-align:center;" class="col-lg-12 d-flex">

                        <div class="col-lg-3">

                            <button type="button" data-toggle="modal" data-target="#exampleModal_add"
                                class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">Add New
                                Donner</button>
                        </div>
                        <div class="col-lg-3">
                            <button class="btn btn-out-dashed waves-effect waves-light btn-primary btn-square">Send
                                Message</button>
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
                                <h5 class="card-header-text text-white"><button class="btn-danger">Food Help Scheme
                                        Donners</button></h5>
                            </div>
                            <div class="card-block accordion-block">
                                <div class="card">
                                    <div class="card-header">

                                        <span>Search <code><input type="text"></code><button
                                                class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square">Show
                                                    All List</i></button> </span>
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

                                                        <th>Name</th>
                                                        <th>Contact</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th><input type="checkbox"></th>

                                                        <th>1</th>
                                                        <td>Akash</td>
                                                        <td>0348-2248944</td>
                                                        <td>

                                                            <button type="button" data-toggle="modal"
                                                                data-target="#exampleModal"
                                                                class="btn btn-primary btn-sm"><i
                                                                    class="fa-regular fa-pen-to-square"></i>update</button>


                                                        </td>
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


<!-- start Status paid modal box -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Donner Food_Help Scheme</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">

                    <div class="col-sm-3">

                        <input type="text" class="form-control" placeholder="Child">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Donner Name">
                    </div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="Donner Phone">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-primary d-flex justify-content-center">Add Donner</button>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- End Status paid modal box -->




<div class="modal fade" id="exampleModal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Donner Food_Help Scheme</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">

                    <div class="col-sm-3">

                        <input type="text" class="form-control" placeholder="Child">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" placeholder="Donner Name">
                    </div>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="Donner Phone">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-primary d-flex justify-content-center">Add Donner</button>
                </center>
            </div>
        </div>
    </div>
</div>
@endsection
