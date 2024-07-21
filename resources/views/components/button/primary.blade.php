@props(['id' => null])
<button id="{{$id}}" {{$attributes->class('bg-primary-main rounded-5 w-primary-btn py-8px font-semibold text-main-white')->merge(['type' => 'submit'])}}>{{$slot}}</button>