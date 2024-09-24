<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


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
    public function search(Request $request)
    {
        if(isset($request->search)){
            $students = Student::
            where('firstname', $request->search)
            ->orWhere('firstname', 'like', '%' . $request->search . '%')
            ->orWhere('lastname', 'like', '%' . $request->search . '%')
            ->orWhere('initials', 'like', '%' . $request->search . '%')
            ->orWhere('officielename', 'like', '%' . $request->search . '%')
            ->orWhere('postcode', 'like', '%' . $request->search . '%')
            ->orWhere('streat', 'like', '%' . $request->search . '%')
            ->orWhere('housenumber', 'like', '%' . $request->search . '%')
            ->orWhere('addition', 'like', '%' . $request->search . '%')
            ->orWhere('city', 'like', '%' . $request->search . '%')
            ->get();
        }else{
            $students = Student::all();
        }
        
        return view('student.index', ['students' => $students, 'search'=> $request->search]);
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
    // Validate the request
    // dd($request->all());
    $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'initials' => 'required',
        'officielename' => 'required',
        'postcode' => 'required',
        'streat' => 'required',
        'housenumber' => 'required',
        'city' => 'required',
        'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
    ]);

    // Handle the file upload
    if($request->hasFile('image')){
    $newImageName = time() . '-' . $request->firstname . '.' . $request->image->extension();
    $request->image->move(public_path('images'), $newImageName);
    }else{
        $newImageName = null;
    }
    
    // Create a new student record in the database
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
        'image' => $newImageName, // Save the image name to the database
    ]);

    // Fetch all students and redirect
    $students = Student::all();
    return redirect()->route('students.index', ['students' => $students]);
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
                'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
            ]
        );
        
       
        if($request->hasFile('image')){
            $current_image = student::where('id', $student->id )->get()->first()->image;
            $filePath = public_path('images/' . $current_image);
            if (File::exists($filePath)) {
                // Delete the file
                File::delete($filePath);
            }
            $newImageName = time() . '-' . $request->firstname . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $newImageName);
        }else{
            $newImageName = null;
            if($request->imageFilled == 'true'){
                $current_image = student::where('id', $student->id )->get()->first()->image;
                
                $newImageName = $current_image;
            }          
        }
        

        
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
            'image' => $newImageName, // Save the image name to the database

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
