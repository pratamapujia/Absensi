<?= $this->extend('admin/templates/header'); ?>
<?= $this->section('title'); ?>
<title>Data Jurusan</title>
<?= $this->endSection(); ?>

<?= $this->section('main'); ?>

<div class="page-heading">
  <div class="page-title">
    <nav aria-label="breadcrumb" class="breadcrumb-header float-start">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= site_url('admin'); ?>">Beranda</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Data Jurusan
        </li>
      </ol>
    </nav>
  </div>
</div>

<!-- Alert -->
<div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
<!-- End Alert -->

<section class="section">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h5 class="card-title">Data Jurusan</h5>
      <button type="button" class="btn btn-primary rounded-pill icon icon-left ms-auto" data-bs-toggle="modal" data-bs-target="#modalForm"><i class="fas fa-plus"></i> Tambah</button>
    </div>

    <!-- Modal Form Start -->
    <div class="modal fade text-left modal-borderless" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <!-- </?php $errors = session()->getFlashdata('errors') ?> -->
          <div class="modal-header">
            <h4 class="modal-title" id="formModal">
              Tambah Jurusan
            </h4>
          </div>
          <form action="<?= site_url('jurusan'); ?>" id="formTambah" class="form" method="post" autocomplete="off">
            <?= csrf_field(); ?>
            <div class="modal-body">
              <label for="nama_jurusan">Nama Jurusan <strong class="text-danger">*</strong></label>
              <div class="form-group">
                <input type="text" id="nama_jurusan" class="form-control" name="nama_jurusan" value="<?= old('nama_jurusan'); ?>">
                <!-- <div class="invalid-feedback"> -->
                <!-- </?= $validation->showError('nama_jurusan'); ?> -->
                <!-- </div> -->
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Close</span>
              </button>
              <button type="submit" class="btn btn-primary ms-1">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Simpan</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal Form End -->

    <div class="card-body">
      <table class="table table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Jurusan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($jurusan as $key => $value) : ?>
            <tr>
              <td><?= $key + 1; ?></td>
              <td><?= $value->nama_jurusan; ?></td>
              <td>
                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $value->id_jurusan ?>" data-bs-placement="top" title="Edit Data"><i class="fas fa-pencil-alt"></i></a>
                <form action="<?= site_url('jurusan/' . $value->id_jurusan); ?>" method="POST" class="d-inline">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="button" class="btn btn-danger btn-sm btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></button>
                </form>
              </td>
            </tr>
            <!-- Modal Edit Form Start -->
            <!-- <div class="modal fade text-left modal-borderless" id="modalEdit</?= $value->id_jurusan ?>" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="formModal">
                      Edit Jurusan
                    </h4>
                  </div>
                  <form action="</?= site_url('jurusan/' . $value->id_jurusan); ?>" class="form" method="post" autocomplete="off">
                    </?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="modal-body">
                      <label for="nama_jurusan">Nama Jurusan <strong class="text-danger">*</strong></label>
                      <div class="form-group">
                        <input type="text" id="nama_jurusan" class="form-control" name="nama_jurusan" value="</?= old('nama_jurusan', $value->nama_jurusan); ?>">
                        <div class="invalid-feedback">
                          </?= $validation->getError('nama_jurusan'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                      </button>
                      <button type="submit" class="btn btn-primary ms-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div> -->
            <!-- Modal Edit Form End -->
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
</div>

<!-- Script -->
<script>
  // $(document).ready(function() {
  //   $('#formTambah').submit(function(event) {
  //     event.preventDefault()
  //     $.ajax({
  //       url: '<?= base_url('jurusan') ?>',
  //       type: 'POST',
  //       data: $(this).serialize(),
  //       dataType: 'json',
  //       success: function(response) {
  //         $('#formTambah .is-invalid').removeClass('is-invalid');
  //         $('#formTambah .invalid-feedback').remove();

  //         if (response.success) {
  //           $('#modalForm').modal('hide');
  //           alert(response.success);
  //         } else if (response) {
  //           $.each(response, function(key, value) {
  //             var field = $('#formTambah [name="' + key + '"]');
  //             field.addClass('is-invalid');
  //             field.after('<div class="invalid-feedback">' + value + '<div>');
  //           });
  //         }
  //       },
  //     });
  //   });
  //   $('#modalForm').on('hidden.bs.modal', function() {
  //     $('#formTambah')[0].reset();
  //     $('.is-invalid').removeClass('is-invalid').siblings('.invalid-feedback').html('');
  //   })
  // });
  document.addEventListener('DOMContentLoaded', function() {
    var formTambah = document.getElementById('formTambah');

    // Ketika form disubmit
    formTambah.addEventListener('submit', function(event) {
      event.preventDefault();

      // Buat objek FormData dari data form
      var formData = new FormData(formTambah);

      // Kirim data form ke server menggunakan fetch()
      fetch('<?= base_url('jurusan') ?>', {
          method: 'POST',
          body: formData
        })
        .then(function(response) {
          if (response.ok) {
            // Jika respons dari server OK, tampilkan pesan sukses
            response.json().then(function(data) {
              document.getElementById('formTambah').reset();
              $('#modalForm').modal('hide');
              alert(data.success);
            });
          } else {
            // Jika respons dari server tidak OK, tampilkan single error pada form input
            response.json().then(function(errors) {
              var formInputs = formTambah.querySelectorAll('.form-control');
              for (var i = 0; i < formInputs.length; i++) {
                var inputName = formInputs[i].getAttribute('name');
                if (errors[inputName]) {
                  formInputs[i].classList.add('is-invalid');
                  var errorFeedback = formInputs[i].closest('.form-group').querySelector('.invalid-feedback');
                  if (!errorFeedback) {
                    errorFeedback = document.createElement('div');
                    errorFeedback.classList.add('invalid-feedback');
                    formInputs[i].closest('.form-group').appendChild(errorFeedback);
                  }
                  errorFeedback.innerHTML = errors[inputName];
                } else {
                  formInputs[i].classList.remove('is-invalid');
                  var errorFeedback = formInputs[i].closest('.form-group').querySelector('.invalid-feedback');
                  if (errorFeedback) {
                    errorFeedback.innerHTML = '';
                  }
                }
              }
            });
          }
        })
        .catch(function(error) {
          console.error('Error:', error);
        });
    });
  });
</script>

<!-- Datatable -->
<script src="<?= base_url() ?>/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="<?= base_url() ?>/assets/static/js/pages/simple-datatables.js"></script>

<?= $this->endSection(); ?>