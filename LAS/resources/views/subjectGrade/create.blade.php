<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a subjectGrade') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="w-full">
                            <form action="{{ route('subjectGrades.store') }}" method="post">
                            @csrf
                                <select name="career_id" id="career_id" class="form-select bg-gray-100 dark:bg-gray-900 mt-1 block w-full">
                                    @foreach($careers as $career)
                                    <option value="{{ $career->id }}">{{ $career->student()->get()->first()->fistname}} {{ $career->student()->get()->first()->lastname }}</option>
                                    @endforeach
                                </select>
                                <div id="subjectContainer">
                                    {{-- <select onchange="ChangeSubject()" name="subject_id" id="subject_id" class="form-select bg-gray-100 dark:bg-gray-900 mt-1 block w-full">
                                        @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name}}</option>
                                        @endforeach
                                    </select> --}}
                                </div>
                                    <button type="button" onclick="newSubject()">plus</button>
                                
                                <x-button>Save</x-button>       
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        let selectIndex = 0; // Global index variable to keep track of the number of selects
        let selectedSubjects = {}; // Object to store selected subject values by index

        function newSubject() {
            const subjectContainer = document.getElementById("subjectContainer");
            const newInput = document.createElement("input");
            newInput.name = `input_subject[${selectIndex}]`; // Array name for form submission in Laravel
            newInput.setAttribute("data-index", selectIndex);

            subjectContainer.appendChild(newInput);

            // Create a new select element
            const newSelect = document.createElement("select");
            newSelect.name = `subject_ids[]`; // Array name for form submission in Laravel
            newSelect.classList.add("form-select", "bg-gray-100", "dark:bg-gray-900", "mt-1", "block", "w-full");

            // Add an index to uniquely identify the select element
            newSelect.setAttribute("data-index", selectIndex);

            // Add the onchange attribute (with the index passed as a parameter)
            newSelect.setAttribute("onchange", `ChangeSubject(this, ${selectIndex})`);

            // Get the subjects array from the backend (make sure $subjects is available in your Blade template)
            const subjects = {!! json_encode($subjects->toArray()) !!};

            // Loop through the subjects and create option elements
            subjects.forEach(subject => {
                const option = document.createElement("option");
                option.value = subject.id;
                option.textContent = subject.name;
                newSelect.appendChild(option);
            });

            // Append the newly created select element to the subject container
            subjectContainer.appendChild(newSelect);

            // Increment the select index for the next select element
            selectIndex++;
        }

        // Example ChangeSubject function to update selectedSubjects array
        function ChangeSubject(selectElement, index) {
            const inputSubject = document.getElementById(`input_subject_[${index}]`);
            const selectedSubjectId = selectElement.value;
            selectedSubjects[index] = selectedSubjectId; // Store subject ID by index in the object

            console.log(`Select with index ${index} changed. Selected subject ID: ${selectedSubjectId}`);
            console.log(selectedSubjects); // You can see the updated selectedSubjects array here
        }

        // When the form is submitted, it will automatically include the selected values as an array

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