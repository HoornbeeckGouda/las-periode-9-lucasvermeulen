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
                               
                                <!-- Image on the right -->
                                <img src="{{ asset('images/' . ($student->image ?? 'default.png')) }}" 
                                     alt="{{ $student->firstname }}" 
                                     class="w-32 h-32 rounded-full object-cover border-2 border-blue-500 shadow-lg" />
                            </div>
                            <div class="mt-5 relative border-2 border-blue-500 p-4  rounded-lg">
                                <!-- Button positioned in the corner -->
                                @can('update student')
                                    <a href="{{ route('students.edit', $student) }}" 
                                    class="absolute -top-3 -right-3 bg-gray-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded border border-blue-500 shadow-lg">
                                    <i class="fa-solid fa-pen-to-square"> </i>
                                    </a>
                                @endcan
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
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="flex flex-row w-full gap-10  max-w-7xl mx-auto sm:px-6 lg:px-8">
                            @can('show career')
                            <div class="w-full">
                                @can('create career')
                                    <div class="pb-12">
                                        <a href="{{ route('careers.pickCareer', $student) }}" 
                                            class="-top-3 -right-3 bg-gray-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded border border-blue-500 shadow-lg">
                                            <i class="fa-solid fa-address-book"></i>
                                        </a>
                                    </div>
                                @endcan
                                <select id="careerSelect" name="careerOption" class="bg-gray-800 hover:bg-blue-700 text-white font-bold py-2 px-4 w-full rounded border border-blue-500 shadow-lg">
                                    <option value="0">Select a career</option>
                                    @foreach ($careers as $career)
                                        <option value="{{ $career->id }}">{{ $career->course()->first()->name }} - {{ $career->group()->first()->name }} - {{ $career->schoolYear()->first()->year }}</option>
                                    @endforeach
                                </select>


                                <script>
                                    document.getElementById('careerSelect').addEventListener('change', function() {
                                    var careerId = this.value;
                                    if (careerId != 0) {
                                        fetch(`/student-career/${careerId}`, {
                                            method: 'GET',
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                                'Accept': 'application/json'
                                            },
                                        })
                                        .then(response => response.text())
                                        .then(html => {
                                            document.querySelector('#careerTableContainer').innerHTML = html;
                                            initFlowbite()
                                            // No need to call Flowbite.init(); directly
                                            // Just ensure the structure is correct as per Flowbite's documentation
                                        })
                                        .catch(error => console.error('Error:', error));
                                    }
                                });
                            </script>
                                    
                            <div id="careerTableContainer">
                                
                            </div>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
  
        
       
 
</x-app-layout>