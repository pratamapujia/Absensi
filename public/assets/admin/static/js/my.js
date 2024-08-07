// Sweet Alert
const berhasil = $(".flash-data").data("berhasil");
const gagal = $(".flash-data").data("gagal");
const Toast = Swal.mixin({
    toast: true,
    position: "top",
    showConfirmButton: false,
    timer: 1500,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});
if (berhasil) {
    Toast.fire({
        icon: "success",
        background: "#4E9F3D",
        color: "#fff",
        title: berhasil,
    });
}
if (gagal) {
    Toast.fire({
        icon: "error",
        background: "#FA7070",
        color: "#fff",
        title: gagal,
    });
}

// Alert Delete
$(document).on("click", ".btn-delete", function () {
    var form = $(this).closest("form");
    var url = form.attr("action");

    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data ini akan dihapus secara permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.attr("action", url);
            form.submit();
        }
    });
});

// Tooltip
document.addEventListener(
    "DOMContentLoaded",
    function () {
        var tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    },
    false
);
