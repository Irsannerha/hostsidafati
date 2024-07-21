@props(['placeholder' => 'Upload File', 'name', 'accept' => 'application/pdf'])
@php
    $id = $name;
@endphp
<div>
    <div id="{{$id}}-upload" data-id="{{$id}}"
        class="max-w-file-input border-1 flex bg-main-white border-input-focus p-8px justify-center items-center font-semibold rounded-5 text-input-focus cursor-pointer">
        <x-phosphor-upload-simple-bold class="w-5 h-5" id="{{$id}}-icon" />
        <span id="{{$id}}-fileName" name="{{$name}}-fileName"
            class="text-center w-[50%] cursor-pointer bg-transparent">{{$placeholder}}</span>
    </div>
    <input type="file" id="{{$id}}" name="{{$name}}" value="{{ $value ?? '' }}" class="hidden" {{$attributes}}
        accept="{{$accept}}" />
    <div id="{{$id}}-error" class="text-red-500 mt-2 hidden"></div> <!-- Error message element -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const uploadElement = document.getElementById('{{$id}}-upload');
        const inputElement = document.getElementById('{{$id}}');
        const fileNameElement = document.getElementById('{{$id}}-fileName');
        const uploadIcon = document.getElementById('{{$id}}-icon');
        const errorElement = document.getElementById('{{$id}}-error');
        const maxFileSize = 1 * 1024 * 1024;

        uploadElement.addEventListener('click', function () {
            inputElement.click();
        });

        inputElement.addEventListener('change', function () {
            if (inputElement.files.length > 0) {
                const file = inputElement.files[0];
                if (file.size > maxFileSize) {
                    errorElement.textContent = 'File size exceeds 1 MB';
                    errorElement.classList.remove('hidden');
                    fileNameElement.innerText = '{{$placeholder}}';
                    uploadIcon.classList.remove('hidden');
                    fileNameElement.classList.remove('w-full');
                    fileNameElement.classList.add('w-[50%]');
                } else {
                    const fileName = file.name;
                    fileNameElement.innerText = fileName;
                    fileNameElement.classList.remove('w-[50%]');
                    fileNameElement.classList.add('w-full');
                    uploadIcon.classList.add('hidden');
                    errorElement.classList.add('hidden');
                }
            } else {
                fileNameElement.innerHTML = '{{$placeholder}}';
                uploadIcon.classList.remove('hidden');
                fileNameElement.classList.remove('w-full');
                fileNameElement.classList.add('w-[50%]');
                errorElement.classList.add('hidden');
            }
        });
    })
</script>