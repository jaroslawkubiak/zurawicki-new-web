"use strict";
// ujawnia button zacznij gdy wpisany jest poprawny email oraz usuwa value aby nie można było zatwierdzić formularza enterem
const btnZacznij = document.getElementById("btn-zacznij");
const emailInput = document.getElementById("email");
const btnSubmit = document.getElementById("submit");

function validateEmail() {
  const validRegex =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  // przy starcie ankiety
  if (btnZacznij) {
    if (validRegex.test(emailInput.value)) {
      btnZacznij.classList.remove("btn-disabled");
      btnZacznij.value = "Zacznij";
    } else {
      btnZacznij.classList.add("btn-disabled");
      btnZacznij.value = "";
    }
  }

  // wypełanie formularza - dane ogólne
  if (validRegex.test(emailInput.value)) {
    emailInput.style.borderColor = "black";
    if (btnSubmit) btnSubmit.classList.remove("hidden");
  } else {
    emailInput.style.borderColor = "crimson";
    if (btnSubmit) btnSubmit.classList.add("hidden");
  }
}

if (emailInput) emailInput.addEventListener("keyup", validateEmail);
if (emailInput) emailInput.addEventListener("selectionchange", validateEmail);

const allInputs = document.querySelectorAll('.form-list li input[type="checkbox"]');
const allSelects = document.querySelectorAll(".form-list li select");

if (allInputs)
  allInputs.forEach((input, index) => {
    if (index !== allInputs.length - 1) {
      input.addEventListener("click", e => {
        const selectIlosc = document.getElementById(`${e.target.id}_ilosc`);
        if (selectIlosc) selectIlosc.value = e.target.checked ? 1 : 0;
      });
    }
  });

if (allSelects)
  allSelects.forEach((select, index) => {
    select.addEventListener("change", e => {
      if (Number(e.target.value) === 0) {
        const idCheckboxa = e.target.id.slice(0, -6);
        const inputChecked = document.getElementById(idCheckboxa);
        inputChecked.checked = false;
      } else {
        const idCheckboxa = e.target.id.slice(0, -6);
        const inputChecked = document.getElementById(idCheckboxa);
        inputChecked.checked = true;
      }
    });
  });

const kuchniaDodatki = document.querySelectorAll(".kuchnia-dodatki-wrapper input[type=checkbox]");
const dodatki = [];
if (kuchniaDodatki) {
  kuchniaDodatki.forEach(dodatek => {
    dodatek.addEventListener("click", e => {
      const szukanyRootEl = e.target.id.slice(0, 7);
      const nrDodatku = e.target.id.slice(-1);
      const nrOpcji = e.target.id.slice(6, 7);
      const rootDoZaznaczenia = document.getElementById(`kuchnia-${szukanyRootEl}`);
      const rodzenstwo =
        nrDodatku === "1"
          ? document.getElementById(`opcja-${nrOpcji}-dodatek-2`)
          : document.getElementById(`opcja-${nrOpcji}-dodatek-1`);

      //zaznaczamy rodzica
      if (e.target.checked) rootDoZaznaczenia.checked = true;

      //odznaczamy rodzeństwo jak jest zaznaczone - może być wybrany tylko jeden dodatek
      if (rodzenstwo.checked) rodzenstwo.checked = false;
    });
  });

  // odznaczamy dodatkowe opcje, jeżeli odznaczymy rodzica tych dodatków
  const opcjeZDodatkami = document.querySelectorAll("[data-dodatki]");
  opcjeZDodatkami.forEach(opcja => {
    opcja.addEventListener("click", e => {
      const nazwaDodatkow = e.target.id.slice(-7);
      if (!e.target.checked) {
        document.getElementById(`${nazwaDodatkow}-dodatek-1`).checked = false;
        document.getElementById(`${nazwaDodatkow}-dodatek-2`).checked = false;
      }
    });
  });
}

// kuchnia - klikając na pole tekstowe - zaznaczamy rodzica
const kuchniaPoleInput = document.querySelectorAll("[data-dodatek-text-input]");
kuchniaPoleInput.forEach(opcja => {
  opcja.addEventListener("keyup", e => {
    const szukanyRootEl = e.target.name.slice(0, -10);
    const rootDoZaznaczenia = document.querySelector(`[data-${szukanyRootEl}]`);
    if (e.target.value) rootDoZaznaczenia.checked = true;
    else rootDoZaznaczenia.checked = false;
  });
});

// progress bar
const progressBarSteps = [0, 1, 16, 32, 40, 58, 72, 90, 100];
const progressBarWrapper = document.querySelector(".progress-bar-wrapper");
const progressBarWrapperInner = document.querySelector(".progress-bar-inner");
if (progressBarWrapperInner) {
  const etap = Number(document.querySelector("input[name=etap]").value) - 1;

  //ustawiamy początkową wartość progresu
  progressBarWrapperInner.style.width = `${progressBarSteps[etap - 1]}%`;

  setTimeout(() => {
    let progress = progressBarSteps[etap];
    progressBarWrapperInner.style.width = `${progress}%`;
    progressBarWrapperInner.style.transition = `width 1s ease-in`;
  }, 500);
}
