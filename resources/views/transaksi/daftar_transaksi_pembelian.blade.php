

   
<html>
<head>
</head>
<body>


<!DOCTYPE html>
<html lang="en">

<head>
<title>SB Admin 2 - Blank</title>
   @include('template.head')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('template.left_sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('template.topbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                
                    <!-- Page Heading -->
                    <div class="create-branch">
        <div class="container">

        <table class="table table-responsive data-table" width="100%">
				<thead>
				<tr class="judul">
				    <th scope="col">No</th>
				    <th scope="col">id</th>
				    <th scope="col">Totak Harga</th>
                    <th scope="col">Tanggal Transaksi</th>
				    
				</tr>
				</thead>
				<tbody >
                    <p>Daftar Transaksi Pembelian Barang</p>
                @forelse ($trans as $tran)
                                <tr class="isi">
                                
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $tran->id }}</td>
                                    <td>{{ $tran->total_harga }}</td>
                                    <td>{{ $tran->created_at }}</td>
                                    
                                    
    
                                </tr>
                              @empty
                              
                                  <div class="alert alert-danger">
                                      Data belum Tersedia.
                                  </div>
                                  
    @endforelse
    
</table>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('template.footer')
          
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    @include('template.script')
</body>

</html>
</html>

