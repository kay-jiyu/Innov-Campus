/* ─── ADDS PROJECTS ─── */
(function () {
  var fileInput = document.getElementById("logo");
  var preview = document.getElementById("logoPreview");
  var placeholder = document.querySelector(".preview-placeholder");
  var dropZone = document.querySelector(".upload-zone");

  if (!fileInput || !preview || !dropZone) return;

  function loadFile(file) {
    if (!file || !file.type.startsWith("image/")) return;

    var reader = new FileReader();

    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = "block";

      if (placeholder) {
        placeholder.style.display = "none";
      }

      var lbl = dropZone.querySelector(".upload-label");

      if (lbl) {
        lbl.textContent = file.name;
      }
    };

    reader.readAsDataURL(file);
  }

  fileInput.addEventListener("change", function () {
    if (this.files[0]) {
      loadFile(this.files[0]);
    }
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

    if (file) {
      loadFile(file);
    }
  });
})();

/* ─── PROJECTS ─── */

document.addEventListener("DOMContentLoaded", function () {
  if (typeof checkClamped === "function") {
    setTimeout(checkClamped, 50);
  }

  document.querySelectorAll(".menu_principal a").forEach(function (a) {
    if (a.href === window.location.href) {
      a.classList.add("active");
    }
  });
});

/* ─── DELETE POPUP ─── */

let deleteId = null;

function openDeletePopup(id) {
  deleteId = id;

  const overlay = document.getElementById("deleteOverlay");

  if (overlay) {
    overlay.classList.add("active");
  }
}

const confirmDelete = document.getElementById("confirmDelete");

const cancelDelete = document.getElementById("cancelDelete");

const deleteOverlay = document.getElementById("deleteOverlay");

if (confirmDelete) {
  confirmDelete.addEventListener("click", function () {
    if (deleteId !== null) {
      window.location.href = "index.php?pg=del&id=" + deleteId;
    }
  });
}

if (cancelDelete) {
  cancelDelete.addEventListener("click", function () {
    deleteId = null;

    if (deleteOverlay) {
      deleteOverlay.classList.remove("active");
    }
  });
}

if (deleteOverlay) {
  deleteOverlay.addEventListener("click", function (e) {
    if (e.target === this) {
      deleteId = null;

      this.classList.remove("active");
    }
  });
}

/* ─── BURGER ─── */

(function () {
  var burger = document.getElementById("burger");

  var mobileNav = document.getElementById("mobileNav");

  var overlay = document.getElementById("navOverlay");

  if (!burger || !mobileNav || !overlay) return;

  function openNav() {
    burger.classList.add("open");

    mobileNav.classList.add("open");

    overlay.classList.add("open");

    document.body.style.overflow = "hidden";
  }

  function closeNav() {
    burger.classList.remove("open");

    mobileNav.classList.remove("open");

    overlay.classList.remove("open");

    document.body.style.overflow = "";
  }

  burger.addEventListener("click", function () {
    if (mobileNav.classList.contains("open")) {
      closeNav();
    } else {
      openNav();
    }
  });

  overlay.addEventListener("click", closeNav);

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
      closeNav();
    }
  });
})();
