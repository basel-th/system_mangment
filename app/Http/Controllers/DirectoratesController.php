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
               $directorates = Directorates::create($input);
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
    public function edit($id)
    {
        $directorate = Directorates::find($id);
      return view('directorates.edit',compact('directorate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required',
            ]);
            $input = $request->all();
            $directorate = Directorates::find($id);
            $directorate->update($input);
            return redirect()->route('directorates.index')
            ->with('success','تم تحديث معلومات مديرية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Directorates $directorates)
    {
        //
    }
}
