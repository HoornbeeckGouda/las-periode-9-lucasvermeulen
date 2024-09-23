@props([
    'title' => '',
    'allData' => '',
    'data_id' => '',
    'data_value' => ''
])
<select name="{{$title}}" id="{{$title}}"  {!! $attributes->merge(['class' => 'form-select bg-gray-100 dark:bg-gray-900 mt-1 block w-full']) !!}>
    @foreach($allData as $data)
    <option value="{{  $data_id }}">{{ $data->$data_value }}</option>
    @endforeach
</select>