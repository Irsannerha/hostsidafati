@props(['name', 'id', 'placeholder', 'options' => [], 'search' => false])
@php
    $id = $name;
@endphp
<style>
    .dropdown-transition {
        opacity: 0;
        visibility: hidden;
        max-height: 0;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .dropdown-open {
        opacity: 1;
        max-height: 15.938rem;
        visibility: visible;
    }
</style>

<div class="relative inline-block w-full select-wrapper" data-id="{{$id}}">
    <div id="{{$id}}-trigger"
        class="w-full p-10px border-1 text-input-placeholder flex items-center border-input-border shadow-input-shadow rounded-10 bg-main-white cursor-pointer h-normal-input font-semibold"
        onclick="toggleDropdown('{{$id}}')">
        <span id="{{$id}}-trigger-value">{{$placeholder}}</span>
        <x-eos-arrow-drop-down class="w-7 h-7 text-main-black absolute right-2" />
    </div>
    <div class="absolute dropdown-transition top-full mt-16px left-0 right-0 z-10 border-input-border border-1 shadow-input-shadow rounded-10 bg-main-white overflow-auto"
        id="{{$id}}-dropdown">
        @if($search)
            <input type="text" id="{{$id}}-search"
                class="w-full p-10px border-b-1 border-input-border rounded-t-10 focus:outline-none"
                placeholder="Search...">
        @endif
        @foreach($options as $value => $label)
            <div class="p-10px cursor-pointer hover:bg-primary-main text-input-placeholder h-normal-input flex items-center hover:text-main-white font-semibold option-item"
                onclick="selectOption('{{$id}}', '{{$label}}', '{{$value}}')">
                {{$label}}
            </div>
        @endforeach
    </div>
    <select name="{{$name}}" id="{{$id}}" class="hidden" {{$attributes}}>
        <option value="">{{$placeholder}}</option>
        @foreach($options as $value => $label)
            <option value="{{$value}}" {{ isset($selected) && $selected == $value ? 'selected' : '' }}>{{$label}}</option>
        @endforeach
    </select>
    @error($name)
        <small class="invalid-feedback font-5" style="margin-top: -10px; display: block;">{{ $message }}</small>
    @enderror
</div>

<script>
    function toggleDropdown(id) {
        const dropdown = document.getElementById(id + '-dropdown');
        const trigger = document.getElementById(id + '-trigger');
        if (dropdown.classList.contains('dropdown-open')) {
            dropdown.classList.remove('dropdown-open');
            trigger.classList.remove('border-input-focus');
        } else {
            dropdown.classList.add('dropdown-open');
            trigger.classList.add('border-input-focus', 'text-[#2E6171]');
            if (document.getElementById(id + '-search')) {
                document.getElementById(id + '-search').focus();
            }
        }
    }

    function selectOption(id, label, value) {
        const displayElement = document.getElementById(id + "-trigger-value");
        const hiddenSelect = document.getElementById(id);
        displayElement.innerText = label;
        hiddenSelect.value = value;
        displayElement.classList.add('text-main-black');
        toggleDropdown(id);
    }

    document.addEventListener('click', function (event) {
        const selectWrappers = document.querySelectorAll('.select-wrapper');
        selectWrappers.forEach(function (wrapper) {
            const id = wrapper.dataset.id;
            const dropdown = document.getElementById(id + '-dropdown');
            const trigger = document.getElementById(id + '-trigger');
            if (!wrapper.contains(event.target)) {
                dropdown.classList.remove('dropdown-open');
                trigger.classList.remove('border-input-focus', 'text-[#2E6171]');
            }
        });
    });

    document.querySelectorAll('.select-wrapper').forEach(function (wrapper) {
        const id = wrapper.dataset.id;
        const searchInput = document.getElementById(id + '-search');
        if (searchInput) {
            searchInput.addEventListener('input', function () {
                const searchTerm = this.value.toLowerCase();
                const options = document.querySelectorAll('#' + id + '-dropdown .option-item');
                options.forEach(function (option) {
                    const text = option.innerText.toLowerCase();
                    if (text.includes(searchTerm)) {
                        option.style.display = '';
                    } else {
                        option.style.display = 'none';
                    }
                });
            });
        }
    });
</script>