<?php

namespace App\Http\Controllers;

use PDF;
use App\Ruangan;
use App\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data =  Inventory::paginate(5);

        $data =  Inventory::whereHas('ruangans', function ($query) {
        $query->where('kategori','=','ruangan'); })->paginate(5);
        return view('inventaris_ruangan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $ruangan = Ruangan::where('kategori','ruangan')->get();
        return view('inventaris_ruangan.create', [
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
        Inventory::create($data);

        return redirect()->route('inventory.index')->with('message', 'Data added successfully!');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
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
        $data = Inventory::find($id);

        // dd($data);
       
        $ruangan = Ruangan::where('kategori','ruangan')->get();

        return view('inventaris_ruangan.edit',compact('data','ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $data = Inventory::find($id);
        $data->update($request->all());
        return redirect()->route('inventory.index')->with('message', 'Data Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $data = Inventory::find($id);
        $data->delete();
        return redirect()->route('inventory.index')->with('message', 'ruangan deleted dsuccesssfully');
    }

    public function cetak_pdf()
    {
    	$inventory = Inventory::whereHas('ruangans', function ($query) {
        $query->where('kategori','=','ruangan'); })->get();
    	$pdf = PDF::loadview('inventaris_ruangan.inventory_pdf',['inventory'=>$inventory]);
    	return $pdf->download('laporan-inventory-pdf.pdf');
    }
}
