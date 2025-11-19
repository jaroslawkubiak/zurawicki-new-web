const publikacjaModal = document.getElementById("nowa-publikacja");
const dodajBtn = document.getElementById("dodaj-btn");
const closeBtn = document.getElementById("close-btn");
const imageIcon = document.getElementById("image-icon");
const imagePreview = document.getElementById("preview");

const titleInput = document.getElementById("title");
const dateInput = document.getElementById("date");
const linkInput = document.getElementById("link");

const fileInput = document.getElementById("image");
const submitBtn = document.querySelector(".publikacje-button");
const previewImg = document.getElementById("preview");

const form = document.querySelector("#nowa-publikacja form");
const imageInput = document.querySelector("#image");
const imageError = document.querySelector("#image-error");

// otwarcie modala - tryb dodawania
dodajBtn.addEventListener("click", () => {
  validateForm();

  document.querySelector("#edit_id").value = ""; // usuń id = tryb dodawania

  document.querySelector("#title").value = "";
  document.querySelector("#date").value = "";
  document.querySelector("#link").value = "";
  titleInput.required = true;
  dateInput.required = true;
  linkInput.required = true;

  // zdjęcie ukryj
  document.querySelector("#preview").style.display = "none";
  imageIcon.classList.remove("hidden");

  // zmień napis przycisku
  document.querySelector(".publikacje-button").value = "Dodaj";
  publikacjaModal.classList.remove("hidden");
});

// zamykanie modala
closeBtn.addEventListener("click", (e) => {
  publikacjaModal.classList.add("hidden");
});

// wybor plików - tryb dodawania
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

// otwórz ponownie wybór plików
imagePreview.addEventListener("click", function () {
  document.getElementById("image").click();
});

document.querySelectorAll(".edit-btn").forEach((btn) => {
  // otwarcie modala w trybie edycji
  btn.addEventListener("click", () => {
    // pobranie danych z data-
    const id = btn.dataset.id;
    const title = btn.dataset.title;
    const date = btn.dataset.date;
    const link = btn.dataset.link;
    const image = btn.dataset.image;
    imageIcon.classList.add("hidden");
    titleInput.required = false;
    dateInput.required = false;
    linkInput.required = false;

    document.querySelector("#edit_id").value = id;
    document.querySelector("#title").value = title;
    document.querySelector("#date").value = date;
    document.querySelector("#link").value = link;

    const preview = document.querySelector("#preview");
    preview.src = "../img/publikacje/" + image;
    preview.style.display = "block";

    validateForm();
    document.querySelector(".publikacje-button").value = "Zapisz zmiany";

    document.querySelector("#nowa-publikacja").classList.remove("hidden");
  });
});

form.addEventListener("submit", function (e) {
  // jeśli tryb dodawania
  const isEditing = document.querySelector("#edit_id").value !== "";

  if (!isEditing) {
    if (!imageInput.files || imageInput.files.length === 0) {
      e.preventDefault();
      imageError.textContent = "Musisz dodać zdjęcie!";
      return;
    }
  }

  // jeśli wszystko ok
  imageError.textContent = "";
});

imageInput.addEventListener("change", () => {
  if (imageInput.files.length > 0) {
    imageError.textContent = "";
  }
});

function isImagePreloaded() {
  // Jeśli preview ma jakieś src i nie jest puste → zdjęcie jest już z bazy
  return (
    previewImg.src &&
    !previewImg.src.includes("base64") &&
    previewImg.src !== window.location.href
  );
}

function validateForm() {
  const hasImage = fileInput.files.length > 0 || isImagePreloaded();
  const hasTitle = titleInput.value.trim() !== "";
  const hasDate = dateInput.value.trim() !== "";
  const hasLink = linkInput.value.trim() !== "";

  if (hasImage && hasTitle && hasDate && hasLink) {
    submitBtn.classList.remove("disabled");
  } else {
    submitBtn.classList.add("disabled");
  }
}

// obserwowanie pól tekstowych
[titleInput, dateInput, linkInput].forEach((input) => {
  input.addEventListener("input", validateForm);
});

// obserwowanie inputu file
fileInput.addEventListener("change", validateForm);
