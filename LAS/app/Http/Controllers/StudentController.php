<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'initials' => 'required',
                'officielename' => 'required',
                'postcode' => 'required',
                'streat' => 'required',
                'housenumber' => 'required',
                'city' => 'required',
            ]
        );
        Student::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'initials' => $request->initials,
            'officielename' => $request->officielename,
            'postcode' => $request->postcode,
            'streat' => $request->streat,
            'housenumber' => $request->housenumber,
            'addition' => $request->addition ?? '',
            'city' => $request->city,
        ]);
        $students = Student::all();
        return view('student.index', ['students' => $students]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student = student::find($student->id);
        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $student = student::find($student->id);
        return view('student.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'initials' => 'required',
                'officielename' => 'required',
                'postcode' => 'required',
                'streat' => 'required',
                'housenumber' => 'required',
                'city' => 'required',
            ]
        );
        $student->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'initials' => $request->initials,
            'officielename' => $request->officielename,
            'postcode' => $request->postcode,
            'streat' => $request->streat,
            'housenumber' => $request->housenumber,
            'addition' => $request->addition ?? '',
            'city' => $request->city,
        ]);
        $students = Student::all();
        return view('student.index' , ['students' => $students]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
