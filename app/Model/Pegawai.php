<?php
 
namespace App\Model;
 
use Illuminate\Database\Eloquent\Model;
 
class Pegawai extends Model
{
    protected $table = "pegawai";
    protected $primaryKey = 'PEGAWAIID';
    public $timestamps = false;

}