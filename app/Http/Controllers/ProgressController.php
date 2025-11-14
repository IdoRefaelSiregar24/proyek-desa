<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Tahapan;
use App\Models\Progress;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progress = Progress::all();
        $proyek = Proyek::first();

        return view('pages.progress.index', compact('progress', 'proyek'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyek = Proyek::all();
        $tahaoan = Tahapan::all();
        return view('pages.progress.create', [
            'proyek' => Proyek::all(),
            'tahapan' => Tahapan::all()
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
