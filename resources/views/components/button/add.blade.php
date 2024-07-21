@props(['id' => null])

<button id="{{$id}}" {{$attributes->class('flex gap-1 bg-primary-main py-2 px-4 rounded-10 text-white')->merge(['type' => 'button'])}}>
    <x-eva-plus-circle-outline class="w-6 h-6" />{{$slot}}
</button>