<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $fillable = [
        'nonota_beli',
        'tgl_beli',
        'total_beli',
        'id_distributor',
        'id_user'
        
    ];
    public function fdistributor(){
        return $this->belongsTo(Distributor::class, 'id_distributor', 'id');
        }

        public function fuser(){
            return $this->belongsTo(user::class, 'id_user', 'id');
            }
}