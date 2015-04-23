<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model {

    //
    protected $table = 'tbl_halaman';
    protected $primaryKey = 'id';
    protected $fillable = array('title','slug_data','content', 'dibaca');
    public $timestamps = false;


}
