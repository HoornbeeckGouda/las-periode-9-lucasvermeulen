<?php

namespace App\Http\Controllers;

use App\Models\CareerSubject;
use App\Http\Requests\StoreCareerSubjectRequest;
use App\Http\Requests\UpdateCareerSubjectRequest;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Group;
use App\Models\SubjectGrade;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('career-subject.create');    
    }
    public function studentAddSubject($student)
    {
        $student = Student::find($student);
        $subjects = Subject::all();
        return view('career-subject.studentAddSubject', ['student' => $student, 'subjects' => $subjects]);    
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCareerSubjectRequest $request)
    {
        $allSubjectsCareer = CareerSubject::where('career_id', $request->career_id)->get()->pluck('subject_id')->toArray();
        $newsubjects =  array_diff ( $request->subject_id, $allSubjectsCareer   );
        foreach($newsubjects as $subject){
            CareerSubject::create([
                'career_id' => $request->career_id,
                'subject_id' => $subject,
            ]);
        }
        
        $student = Student::find($request->student_id);
        $subjects = Subject::all();
        $careers = $student->careers()->get();
        $subjectGrades = SubjectGrade::where('career_id', $student->careers()->get()->last()->id)->get();
        $careerSubjects = $student->careers()->get()->last()->careerSubjects()->get();
        // return view('career-subject.studentAddSubject', ['student' => $student, 'subjects' => $subjects]);    
        return view('student.show', [
            'student' => $student, 
            'careers' => $careers,
            'subjectGrades' => $subjectGrades,
            'careerSubjects' => $careerSubjects,
        ]);       
    }



    public function groupAddSubject($group)
    {
        $group = Group::find($group);
        $subjects = Subject::all();
        return view('career-subject.groupAddSubject', ['group' => $group, 'subjects' => $subjects]);    
    }
    public function groupStore(Request $request)
    {
        $studentsINGroup = Career::where('group_id', $request->group_id)
    ->orderBy('student_id')
    ->orderByDesc('created_at')
    ->get()
    ->unique('student_id');   
        foreach ($studentsINGroup as $career) {
            $allSubjectsCareer = CareerSubject::where('career_id', $career->id)->get();
            $newsubjects =  array_diff ( $request->subject_id, $allSubjectsCareer->pluck('subject_id')->toArray());
            foreach($newsubjects as $subject){
                CareerSubject::create([
                    'career_id' => $career->id,
                    'subject_id' => $subject,
                ]);
            }
        }

        
        $student = Student::find($request->student_id);
        $subjects = Subject::all();
    
        return view('dashboard');          
    }

    /**
     * Display the specified resource.
     */
    public function show(CareerSubject $careerSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CareerSubject $careerSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareerSubjectRequest $request, CareerSubject $careerSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CareerSubject $careerSubject)
    {
        //
    }
}
