<?php

namespace App\Http\Controllers;

use App\Models\car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return car::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'manufacturer'=> 'required',
            'model' => 'required',
            'year' => 'required'
        ]);
        return car::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return car::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = car::find($id);
        $car->update($request->all());
        return $car;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return car::destroy($id);
    }
}
