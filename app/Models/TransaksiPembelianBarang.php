<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembelianBarang extends Model
{
    use HasFactory;
    protected $fillable = [
    'transaksi_pembelian_id',  
    'master_barang_id',
    'jumlah',
    'harga_satuan',
    'subtotal',
    ];
    public function barang(){ 
        return $this->belongsTo('App\Models\MasterBarang','master_barang_id'); 
        } 

}
