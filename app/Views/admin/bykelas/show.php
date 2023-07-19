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
            <li class="breadcrumb-item">
              <a href="<?= site_url('bykelas'); ?>">Data Siswa per Kelas</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <?= $title; ?> <?= $title_kelas ?>
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
        <h5 class="card-title"><?= $title; ?> <?= $title_kelas ?></h5>
        <div class="ms-auto">
          <a href="<?= site_url('siswa/new'); ?>" class="btn btn-primary rounded-pill icon icon-left"><i class="fas fa-plus"></i> Tambah</a>
          <a href="<?= site_url('bykelas'); ?>" class="btn btn-secondary rounded-pill icon icon-left"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-striped" id="table1">
          <thead>
            <tr>
              <th>No</th>
              <th>Foto</th>
              <th>NIS</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Alamat</th>
              <th>Kelas</th>
              <th>Nomor HP</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($siswa as $key => $value) : ?>
              <tr>
                <td><?= $key + 1; ?></td>
                <td>
                  <img src="<?= base_url(); ?>/assets/static/images/foto_siswa/<?= $value->foto_siswa; ?>" alt="Foto" class="img-thumbnail" width="100">
                </td>
                <td><?= $value->nis; ?></td>
                <td><?= $value->nama_siswa; ?></td>
                <td><?= $value->jenis_kelamin; ?></td>
                <td><?= $value->tgl_lahir; ?></td>
                <td><?= $value->alamat_siswa; ?></td>
                <td><?= $value->nama_kelas; ?></td>
                <td><?= $value->telepone_siswa; ?></td>
                <td>
                  <a href="<?= site_url('siswa/' . $value->id_siswa . '/edit'); ?>" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Data"><i class="fas fa-pencil-alt"></i></a>
                  <form action="<?= site_url('siswa/' . $value->id_siswa); ?>" method="POST" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="button" class="btn btn-danger btn-sm btn-delete" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></button>
                  </form>
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