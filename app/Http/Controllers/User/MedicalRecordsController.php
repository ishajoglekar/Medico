<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Medicalrecords;
use App\User;
use Illuminate\Http\Request;

class MedicalRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('user.dashboard.medical-records',compact(['user']));
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
        if($request->file('img')){
            $image=$request->file('img')->store('documents');
            auth()->user()->documents()->create([
                'name'=>$request->name,
                'location'=>$image
            ]);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicalrecords  $medicalrecords
     * @return \Illuminate\Http\Response
     */
    public function show(Medicalrecords $medicalrecords)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicalrecords  $medicalrecords
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicalrecords $medicalrecords)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicalrecords  $medicalrecords
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicalrecords $medicalrecords)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicalrecords  $medicalrecords
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicalrecords $medicalrecords)
    {
        dd($medicalrecords);
        $medicalrecords->delete();
        return redirect()->back();
    }
    public function updateData(Request $request){
        $document = Medicalrecords::find($request->document_id);
        $image = $document->location;
        if($request->file('img')){
            $image = $request->file('img')->store('document');
        }
        $document->update([
            'name'=>$request->name,
            'location'=>$image
        ]);
        return redirect()->back();
    }

    public function destroyDocument(Medicalrecords $medicalrecord)
    {
        $medicalrecord->delete();
        return redirect()->back();
    }
}
