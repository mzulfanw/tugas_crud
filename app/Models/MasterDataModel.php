<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MasterDataModel extends Model
{
    use HasFactory;
    protected $table ='master_data';
    protected $primaryKey = 'kd_barang';
    protected $fillable = [
        'nama_barang',
        'harga_jual',
        'stokakhir',
        'log'
    ];

    public function allData() {
        return DB::table('master_data')->get();
    }

    public function create($data) {
        return DB::table('master_data')->insert($data);
    }

    public function remove($id) {
        return DB::table('master_data')->where('kd_barang', $id)->delete();
    }

    public function edit($id) {
        return DB::table('master_data')->where('kd_barang', $id)->first();
    }
}
