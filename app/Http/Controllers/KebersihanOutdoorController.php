<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\InventoryAC;
use App\OutdoorCleanStatus;
use App\OutdoorCleanPeriod;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class KebersihanOutdoorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get period
        $period = OutdoorCleanPeriod::orderBy('created_at', 'asc')->get();
        return view('kebersihan_outdoor.list', [
            'title' => 'Laporan Kebersihan Luar Ruangan',
            'items' => $period
        ]);
    }

    public function iperiod($id)
    {
        // get status of period
        $period = OutdoorCleanPeriod::findOrFail($id);
        // get items, when null retuirn empty array
        $items = OutdoorCleanStatus::where('period_id', $id)->paginate(5);

        // format date d-m-Y use Carbon
        foreach ($items as $item) {
            if ($item->statusw1date != null) {
                $item->statusw1date = \Carbon\Carbon::parse($item->statusw1date)->format('d-m-Y');
            }
            if ($item->statusw2date != null) {
                $item->statusw2date = \Carbon\Carbon::parse($item->statusw2date)->format('d-m-Y');
            }
            if ($item->statusw3date != null) {
                $item->statusw3date = \Carbon\Carbon::parse($item->statusw3date)->format('d-m-Y');
            }
            if ($item->statusw4date != null) {
                $item->statusw4date = \Carbon\Carbon::parse($item->statusw4date)->format('d-m-Y');
            }
        }
        return view('kebersihan_outdoor.list_period', [
            'title' => 'KEBERSIHAN LUAR RUANGAN BULANAN',
            'period' => $period,
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
        // create list of year
        $years = [];
        // add year from 1980 to current year + 5
        for ($i = 2000; $i <= date('Y'); $i++) {
            $years[$i] = $i;
        }
        // reverse array
        $years = array_reverse($years, true);
        return view('kebersihan_outdoor.create', [
            'title' => 'Add new period',
            'years' => $years
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cperiod($id)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        return view('kebersihan_outdoor.create_period', [
            'title' => 'Add new',
            'id' => $id,
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
        $period = OutdoorCleanPeriod::create([
            'year' => $request->year,
            'month' => $request->month,
            'author' => $request->author,
        ]);

        return redirect()->route('kebersihan_outdoor.index')->with('message', 'Data added successfully!');
    }

    public function speriod(Request $request)
    {
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $status = OutdoorCleanStatus::create([
            'name' => $request->keterangan,
            'statusw1' => $request->keadaan1,
            'statusw2' => $request->keadaan2,
            'statusw3' => $request->keadaan3,
            'statusw4' => $request->keadaan4,
            'statusw1date' => $request->tanggal1,
            'statusw2date' => $request->tanggal2,
            'statusw3date' => $request->tanggal3,
            'statusw4date' => $request->tanggal4,
            'author' => $request->author,
            'period_id' => $request->period_id,
        ]);

        return redirect()->route('kebersihan_outdoor.period', ['id' => $request->period_id])->with('message', 'Data added successfully!');
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
        return view('kebersihan_outdoor.edit', [
            'title' => $itemData->ruangan . ' - Edit data',
            'item' => $itemData
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
        $data = OutdoorCleanStatus::find($itemId);
        $data->update($request->all());
        return redirect()->route('kebersihan_outdoor.period', ['id' => $request->period_id])->with('message', 'Data added successfully!');
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
        $data = OutdoorCleanStatus::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Data deleted successsfully');
    }

    public function perioedit($id){
        if(Auth::user()->role != 'admin'){
            return view('hakakses');
        }
        $data = OutdoorCleanStatus::find($id);

        // dd($data);
        return view('kebersihan_outdoor.edit_period', [
            'data' => $data,
        ]);
    }

     public function cetak_pdf()
    {
    	$items = OutdoorCleanStatus::all();
        // dd($kebersihan);
    	$pdf = PDF::loadview('kebersihan_outdoor.kebersihanoutdoor_pdf',['items'=>$items])->setPaper('a4', 'landscape');
    	return $pdf->download('laporan-kebersihan-pdf.pdf');
    }
}

