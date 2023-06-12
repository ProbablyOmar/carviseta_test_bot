<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Appointment::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'appointmentDate'=> 'required',
            'carId'=> 'required',
            'userId' => 'required'
        ]);
        return Appointment::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Appointment::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $appointment = Appointment::find($id);
        $appointment->update($request->all());
        return $appointment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Appointment::destroy($id);
    }

    public function getAvailableAppointments($date)
    {
        $appointments = Appointment::where('appointmentDate', 'like', $date . '%' )->where('available', true)->get();
        $formatedAppointments = [];
        foreach($appointments as $appointment){
            array_push($formatedAppointments,['type'=>'text', 'text'=> $appointment->appointmentDate . ' ' . $appointment->appointmentTime]);
        }
        return ['version'=>'v2', 'content'=> ['messages'=>$formatedAppointments]];
    }
}
