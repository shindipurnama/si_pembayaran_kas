<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Tagihan extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    public $table = 'tagihan';
    protected $fillable = [
        'id_tagihan',
        'id_user',
        'tgl_tagihan',
        'keterangan',
        'jumlah',
        'status_tagihan',
        'notifikasi_status',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id','id_user');
    }

    public function belumBayar(){

    }
}
