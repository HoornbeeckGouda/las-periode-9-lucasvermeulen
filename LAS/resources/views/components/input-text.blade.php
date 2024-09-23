@props(['disabled' => false, 'field'=> '', 'name' => '', 'text' => '', 'value' => '', 'type' => '' ])	

<div class="w-full">
    <label for="{{ $name }}" class="block text>gray-700 dark:text-gray-300">{{ $text }}</label> 
    <input 
        type="{{$type}}"
        name="{{ $name }}"
        value="{{ $value }}"
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}
    >

    @if($field != '')
        @error($field)
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    @endif
</div>