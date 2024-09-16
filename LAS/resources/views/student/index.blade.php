<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Students') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="w-full">
                            <button> <a href="{{ route('students.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Student</a></button>
                            <table>
                                <tr>
                                    <th>firstname</th>
                                    <th>lastname</th>
                                    <th>initials</th>
                                    <th>officielename</th>
                                    <th>postcode</th>
                                    <th>streat</th>
                                    <th>housenumber</th>
                                    <th>addition</th>
                                    <th>city</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{$student->firstname}}</td> 
                                        <td>{{$student->lastname}}</td>
                                        <td>{{$student->initials}}</td>
                                        <td>{{$student->officielename}}</td>
                                        <td>{{$student->postcode}}</td>
                                        <td>{{$student->streat}}</td>
                                        <td>{{$student->housenumber}}</td>
                                        <td>{{$student->addition}}</td>
                                        <td>{{$student->city}}</td>     
                                        <td>
                                            <a 
                                                href="{{ route('students.show', $student->id) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                                >Show</a>
                                            <a 
                                                href="{{ route('students.edit', $student->id) }}"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                                >edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>