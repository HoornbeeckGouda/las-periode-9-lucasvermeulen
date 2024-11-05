<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>
    <div class="py-10 flex flex-col sm:flex-row mx-auto sm:px-6 lg:px-8">
        <!-- Sidebar (Search Form) -->
        <div class="w-full sm:w-64 mb-4 sm:mb-0">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full">
                        <form action="{{ route('students.search') }}" method="POST">
                            @csrf
                            <x-input-text 
                                type="text"
                                field="search"
                                name="search"
                                text="search:"
                                class="w-full"
                                autocomplete=""
                                autofocus
                                onfocus="this.setSelectionRange(this.value.length,this.value.length);"
                                value="{{ old('search') ?? ($search ?? '') }}"
                            ></x-input-text>
                            <x-button class="mt-5">Search</x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Main Content (Table) -->
        <div class="w-full sm:grow  mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="w-full">
                        <div class="flex justify-end">
                            <a href="{{ route('students.create') }}" class="relative right-0 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Student</a>
                        </div>
                        <table class="min-w-full mt-4 table-auto">
                            <thead class="text-lg text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                <tr class="text-left decoration-3">
                                    <th>Profile</th>
                                    <th></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>
                                            <img src="{{ asset($student->image ? 'images/' . $student->image : 'images/default.png') }}" 
                                                alt="{{ $student->firstname }}" 
                                                class="w-16 h-16 rounded-full object-cover border-2 border-blue-500 shadow-lg" />
                                        </td>
                                        <td>
                                            <div class="text-lg blod">{{ $student->firstname }} {{ $student->lastname }}</div>
                                            {{ optional($student->careers()->whereNull('endDate')->with('course')->first())->course->name ?? 'No course' }}
                                            {{ optional($student->careers()->whereNull('endDate')->with('course')->first()->schoolYear)->year ?? 'No course' }}</td>
                                        <td>
                                            {{-- show --}}
                                            <button data-tooltip-target="show-{{$student->id}}" data-tooltip-trigger="hover">
                                                <a href="{{ route('students.show', $student->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </button>
                                            <div id="show-{{$student->id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                Show
                                            </div>
                                            {{-- edit --}}
                                            <button data-tooltip-target="edit-{{$student->id}}" data-tooltip-trigger="hover">
                                                <a href="{{ route('students.edit', $student->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                            </button>
                                            <div id="edit-{{$student->id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                edit
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
    


</x-app-layout>