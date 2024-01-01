<?php

namespace App\Http\Controllers;

use PDF;
use App\Ruangan;
use App\PengajuanBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  PengajuanBarang::paginate(5);
        return view('pengajuanbarang.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        return view('pengajuanbarang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $data = PengajuanBarang::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotobarang/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pengajuanbarang.index')->with('message', 'Data added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(PengajuanBarang $pengajuanBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $data = PengajuanBarang::find($id);
        return view('pengajuanbarang.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $data = PengajuanBarang::find($id);
        $data->update($request->all());

        if($request->hasFile('foto')){
            $request->file('foto')->move('fotobarang/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pengajuanbarang.index')->with('message', 'Data Updated successsfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $data = PengajuanBarang::find($id);
        $data->delete();
        return redirect()->route('pengajuanbarang.index')->with('message', 'ruangan deleted dsuccesssfully');
    }

    public function cetak_pdf()
    {
    	$data = PengajuanBarang::all();
        // dd($ruangan);
    	$pdf = PDF::loadview('pengajuanbarang.pengajuanbarang_pdf',['data'=>$data])->setPaper('a4', 'landscape');
    	return $pdf->download('laporan-pengajuan-barang-pdf.pdf');


    //     $pdf = PDF::loadView('pdf.test_pdf')->setPaper('a4', 'landscape');
    // return $pdf->stream('test_pdf.pdf');
    }
}
