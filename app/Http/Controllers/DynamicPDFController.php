<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Doctor;
use App\Events\NotificationEvent;
use App\Notification_type;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use PDF;

class DynamicPDFController extends Controller
{


    function generatePdf(Request $request, Appointment $appointment)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html($request->medicines, $request->tests, $request->name));
        $fn = 'pdf/' . $request->name . '_' . now()->timestamp . '.pdf';
        Storage::put($fn, $pdf->output());
        $appointment->update([
            'report_pdf' => $fn
        ]);

        // dd(Notification_type::all());
        $type = Notification_type::where("name", "prescription")->first();
        // dd($type);
        if (!$type) {
            $notification = $type->notifications()->create([
                'from' => auth()->id(),
                'to' => $appointment->user->id,
                'read' => "0",
            ]);
        }

        $app = [];
        $app[] = $appointment->user->id;
        $app[] = $type;
        $app[] = " by " . $appointment->doctor->fullname;
        event(new NotificationEvent($app));

        return redirect(route('appointments.index'));
    }

    function convert_customer_data_to_html($medicines, $tests, $name)
    {
        $image = asset('assets/images/logo/practo.svg');
        $doctor = Doctor::where('email', auth()->user()->email)->first();
        // dd($doctor);
        $output = '
     <style>
        body{
            font-family:Poppins,sans-serif;
        }
     </style>
     <div class="header">
    <h1 style="font-size: 2.7rem; color:darkblue;text-align:center">' . $doctor->establishment_name . '</h1>
    <hr>
    <div>
        <span>
            <h2>' . auth()->user()->name . '</h2>
            <h3>Doctor</h3>
            <h5>' . auth()->user()->phone_no . '</h5>
        </span>
        <span>
        <div style="text-align:right">Patient\'s Name : ' . $name . '</div> <br>
            <div style="text-align:right">Prescription No: 1234</div> <br>
            <div style="text-align:right">Date : ' . date("F j Y, g:i a", strtotime(now())) . '</div>
        </span>
    </div>
    <br><br>
    <hr>
    <div class="medicines" style="white-space: pre-wrap;">
        <h2>Medicines</h2><p style="color:#333">' . $medicines . '</p></div>
    <hr>
    <div class="tests" style="white-space: pre-wrap;">
    <h2>Tests</h2><p style="color:#333">' . $tests . '</p></div>
</div>
';

        return $output;
    }
}
