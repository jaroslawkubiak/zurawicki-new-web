document.addEventListener("click", (e) => {
  const cell = e.target.closest("[data-copy]");
  if (!cell) return;

  const text = cell.dataset.copy;

  navigator.clipboard.writeText(text).catch(() => {});
});
