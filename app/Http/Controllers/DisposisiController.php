<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\User;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisposisiController extends Controller
{
    // terkirim controller  = surat_keluar

    public function keluar()
    {
        $userId = 1;
        if (!Auth::guest()) {
            $userId = \Auth::user()->id;
        }

        $suratTerkirims = Disposisi::latest()->where('id_pengirim', $userId)->paginate(10);

        $jumlahSuratKirim = count(Disposisi::where('id_pengirim', $userId)->get());

        $users = User::get();
        return view('page.disposisi-keluar', compact('suratTerkirims', 'jumlahSuratKirim', 'users'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function masuk()
    {
        $userId = 1;
        if (!Auth::guest()) {
            $userId = \Auth::user()->id;
        }
        $suratDiterimas = Disposisi::latest()->whereRaw("find_in_set('$userId',id_tujuan)")->paginate(10);
        $jumlahSuratDiterima = count(Disposisi::whereRaw("find_in_set('$userId',id_tujuan)")->get());
        $jumlahSuratSudahDibaca = count(Disposisi::whereRaw("find_in_set('$userId',dibaca)")->get());
        $jumlahSuratBelumDibaca = $jumlahSuratDiterima - $jumlahSuratSudahDibaca;

        $users = User::get();
        return view('page.disposisi-masuk', compact('suratDiterimas', 'jumlahSuratBelumDibaca', 'jumlahSuratDiterima', 'users'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function form()
    {
        $users = User::get();

        return view('page.input-disposisi', compact('users', ));
    }

    public function report(Request $request)
    {
        $timezone = new DateTimeZone('Asia/Jakarta');
        $date = new DateTime();
        $date->setTimeZone($timezone);
        $path = null;
// dd($request);
        // $request->validate([
        //     'file_surat' => 'required|mimetypes:application/pdf|max:10000'
        // ]);

        // if ($request->hasFile('file_surat')) {
        //     $filenameWithExt = $request->file('file_surat')->getClientOriginalName();
        //     $filename = strtolower(preg_replace('_ +_', '-', pathinfo($filenameWithExt, PATHINFO_FILENAME)));
        //     $extension = $request->file('file_surat')->getClientOriginalExtension();
        //     $fileNameToStore = $filename . '-' . time() . '.' . $extension;
        //     $path = $request->file('file_surat')->storeAs('surat', $fileNameToStore);
        //     $request->file('file_surat')->move('surat/', $path);

        // }

        $tujuan = (array) $request->input('id_tujuan');
        $aksi = (array) $request->input('id_aksi');
        Disposisi::create([
            'id_pengirim' => \Auth::user()->id,
            'id_tujuan' => implode(',', $tujuan),
            'no_agenda' => $request->nomor_agenda,
            'tanggal_2' => $request->tanggal_2,
            'no_surat' => $request->nomor,
            'terima_dari' => $request->terima_dari,
            'diteruskan' => $request->diteruskan,
            'tanggal' => $date->format('Y-m-d'),
            'perihal_surat' => $request->perihal_surat,
            'dibaca' => null,
            'aksi' => implode(',', $aksi),
            'catatan' => $request->disposisi_catatan,
            'file_surat' => null,
            'menggetahui' => null,
            'kasetum' => $request->kasetum,
            'kasubbagminu' => $request->Kasubbagminu,
            'kaur_tu' => $request->kaur_tu,
            'kasetum_kembali' => $request->kasetum_kembali,
            'kasubbagminu_kembali' => $request->Kasubbagminu_kembali,
            'kaur_tu_kembali' => $request->kaur_tu_kembali,

            // 'id_unit' =>  $request->id_unit,
            // 'disposisi' => null,
            // 'file_surat' => $path,
            // 'password' => bcrypt($request->password),

        ]);

        return redirect()->route('kirim_disposisi')
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
            $content = Disposisi::findOrFail($request->id_surat);
            $status = explode(",", $request->dibaca);
            if ($userId != $content->id_pengirim) {
                if (!in_array($userId, $status)) {
                    array_push($status, $userId);
                    $content->dibaca = implode(",", $status);
                    $content->save();
                }
            }
        }

        return redirect()->route('disposisi_masuk');

    }

}
