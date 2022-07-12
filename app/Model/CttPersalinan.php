<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CttPersalinan extends Model
{
    protected $table = 'catatan_persalinan';

    protected $fillable = [
        'id_user',
        'tgl',
        'persalinan',
        'terapi',
        'penolong',
        'id_perawat',
    ];

    public function Pasien(){
        return $this->belongsTo('App\User','id_user','id');
    }

    public function Perawat(){
        return $this->belongsTo('App\User','id_perawat','id');
    }

    public function Asuhan(){
        return $this->belongsTo('App\Model\Asuhan','id','id_ctt_p');
    }
}
