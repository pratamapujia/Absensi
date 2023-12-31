// Tooltip
document.addEventListener(
  "DOMContentLoaded",
  function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
  },
  false
);

// Menu Active
var path = location.pathname.split("/");
if (path.length > 1 && path[1] !== "") {
  var url = location.origin + "/" + path[1];
} else {
  var url = location.origin;
}
var currentUrl = location.href.split("#")[0];
$(".sidebar-menu ul li a").each(function () {
  if ($(this).attr("href").indexOf(url) !== -1 || $(this).attr("href") === currentUrl) {
    $(this).parent().addClass("active").parent().parent("li").addClass("active");
  }
});

// Sweet Alert
const flashData = $(".flash-data").data("flashdata");
const Toast = Swal.mixin({
  toast: true,
  position: "top",
  background: "#4E9F3D",
  iconColor: "#fff",
  color: "#fff",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener("mouseenter", Swal.stopTimer);
    toast.addEventListener("mouseleave", Swal.resumeTimer);
  },
});
if (flashData) {
  Toast.fire({
    icon: "success",
    title: flashData,
  });
}

// Alert Delete
$(document).on("click", ".btn-delete", function () {
  var form = $(this).closest("form");
  var url = form.attr("action");

  Swal.fire({
    title: "Apakah Anda yakin? 🤔",
    text: "Data yang dihapus tidak dapat dikembalikan!",
    showCancelButton: true,
    confirmButtonColor: "#435ebe",
    cancelButtonColor: "#d33",
    confirmButtonText: "Ya, hapus!",
  }).then((result) => {
    if (result.isConfirmed) {
      form.attr("action", url + "/delete");
      form.submit();
    }
  });
});

// Preview Foto
function previewImg() {
  const gambar = document.querySelector("#foto_siswa");
  const gambarPreview = document.querySelector(".img-preview");
  const fileGambar = new FileReader();
  fileGambar.readAsDataURL(gambar.files[0]);
  fileGambar.onload = function (e) {
    gambarPreview.src = e.target.result;
  };
}
