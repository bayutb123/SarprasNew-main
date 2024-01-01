<?php

namespace App\Http\Controllers;

use PDF;
use App\Ruangan;
use App\TindakLanjutSarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TindakLanjutSaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  TindakLanjutSarana::paginate(5);
        return view('tindaklanjutsarana.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $ruangan = Ruangan::all();
        return view('tindaklanjutsarana.create', [
            'ruangan'=> $ruangan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $data = $request->all();
        TindakLanjutSarana::create($data);

        return redirect()->route('tindaklanjutsarana.index')->with('message', 'Data added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TindakLanjutSarana $tindakLanjutSarana)
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
        $data = TindakLanjutSarana::find($id);
        $ruangan = Ruangan::all();

        return view('tindaklanjutsarana.edit',compact('data','ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $data = TindakLanjutSarana::find($id);
        $data->update($request->all());
        return redirect()->route('tindaklanjutsarana.index')->with('message', 'Data Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $Data = TindakLanjutSarana::find($id);
        $Data->delete();
        return redirect()->route('tindaklanjutsarana.index')->with('message', 'Data deleted dsuccesssfully');
    }

    public function cetak_pdf()
    {
    	$data = TindakLanjutSarana::all();
        // dd($ruangan);
    	$pdf = PDF::loadview('tindaklanjutsarana.tindaklanjutsarana_pdf',['data'=>$data])->setPaper('a4', 'landscape');
    	return $pdf->download('laporan-tindak-lanjut-sarana-pdf.pdf');


    //     $pdf = PDF::loadView('pdf.test_pdf')->setPaper('a4', 'landscape');
    // return $pdf->stream('test_pdf.pdf');
    }
}
