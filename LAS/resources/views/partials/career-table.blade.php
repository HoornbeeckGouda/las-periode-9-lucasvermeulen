
<div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="flex justify-between space-x-20 w-full">
                <div class="w-full mt-5 relative border-2 border-blue-500 p-4  rounded-lg">
                    <div class="">
                        <button data-tooltip-target="studentAddSubject-{{$student->id}}" data-tooltip-trigger="hover">
                            <a href="{{ route('career-subject.studentAddSubject', $student) }}" 
                    class="relative right-0 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+ Subject</a>  
                        </button>
                        <div id="studentAddSubject-{{$student->id}}" role="tooltip" class="absolute  z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Add a new Subject
                        </div>
                    </div>
                                     
                    <div class="w-full">
                        <table class="w-full text-left">
                            <thead>
                                <tr>
                                    <th></th>
                                </tr>   
                            </thead> 
                            <tbody>
                            @foreach ($careerSubjects as $careerSubject)
                                <tr>
                                    <td>
                                        <div id="accordion-collapse-{{$careerSubject->id}}" data-accordion="collapse">
                                            <h2 id="accordion-collapse-heading-{{$careerSubject->id}}">
                                              <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-{{$careerSubject->id}}" aria-expanded="false" aria-controls="accordion-collapse-body-{{$careerSubject->id}}">
                                                <span>{{$careerSubject->subject->name}}</span>
                                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                                </svg>
                                              </button>
                                            </h2>
                                            
                                            <div id="accordion-collapse-body-{{$careerSubject->id}}" class="hidden" aria-labelledby="accordion-collapse-heading-{{$careerSubject->id}}">
                                                <div class="">
                                                    <button data-tooltip-target="studentGrade-{{$careerSubject->id}}" data-tooltip-trigger="hover">
                                                        <a href="{{ route('subjectGrades.studentGrade', ['student_id' => $student->id, 'subject_id' => $careerSubject->subject()->get()->first() ->id]) }}"
                                                            class="bg-gray-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded border border-blue-500 shadow-lg">
                                                            <i class="fa-solid fa-plus"></i> 
                                                    </a>
                                                    </button>
                                                    <div id="studentGrade-{{$careerSubject->id}}" role="tooltip" class="absolute  z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                        Add a new grade
                                                    </div>
                                                </div>
                                                <table class="w-full text-left">
                                                    
                                                    <tr>
                                                        <th>subject</th>
                                                        <th>grade</th>
                                                    </tr>    
                                                    
                                                    
                                                        @foreach ($subjectGrades as $subjectGrade)
                                                            @if($subjectGrade->subject_id == $careerSubject->subject_id)
                                                                <tr>
                                                                    <td>{{ $subjectGrade->subject()->get()->first()->name }}</td>
                                                                    <td>{{ $subjectGrade->grade }}</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    <tfoot>
                                                        <tr>
                                                            <?php
                                                                $Average = 0;
                                                                $Amount = 0;
                                                                $index = 0;

                                                                foreach($subjectGrades as $subjectGrade){
                                                                    if($subjectGrade->subject_id == $careerSubject->subject_id){
                                                                        $Amount += $subjectGrade->grade;
                                                                        $index += 1;
                                                                    }
                                                                }
                                                                if($index != 0){
                                                                    $Average = $Amount / $index;
                                                                }
                                                            ?>
                                                            <td>
                                                            </td>
                                                            <td>
                                                            {{round($Average, 2);}}
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>    
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>