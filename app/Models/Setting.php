<?php
/**
 * Created by PhpStorm.
 * User: balitax
 * Date: 24/04/2015
 * Time: 16:52
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

    protected $table            = 'tbl_setting';
    protected $primaryKey       = 'id_setting';
    protected $fillable         = array('title_web', 'desc_web','key_web', 'logo','facebook','twitter','gplus');
    public $timestamps          = false;

}