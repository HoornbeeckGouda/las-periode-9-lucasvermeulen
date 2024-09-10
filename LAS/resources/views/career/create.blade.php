<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a Career') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="w-full">
                            <form action="{{ route('careers.store') }}" method="post">
                            @csrf

            
                                 <select name="course_id" id="course_id" class="form-select bg-gray-100 dark:bg-gray-900 mt-1 block w-full">
                                    <option value="">Select Course</option>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}" data-years="{{ json_encode($course->years) }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                                
                                <select name="schoolYear_id" id="schoolYear_id" class="form-select bg-gray-100 dark:bg-gray-900 mt-1 block w-full">
                                    <option value="">Select Year</option>
                                </select>
                                
                                <select name="group_id" id="group_id" class="form-select bg-gray-100 dark:bg-gray-900 mt-1 block w-full">
                                    @foreach($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                <select name="student_id" id="student_id" class="form-select bg-gray-100 dark:bg-gray-900 mt-1 block w-full">
                                    @foreach($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->firstname}} {{ $student->lastname }}</option>
                                    @endforeach
                                </select>
                                <x-button>Save</x-button>       
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        //change years of course based on course selected
        document.addEventListener('DOMContentLoaded', function () {
        const coursesSelect = document.getElementById('course_id');
        const schoolYearsSelect = document.getElementById('schoolYear_id');

        coursesSelect.addEventListener('change', function () {
            const selectedCourse = coursesSelect.options[coursesSelect.selectedIndex];
            // Safely parse the `data-years` attribute or return an empty array if it's null
            const years = JSON.parse(selectedCourse.getAttribute('data-years') || '[]');
            // Clear the existing school years options
            schoolYearsSelect.innerHTML = '<option value="">Select Year</option>';

            // Populate the school years dropdown with the years of the selected course
            for (let index = 1; index <= years; index++) {
                const option = document.createElement('option');
                option.value = index;
                option.textContent = index;
                schoolYearsSelect.appendChild(option);   
            }
        });
    });
    </script>

</x-app-layout>