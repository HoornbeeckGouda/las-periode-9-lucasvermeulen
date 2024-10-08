<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show student') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="w-full">
                            <div class="w-full flex justify-between items-start">
                                <!-- Button on the left -->
                                <a href="{{ route('careers.pickCareer', $student) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Add Career
                                </a>
                            
                                <!-- Image on the right -->
                                <img src="{{ asset('images/' . ($student->image ?? 'default.png')) }}" 
                                     alt="{{ $student->firstname }}" 
                                     class="w-32 h-32 rounded-full object-cover border-2 border-blue-500 shadow-lg" />
                            </div>
                            <div class="mt-5 relative border-2 border-blue-500 p-4  rounded-lg">
                                <!-- Button positioned in the corner -->
                                <a href="{{ route('students.edit', $student) }}" 
                                   class="absolute -top-3 -right-3 bg-gray-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded border border-blue-500 shadow-lg">
                                   <i class="fa-solid fa-pen-to-square"> </i>
                                </a>
                            
                                <!-- Content inside the bordered box -->
                       
                                <div class="w-full flex">

                                    <x-input-text 
                                        type="text"
                                        field="firstname"
                                        name="firstname"
                                        text="Firstname"
                                        class="w-full"
                                        autocomplete=""
                                        disabled
                                        :value="@old('firstname') ?? $student->firstname"
                                    ></x-input-text>
                                    <x-input-text 
                                        type="text"
                                        field="lastname"
                                        name="lastname"
                                        text="Lastname"
                                        class="w-full"
                                        autocomplete=""
                                        disabled
                                        :value="@old('lastname') ?? $student->lastname"
                                    ></x-input-text>
                                </div>
                                <x-input-text 
                                    type="text"
                                    field="initials"
                                    name="initials"
                                    text="Initials"
                                    class="w-full"
                                    autocomplete=""
                                    disabled
                                    :value="@old('initials') ?? $student->initials"
                                ></x-input-text>
                                <x-input-text 
                                    type="text"
                                    field="officielename"
                                    name="officielename"
                                    text="Officielename"
                                    class="w-full"
                                    autocomplete=""
                                    disabled
                                    :value="@old('officielename') ?? $student->officielename"
                                ></x-input-text>
                                <x-input-text 
                                    type="text"
                                    field="postcode"
                                    name="postcode"
                                    text="Postcode"
                                    class="w-full"
                                    autocomplete=""
                                    disabled
                                    :value="@old('postcode') ??     $student->postcode"
                                ></x-input-text>
                                <x-input-text 
                                    type="text"
                                    field="streat"
                                    name="streat"
                                    text="Streat"
                                    class="w-full"
                                    autocomplete=""
                                    disabled
                                    :value="@old('streat') ?? $student->streat"
                                ></x-input-text>
                                <x-input-text 
                                    type="text"
                                    field="housenumber"
                                    name="housenumber"
                                    text="Housenumber"
                                    class="w-full"
                                    autocomplete=""
                                    disabled
                                    :value="@old('housenumber') ?? $student->housenumber"
                                ></x-input-text>
                                <x-input-text 
                                    type="text"
                                    field="addition"
                                    name="addition"
                                    text="Addition"
                                    class="w-full"
                                    autocomplete=""
                                    disabled
                                    :value="@old('addition') ?? $student->addition"
                                ></x-input-text>
                               
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row  gap-10  max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="basis-1/2">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="w-full">
                            <table class="w-full text-left">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>name</th>
                                        <th>group</th>
                                        <th>year</th>
                                        <th>action</th>
                                    </tr>   
                                </thead> 
                                <tbody>
                                @foreach ($careers as $career)
                            
                                <tr>
                                    <td>{{ $career->id }}</td>
                                    <td>{{ $career->course()->get()->first()->name }}</td>
                                    <td>{{ $career->group()->get()->first()->name }}</td>
                                    <td>{{ $career->schoolYear()->get()->first()->year }}</td>
                                </tr>
                            @endforeach
                        </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- subjectGrade --}}
        <div class="basis-1/2 ">
                <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-between space-x-20 w-full">
                            <div class="w-full">
                                <table class="w-full text-left">
                                    <tr>
                                        <th>id</th>
                                        <th>subject</th>
                                        <th>grade</th>
                                        <th>action</th>
                                    </tr>    
                                @foreach ($subjectGrades as $subjectGrade)
                                    <tr>
                                        <td>{{ $subjectGrade->id }}</td>
                                        <td>{{ $subjectGrade->subject()->get()->first()->name }}</td>
                                        <td>{{ $subjectGrade->grade }}</td>
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