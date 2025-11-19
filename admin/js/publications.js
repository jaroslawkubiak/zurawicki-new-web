const publikacjaModal = document.getElementById("nowa-publikacja");
const form = document.querySelector("#nowa-publikacja form");
const modalWrapper = document.getElementById("modal-window");
const responseWrapper = document.getElementById("response-wrapper");
const labels = modalWrapper.querySelectorAll("label");

// buttons
const dodajBtn = document.getElementById("dodaj-btn");
const closeBtn = document.getElementById("close-btn");
const deleteBtn = document.getElementById("delete-btn");
const submitBtn = document.getElementById("submit");

// inputs
const titleInput = document.getElementById("title");
const dateInput = document.getElementById("date");
const linkInput = document.getElementById("link");
const fileInput = document.getElementById("image");

// hidden elemnts
const editIdInput = document.getElementById("edit_id");
const deleteIdInput = document.getElementById("delete_id");

// image
const imageIcon = document.getElementById("image-icon");
const imagePreview = document.getElementById("preview");
const imageInput = document.querySelector("#image");
const imageError = document.querySelector("#image-error");
const imageTitle = document.querySelector(".publikacje-image-title");

const elementsToChange = [...labels];
elementsToChange.push(imageTitle);
elementsToChange.push(modalWrapper);
elementsToChange.push(titleInput);
elementsToChange.push(dateInput);
elementsToChange.push(linkInput);

const elementsToDisabled = [titleInput, dateInput, linkInput];

// ukrywa komunikaty po 2 sek
setTimeout(() => {
  responseWrapper.classList.add("hide-response");
}, 2000);

// otwarcie modala - tryb dodawania
dodajBtn.addEventListener("click", () => {
  validateForm();

  editIdInput.value = ""; // usuń id = tryb dodawania
  titleInput.value = "";
  dateInput.value = "";
  linkInput.value = "";
  titleInput.required = true;
  dateInput.required = true;
  linkInput.required = true;

  // zdjęcie ukryj
  imagePreview.style.display = "none";
  imageIcon.classList.remove("hidden");

  // zmień napis przycisku
  submitBtn.value = "Dodaj";
  publikacjaModal.classList.remove("hidden");
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
function openImagePicker() {
  document.getElementById("image").click();
}

imagePreview.addEventListener("click", openImagePicker);

// edycja
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

    editIdInput.value = id;
    titleInput.value = title;
    dateInput.value = date;
    linkInput.value = link;

    const preview = imagePreview;
    preview.src = "../img/publikacje/" + image;
    preview.style.display = "block";

    validateForm();
    submitBtn.value = "Zapisz zmiany";

    document.querySelector("#nowa-publikacja").classList.remove("hidden");
  });
});

form.addEventListener("submit", function (e) {
  // jeśli tryb dodawania
  const isEditing = editIdInput.value !== "";

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
    imagePreview.src &&
    !imagePreview.src.includes("base64") &&
    imagePreview.src !== window.location.href
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

// zamykanie modala i czyszczenie wszsytkich dodanych klas i wartości
closeBtn.addEventListener("click", (e) => {
  deleteIdInput.value = "";
  submitBtn.classList.remove("publikacje-usun-btn");

  elementsToChange.forEach((el) => {
    el.classList.remove("publikacje-mark-for-delete");
  });

  elementsToDisabled.forEach((e) => {
    e.disabled = false;
    e.classList.remove("publikacje-mark-for-disabled");
  });

  deleteBtn.classList.remove("hidden");
  closeBtn.classList.remove("publikacje-mark-btn-for-delete");

  imagePreview.classList.remove("publikacje-mark-img-for-disabled");
  imagePreview.addEventListener("click", openImagePicker);

  publikacjaModal.classList.add("hidden");
});

// zaznaczanie publikacji do usunięcia
deleteBtn.addEventListener("click", () => {
  submitBtn.value = "Usuń publikację";
  submitBtn.classList.add("publikacje-usun-btn");
  deleteIdInput.value = editIdInput.value;

  elementsToChange.forEach((el) => {
    el.classList.add("publikacje-mark-for-delete");
  });

  elementsToDisabled.forEach((e) => {
    e.disabled = true;
    e.classList.add("publikacje-mark-for-disabled");
  });

  deleteBtn.classList.add("hidden");
  closeBtn.classList.add("publikacje-mark-btn-for-delete");

  imagePreview.classList.add("publikacje-mark-img-for-disabled");
  imagePreview.removeEventListener("click", openImagePicker);
});
