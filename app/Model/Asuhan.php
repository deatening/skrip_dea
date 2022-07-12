<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Asuhan extends Model
{
    protected $table = 'asuhan_bidan';

    public function CTTPersalinan(){
        return $this->belongsTo('App\Model\CTTPersalinan','id_ctt_p','id');
    }

    public function Dokter(){
        return $this->belongsTo('App\User','id_user','id');
    }
}
