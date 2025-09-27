<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Biodata Form<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-flex align-items-center mb-3">
  <button class="sidebar-toggle-btn"><i class="bi bi-list"></i></button>
  <h1 class="mb-0 ms-2">Biodata Form</h1>
</div>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success" role="alert">
    <?= session()->getFlashdata('success') ?>
  </div>
<?php endif; ?>

<?php if (session()->getFlashdata('errors')): ?>
  <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Terdapat Kesalahan</h4>
    <ul class="mb-0">
      <?php foreach (session()->getFlashdata('errors') as $error): ?>
        <li><?= esc($error) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

<hr>
<div class="card">
  <div class="card-body">
    <form id="data-form" action="<?= base_url('form/submit') ?>" method="POST" enctype="multipart/form-data">

      <h5 class="form-section-title">Data Pribadi</h5>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="nik" class="form-label">Nomor Induk Kependudukan (NIK) *</label>
          <input type="text" class="form-control" id="nik" name="nik" maxlength="16" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="nama" class="form-label">Nama (Sesuai Ijasah) *</label>
          <input type="text" class="form-control text-uppercase" id="nama" name="nama" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="gelar1" class="form-label">Gelar Depan</label>
          <input type="text" class="form-control" id="gelar1" name="gelar1">
        </div>
        <div class="col-md-6 mb-3">
          <label for="gelar2" class="form-label">Gelar Belakang</label>
          <input type="text" class="form-control" id="gelar2" name="gelar2">
        </div>
        <div class="col-md-6 mb-3">
          <label for="tmpt_lahir" class="form-label">Tempat Lahir *</label>
          <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="tgl_lahir" class="form-label">Tanggal Lahir *</label>
          <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="jk" class="form-label">Jenis Kelamin *</label>
          <select id="jk" name="jk" class="form-select" required>
            <option value="" selected disabled>Pilih Jenis Kelamin</option>
            <option value="1">Laki-laki</option>
            <option value="2">Perempuan</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="ibu_kandung" class="form-label">Ibu Kandung</label>
          <input type="text" class="form-control text-uppercase" id="ibu_kandung" name="ibu_kandung">
        </div>
      </div>

      <h5 class="form-section-title">Alamat Sesuai KTP</h5>
      <div class="row">
        <div class="col-12 mb-3">
          <label for="alamat_1" class="form-label">Alamat Lengkap *</label>
          <textarea class="form-control" id="alamat_1" name="alamat_1" rows="3" required></textarea>
        </div>
        <div class="col-md-6 mb-3">
          <label for="provinsi" class="form-label">Provinsi *</label>
          <input type="text" class="form-control" id="provinsi" name="provinsi" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="kab" class="form-label">Kabupaten/Kota *</label>
          <input type="text" class="form-control" id="kab" name="kab" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="kec" class="form-label">Kecamatan *</label>
          <input type="text" class="form-control" id="kec" name="kec" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="desa" class="form-label">Kelurahan/Desa *</label>
          <input type="text" class="form-control" id="desa" name="desa" required>
        </div>
        <div class="col-md-6 mb-3">
          <div class="row">
            <div class="col">
              <label for="rt" class="form-label">RT *</label>
              <input type="text" class="form-control" id="rt" name="rt" required>
            </div>
            <div class="col">
              <label for="rw" class="form-label">RW *</label>
              <input type="text" class="form-control" id="rw" name="rw" required>
            </div>
          </div>
        </div>
      </div>

      <h5 class="form-section-title">Kontak & Informasi Lain</h5>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="agama" class="form-label">Agama *</label>
          <select id="agama" name="agama" class="form-select" required>
            <option value="" selected disabled>Pilih Agama</option>
            <option value="Islam">Islam</option>
            <option value="Protestan">Protestan</option>
            <option value="Katholik">Katholik</option>
            <option value="Hindu">Hindu</option>
            <option value="Budha">Budha</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="stat_kwn" class="form-label">Status Perkawinan *</label>
          <select id="stat_kwn" name="stat_kwn" class="form-select" required>
            <option value="" selected disabled>Pilih Status</option>
            <option value="Kawin">Kawin</option>
            <option value="Tidak Kawin">Tidak Kawin</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="hp1" class="form-label">Nomor HP *</label>
          <input type="tel" class="form-control" id="hp1" name="hp1" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="hp2" class="form-label">Nomor HP (WhatsApp) *</label>
          <input type="tel" class="form-control" id="hp2" name="hp2" required>
        </div>
        <div class="col-md-12 mb-3">
          <label for="mail" class="form-label">Alamat E-mail *</label>
          <input type="email" class="form-control" id="mail" name="mail" required>
        </div>
      </div>

      <h5 class="form-section-title">Pekerjaan Utama</h5>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="kerja" class="form-label">Pekerjaan Utama *</label>
          <select id="kerja" name="kerja" class="form-select" required>
            <option value="" selected disabled>Pilih Pekerjaan</option>
            <option value="1">ASN - PNS</option>
            <option value="2">Non ASN - Swasta</option>
          </select>
        </div>
        <div class="col-md-6 mb-3">
          <label for="jenis_tmpt_kerja" class="form-label">Tempat Kerja Utama *</label>
          <select id="jenis_tmpt_kerja" name="jenis_tmpt_kerja" class="form-select" required>
            <option value="" selected disabled>Pilih Tempat Kerja</option>
            <option value="Puskesmas">Puskesmas</option>
            <option value="Rumah Sakit">Rumah Sakit</option>
          </select>
        </div>
        <div class="col-md-12 mb-3">
          <label for="nama_kerja1" class="form-label">Nama Tempat Kerja Utama</label>
          <input type="text" class="form-control" id="nama_kerja1" name="nama_kerja1">
        </div>
      </div>

      <h5 class="form-section-title">Akun Aplikasi</h5>
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="usern" class="form-label">Username *</label>
          <input type="text" class="form-control" id="usern" name="usern" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="pasw" class="form-label">Password *</label>
          <input type="password" class="form-control" id="pasw" name="pasw" required>
        </div>
      </div>

      <h5 class="form-section-title">Dokumen</h5>
      <div class="row">
        <div class="col-md-12 mb-3">
          <label for="foto" class="form-label">Photo (Max 1MB, format: JPG, PNG)</label>
          <input class="form-control" type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png">
        </div>
      </div>

      <hr class="my-4">

      <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" value="1" id="agreement" name="agreement" required>
        <label class="form-check-label" for="agreement">
          Dengan ini saya menyatakan bahwa data yang saya masukkan adalah data yang sebenar-benarnya.
        </label>
      </div>

      <button type="submit" class="btn btn-primary btn-lg">Daftarkan Saya</button>
    </form>
  </div>
</div>
<?= $this->endSection() ?>