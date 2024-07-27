const d = document;

const image = d.getElementById("image");
const previewCtn = d.getElementById("previewCtn");

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
