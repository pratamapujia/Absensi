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
              <a href="<?= site_url('siswa'); ?>">Data Siswa</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <?= $title; ?>
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <?php $errors = session()->getFlashdata('errors') ?>
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h4 class="card-title"><?= $title; ?></h4>
            <a href="<?= site_url('siswa'); ?>" class="btn btn-secondary icon icon-left ms-auto"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
          <div class="card-content">
            <div class="card-body">

              <form action="<?= site_url('siswa'); ?>" class="form" method="post" autocomplete="off" enctype="multipart/form-data">
                <!-- </?php $validation = \Config\Services::validation(); ?> -->
                <div class="row">
                  <?= csrf_field(); ?>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="nama_siswa">Nama Siswa <strong class="text-danger">*</strong></label>
                      <input type="text" id="nama_siswa" class="form-control <?= session('errors.nama_siswa') ? 'is-invalid' : null ?>" name="nama_siswa" value="<?= old('nama_siswa'); ?>">
                      <div class="invalid-feedback">
                        <?= session('errors.nama_siswa') ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="nis">NIS <strong class="text-danger">*</strong></label>
                      <input type="text" id="nis" class="form-control <?= session('errors.nis') ? 'is-invalid' : null; ?>" name="nis" value="<?= old('nis'); ?>" />
                      <div class="invalid-feedback">
                        <?= session('errors.nis') ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="tgl_lahir">Tanggal Lahir <strong class="text-danger">*</strong></label>
                      <input type="date" id="tgl_lahir" class="form-control <?= session('errors.tgl_lahir') ? 'is-invalid' : null; ?>" name="tgl_lahir" value="<?= old('tgl_lahir'); ?>" />
                      <div class="invalid-feedback">
                        <?= session('errors.tgl_lahir') ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                      <select name="jenis_kelamin" id="jenis_kelamin" class="form-select <?= session('errors.jenis_kelamin') ? 'is-invalid' : null; ?>">
                        <option value=""> Pilih </option>
                        <option value="L" <?= old('jenis_kelamin') == 'L' ? 'selected' : null; ?>>Laki - Laki</option>
                        <option value="P" <?= old('jenis_kelamin') == 'P' ? 'selected' : null; ?>>Perempuan</option>
                      </select>
                      <div class="invalid-feedback">
                        <?= session('errors.jenis_kelamin') ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="id_jurusan">Jurusan</label>
                      <select name="id_jurusan" id="id_jurusan" class="form-select <?= session('errors.id_jurusan') ? 'is-invalid' : null; ?>">
                        <option value=""> Pilih </option>
                        <?php foreach ($jurusan as $key => $value) : ?>
                          <option value="<?= $value->id_jurusan; ?>" <?= old('id_jurusan') == $value->id_jurusan ? 'selected' : null; ?>><?= $value->nama_jurusan; ?></option>
                        <?php endforeach ?>
                      </select>
                      <div class="invalid-feedback">
                        <?= session('errors.id_jurusan') ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="id_kelas">Kelas</label>
                      <select name="id_kelas" id="id_kelas" class="form-select <?= session('errors.id_kelas') ? 'is-invalid' : null; ?>">
                        <option value=""> Pilih </option>
                        <?php foreach ($kelas as $key => $value) : ?>
                          <option value="<?= $value->id_kelas; ?>" <?= old('id_kelas') == $value->id_kelas ? 'selected' : null; ?>><?= $value->nama_kelas; ?></option>
                        <?php endforeach ?>
                      </select>
                      <div class="invalid-feedback">
                        <?= session('errors.id_kelas') ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="telepone_siswa">No Telepon</label>
                      <input type="text" id="telepone_siswa" class="form-control <?= session('errors.telepone_siswa') ? 'is-invalid' : null; ?>" name="telepone_siswa" value="<?= old('telepone_siswa'); ?>" />
                      <div class="invalid-feedback">
                        <?= session('errors.telepone_siswa') ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="foto_siswa">Foto</label>
                      <input type="file" id="foto_siswa" class="form-control <?= session('errors.foto_siswa') ? 'is-invalid' : null; ?>" name="foto_siswa" onchange="previewImg()" />
                      <div class="invalid-feedback">
                        <?= session('errors.foto_siswa') ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="alamat_siswa">Alamat</label>
                      <textarea id="alamat_siswa" name="alamat_siswa" class="form-control <?= session('errors.alamat_siswa') ? 'is-invalid' : null; ?>" rows="4"></textarea>
                      <div class="invalid-feedback">
                        <?= session('errors.alamat_siswa') ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label>Preview Foto</label><br>
                      <img src="<?= base_url(); ?>/assets/static/images/faces/default.png" class="img-thumbnail img-preview" alt="Foto Siswa" width="120">
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