<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Group Cijfers') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="w-full">
                            <form action="{{ route('subjectGrades.groupStore') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <table>
                                <tr>
                                    <th>name</th>
                                    <th>Subject</th>
                                    <th>Grade</th>
                                </tr>
                                @foreach($careers as $career)
                                    <tr>
                                        <td>{{$career->student->firstname}}</td>
                                        <td> subject</td>
                                        <td>
                                            <input type="hidden" name="careers[{{ $career->id }}][career_id]" value="{{ $career->id }}">
                                            <input type="text" name="careers[{{ $career->id }}][grade]" value="{{ old('careers.' . $career->id . '.grade') ?? ($grade ?? '') }}">
                                        </td>
                                        </tr>
                                @endforeach
                            </table>
                            <x-button>Save</x-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>