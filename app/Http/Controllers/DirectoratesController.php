<?php

namespace App\Http\Controllers;

use App\Models\Directorates;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DirectoratesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directorates = Directorates::all();
        return view('directorates.index',compact('directorates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('directorates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            ]);
              $input = $request->all();
               $user = Directorates::create($input);
            return redirect()->route('directorates.index')
            ->with('success','تم اضافة مديرية بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Directorates $directorates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Directorates $directorates)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Directorates $directorates)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Directorates $directorates)
    {
        //
    }
}
