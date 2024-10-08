<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('edit user') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="w-full">
                            <form action="{{route('users.update', $user->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div>
                                    <x-input-text 
                                    type="text"
                                    field="password"
                                    name="password"
                                    text="password"
                                    class="form-control"
                                    autocomplete=""
                                ></x-input-text>
                                    <label for="name">name</label>
                                    <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
                                </div>
                                <div>
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" value="{{$user->email}}" class="form-control">
                                </div>
                                <div>
                                    <label for="password">Password</label>
                                    <input type="text" name="password" id="password"  class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Roles</label>
                                    <select name="roles[]" class="form-control" multiple>
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                        <option
                                            value="{{ $role }}"
                                            {{ in_array($role, $userRoles) ? 'selected':'' }}
                                        >
                                            {{ $role }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('roles') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <x-button>update</x-button>       

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>