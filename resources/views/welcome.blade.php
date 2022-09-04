
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

        <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
        <div class="container container-branch">
            <div class="row row-branch">
                <div class="col col-branch">
                
                    <div class="card card-branch">
                        <div class="card-body">
                        @csrf
                        <!-- <div class="mb-3 row row-body">
                                <label class="col-sm-2 col-form-label">Cari Barang<span class="wajib">*</span></label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control col-form-input" id= "idcari" name="id_barang" onkeyup="autofill()">
                                </div>
                            </div>  -->

                        <div class="mb-3 row row-body">
                                <label class="col-sm-2 col-form-label">Nama Barang<span class="wajib">*</span></label>
                                <div class="col-sm-10">
                                <select class="form-control col-form-input" id="nama" name="nama">
                                   @foreach ($masters as $bar)
                                     <option value="{{ $bar->id }}">{{ $bar->nama_barang }}</option>
                                   @endforeach
                                 </select>
                            </div> 
                            </div> 
                            <div class="mb-3 row row-body">
                                <label class="col-sm-2 col-form-label">Harga <span class="wajib">*</span></label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control col-form-input" name="harga_barang"
                                    id="harga" >
                                </div>
                            </div> 
                            <div class="mb-3 row row-body">
                                <label class="col-sm-2 col-form-label">Kuantitas <span class="wajib">*</span></label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control col-form-input @error('kuantitas') is-invalid @enderror" name="kuantitas"
                                    value="{{ old('kuantitas') }}" id="kuantitas" placeholder="Masukan Jumlah"  onkeyup="hitung()">
                            
                                <!-- error message untuk title -->
                                @error('kuantitas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                 
                                </div>
                            </div>              
                            <div class="mb-3 row row-body">
                                <label class="col-sm-2 col-form-label">subtotal <span class="wajib">*</span></label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control col-form-input @error('subtotal') is-invalid @enderror" name="subtotal"
                                    id="subtotal" placeholder="Enter Branch Address">
                            
                                <!-- error message untuk title -->
                                @error('subtotal')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                 
                                </div>
                            </div>                 
                         
    
                
                </tbody>
            </table>
            <div class="row justify-content-center row-btn">
                <div class="col-lg-1 col-btn">
                <button type="reset" class="btn btn-md btn-reset">Cancel</button>
                </div>
                <div class="col-lg-1 col-btn">
                <button type="submit" class="btn btn-md btn-simpan">Tambah</button>
                </div>
            </div>

        
    </div>
    </div>
    <br>
</form>
    <form action="{{ route('transaksi.storetransaksi') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td><b>Grand Total :</b></td>
            <td><b>{{$trans->sum('subtotal')}}</b> 
            <input type="text" class="form-control col-form-input" name="grand_total" value={{$trans->sum('subtotal')}} hidden></table>
            </td>

        </tr>
    <table class="table table-responsive data-table" width="100%">
				<thead>
				<tr class="judul">
				    <th scope="col">No</th>
				    <th scope="col">Name</th>
				    <th scope="col">qty</th>
                    <th scope="col">Harga Satuan</th>
				    
				</tr>
				</thead>
				<tbody >
                @forelse ($trans as $tran)
                                <tr class="isi">
                                
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $tran->barang->nama_barang }}</td>
                                    <td>{{ $tran->jumlah }}</td>
                                    <td>{{ $tran->harga_satuan }}</td>
                                    
                                    
    
                                </tr>
                              @empty
                              
                                  <div class="alert alert-danger">
                                      Data belum Tersedia.
                                  </div>
                                  
    @endforelse
    
</table>
    <div class="row justify-content-center row-btn">
                <div class="col-lg-1 col-btn">
                <button type="reset" class="btn btn-md btn-reset">Cancel</button>
                </div>
                <div class="col-lg-1 col-btn">
                <button type="submit" class="btn btn-md btn-simpan">Bayar</button>
                </div>
            </div>
</form>
</body>

<!-- 
<script type="text/javascript">
    function autofill(){
        var cari = $('#idcari').val();
        alert(cari);
    }
    </script> -->
    <script type="text/javascript">
    function hitung(){

    var kuantitas = $('#kuantitas').val();
    // document.getElementById('#kuantitas').value; 
    
    var harga = $('#harga').val();
    var total = (harga * kuantitas);
    // alert(total)

    // var hasil = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    // let html = document.getElementById("subtotal").innerHTML = total; 
    // document.getElementById('#subtotal').innerHTML = total;
    document.getElementById('subtotal').value = total; 


    }

</script>



        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
        <div class="container">    
            <br />
            <h1 class="text-center text-primary">Typeahead JS Live Autocomplete Search in Laravel 8</h1>
            <br />
            <input type="text" name="user_name" id="user_name" class="form-control-lg" placeholder="Enter User Name..." />
        </div>
    </body>
</html>
<script>

var path = "{{ url('transaksi/action') }}";

$('#user_name').typeahead({

    source: function(query, process){

        return $.get(path, {query:query}, function(data){

            return process(data);

        });

    }

});

</script>    
<br>
<br>
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