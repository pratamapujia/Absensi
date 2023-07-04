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
            <li class="breadcrumb-item" aria-current="page">
              <a href="<?= site_url('siswa'); ?>">Edit Siswa</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <?= $title; ?>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"><?= $title; ?></h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <form class="form">
                <div class="row">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="nama_siswa">Nama Siswa</label>
                      <input type="text" id="nama_siswa" class="form-control" name="nama_siswa" />
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="nis">NIS</label>
                      <input type="text" id="nis" class="form-control" name="nis" />
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="tgl_lahir">Tanggal Lahir</label>
                      <input type="date" id="tgl_lahir" class="form-control" name="tgl_lahir" />
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="jk">Jenis Kelamin</label>
                      <select name="jk" id="jk" class="form-select">
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="kode_kelas">Kelas</label>
                      <select name="kode_kelas" id="kode_kelas" class="form-select">
                        <option value="">10 OTKP 1</option>
                        <option value="">10 OTKP 2</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="kode_jurusan">Jurusan</label>
                      <select name="kode_jurusan" id="kode_jurusan" class="form-select">
                        <option value="">OTKP</option>
                        <option value="">TBSM</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="telepon">No Telepon</label>
                      <input type="text" id="telepon" class="form-control" name="telepon" />
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="alamat_siswa">Alamat</label>
                      <input type="text" id="alamat_siswa" class="form-control" name="alamat_siswa" />
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="foto_siswa">Foto</label>
                      <input type="file" id="foto_siswa" class="form-control" name="foto_siswa" />
                    </div>
                  </div>
                  <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">
                      Submit
                    </button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                      Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection(); ?>