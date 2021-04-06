<?php

namespace App\Http\Controllers;

use App\SlotDate;
use Illuminate\Http\Request;

class SlotDatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\SlotDate  $slotDate
     * @return \Illuminate\Http\Response
     */
    public function show(SlotDate $slotDate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SlotDate  $slotDate
     * @return \Illuminate\Http\Response
     */
    public function edit(SlotDate $slotDate)
    {
        dd($slotDate->date);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SlotDate  $slotDate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SlotDate $slotDate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SlotDate  $slotDate
     * @return \Illuminate\Http\Response
     */
    public function destroy(SlotDate $slotDate)
    {
        //
    }
}
