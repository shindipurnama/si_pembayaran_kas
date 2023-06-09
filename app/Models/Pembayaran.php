<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'pembayaran';
    protected $fillable = [
        'id_pembayaran',
        'id_tagihan',
        'total_bayar',
        'bukti_bayar',
        'tgl_bayar',
        'status_bayar',
        'metode_bayar',
    ];

    public function tagihan()
    {
        return $this->hasOne(Tagihan::class, 'id_tagihan','id_tagihan');
    }

    public function belumKonfirmasi(){
        $count = Pembayaran::where('status_bayar',0)->count('id_pembayaran');
        return $count;
    }

    public function uangMasuk(){

    }
}
