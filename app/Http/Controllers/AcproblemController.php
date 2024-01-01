<?php

namespace App\Http\Controllers;

use PDF;
use App\Ruangan;
use App\Acproblem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcproblemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  Acproblem::paginate(5);
        return view('kerusakan_ac.index', compact('data'));
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
        return view('kerusakan_ac.create', [
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
        Acproblem::create($data);

        return redirect()->route('acproblem.index')->with('message', 'Data added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Acproblem $acproblem)
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
        $data = Acproblem::find($id);
        $ruangan = Ruangan::all();

        return view('kerusakan_ac.edit',compact('data','ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $data = Acproblem::find($id);
        $data->update($request->all());
        return redirect()->route('acproblem.index')->with('message', 'Data Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $data = Acproblem::find($id);
        $data->delete();
        return redirect()->route('acproblem.index')->with('message', 'ruangan deleted dsuccesssfully');
    }

     public function cetak_pdf()
    {
    	$data = Acproblem::all();
        // dd($ruangan);
    	$pdf = PDF::loadview('kerusakan_ac.kerusakanac_pdf',['data'=>$data]);
    	return $pdf->download('laporan-kerusakan-ac-pdf.pdf');
    }
}
