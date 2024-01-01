<?php

namespace App\Http\Controllers;

use App\User;
use App\Ruangan;
use App\InventoryAC;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InventoryACController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = InventoryAC::paginate(5);
        return view('inventory_ac.list', [
            'title' => 'AC Inventory',
            'items' => $items
        ]);
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
        $ruangan = Ruangan::all();
        return view('inventory_ac.create', [
            'title' => 'Add new data',
            'ruangan'=> $ruangan
        ]);
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
        // parse carbon date
        $request->pengadaan = \Carbon\Carbon::parse($request->pengadaan)->format('Y-m-d');
        $request->produksi = \Carbon\Carbon::parse($request->produksi)->format('Y-m-d');
        InventoryAC::create([
            'id_ruangans' => $request->id_ruangans,
            'status' => $request->status,
            'type' => $request->jenis,
            'pk' => $request->pk,
            'production_year' => $request->produksi,
            'bought_year' => $request->pengadaan,
            'author' => $request->author,
        ]);

        return redirect()->route('inventory_ac.index')->with('message', 'Data added successfully!');
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
    public function edit($item)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $itemData = InventoryAC::findOrFail($item);
        $ruangan = Ruangan::all();
        return view('inventory_ac.edit', [
            'title' => $itemData->ruangans->nama_ruangan . ' - Edit data',
            'item' => $itemData,
            'ruangan' => $ruangan,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $itemId)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        // get item data
        $item = InventoryAC::findOrFail($itemId);
        // update item data
        $item->update([
            'id_ruangans' => $request->id_ruangans,
            'status' => $request->status,
            'type' => $request->jenis,
            'pk' => $request->pk,
            'production_year' => $request->produksi,
            'bought_year' => $request->pengadaan,
            'author' => $request->author,
        ]);

        return redirect()->route('inventory_ac.index')->with('message', 'Data updated successfully!');
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
        $inventoryac = InventoryAC::find($id);

        $inventoryac->delete();

        return redirect()->route('inventory_ac.index')->with('message', 'Data deleted successfully!');
    }

    public function cetak_pdf()
    {
    	$inventoryac = InventoryAC::all();
        // dd($ruangan);
    	$pdf = PDF::loadview('inventory_ac.inventoryac_pdf',['inventoryac'=>$inventoryac]);
    	return $pdf->download('laporan-inventoryac-pdf.pdf');
    }
}
