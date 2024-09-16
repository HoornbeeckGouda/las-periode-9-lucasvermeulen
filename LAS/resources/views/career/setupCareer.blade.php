<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a Career') }}
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-gray-800 border-2 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between space-x-20 w-full">
                        <div class="w-full">
                            <form action="{{ route('careers.store') }}" method="post">
                                @csrf
                                {{-- school year --}}
                                <select name="schoolYear_id" id="schoolYear_id" class="form-select bg-gray-100 dark:bg-gray-900 mt-1 block w-full">
                                    @for($i = 1; $i <= $AmountSchoolYears; $i++)
                                        <option value="{{$i}}">{{ $i }}</option>
                                    @endfor
                                </select>
                                {{-- group --}}
                                <select name="group_id" id="group_id" class="form-select bg-gray-100 dark:bg-gray-900 mt-1 block w-full">
                                    @foreach($groups as $group)
                                        <option  data-years="{{ json_encode($group->schoolYear_id) }}" value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                                <input  name="course_id" id="course_id" value="{{$course_id}}" type="hidden"/>
                                <input  name="student_id" id="student_id" value="{{$student_id}}" type="hidden"/>
                                <x-button>Save</x-button>       
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const GroupSelect = document.getElementById('group_id');
    const schoolYear_idSelect = document.getElementById('schoolYear_id');

    schoolYear_idSelect.addEventListener('change', function () {
        const SelectedYear = schoolYear_idSelect.value;
        const allGroupYears = GroupSelect.options[GroupSelect.selectedIndex];
        for (let index = 0; index < GroupSelect.length; index++) {
            const element = GroupSelect[index];
            const Groupyear = JSON.parse(element.getAttribute('data-years')) || [];
            if(Groupyear > SelectedYear){
                
            }
            if(Groupyear == SelectedYear){
                GroupSelect.selectedIndex = Groupyear - 1;
            }
        }
    });
});
    </script>

</x-app-layout>