<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Daftar;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $daftars = Daftar::latest()->paginate(5);
    return view('backend.daftars.index',compact('daftars'))
    ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
    return view('daftars.create');
    }


    public function store(Request $request)
    {
        \Validator::make( $request->all(),
        ['nik' => 'unique:daftar',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'tanggal' => 'before:-17 years',]
        ,['unique' => 'No NIK Tidak Boleh Sama',
        'image' => 'Format Gambar Salah',
        'before' => 'Umur Harus Lebih Dari 17 Tahun',])->validate();

        $daftar = new \App\Daftar;
        $daftar->nik =  $request->get('nik');
        $daftar->nama =  $request->get('nama');
        $daftar->tmpt_lhr =  $request->get('tempat');
        $daftar->tgl_lhir =  $request->get('tanggal');
        $daftar->jenkel =  $request->get('jenkel');
        $daftar->goldarah =  $request->get('goldarah');
        $daftar->alamat =  $request->get('alamat');
        $daftar->rt =  $request->get('rt');
        $daftar->rw =  $request->get('rw');
        $daftar->kel =  $request->get('kel');
        $daftar->kec =  $request->get('kec');
        $daftar->agama =  $request->get('agama');
        $daftar->status =  $request->get('kawin');
        $daftar->pekerjaan =  $request->get('pekerjaan');
        $daftar->kewarga =  $request->get('kewarga');
        $daftar->berlaku = date('Y-m-d', strtotime('+5 years'));

        if($request->file('image'))
        {
            $gambar = $request->file('image')->store('foto', 'public');

            $daftar->foto = $gambar;
        }

        $daftar->save();

        return redirect()->route('daftars.index')->with('status', 'Pendaftaran Berhasil Di Buat');
    }



    public function show($id)
    {
        $daftar = \App\Daftar::findOrFail($id);
        return view('daftars.show', ['daftar' => $daftar
    ]);
    }

    public function edit($id)
    {
        $daftar = \App\Daftar::findOrFail($id);
        return view('daftars.edit', ['daftar' => $daftar]);
    }

    public function update(Request $request, $id)
    {
        \Validator::make($request->all(),
        ['nik' => [Rule::unique('daftars')->ignore($id,'nik')],
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'tanggal' => 'before:-17 years',]
        ,['unique' => 'No NIK Tidak Boleh Sama',
        'image' => 'Format Gambar Salah',
        'before' => 'Umur Harus Lebih Dari 17 Tahun',])->validate();

        $daftar = \App\Daftar::findOrFail($id);

        if($request->get('hapus_gambar') == 1)
        {
            if($daftar->foto && file_exists(storage_path('app/public/' . $daftar->foto)))
            {
                \Storage::delete('public/' . $daftar->foto);
                $daftar->foto = NULL;
            }
        }

        $daftar->nik =  $request->get('nik');
        $daftar->nama =  $request->get('nama');
        $daftar->tmpt_lhr =  $request->get('tempat');
        $daftar->tgl_lhir =  $request->get('tanggal');
        $daftar->jenkel =  $request->get('jenkel');
        $daftar->goldarah =  $request->get('goldarah');
        $daftar->alamat =  $request->get('alamat');
        $daftar->rt =  $request->get('rt');
        $daftar->rw =  $request->get('rw');
        $daftar->kel =  $request->get('kel');
        $daftar->kec =  $request->get('kec');
        $daftar->agama =  $request->get('agama');
        $daftar->status =  $request->get('kawin');
        $daftar->pekerjaan =  $request->get('pekerjaan');
        $daftar->kewarga =  $request->get('kewarga');

        if($request->file('image'))
        {
            if($daftar->foto && file_exists(storage_path('app/public/' . $daftar->foto)))
            {
                \Storage::delete('public/' . $daftar->foto);
            }
            $gambar = $request->file('image')->store('foto', 'public');
            $daftar->foto = $gambar;
        }

        $daftar->save();

        return redirect()->route('daftars.index')->with('status', 'pendaftaran Berhasil Di Ubah');
    }


    public function destroy($id)
    {
        $daftar = \App\Daftar::findOrFail($id);

        if($daftar->foto && file_exists(storage_path('app/public/' . $daftar->foto)))
        {
            \Storage::delete('public/' . $daftar->foto);
        }
        $daftar->delete();
        return redirect()->route('daftars.index')->with('status', 'daftar Berhasil Di Hapus');

    }
}
