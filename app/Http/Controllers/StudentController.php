<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classs;
use App\Models\Student;
use Illuminate\Support\Facades\Log;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();;
        return view('students.index', compact('students'));
        // $postWithScope = Student::isAuthor()->get();
        // return view('students.index', ['students' => $postWithScope]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classs::get();
        return view('students.create', ['classes' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name'=>$request->last_name,      
            'age'=>$request->age,    
            'address'=>$request->address, 
        ];  
       
        // try {
            $student = Student::create($data);
            
            $student->classses()->sync( $request->input('classes', []));
             
            return redirect()->route('students.index')->with('success', 'Create student successfully');
        // } catch (\Exception $e) {
        //     //throw $th;
        //     Log::error($e->getMessage());
        //     return back()->with('error', 'Create post failed');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', ['student' => $student, 'classes' => Classs::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Student $student)
    {
        $data = [
            'first_name' => $request->first_name,
            'last_name'=>$request->last_name,
            'age'=>$request->age,
            'address'=>$request->address,
        ];
        try {
            $student->update($data);
            $student->classses()->sync( $request->input('classes', []));

            return redirect()->route('students.index')->with('success', 'Update post successfuly');
        } catch (\Exception $e) {
            throw $e;
            return back()->with('error', 'Update post failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        try {
            $student->delete();
            return redirect()->route('students.index')->with('success', 'Delete post successfuly');
        } catch (\Exception $e) {
            throw $e;
            return back()->with('error', 'Delete post failed');
        }
    }
}
