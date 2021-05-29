<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Medicalrecords;
use App\User;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function addMedicalTestReport(Request $request){
        $user_id  = (int)$request->user_id;  
        $filename = $user_id."_".$request->testname;
        $file = $request->file('test_report');
        $file->storeAs('test_reports',$filename);
        
        $testReport = new Test();
        $testReport->user_id = $user_id;
        $testReport->filename = $filename;
        $testReport->save();

        DB::table('users_tests')->insert(['user_id'=>$user_id,'test_id'=> $testReport->id]);
        $user = auth()->user();

        $tests = DB::select("SELECT * FROM tests WHERE id in(select test_id from users_tests where user_id = {$user_id})");
        return redirect()->route('user.medicalReports')->with( ['user' => $user,'tests'=>$tests]);
    }
}
