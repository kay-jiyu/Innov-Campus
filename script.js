/* ─── ADDS PROJECTS ─── */

(function () {
  var fileInput = document.getElementById("logo");
  var preview = document.getElementById("logoPreview");
  var placeholder = document.querySelector(".preview-placeholder");
  var dropZone = document.querySelector(".upload-zone");

  if (!fileInput || !preview || !dropZone) return;

  /* Lecture et affichage du fichier */
  function loadFile(file) {
    if (!file || !file.type.startsWith("image/")) return;
    var reader = new FileReader();
    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = "block";
      if (placeholder) placeholder.style.display = "none";
      var lbl = dropZone.querySelector(".upload-label");
      if (lbl) lbl.textContent = file.name;
    };
    reader.readAsDataURL(file);
  }

  fileInput.addEventListener("change", function () {
    if (this.files[0]) loadFile(this.files[0]);
  });

  dropZone.addEventListener("click", function () {
    fileInput.click();
  });

  dropZone.addEventListener("dragover", function (e) {
    e.preventDefault();
    dropZone.classList.add("drag-over");
  });

  dropZone.addEventListener("dragleave", function () {
    dropZone.classList.remove("drag-over");
  });

  dropZone.addEventListener("drop", function (e) {
    e.preventDefault();
    dropZone.classList.remove("drag-over");
    var file = e.dataTransfer.files[0];
    if (file) loadFile(file);
  });
})();

/* ─── PROJECTS ─── */


// @param {string} id  
// @param {HTMLElement} btn 

function toggleDesc(id, btn) {
  var el = document.getElementById(id);
  if (!el) return;

  var expanded = el.classList.toggle("expanded");
  btn.textContent = expanded ? "Réduire" : "Lire la suite";
}

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".desc-text").forEach(function (el) {
    var btn = el.nextElementSibling;
    if (!btn || !btn.classList.contains("lire-suite")) return;

    var clone = el.cloneNode(true);
    clone.style.cssText = [
      "position:absolute",
      "visibility:hidden",
      "overflow:visible",
      "-webkit-line-clamp:unset",
      "width:" + el.offsetWidth + "px",
    ].join(";");
    document.body.appendChild(clone);

    var isClamped = clone.scrollHeight > el.clientHeight + 2;
    clone.remove();

    btn.style.display = isClamped ? "inline" : "none";
  });

  var links = document.querySelectorAll(".menu_principal a");
  links.forEach(function (a) {
    if (a.href === window.location.href) a.classList.add("active");
  });
});
