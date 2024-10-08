<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Role ') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="w-full">
                            <form action="{{route('roles.add-permissions', $role->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label for="name">Permissions</label>
                                    <div>

                                    @foreach($permissions as $permission)
                                        <div class="flex items">
                                            <label for="permissions">{{$permission->name}}</label>
                                            <input type="checkbox" name="permission[]" id="permissions" value="{{$permission->name}}" @if(in_array($permission->id, $role->permissions->pluck('id')->toArray())) checked @endif>
                                        </div>
                                    @endforeach
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