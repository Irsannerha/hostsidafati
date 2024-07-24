const inputElement = document.getElementById("fileInput");
const uploadElement = document.getElementById("upload");
const fileNameElement = document.getElementById("fileName");
const uploadIcon = document.getElementById("icon");
const errorElement = document.getElementById("error");
const maxFileSize = 1 * 1024 * 1024;

uploadElement.addEventListener("click", function () {
    inputElement.click();
});

inputElement.addEventListener("change", function () {
    if (inputElement.files.length > 0) {
        const file = inputElement.files[0];
        if (file.size > maxFileSize) {
            errorElement.textContent = "File size exceeds 1 MB";
            errorElement.classList.remove("hidden");
            fileNameElement.innerText = "Upload file";
            uploadIcon.classList.remove("hidden");
            fileNameElement.classList.remove("w-full");
            fileNameElement.classList.add("w-[50%]");
        } else {
            const fileName = file.name;
            fileNameElement.innerText = fileName;
            fileNameElement.classList.remove("w-[50%]");
            fileNameElement.classList.add("w-full");
            uploadIcon.classList.add("hidden");
            errorElement.classList.add("hidden");
        }
    } else {
        fileNameElement.innerHTML = "Upload file";
        uploadIcon.classList.remove("hidden");
        fileNameElement.classList.remove("w-full");
        fileNameElement.classList.add("w-[50%]");
        errorElement.classList.add("hidden");
    }
});
