<?php

namespace App\Http\Controllers;

use App\Models\Classs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classs::all();
            // dd($categories);
            return view('classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Classs::create($request->only(['name', 'description']));
            // dd($request);
            return redirect()->route('classes.index')->with('success', 'Create Class success');;
        } catch (\Exception $e) {
            //throw $th;
            Log::error($e->getMessage());
            return back()->with('error', 'Create Class failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Classs $class)
    {
        return view('classes.show', ['class' => $class]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Classs $class)
    {
        return view('classes.edit', ['class' => $class]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classs $class)
    {
        try {
            $class->update($request->only(['name', 'description']));
            // dd($class);
            return redirect()->route('classes.index')->with('success', 'Update category success');;
        } catch (\Exception $e) {
            //throw $th;
            Log::error($e->getMessage());
            return back()->with('error', 'Update category failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classs $class)
    {
        try {
            $class->delete();
            return redirect()->route('classes.index')->with('success', 'Delete category success');;
        } catch (\Exception $e) {
            //throw $th;
            Log::error($e->getMessage());
            return back()->with('error', 'Delete category failed');
        }
    }
}
