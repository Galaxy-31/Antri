<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $pendaftarans = Pendaftaran::all();
    return view('backend.pendaftaran.index',compact('pendaftarans'))->with('$   i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
    return view('pendaftarans.create');
    }


    public function store(Request $request)
    {
        \Validator::make( $request->all(),
        ['nik' => 'unique:pendaftaran',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'tanggal' => 'before:-17 years',]
        ,['unique' => 'No NIK Tidak Boleh Sama',
        'image' => 'Format Gambar Salah',
        'before' => 'Umur Harus Lebih Dari 17 Tahun',])->validate();

        $pendaftaran = new \App\Pendaftaran;
        $pendaftaran->nik =  $request->get('nik');
        $pendaftaran->nama =  $request->get('nama');
        $pendaftaran->tmpt_lhr =  $request->get('tempat');
        $pendaftaran->tgl_lhir =  $request->get('tanggal');
        $pendaftaran->jenkel =  $request->get('jenkel');
        $pendaftaran->goldarah =  $request->get('goldarah');
        $pendaftaran->alamat =  $request->get('alamat');
        $pendaftaran->rt =  $request->get('rt');
        $pendaftaran->rw =  $request->get('rw');
        $pendaftaran->kel =  $request->get('kel');
        $pendaftaran->kec =  $request->get('kec');
        $pendaftaran->agama =  $request->get('agama');
        $pendaftaran->status =  $request->get('kawin');
        $pendaftaran->pekerjaan =  $request->get('pekerjaan');
        $pendaftaran->kewarga =  $request->get('kewarga');
        $pendaftaran->berlaku = date('Y-m-d', strtotime('+5 years'));

        if($request->file('image'))
        {
            $gambar = $request->file('image')->store('foto', 'public');

            $pendaftaran->foto = $gambar;
        }

        $pendaftaran->save();

        return redirect()->route('pendaftarans.index')->with('status', 'Pendaftaran Berhasil Di Buat');
    }



    public function show($id)
    {
        $pendaftaran = \App\Pendaftaran::findOrFail($id);
        return view('pendaftarans.show', ['pedaftaran' => $pendaftaran
    ]);
    }

    public function edit($id)
    {
        $pendaftaran = \App\Pendaftaran::findOrFail($id);
        return view('pendaftarans.edit', ['pendaftaran' => $pendaftaran]);
    }

    public function update(Request $request, $id)
    {
        \Validator::make($request->all(),
        ['nik' => [Rule::unique('pendaftarans')->ignore($id,'nik')],
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'tanggal' => 'before:-17 years',]
        ,['unique' => 'No NIK Tidak Boleh Sama',
        'image' => 'Format Gambar Salah',
        'before' => 'Umur Harus Lebih Dari 17 Tahun',])->validate();

        $pendaftaran = \App\Pendaftaran::findOrFail($id);

        if($request->get('hapus_gambar') == 1)
        {
            if($pendaftaran->foto && file_exists(storage_path('app/public/' . $pendaftaran->foto)))
            {
                \Storage::delete('public/' . $pendaftaran->foto);
                $pendaftaran->foto = NULL;
            }
        }

        $pendaftaran->nik =  $request->get('nik');
        $pendaftaran->nama =  $request->get('nama');
        $pendaftaran->tmpt_lhr =  $request->get('tempat');
        $pendaftaran->tgl_lhir =  $request->get('tanggal');
        $pendaftaran->jenkel =  $request->get('jenkel');
        $pendaftaran->goldarah =  $request->get('goldarah');
        $pendaftaran->alamat =  $request->get('alamat');
        $pendaftaran->rt =  $request->get('rt');
        $pendaftaran->rw =  $request->get('rw');
        $pendaftaran->kel =  $request->get('kel');
        $pendaftaran->kec =  $request->get('kec');
        $pendaftaran->agama =  $request->get('agama');
        $pendaftaran->status =  $request->get('kawin');
        $pendaftaran->pekerjaan =  $request->get('pekerjaan');
        $pendaftaran->kewarga =  $request->get('kewarga');

        if($request->file('image'))
        {
            if($pendaftaran->foto && file_exists(storage_path('app/public/' . $pendaftaran->foto)))
            {
                \Storage::delete('public/' . $pendaftaran->foto);
            }
            $gambar = $request->file('image')->store('foto', 'public');
            $pendaftaran->foto = $gambar;
        }

        $pendaftaran->save();

        return redirect()->route('pendaftarans.index')->with('status', 'pendaftaran Berhasil Di Ubah');
    }


    public function destroy($id)
    {
        $pendaftaran = \App\Pendaftaran::findOrFail($id);

        if($pendaftaran->foto && file_exists(storage_path('app/public/' . $pendaftaran->foto)))
        {
            \Storage::delete('public/' . $pendaftaran->foto);
        }
        $pendaftaran->delete();
        return redirect()->route('pendaftarans.index')->with('status', 'pen$pendaftaran Berhasil Di Hapus');

    }
}
