<?php
 
namespace App\Model;
 
use Illuminate\Database\Eloquent\Model;
 
class Userlogin extends Model
{
    protected $table = "Userlogin";
    protected $primaryKey = 'USERID';
    public $timestamps = false;
    protected $fillable = ['api_token'];

    public function pegawai()
    {
    	return $this->hasOne('App\Model\Pegawai', 'PEGAWAIID', 'PEGAWAIID');
    }
}

 