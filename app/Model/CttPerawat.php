<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CttPerawat extends Model
{
    protected $table = 'ctt_perawat';

    protected $fillable = [
        'id_user',
        'tgl',
        'soap',
        'id_perawat',
    ];

    public function Pasien(){
        return $this->belongsTo('App\User','id_user','id');
    }

    public function Perawat(){
        return $this->belongsTo('App\User','id_perawat','id');
    }
}
