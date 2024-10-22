<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add subject to student') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="w-full">
                            <form action="{{ route('careerSubject.store') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="student_id" :value="__('Student')" />
                                    <input type="text" name="student_id" id="student_id" class="block mt-1 w-full" value="{{ $student->id }}" readonly>
                                    <input type="hidden" name="career_id"  value="{{ $student->careers()->get()->last()->id }}" >
                                </div>
                                <div class="mb-4">
                                    <label for="subject_id" :value="__('Subject')" />
                                    <select name="subject_id[]" id="subject_id" class="block mt-1 w-full" multiple>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-button>Add</x-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>