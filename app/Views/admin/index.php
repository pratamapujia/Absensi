<?= $this->extend('admin/templates/header'); ?>
<?= $this->section('title'); ?>
<title>Beranda</title>
<?= $this->endSection(); ?>

<?= $this->section('main'); ?>

<div class="page-heading">
  <section class="section">
    <div class="row">
      <div class="col-12 col-md-3">
        <div class="card" style="height: 270px;">
          <div class="card-header">
            <h4 class="card-title">
              <span class="fs-3"><i class="bi bi-alarm"></i></span>
              Hari ini.
            </h4>
          </div>
          <div class="card-body ">
            <h4 id="clocknow" class="text-danger"></h4>
            <h6 id="datenow"></h6>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-9">
        <div class="card" style="height: 270px;">
          <div class="card-header">
            <h4 class="card-title">About Vertical Navbar</h4>
          </div>
          <div class="card-body">
            <p>
              Vertical Navbar is a layout option that you can use with
              Mazer.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-4">
        <div class="card" style="height: 190px;">
          <div class="card-body py-4 px-4">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl bg-primary">
                <span class="avatar-content">
                  <div class="icon dripicons dripicons-user-group"></div>
                </span>
              </div>
              <div class="ms-3 name">
                <h5 class="font-bold">Jumlah Siswa</h5>
                <h3 class="text-muted mb-0">200</h3>
                <div class="progress progress-primary progress-sm mb-4">
                  <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="200" aria-valuemin="0" aria-valuemax="900"></div>
                </div>
                <span>Total seluruh siswa aktif ataupun tidak aktif</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="card" style="height: 190px;">
          <div class="card-body py-4 px-4">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl bg-info">
                <span class="avatar-content">
                  <div class="icon dripicons dripicons-user"></div>
                </span>
              </div>
              <div class="ms-3 name">
                <h5 class="font-bold">Jumlah Pengguna</h5>
                <h3 class="text-muted mb-0">110</h3>
                <div class="progress progress-info progress-sm mb-4">
                  <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="200" aria-valuemin="0" aria-valuemax="900"></div>
                </div>
                <span>3 akun staff dan 107 akun siswa</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="card" style="height: 190px;">
          <div class="card-body py-4 px-4">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl bg-danger">
                <span class="avatar-content">
                  <div class="icon dripicons dripicons-store"></div>
                </span>
              </div>
              <div class="ms-3 name">
                <h5 class="font-bold">Jumlah Kelas</h5>
                <h3 class="text-muted mb-0">5</h3>
                <div class="progress progress-danger progress-sm mb-4">
                  <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="200" aria-valuemin="0" aria-valuemax="900"></div>
                </div>
                <span>dari 3 jurusan</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection(); ?>