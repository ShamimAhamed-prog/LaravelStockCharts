<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Instrument;
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $start_date = Carbon::parse($request->start_date)
            ->toDateTimeString();

        $end_date = Carbon::parse($request->end_date)
            ->toDateTimeString();
    
        // $datadate = DB::table('index_values')
        //     ->join('instruments', 'instruments.id','=','index_values.instrument_id')
        //     ->select('index_values.*','instruments.name')
        //     ->whereBetween('index_date', [$start_date, $end_date])
        //     ->where('instrument_id', $request->instrument)
        //     ->get();

            $datadate = Stock::with('instrument')
            ->whereBetween('index_date', [$start_date, $end_date])
            ->where('instrument_id', $request->instrument)
            ->get();

 
            // $datadate = Stock::join('instruments', 'instruments.id','=','index_values.instrument_id')
            // ->select('index_values.*','instruments.name')
            // ->whereBetween('index_date', [$start_date, $end_date])
            // ->where('instrument_id', $request->instrument)
            // ->get();


        // $datadate = Stock::whereBetween('index_date', [$start_date, $end_date])
        //      ->join('instruments', 'index_values.instrument_id', '=', 'instruments.name')
        //      ->where('instrument_id', $request->instrument)
        //      ->select('id', 'market_id', 'instrument_id', 'capital_value', 'deviation', 'date_time', 'index_date')
        //      ->get();
        return response()->json($datadate);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
