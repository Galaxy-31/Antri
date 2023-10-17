<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Http\Controllers\Controller;
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
        {
        $daftars = Daftar::latest()->paginate(5);
        return view('daftars.index',compact('daftars'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('daftars.create');
           
            
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik'=> 'required',
            'nama'=> 'required',
            'tmpt_lhr'=> 'required',
            'tgl_lhir'=> 'required',
            'jenkel'=> 'required',
            'goldarah'=> 'required',
            'alamat'=> 'required',
            'agama'=> 'required',
            'status'=> 'required',
            'pekerjaan'=> 'required',
            'kewarga'=> 'required',
            ]);
            Daftar::create($request->all());
            return redirect()->route('daftars.index')
            ->with('success','daftar created successfully.');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function show(Daftar $daftar)
    {
        return view('daftars.show',compact('daftar'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Daftar $daftar)
    {
        $request->validate([
            'nik'=> 'required',
            'nama'=> 'required',
            'tmpt_lhr'=> 'required',
            'tgl_lhir'=> 'required',
            'jenkel'=> 'required',
            'goldarah'=> 'required',
            'alamat'=> 'required',
            'agama'=> 'required',
            'status'=> 'required',
            'pekerjaan'=> 'required',
            'kewarga'=> 'required',
            ]);
            $daftar->update($request->all());
            return redirect()->route('daftars.index')
            ->with('success','daftar updated successfully');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Daftar  $daftar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Daftar $daftar)
    {
        $daftar->delete();
        return redirect()->route('daftars.index')
        ->with('success','daftar deleted successfully');
        
    }
}
