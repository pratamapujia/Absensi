<?= $this->extend('admin/templates/index'); ?>
<?= $this->section('title'); ?>
<title><?= $title; ?></title>
<?= $this->endSection(); ?>

<?= $this->section('main'); ?>

<style>
  .card {
    box-shadow: 0 5px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
    transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
    border: 0;
    border-radius: 1rem
  }

  .card:hover {
    transform: scale(1.03);
    box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06)
  }
</style>

<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Data Siswa per Kelas</h3>
        <p class="text-subtitle text-muted">
          Pilih kelas untuk melihat masing-masing siswa setiap kelas.
        </p>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="row">
      <?php foreach ($kelas as $key => $value) : ?>
        <div class="col-12 col-md-4">
          <a href="<?= site_url('bykelas/' . $value->id_kelas); ?>">
            <div class="card">
              <div class="card-body py-4 px-4">
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-xl bg-primary">
                    <span class="avatar-content">
                      <div class="icon dripicons dripicons-user-group"></div>
                    </span>
                  </div>
                  <div class="ms-3 name">
                    <h5 class="text-dark"><?= $value->nama_kelas; ?></h5>
                    <h5 class="mb-0">Jumlah Siswa : <span class="fs-3 text-danger"><?= $jumlahSiswa[$value->id_kelas]; ?></span></h5>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  </section>
</div>

<?= $this->endSection(); ?>