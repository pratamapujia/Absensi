<?= $this->extend('admin/templates/header'); ?>
<?= $this->section('title'); ?>
<title>Beranda</title>
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
          Data Siswa
        </li>
      </ol>
    </nav>
  </div>
</div>
<section class="section">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h5 class="card-title">Data Siswa</h5>
      <button class="btn btn-primary rounded-pill icon icon-left ms-auto"><i class="fas fa-plus"></i> Tambah</button>
    </div>
    <div class="card-body">
      <table class="table table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Kelas</th>
            <th>Tanggal Lahir</th>
            <th>Nomor HP</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>123456/td>
            <td>Pratama PUji A</td>
            <td>Laki-Laki</td>
            <td>Jl. Tropodo</td>
            <td>XI</td>
            <td>20 Agustus 2000</td>
            <td>081556551</td>
            <td>
              <span class="badge bg-success">Active</span>
            </td>
          </tr>
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