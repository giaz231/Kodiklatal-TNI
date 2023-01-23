<?php

namespace App\Http\Controllers;

use App\Models\Telegram;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TelegramTerkirim extends Controller
{


  public function index()
  {
    $userId = 1;
    if (!Auth::guest()) {
    $userId = \Auth::user()->id;
    }

    $suratTerkirims = Telegram::latest()->where('id_pengirim', $userId)->paginate(3);
    $suratDiterimas = Telegram::latest()->whereRaw("find_in_set('$userId',id_tujuan)")->paginate(3);
    $jumlahSuratKirim = count(Telegram::where('id_pengirim', $userId)->get());
    $jumlahSuratDiterima = count(Telegram::whereRaw("find_in_set('$userId',id_tujuan)")->get());
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
    return view('page/telegramTerkirim', compact('suratDiterimas', 'suratTerkirims', 'jumlahSuratKirim','jumlahSuratDiterima', 'users'))->with('i', (request()->input('page', 1) - 1) * 3);
  }



  
  public function surat(Request $request)
  {

    $statusBaca = 0; // ini dibuat global scope -> di terimaTelegram.blade.php -> $surat->dibaca nya di ganti. if == 0 maka belum if ==1 maka sudah di baca
    // ^^^^^^^^^^^^
   
    $userId = 1;
    if (!Auth::guest()) {
    $userId = \Auth::user()->id;
    }


    if (!Auth::guest()) {

      //ini buat ubah ke dibaca
      // $dibaca = explode(",",$request->dibaca);
      // if( in_array( $userId ,$dibaca ) ){
      // $statusBaca=1;

      // // ^^^^^^^^^^^^^^
      // }
  
      $content = Telegram::findOrFail($request->id_surat);
      $status= explode(",",$request->dibaca);
      // dd($status);

      if( in_array( $userId ,$status ) )
{
    
}else{
  array_push($status, $userId);
    
  $content->dibaca = implode(",",$status);
  // $content->dibaca = 1;
  $content->save();

}

      }

      


    // $content = Telegram::findOrFail($request->id_surat);
    // $content->save();

    if (\Hash::check($request->password, $content->password)) {
      return  response()->file(public_path() . '/' . $content->file_surat);
    } else {
      return redirect()->route('dashboard')
        ->with('wrong-password', 'Password salah');
    }
  }



  // public function lihattelegram(Request $request)
  // {
  //   if (!Auth::guest()) {
  //     $content = Telegram::findOrFail($request->id_surat);
  //     // $content->dibaca = 1;
      
  //     $status = explode(",",$request->dibaca);
  //     array_push($status, $userId);
  //     $content->dibaca = implode(",",$status);
  //     $content->save();
  //   }

  //   if (\Hash::check($request->password, $content->password)) {
  //     return  response()->file(public_path() . '/' . $content->file_surat);
  //   } else {
  //     return redirect()->route('dashboard')
  //       ->with('wrong-password', 'Password salah');
  //   }
  // }

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
