<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Careers') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="w-full">
                            <button> <a href="{{ route('careers.pickCareer', 1) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Career</a></button>
                            <table>
                                <tr>
                                    <th>Student</th>
                                    <th>Course</th>
                                    <th>Group</th>
                                    <th>Year</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach($careers as $career)
                                    <tr>
                                        <td>{{$career->student()->get()->first()->firstname}}</td>
                                        <td>{{$career->course()->get()->first()->name}}</td>
                                        <td>{{$career->group()->get()->first()->name}}</td>
                                        <td>{{$career->schoolYear()->get()->first()->year}}</td>     
                                        <td><button> <a href="{{ route('careers.pickCareer', $career->student()->get()->first()->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Career</a></button></td>
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