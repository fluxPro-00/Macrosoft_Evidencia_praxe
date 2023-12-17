<?php

namespace App\Http\Controllers;

use App\Models\Studijneprogramy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
    public function show($id)
    {
        return Studijneprogramy::find($id);
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
