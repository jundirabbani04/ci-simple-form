<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Submissions<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if (!session()->get('isLoggedIn')): ?>
  <div id="login-view">
    <div class="d-flex align-items-center mb-3">
      <button class="sidebar-toggle-btn"><i class="bi bi-list"></i></button>
      <h1 class="mb-0 ms-2">Submissions Login</h1>
    </div>
    <p>You must be logged in to view the submissions.</p>
    <hr>
    <div class="card" style="max-width: 500px;">
      <div class="card-body">
        <form id="login-form" method="POST" action="<?= base_url('login') ?>">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="admin">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" value="password">
          </div>
          <?php if (session()->getFlashdata('error')): ?>
            <p class="text-danger"><?= session()->getFlashdata('error') ?></p>
          <?php endif; ?>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
<?php else: ?>
  <div id="submissions-view">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="d-flex align-items-center">
        <button class="sidebar-toggle-btn"><i class="bi bi-list"></i></button>
        <h1 class="mb-0 ms-2">Form Submissions</h1>
      </div>
      <a href="<?= base_url('logout') ?>" class="btn btn-danger">Logout</a>
    </div>
    <p>Here are all the entries submitted through the form.</p>
    <hr>
    <div class="card">
      <div class="card-body table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama</th>
              <th>NIK</th>
              <th>Email</th>
              <th>No. HP</th>
              <th>Pekerjaan</th>
              <th>Submitted At</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($submissions)): ?>
              <tr>
                <td colspan="7" class="text-center">No submissions yet.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($submissions as $index => $sub): ?>
                <tr>
                  <td><?= $index + 1 ?></td>
                  <td><?= esc($sub['nama']) ?></td>
                  <td><?= esc($sub['nik']) ?></td>
                  <td><?= esc($sub['mail']) ?></td>
                  <td><?= esc($sub['hp1']) ?></td>
                  <td><?= esc($sub['kerja']) === '1' ? 'ASN - PNS' : 'Non ASN - Swasta' ?></td>
                  <td><?= esc($sub['created_at']) ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php endif; ?>

<?= $this->endSection() ?>