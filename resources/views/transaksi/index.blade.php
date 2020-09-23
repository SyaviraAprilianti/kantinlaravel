 <!-- csrf token -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <!-- Custom fonts for this template-->
 <link href="{{asset('vendor/fontawesome-free/css/all.min.css" rel="stylesheet')}}" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
  
<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
@include('template.sidebar')
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
   @include('template.topbar')
    <!-- End of Topbar -->

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Orders</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cashier</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="mt-3 mb-3 row card-group">
                        @foreach($menu as $menuu)
                            <div class="col-3 mb-4 item-cashier" data-id="{{ $menuu->id_menu }}"
                                data-name="{{ $menuu->nama_menu }}"
                                data-price="{{ $menuu->harga }}"
                                data-image="{{ $menuu->gambar_menu }}">
                                <div style="border: none;" class="card text-center">
                                    <img style="border-radius: 15px !important; width: 90px;"
                                        class="rounded mx-auto d-block"
                                        src="imagedb/{{ $menuu->gambar_menu }}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body p-2">
                                        <h5 class="h6 card-title mb-1 font-weight-bold text-dark">
                                            {{ $menuu['nama_menu'] }}</h5>
                                        <p style="font-size: 12px;" class="card-text text-dark">Rp.
                                            {{ $menuu['harga'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Curent Order</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div style="height: 300px;" id="current-order" class="overflow-auto">


                    </div>
                    <hr>

                        <div class="row">
                            <p class="col-8">Subtotal : </p>
                            <p class="col-4 text-right"> Rp 15000 </p>
                        </div>

                        <div class="row">
                            <p class="col-8">Tax : </p>
                            <p class="col-4 text-right"> - </p>
                        </div>

                        <hr>
                        <div class="row">
                            <p class="col-8 h4">Total : </p>
                            <p class="col-4 text-right"> Rp 15000 </p>
                        </div>
                        <button type="button" id="pay" class="btn btn-success btn-md btn-block mt-3">Pay</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content --> 
<script type="text/javascript" src="{{asset('js/js.js')}}"></script>

</div>
</div>
</div>

