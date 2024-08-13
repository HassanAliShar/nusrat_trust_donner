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
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
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
                                                        <h4 class="card-header-text text-white">NUSRAT TRUST FOR SPECIAL CHILDREN DONNERS LIST</h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <br><br><br>
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
                                                                <h5 class="card-header-text text-white"><button class="btn-danger">Food Help Scheme Donners</button></h5>
                                                            </div>
                                                            <div class="card-block accordion-block">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <span><input id="myInput" type="text" placeholder="Search.."><code></code>DONOR DETAILS</span>
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
                                                                            <table id="myTable" class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>No Child</th>
                                                                                        <th>Name</th>
                                                                                        <th>Contact</th>
                                                                                        <th>Actions</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody  id="myTable">
                                                                            @foreach($food_help_donners ?? [] as $key => $row)
                                                                                <tr>
                                                                                   
                                                                                    
                                                                                    <th>{{ $row->children ?? 0 }}</th>
                                                                                    <td>{{ $row->donor->name ?? 'Guest' }}</td>
                                                                                    <td>{{ $row->donor->contact_no ?? '' }}</td>
                                                                                    <td>
                                                                                        
                                                                                        <button class="btn btn-danger btn-sm"><a class="text-white" href="{{ route('view.details',['food_help', $row->donor->id]) }}">View Details</a></button>
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                            </table>
                                                                        </div>
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

                            <!-- Add Modal here if needed -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
