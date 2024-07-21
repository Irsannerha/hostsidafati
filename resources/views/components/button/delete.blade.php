@props(['id' => null])

 <button id="{{$id}}" {{$attributes->class(['bg-slate-800 py-1 px-3 text-white font-bold rounded-10 mb-4'])->merge(['type' => 'button'])}}>
 {{$slot}}
</button>
