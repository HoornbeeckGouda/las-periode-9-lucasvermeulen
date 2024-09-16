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
                            <form action="{{ route('careers.setupCareer') }}" method="post">
                                @csrf
                                {{-- student --}}
                                <select name="student_id" id="student_id" class="form-select bg-gray-100 dark:bg-gray-900 mt-1 block w-full">
                                    @foreach($students as $student)
                                        @if($selectedStudent->id == $student->id)
                                            <option selected value="{{ $student->id }}">{{ $student->firstname}} {{ $student->lastname }}</option>
                                        @else
                                            <option value="{{ $student->id }}">{{ $student->firstname}} {{ $student->lastname }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                {{-- course --}}
                                <select name="course_id" id="course_id" class="form-select bg-gray-100 dark:bg-gray-900 mt-1 block w-full">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
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
</x-app-layout>