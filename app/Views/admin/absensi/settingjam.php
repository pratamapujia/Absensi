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
        <h5 class="card-title"><?= $title; ?></h5>
      </div>
      <div class="card-body">
        <table class="table table-striped" id="table1">
          <thead>
            <tr>
              <th>No</th>
              <th>Tipe</th>
              <th>Mulai</th>
              <th>Selesai</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($jamAbsen as $key => $value) : ?>
              <tr>
                <td><?= $key + 1; ?></td>
                <td>
                  <span class="badge rounded-pill text-bg-primary fs-6 "><?= $value->type; ?></span>
                </td>
                <td><?= $value->mulai_absen; ?></td>
                <td><?= $value->selesai_absen; ?></td>
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