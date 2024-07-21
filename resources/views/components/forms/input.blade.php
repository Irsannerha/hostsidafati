@props(['name', 'id', 'textarea' => false])
@php
    $id = $name;
@endphp
<div>
    @if($textarea)
        <textarea name="{{$name}}" id="{{$id}}" {{$attributes->class(['border-1 border-input-border shadow-input-shadow rounded-10 py-10px px-12px w-full focus:border-input-focus placeholder:text-input-placeholder placeholder:font-semibold'])}} data-role="tagsinput"></textarea>
    @else
        <input name="{{$name}}" id="{{$id}}" value="{{ $value ?? '' }}" {{$attributes->class(['border-1 border-input-border shadow-input-shadow rounded-10 py-10px px-12px w-full h-normal-input focus:border-input-focus placeholder:text-input-placeholder placeholder:font-semibold'])->merge(['type' => 'text'])}}
            data-role="tagsinput" />
    @endif
    @error($name)
        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
    @enderror
</div>