<?php

namespace App\Http\Controllers;

use App\Models\Surat;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTimeZone;
use DateTime;




class UserManagementController extends Controller
{
    // terkirim controller  = surat_keluar



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
    $jumlahUsers = count(User::get());
    $users = User::get();
    $jumlahUsersAdmin = count(User::where('role', 3)->get());
    $jumlahUsersA = count(User::where('distribusi', 0)->get());
    $jumlahUsersA1 = count(User::where('distribusi', 1)->get());
    if ($roleId != 3) {
  
      return view('page.admin.user-management', compact( 'users','jumlahUsers','jumlahUsersAdmin','jumlahUsersA','jumlahUsersA1'));
    } else {
      return view('page.admin.user-management', compact('users','jumlahUsers','jumlahUsersAdmin','jumlahUsersA','jumlahUsersA1'));
    }
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


}
