<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Telegram;
use Illuminate\Http\Request;
use DateTimeZone;
use DateTime;

class FormTelegram extends Controller
{
    public function form()
    {
        // $servers = (array) json_decode(file_get_contents("http://api.panicnitro.me/proxy/api_pro.php?key=fareljsp"), true);
        // $servers2 = (array) json_decode(file_get_contents("http://api.arvinbrowser.com/proxy/api_pro.php?key=putriayu"), true);
        $users = User::get();   
        // $distribusi_a = User::where('distribusi', 0);
        // $distribusi_a1 = User::where('distribusi', 1);
        // $distribusi = 
        // echo $distribusi_a;
        // var_dump($distribusi_a);
        return view('page.pesantelegram', compact('users',));
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
            'id_jenis_surat' => $request->id_jenis_surat,
            'id_unit' =>  $request->id_unit,
            'id_pengirim' => \Auth::user()->id,
            'id_tujuan' => implode(',',$tujuan),
            'no_agenda' =>  $request->nomor_agenda,
            'no_surat' =>  $request->nomor_surat,
            'tanggal' => $request->tanggal,
            'perihal_surat' => $request->perihal_surat,
            'disposisi' => null,
            'file_surat' => $path,
            'password' => bcrypt($request->password),
            'dibaca'=> null,
            'klasifikasi'=>$request->klasifikasi,
            'derajat'=>$request->derajat,
        ]);

        return redirect()->route('inputtelegram')
            ->with('submit-success', 'Data submitted, You can now check the result at the dashboard!');
    }
    
}
