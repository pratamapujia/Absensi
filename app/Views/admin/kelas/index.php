<?= $this->extend('admin/templates/header'); ?>
<?= $this->section('title'); ?>
<title>Beranda</title>
<?= $this->endSection(); ?>

<?= $this->section('main'); ?>

<div class="page-heading">
  <div class="page-title">
    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?= site_url('/'); ?>">Beranda</a>
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
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>10TKJ1</td>
            <td>X</td>
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


<?= $this->endSection(); ?>