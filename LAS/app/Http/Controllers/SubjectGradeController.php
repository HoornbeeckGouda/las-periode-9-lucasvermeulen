<?php

namespace App\Http\Controllers;

use App\Models\SubjectGrade;
use App\Http\Requests\StoreSubjectGradeRequest;
use App\Http\Requests\UpdateSubjectGradeRequest;
use App\Models\Subject;
use App\Models\Career;



class SubjectGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        $careers = Career::all();
        return view('subjectGrade.create', ['subjects' => $subjects, 'careers' => $careers]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectGradeRequest $request)
    {
        $subjectIds = $request->input('subject_ids');
        $inputSubject = $request->input('input_subject');
        for($i = 0; $i < count($subjectIds); $i++){ {
            SubjectGrade::create([
                'career_id' => $request->career_id,
                'subject_id' => $subjectIds[$i],
                'grade' => $inputSubject[$i]
            ]);
        }}
        return redirect('dashboard');
        }

    /**
     * Display the specified resource.
     */
    public function show(SubjectGrade $subjectGrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubjectGrade $subjectGrade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectGradeRequest $request, SubjectGrade $subjectGrade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubjectGrade $subjectGrade)
    {
        //
    }
}
