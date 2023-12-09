<?php

namespace App\Http\Controllers;

use App\Models\Studijneprogramy;
use Illuminate\Http\Request;

class StudijneprogramyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Studijneprogramy::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StudijneprogramyController $studijneprogramy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudijneprogramyController $studijneprogramy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudijneprogramyController $studijneprogramy)
    {
        //
    }
}
