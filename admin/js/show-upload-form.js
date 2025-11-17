const publikacjaModal = document.getElementById("nowa-publikacja");
const dodajBtn = document.getElementById("dodaj-btn");
const closeBtn = document.getElementById("close-btn");
const imageIcon = document.getElementById("image-icon");
const imagePreview = document.getElementById("preview");

dodajBtn.addEventListener("click", () => {
  publikacjaModal.classList.remove("hidden");
});

closeBtn.addEventListener("click", (e) => {
  publikacjaModal.classList.add("hidden");
});

document.getElementById("image").addEventListener("change", function () {
  const file = this.files[0];

  if (file) {
    imageIcon.classList.add("hidden");

    // pokazanie nazwy pliku
    document.getElementById("file-info").textContent = file.name;
    document.getElementById("file-info").style.display = "block";

    // podgląd zdjęcia
    const preview = document.getElementById("preview");
    preview.src = URL.createObjectURL(file);
    preview.style.display = "block";
  }
});

imagePreview.addEventListener("click", function () {
  document.getElementById("image").click();
});
