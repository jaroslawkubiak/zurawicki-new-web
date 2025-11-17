document.addEventListener("click", (e) => {
  const cell = e.target.closest("[data-copy]");
  if (!cell) return;

  const text = cell.dataset.copy;

  navigator.clipboard
    .writeText(text)
    .then(() => {
      const tooltip = document.createElement("div");
      tooltip.textContent = "Link skopiowano do schowka!";
      tooltip.classList.add("tooltip-fade");

      tooltip.style.left = e.clientX + "px";
      tooltip.style.top = e.clientY + "px";
      tooltip.style.transform = "translate(-50%, -160%)";
      tooltip.style.background = "#10332b";
      tooltip.style.color = "#fff";
      tooltip.style.padding = "5px 10px";
      tooltip.style.borderRadius = "4px";
      tooltip.style.fontSize = "14px";

      document.body.appendChild(tooltip);

      requestAnimationFrame(() => {
        setTimeout(() => {
          tooltip.classList.add("hide");
        }, 700);
      });

      tooltip.addEventListener("transitionend", () => {
        tooltip.remove();
      });
    })
    .catch(() => {
      alert("Nie udało się skopiować tekstu.");
    });
});
