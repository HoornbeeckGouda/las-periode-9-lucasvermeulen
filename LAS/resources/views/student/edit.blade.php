<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create student') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="w-full">
                            <form action="{{ route('students.update', $student) }}"  enctype="multipart/form-data" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="w-full flex">
                                    <x-input-text 
                                        type="text"
                                        field="firstname"
                                        name="firstname"
                                        text="Firstname"
                                        class="w-full"
                                        autocomplete=""
                                        :value="@old('firstname') ?? $student->firstname"
                                    ></x-input-text>
                                    <x-input-text 
                                        type="text"
                                        field="lastname"
                                        name="lastname"
                                        text="Lastname"
                                        class="w-full"
                                        autocomplete=""
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
                                    :value="@old('initials') ?? $student->initials"
                                ></x-input-text>
                                <x-input-text 
                                    type="text"
                                    field="officielename"
                                    name="officielename"
                                    text="Officielename"
                                    class="w-full"
                                    autocomplete=""
                                    :value="@old('officielename')  ?? $student->officielename"
                                ></x-input-text>
                                <x-input-text 
                                    type="text"
                                    field="postcode"
                                    name="postcode"
                                    text="Postcode"
                                    class="w-full"
                                    autocomplete=""
                                    :value="@old('postcode') ?? $student->postcode"
                                ></x-input-text>
                                <x-input-text 
                                    type="text"
                                    field="streat"
                                    name="streat"
                                    text="Streat"
                                    class="w-full"
                                    autocomplete=""
                                    :value="@old('streat') ?? $student->streat"
                                ></x-input-text>
                                <x-input-text 
                                    type="text"
                                    field="housenumber"
                                    name="housenumber"
                                    text="Housenumber"
                                    class="w-full"
                                    autocomplete=""
                                    :value="@old('housenumber') ??  $student->housenumber"
                                ></x-input-text>
                                <x-input-text 
                                    type="text"
                                    field="addition"
                                    name="addition"
                                    text="Addition"
                                    class="w-full"
                                    autocomplete=""
                                    :value="@old('addition') ?? $student->addition"
                                ></x-input-text>
                                <x-input-text 
                                    type="text"
                                    field="city"
                                    name="city"
                                    text="City"
                                    class="w-full"
                                    autocomplete=""
                                    :value="@old('city') ?? $student->city"
                                ></x-input-text>
                                
                                <x-button>save</x-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>