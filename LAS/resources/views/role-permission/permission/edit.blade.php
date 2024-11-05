<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('edit permissions') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="w-full">
                            <form action="{{route('permissions.update', $permission->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div>
                                    {{-- <label for="name">Permission Name</label>
                                    <input type="text" name="name" id="name" value="{{$permission->name}}" class="form-control"> --}}
                                    <x-input-text 
                                    type="text"
                                    field="name"
                                    name="name"
                                    text="Permission Name"
                                    class="w-full"
                                    autocomplete=""
                                    :value="@old('name') ??  $permission->name"
                                ></x-input-text>
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