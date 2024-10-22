<?php

namespace App\Http\Controllers;

use App\Models\SubjectGrade;
use App\Http\Requests\StoreSubjectGradeRequest;
use App\Http\Requests\UpdateSubjectGradeRequest;
use App\Models\Subject;
use App\Models\Career;
use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class SubjectGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $groups = Group::all();
        return view('subjectGrade.index', ['students' => $students, 'groups' => $groups]);
    }
    public function search(Request $request)
    {
        if(isset($request->search)){
            $students = Student::
            where('firstname', $request->search)
            ->orWhere('firstname', 'like', '%' . $request->search . '%')
            ->orWhere('lastname', 'like', '%' . $request->search . '%')
            ->get();
            $groups = Group::where('name', 'like', '%' . $request->search . '%')->get();
        }else{
            $students = Student::all();
            $groups = Group::all();
        }
        return view('subjectGrade.index', ['students' => $students, 'groups' => $groups, 'search'=> $request->search]);
    }

    //group grade
    public function groupGrade($groupId)
    {
        // Fetch the group using the provided ID
        $group = Group::findOrFail($groupId); // This will throw a 404 if not found
        $careers = Career::with('student')->where('group_id', $groupId)->get();
        
        return view('subjectGrade.groupGrade', ['group' => $group, 'careers' => $careers]);
    }
    public function groupStore(Request $request)
    {
        $subject_id = $request->input('subject_id');
        $careers = $request->input('careers');
        foreach ($careers as $careerData) {
            // Ensure that both career_id and grade exist
            if (isset($careerData['career_id']) && isset($careerData['grade'])) {
                SubjectGrade::create([
                    'career_id' => $careerData['career_id'],
                    'subject_id' => $subject_id, // Set subject_id here or pass it in your form if it's dynamic
                    'grade' => $careerData['grade']
                ]);
            }
        }
        $student = Student::where('id', $request->input('student_id'))->get()->first();
        $careers = $student->careers()->get();
        $subjectGrades = SubjectGrade::where('career_id', $student->careers()->get()->last()->id)->get();
        return view('student.show', ['student' => $student, 'careers' => $careers, 'subjectGrades' => $subjectGrades]);    


    }


    //studentGrade
    public function studentGrade($student_id, $subject_id = null){
        $subjects = Subject::all();
        $group = Student::where('id', $student_id)->get();
        $careers = Career::where('student_id', $student_id)->get()->last();
        $careers = $careers ? [$careers] : [];
        return view('subjectGrade.groupGrade', ['student_id' => $student_id, 'careers' => $careers, 'subject_id' => $subject_id, 'subjects' => $subjects]);
    }
    //pick a subject
    public function pickSubject($student){
        $subjects = Subject::all();
        return view('subjectGrade.pickSubject', ['subjects' => $subjects, 'student' => $student]);
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
    public function enterBulk()
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
        return view('dashboard');
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
