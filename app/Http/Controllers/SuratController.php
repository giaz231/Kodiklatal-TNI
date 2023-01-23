<?php

namespace App\Http\Controllers;

use App\Models\Surat;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTimeZone;
use DateTime;




class SuratController extends Controller
{
    // terkirim controller  = surat_keluar


  public function keluar()
  {
    $userId = 1;
    if (!Auth::guest()) {
    $userId = \Auth::user()->id;
    }

    $suratTerkirims = Surat::latest()->where('id_pengirim', $userId)->paginate(10);

    $jumlahSuratKirim = count(Surat::where('id_pengirim', $userId)->get());
 

    $users = User::get();
    return view('page.surat-keluar', compact('suratTerkirims', 'jumlahSuratKirim', 'users'))->with('i', (request()->input('page', 1) - 1) * 10);
  }


public function masuk()
  {
    $userId = 1;
    if (!Auth::guest()) {
    $userId = \Auth::user()->id;
    }
    $suratDiterimas = Surat::latest()->whereRaw("find_in_set('$userId',id_tujuan)")->paginate(10);
    $jumlahSuratDiterima = count(Surat::whereRaw("find_in_set('$userId',id_tujuan)")->get());
    $jumlahSuratSudahDibaca = count(Surat::whereRaw("find_in_set('$userId',dibaca)")->get());
    $jumlahSuratBelumDibaca = $jumlahSuratDiterima - $jumlahSuratSudahDibaca;

    $users = User::get();
    return view('page.surat-masuk', compact('suratDiterimas','jumlahSuratBelumDibaca','jumlahSuratDiterima', 'users'))->with('i', (request()->input('page', 1) - 1) * 10);
  }

public function form()
{
      $users = User::get();   
   
    return view('page.input-surat', compact('users',));
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

    Surat::create([
        'id_jenis_surat' => $request->id_jenis_surat,
        'id_unit' =>  $request->id_unit,
        'id_pengirim' => \Auth::user()->id,
        'id_tujuan' => implode(',',$tujuan),
        'no_agenda' =>  $request->nomor_agenda,
        'no_surat' =>  $request->nomor_surat,
        'tanggal' => $date->format('Y-m-d'),  
        'perihal_surat' => $request->perihal_surat,
        'disposisi' => null,
        'file_surat' => $path,
        'password' => bcrypt($request->password),
        'dibaca'=> false,
    ]);

    return redirect()->route('surat_keluar')
        ->with('submit-success', 'Data submitted, You can now check the result at the dashboard!');
}


//lihat surat


public function lihat(Request $request)
  {

    $userId = 1;
    if (!Auth::guest()) {
      $userId = \Auth::user()->id;
    }
    if (!Auth::guest()) {
      $content = Surat::findOrFail($request->id_surat);
      $status = explode(",", $request->dibaca);
      if ($userId != $content->id_pengirim) {
        if (!in_array($userId, $status)) {
          array_push($status, $userId);
          $content->dibaca = implode(",", $status);
          $content->save();
        }
      }
    }


    
  

    if (\Hash::check($request->password, $content->password)) {
      return  response()->file(public_path() . '/' . $content->file_surat);
    } else {
      return redirect()->route('surat_masuk')
        ->with('wrong-password', 'Password salah');
    }
  }

}
