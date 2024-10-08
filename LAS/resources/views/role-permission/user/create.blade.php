<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('create user') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="w-full">
                            <form action="{{route('users.store')}}" method="post">
                                @csrf
                                <div>
                                    <x-input-text 
                                        type="text"
                                        field="name"
                                        name="name"
                                        text="name"
                                        class="form-control"
                                        autocomplete=""
                                    ></x-input-text>
                                </div>
                                <div>
                                    <x-input-text 
                                        type="text"
                                        field="email"
                                        name="email"
                                        text="email"
                                        class="form-control"
                                        autocomplete=""
                                    ></x-input-text>
                                </div>
                                <div>
                                    <x-input-text 
                                    type="text"
                                    field="password"
                                    name="password"
                                    text="password"
                                    class="form-control"
                                    autocomplete=""
                                ></x-input-text>
                                </div>
                                <div class="mb-3">
                                    <label for="">Roles</label>
                                    <select name="roles[]" class="form-control border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" multiple>
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-button>Save</x-button>       

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>