<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use App\Model\Pegawai;
use Illuminate\Support\Facades\DB;

class pegawaiController extends Controller
{
  public function get($id){
    $data = Pegawai::selectRaw("
    	convert(varchar,tgllahir,103) tgllahir, nama, nipbaru nip, pk.kodepangkat + ' / ' + pk.pangkat as golpang, vj.namajabatan as jabatan, t.deskripsi as tipejabatan, jeniskelamin")
    ->leftJoin('vwpangkatterakhir as vt','pegawai.pegawaiid','=','vt.pegawaiid')
    ->leftJoin('pangkat as pk', 'pk.pangkatid','=','vt.pangkatid')
    ->leftJoin('vwjabatanterakhir as vj', 'vj.pegawaiid','=','pegawai.pegawaiid')
    ->leftJoin('tipepegawai as t', 't.tipepegawaiid','=','vj.jenisjabatan')
    ->where('pegawai.pegawaiid','=',$id)
    ->get();
     return response()->json(['success' => true, 'data'=>$data]);
    }
}
?>
