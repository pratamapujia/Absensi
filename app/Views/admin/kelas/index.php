<?= $this->extend('admin/templates/header'); ?>
<?= $this->section('title'); ?>
<title>Data Kelas</title>
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
          Data Kelas
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
      <h5 class="card-title">Data Kelas</h5>
      <button type="button" class="btn btn-primary rounded-pill icon icon-left ms-auto" data-bs-toggle="modal" data-bs-target="#modalForm"><i class="fas fa-plus"></i> Tambah</button>
    </div>

    <!-- Modal Form Start -->
    <div class="modal fade text-left modal-borderless" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <?php $errors = session()->getFlashdata('errors') ?>
          <div class="modal-header">
            <h4 class="modal-title" id="formModal">
              Tambah Kelas
            </h4>
          </div>
          <?php $validation = \Config\Services::validation(); ?>
          <form action="<?= site_url('kelas'); ?>" class="form" method="post" autocomplete="off">
            <?= csrf_field(); ?>
            <div class="modal-body">
              <label for="nama_kelas">Nama Kelas <strong class="text-danger">*</strong></label>
              <div class="form-group">
                <input type="text" id="nama_kelas" class="form-control <?= $validation->hasError('nama_kelas') ? 'is-invalid' : null ?>" name="nama_kelas" value="<?= old('nama_kelas'); ?>">
                <div class="invalid-feedback">
                  <?= $validation->getError('nama_kelas'); ?>
                </div>
              </div>
              <label for="kode_kelas">Kelas <strong class="text-danger">*</strong></label>
              <div class="form-group">
                <select class="form-select <?= $validation->hasError('kode_kelas') ? 'is-invalid' : null ?>" id="kode_kelas" name="kode_kelas">
                  <option value="" hidden></option>
                  <option value=10 <?= old('kode_kelas') == 10 ? 'selected' : null; ?>>10</option>
                  <option value=11 <?= old('kode_kelas') == 11 ? 'selected' : null; ?>>11</option>
                  <option value=12 <?= old('kode_kelas') == 12 ? 'selected' : null; ?>>12</option>
                </select>
                <div class="invalid-feedback">
                  <?= $validation->getError('kode_kelas'); ?>
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
    </div>
    <!-- Modal Form End -->

    <div class="card-body">
      <table class="table table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Kelas</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($kelas as $key => $value) : ?>
            <tr>
              <td><?= $key + 1; ?></td>
              <td><?= $value->nama_kelas; ?></td>
              <td><?= $value->kode_kelas; ?></td>
              <td>
                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $value->id_kelas ?>" data-bs-placement="top" title="Edit Data"><i class="fas fa-pencil-alt"></i></a>
                <form action="<?= site_url('kelas/' . $value->id_kelas); ?>" method="POST" class="d-inline">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="button" class="btn btn-danger btn-sm btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></button>
                </form>
              </td>
            </tr>
            <!-- Modal Edit Form Start -->
            <div class="modal fade text-left modal-borderless" id="modalEdit<?= $value->id_kelas ?>" tabindex="-1" role="dialog" aria-labelledby="formModal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title" id="formModal">
                      Edit Kelas
                    </h4>
                  </div>
                  <?php $validation = \Config\Services::validation(); ?>
                  <form action="<?= site_url('kelas/' . $value->id_kelas); ?>" class="form" method="post" autocomplete="off">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="modal-body">
                      <label for="nama_kelas">Nama Kelas <strong class="text-danger">*</strong></label>
                      <div class="form-group">
                        <input type="text" id="nama_kelas" class="form-control <?= $validation->hasError('nama_kelas') ? 'is-invalid' : null ?>" name="nama_kelas" value="<?= old('nama_kelas', $value->nama_kelas); ?>">
                        <div class="invalid-feedback">
                          <?= $validation->getError('nama_kelas'); ?>
                        </div>
                      </div>
                      <label for="kode_kelas">Kelas <strong class="text-danger">*</strong></label>
                      <div class="form-group">
                        <select class="form-select <?= $validation->hasError('kode_kelas') ? 'is-invalid' : null ?>" id="kode_kelas" name="kode_kelas">
                          <option value="" hidden></option>
                          <option value=10 <?= old('kode_kelas', $value->kode_kelas) == 10 ? 'selected' : null; ?>>10</option>
                          <option value=11 <?= old('kode_kelas', $value->kode_kelas) == 11 ? 'selected' : null; ?>>11</option>
                          <option value=12 <?= old('kode_kelas', $value->kode_kelas) == 12 ? 'selected' : null; ?>>12</option>
                        </select>
                        <div class="invalid-feedback">
                          <?= $validation->getError('kode_kelas'); ?>
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
            </div>
            <!-- Modal Edit Form End -->
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
</div>

<!-- Script -->

<!-- Datatable -->
<script src="<?= base_url() ?>/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="<?= base_url() ?>/assets/static/js/pages/simple-datatables.js"></script>

<?= $this->endSection(); ?>