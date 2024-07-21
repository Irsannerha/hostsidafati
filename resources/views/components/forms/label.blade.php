@props(['name', 'href', 'info'])
<div>
    <label for="{{$name}}" {{$attributes->class(['font-semibold relative'])}} id-data="{{$name}}">
        {{ $slot }}
        @if ($attributes->has('required'))
            <span class="text-danger-main -ml-1">*</span>
        @endif
        @if (isset($info) && isset($href))
            <a href="{{ $href }}" target="_blank" rel="noopener noreferrer"
                class="underline text-blue-600 text-sm absolute bottom-0 w-full ml-3px">{{$info}}</a>
        @endif
        @if(isset($info) && !isset($href))
            <span class="text-xs font-normal text-input-placeholder absolute bottom-0 w-[200px] ml-3px">{{$info}}</span>
        @endif
    </label>
</div>
