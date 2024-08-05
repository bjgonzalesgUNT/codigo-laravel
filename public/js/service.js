const d = document;

const image = d.getElementById("image");
const previewCtn = d.getElementById("previewCtn");
const preview = d.getElementById("preview");

const removeImg = d.getElementById("removeImg");

d.addEventListener("DOMContentLoaded", (e) => {
    if (image.getAttribute("value")) {
        previewCtn.classList.remove("hidden");
        image.classList.add("hidden");
    }
});

removeImg.addEventListener("click", (e) => {
    image.removeAttribute("value");
    image.classList.remove("hidden");
    previewCtn.classList.add("hidden");
});

image.addEventListener("change", (e) => {
    const file = e.target.files[0];
    const reader = new FileReader();

    reader.onload = (e) => {
        preview.src = e.target.result;
    };

    reader.readAsDataURL(file);
    previewCtn.classList.remove("hidden");
    image.classList.add("hidden");
});
