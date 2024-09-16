<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\SetupCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
use App\Models\Course;
use App\Models\Group;
use App\Models\SchoolYear;
use App\Models\Student;
use GuzzleHttp\Psr7\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
         $careers = Career::all();   
       return view('career.index', ['careers' => $careers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $school_years = SchoolYear::all();
        $groups = Group::all();
        $courses = Course::all();
        $students = Student::all();
        return view('career.create', ['school_years' => $school_years, 'groups' => $groups, 'courses' => $courses, 'students' => $students]);
    }
    /**
     * create a new career with known student.
     */
    public function pickCareer(Student $student)
    {
        $courses = Course::all();
        $students = Student::all();
        return view('career.pickCareer', [
            'courses' => $courses,
            'students' => $students,
            'selectedStudent'   => $student
        ]);
    }
    /**
     * create a new career with known student.
     */
    public function setupCareer(SetupCareerRequest $request)
    {
        $course_id = $request->course_id;
        $student_id = $request->student_id;
        $AmountSchoolYears = Group::where('course_id', $request->course_id)->count();
        $groups = Group::where('course_id', $request->course_id)->get();
        $students = Student::all();
        return view('career.setupCareer', [
            'course_id' => $course_id,
            'student_id' => $student_id,
            'AmountSchoolYears' => $AmountSchoolYears,
            'groups' => $groups,
            'students' => $students,
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCareerRequest $request)
    {
        $olderCareer = Career::where('student_id', $request->student_id)->latest()->update(['endDate'=>now()]);

        Career::create([
            'schoolYear_id' => $request->schoolYear_id,
            'group_id' => $request->group_id,
            'course_id' => $request->course_id,
            'student_id' => $request->student_id,
            'startDate' => now(),
            'endDate' => null,
        ]);
        return redirect()->route('careers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareerRequest $request, Career $career)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        //
    }
}
