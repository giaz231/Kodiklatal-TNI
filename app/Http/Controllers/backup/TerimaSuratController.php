<?php

namespace App\Http\Controllers;

use App\Models\Surat;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TerimaSuratController extends Controller
{

  public function index()
  {
    $userId = 1;
    if (!Auth::guest()) {
    $userId = \Auth::user()->id;
    }
    $suratTerkirims = Surat::latest()->where('id_pengirim', $userId)->paginate(3);
    $suratDiterimas = Surat::latest()->whereRaw("find_in_set('$userId',id_tujuan)")->paginate(3);
    $jumlahSuratKirim = count(Surat::where('id_pengirim', $userId)->get());
    $jumlahSuratDiterima = count(Surat::whereRaw("find_in_set('$userId',id_tujuan)")->get());
   // $suratDiterimas = array();
    /*
    var_dump($suratDiterimas);
    for ($i = 0; $i <= count($surats); $i++) {
      $id_pengirims = explode(",", $surats[$i]->id_tujuan);
      foreach ($id_pengirims as $id_pengirim) {
        if ($id_pengirim = $userId) {
          $surats[$i]->push((object)$suratDiterimas);
        }
      }
    }
    */

    $users = User::get();
    return view('page/terimasurat', compact('suratDiterimas', 'suratTerkirims', 'jumlahSuratKirim','jumlahSuratDiterima', 'users'))->with('i', (request()->input('page', 1) - 1) * 3);
  }
  public function surat(Request $request)
  {
    if (!Auth::guest()) {
      $content = Surat::findOrFail($request->id_surat);
      $content->dibaca = 1;
      $content->save();
    }

    if (\Hash::check($request->password, $content->password)) {
      return  response()->file(public_path() . '/' . $content->file_surat);
    } else {
      return redirect()->route('dashboard')
        ->with('wrong-password', 'Password salah');
    }
  }
  public static function getUserName($id_user)
  {
    $username = User::findOrFail($id_user);
    return $username->name;
  }
  public static function getJenisSurat($id)
  {
    $jenisSurat = array('KEPUTUSAN', 'PERINTAH HARIAN', 'INSTRUKSI', 'SURAT KEPUTUSAN', 'PETUNJUK PELAKSANA', 'SURAT EDARAN', 'SURAT PERINTAH', 'SURAT TUGAS', 'SURAT PERMOHONAN', 'NOTA DINAS', 'TELEGRAM', 'SURAT TELEGRAM', 'LAPORAN', 'PENGUMUMAN', 'SURAT PENGANTAR', 'SURAT BIASA MASUK', 'PERUBAHAN', 'PENCABUTAN', 'PERATURAN', 'SURAT IZIN', 'SURAT IZIN JALAN', 'SURAT RAHASIA', 'MEMOS', 'UNDANGAN', 'SURAT BIASA KELUAR', 'TELEGRAM RAHASIA', 'BASEGRAM', 'BERITA ACARA', 'SURAT DISPOSISI PANGLIMA/KS');
    return $jenisSurat[$id - 1];
  }
}
