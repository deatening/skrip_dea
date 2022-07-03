<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Rawat extends Model
{
    protected $table = 'rawat_tinggal';

    public function CTTPerawat(){
        return $this->belongsTo('App\Model\CTTPerawat','id_ctt','id');
    }

    public function Dokter(){
        return $this->belongsTo('App\User','id_user','id');
    }
}
