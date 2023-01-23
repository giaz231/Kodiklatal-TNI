<?php

namespace App\Http\Controllers;

use App\Models\Telegram;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\Count;

class TelegramController extends Controller
{

  public function masuk()
  {
    $userId = 1;
    if (!Auth::guest()) {
      $userId = \Auth::user()->id;
    }
    $telegramMasuk = Telegram::latest()->whereRaw("find_in_set('$userId',id_tujuan)")->paginate(10);;
    $jumlahTelegramMasuk = count(Telegram::whereRaw("find_in_set('$userId',id_tujuan)")->get());
    $jumlahTelegramSudahDibaca = count(Telegram::whereRaw("find_in_set('$userId',dibaca)")->get());
    $jumlahTelegramBelumDibaca = $jumlahTelegramMasuk - $jumlahTelegramSudahDibaca;
    $users = User::get();
    return view('page.telegram-masuk', compact('telegramMasuk', 'jumlahTelegramMasuk','jumlahTelegramBelumDibaca','users'))->with('i', (request()->input('page', 1) - 1) * 10);
  }


  public function keluar()
  {
    $userId = 1;
    if (!Auth::guest()) {
      $userId = \Auth::user()->id;
    }

    $telegramKeluar = Telegram::latest()->where('id_pengirim', $userId)->paginate(10);
    $jumlahTelegramKeluar = count(Telegram::where('id_pengirim', $userId)->get());

    $users = User::get();
    return view('page.telegram-keluar', compact('telegramKeluar', 'jumlahTelegramKeluar', 'users'))->with('i', (request()->input('page', 1) - 1) * 10);
  }


  public function lihat(Request $request)
  {
    $userId = 1;
    if (!Auth::guest()) {
      $userId = \Auth::user()->id;
    }
    if (!Auth::guest()) {
      $content = Telegram::findOrFail($request->id_surat);
      $status = explode(",", $request->dibaca);
      if ($userId != $content->id_pengirim) {
        if (!in_array($userId, $status)) {
          array_push($status, $userId);
          $content->dibaca = implode(",", $status);
          $content->save();
        }
      }
    }




    // $content = Telegram::findOrFail($request->id_surat);
    // $content->save();

    if (\Hash::check($request->password, $content->password)) {
      return  response()->file(public_path() . '/' . $content->file_surat);
    } else {
      return redirect()->route('telegram_masuk')
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
