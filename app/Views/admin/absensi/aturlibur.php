<?= $this->extend('admin/templates/index'); ?>
<?= $this->section('title'); ?>
<title><?= $title; ?></title>
<?= $this->endSection(); ?>

<?= $this->section('main'); ?>

<div class="page-heading">
  <div class="page-title">
    <div class="row mb-2">
      <div class="col-12">
        <nav aria-label="breadcrumb" class="breadcrumb-header">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?= site_url('admin'); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <?= $title; ?>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <!-- Alert -->
  <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
  <!-- End Alert -->

  <section class="section">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h5 class="card-title"><?= $title; ?> Weekend</h5>
      </div>
      <div class="card-body">
        <table class="table table-striped" id="table1">
          <thead>
            <tr>
              <th>Hari</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($weekend as $key => $value) : ?>
              <tr>
                <td>
                  <span class="badge rounded-pill text-bg-primary fs-6 "><?= $value->keterangan_libur; ?></span>
                </td>
                <td>
                  <span class="badge rounded-pill text-bg-success fs-6 "><?= $value->status; ?></span>
                </td>
                <td>
                  <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input fs-3" role="switch">
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h5 class="card-title"><?= $title; ?> Nasional</h5>
        <button type="button" class="btn btn-primary rounded-pill icon icon-left ms-auto"><i class="fas fa-plus"></i> Tambah</button>
      </div>
      <div class="card-body">
        <table class="table table-striped" id="table1">
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Keterangan</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($nasional as $key => $value) : ?>
              <tr>
                <td>
                  <?= $value->tanggal_libur; ?>
                </td>
                <td>
                  <span class="badge rounded-pill text-bg-primary fs-6 "><?= $value->keterangan_libur; ?></span>
                </td>
                <td>
                  <span class="badge rounded-pill text-bg-success fs-6 "><?= $value->status; ?></span>
                </td>
                <td>
                  <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fas fa-pencil-alt"></i></a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<!-- Datatable -->
<script src="<?= base_url() ?>/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="<?= base_url() ?>/assets/static/js/pages/simple-datatables.js"></script>

<?= $this->endSection(); ?>