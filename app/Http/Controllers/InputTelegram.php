<?php

namespace App\Http\Controllers;

use App\Models\Telegram;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTimeZone;
use DateTime;

class InputTelegram extends Controller
{

  public function form()
  {
    $userId = 1;
    if (!Auth::guest()) {
      $userId = \Auth::user()->id;
    }

    $users = User::get();
    return view('page.kirim-telegram', compact('users'));
  }

  public function report(Request $request)
  {
    $timezone = new DateTimeZone('Asia/Jakarta');
    $date = new DateTime();
    $date->setTimeZone($timezone);
    $path = null;

    $request->validate([
      'file_surat' => 'required|mimetypes:application/pdf|max:10000'
    ]);

    if ($request->hasFile('file_surat')) {
      $filenameWithExt = $request->file('file_surat')->getClientOriginalName();
      $filename = strtolower(preg_replace('_ +_', '-', pathinfo($filenameWithExt, PATHINFO_FILENAME)));
      $extension = $request->file('file_surat')->getClientOriginalExtension();
      $fileNameToStore = $filename . '-' . time() . '.' . $extension;
      $path = $request->file('file_surat')->storeAs('surat', $fileNameToStore);
      $request->file('file_surat')->move('surat/', $path);
    }

    $tujuan = (array) $request->input('id_tujuan');

    Telegram::create([
      'id_jenis_surat' => 1,
      'id_unit' =>  $request->id_unit,
      'id_pengirim' => \Auth::user()->id,
      'id_tujuan' => implode(',', $tujuan),
      'no_agenda' =>  $request->nomor_agenda,
      'no_surat' =>  $request->nomor_surat,
      'tanggal' => $request->tanggal,
      'perihal_surat' => $request->perihal_surat,
      'disposisi' => null,
      'file_surat' => $path,
      'password' => bcrypt($request->password),
      'dibaca' => null,
      'klasifikasi' => $request->klasifikasi,
      'derajat' => $request->derajat,
    ]);

    return redirect()->route('kirim_telegram')
      ->with('submit-success', 'Data submitted, You can now check the result at the dashboard!');
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
