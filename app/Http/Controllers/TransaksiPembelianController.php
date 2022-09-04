<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiPembelian;
use App\Models\MasterBarang;
use App\Models\TransaksiPembelianBarang;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Validator;

class TransaksiPembelianController extends Controller
{
    
    public function index()
    {
        $trans = TransaksiPembelianBarang::select('*')->where('transaksi_pembelian_id', '=',Null)->get();
        $count = TransaksiPembelianBarang::where('transaksi_pembelian_id', '=',Null)->sum('harga_satuan');
        #$trans = TransaksiPembelian::where('transaksi_pembelian_id','=', Null);
        $masters = MasterBarang::all();
        return view('transaksi.index', compact('trans','masters','count'));
    }
    public function daftartransaksi()
    {
        $trans = TransaksiPembelian::all();
        return view('transaksi.daftar_transaksi_pembelian', compact('trans'));
    }

    function action(Request $request)
    {
        $data = $request->all();
        $query = $data['query'];
        // $filter_data = MasterBarang::where('nama_barang', 'like', "%{$query}%")->get()->toArray();
        $filter_data = MasterBarang::where('nama_barang', 'LIKE', '%'.$query.'%')->get();
        return response()->json($filter_data);
        
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
        'nama' => 'required',
       
        'kuantitas' => 'required',
        'subtotal' => 'required',
        'harga_barang' =>  'required',
        ]);
            // transaksi_pembelian_id
            // master_barang_id
            // jumlah
            // harga_satuan
            // created_at
            // updated_at
    $trans = TransaksiPembelianBarang::create([
        'master_barang_id'       => $request->nama,
        'id_barang'  => $request->id_barang,
        'jumlah'  => $request->kuantitas,
        'harga_satuan' => $request->harga_barang,
	    'subtotal'   => $request->subtotal,	    
	    
        ]);

        return redirect()->route('transaksi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }    
    
    public function storetransaksi(Request $request)
    {
        $trans = TransaksiPembelianBarang::select('*')->where('transaksi_pembelian_id', '=',Null);
        $trans_barang = TransaksiPembelian::create(['total_harga' => $request->grand_total ]);
        $trans->update(['transaksi_pembelian_id' => $trans_barang->id,
            
		]);
   
        return redirect()->route('transaksi.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }    

}
