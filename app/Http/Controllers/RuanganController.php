<?php

namespace App\Http\Controllers;

use App\Ruangan;
// use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data =  Ruangan::paginate(5);
        return view('ruangan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        return view('ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $ruangan = new Ruangan();

        $ruangan->nama_ruangan =  $request->input('nama_ruangan');
        $ruangan->kategori =  $request->input('kategori');

        $ruangan->save();

        return redirect()->route('ruangan.index')->with('message', 'ruangan added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $ruangan = Ruangan::find($id);
        return view('ruangan.edit', compact('ruangan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $ruangan = Ruangan::find($id);

        $ruangan->nama_ruangan =  $request->input('nama_ruangan');
        $ruangan->kategori =  $request->input('kategori');

        $ruangan->save();

        return redirect()->route('ruangan.index')->with('message', "ruangan updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $ruangan = Ruangan::find($id);

        $ruangan->delete();
        return redirect()->route('ruangan.index')->with('message', 'ruangan deleted dsuccesssfully');

    }

    public function cetak_pdf()
    {
    	$ruangan = Ruangan::all();
        // dd($ruangan);
    	$pdf = PDF::loadview('ruangan.ruangan_pdf',['ruangan'=>$ruangan]);
    	return $pdf->download('laporan-ruangan-pdf.pdf');
    }
}
