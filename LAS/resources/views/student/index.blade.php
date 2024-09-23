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
                                text="search"
                                class="w-full"
                                autocomplete=""
                                autofocus
                                onfocus="this.setSelectionRange(this.value.length,this.value.length);"
                                value="{{ old('search') ?? ($search ?? '') }}"
                            ></x-input-text>
                            <x-button>Search</x-button>
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
                        <button>
                            <a href="{{ route('students.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Student</a>
                        </button>
                        <table class="min-w-full mt-4">
                            <thead>
                                <tr>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <th>initials</th>
                                    <th>officielename</th>
                                    <th>postcode</th>
                                    <th>street</th>
                                    <th>housenumber</th>
                                    <th>addition</th>
                                    <th>city</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->firstname }}</td> 
                                        <td>{{ $student->lastname }}</td>
                                        <td>{{ $student->initials }}</td>
                                        <td>{{ $student->officielename }}</td>
                                        <td>{{ $student->postcode }}</td>
                                        <td>{{ $student->streat }}</td>
                                        <td>{{ $student->housenumber }}</td>
                                        <td>{{ $student->addition }}</td>
                                        <td>{{ $student->city }}</td>     
                                        <td>
                                            <a href="{{ route('students.show', $student->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Show</a>
                                            <a href="{{ route('students.edit', $student->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
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