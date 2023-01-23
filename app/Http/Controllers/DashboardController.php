<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Telegram;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{


  public function index()
  {
    $userId = 1;
    if (!Auth::guest()) {
      $userId = \Auth::user()->id;
    }

    $roleId = 1;
    if (!Auth::guest()) {
      $roleId = \Auth::user()->role;
    }


    $users = User::get();
    if ($roleId != 3) {
      $suratTerkirims = Surat::latest()->where('id_pengirim', $userId)->take(3)->get();
      $suratDiterimas = Surat::latest()->whereRaw("find_in_set('$userId',id_tujuan)")->take(3)->get();
      $jumlahSuratKirim = count(Surat::where('id_pengirim', $userId)->get());
      $jumlahSuratDiterima = count(Surat::whereRaw("find_in_set('$userId',id_tujuan)")->get());

      $telegramKeluar = Telegram::latest()->where('id_pengirim', $userId)->take(3)->get();
      $jumlahTelegramKeluar = count(Telegram::where('id_pengirim', $userId)->get());
      $telegramMasuk = Telegram::latest()->whereRaw("find_in_set('$userId',id_tujuan)")->take(3)->get();
      $jumlahTelegramMasuk = count(Telegram::whereRaw("find_in_set('$userId',id_tujuan)")->get());
      $jumlahTelegramSudahDibaca = count(Telegram::whereRaw("find_in_set('$userId',dibaca)")->get());
      $jumlahTelegramBelumDibaca = $jumlahTelegramMasuk - $jumlahTelegramSudahDibaca;

      return view('dashboard', compact('jumlahTelegramBelumDibaca', 'jumlahTelegramMasuk', 'telegramMasuk', 'jumlahTelegramKeluar', 'telegramKeluar', 'suratDiterimas', 'suratTerkirims', 'jumlahSuratKirim', 'jumlahSuratDiterima', 'users'));
    } else {
      $surats = Surat::latest()->get();
      $telegrams = Telegram::latest()->get();
      $jumlahTelegram = count(Telegram::latest()->get());
      $jumlahSurat =  count(Surat::latest()->get());
      return view('page.admin.dashboard', compact('jumlahTelegram', 'jumlahSurat', 'telegrams', 'surats', 'users'));
    }
  }

  // public function surat(Request $request)
  // {
  //   if (!Auth::guest()) {
  //     $content = Surat::findOrFail($request->id_surat);
  //     $userId = \Auth::user()->id;
  //     if ($userId != $content->id_pengirim){
  //       $content->dibaca = 1;
  //       $content->save();
  //     }
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

  public static function  getAlamatDisposisi($id)
  {
    $jenisSurat = array('WADAN', 'PERINTAH INSPEKTUR', 'DIROOK', 'DIRLAT', 'CIPUANBANG', 'CIRUM', 'KA AKUN', 'KAPOKGADIK', 'DANKODIKOPSLA', 'DANKODIKMAR', 'DANKODIKOKUM', 'DANPUSLATLEKDALSEN', 'DANPUSLATOPSLA', 'DANPUSLATMAR', 'KAKUWIL', 'DADENMA', 'KASETUM', 'KABEGKUM', 'KADISPEN', 'KASATKES', 'DADENPOMAI','DADENPOMAI');
    return $jenisSurat[$id - 1];
  }

  public static function  getAksiDisposisi($id)
  {
    $jenisSurat = array('TIPAKYIUM/AKSI', 'PELAJAR/ PERMOHONAN TSB', 'SIAPKAN/AGENDAKAN/RAPATKAN', 'MONITOR/LAPORKAN', 'FOORD & TINDAK LANJUTI','PELAJARI & DUKGAT TSB',  'SEBAGAI BAHAN REFF','KORDINASIKAN', 'PELAJARI/AJUKAN SARAN/TANGGAPAN', 'PROSES LANJUT', 'AKSI SYARMIN', 'BUAT JAWABAN/TANGGAPAN','CATAT/MONITOR PERKEMBANGANYA', 'FILE/ARSIPKAN','WAKILI', 'HADIR', 'UDK','UMP', 'ACC/DUKUNG', 'ACC/DUKUNG' );
    return $jenisSurat[$id - 1];
  }
}
