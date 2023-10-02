<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
 
    public function index()
    {
        $daftars = Daftar::latest()->paginate(5);
return view('daftars.index',compact('daftars'))
->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        return view('daftars.create');

    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'ttl' => 'required',
            'alamat' => 'required', 
            'agama' => 'required',
            'status' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',
            ]);
            Daftar::create($request->all());
            return redirect()->route('daftars.index')
            ->with('success','daftar created successfully.');
            
    }

  
    public function show(Daftar $daftar)
    {
        //
    }

  
    public function edit(Daftar $daftar)
    {
        //
    }


    public function update(Request $request, Daftar $daftar)
    {
        //
    }

    public function destroy(Daftar $daftar)
    {
        $daftar->delete();
        return redirect()->route('daftars.index')
        ->with('success','daftar deleted successfully');
        
    }
}
