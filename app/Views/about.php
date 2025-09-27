<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>About Me<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="d-flex align-items-center mb-3">
  <button class="sidebar-toggle-btn"><i class="bi bi-list"></i></button>
  <h1 class="mb-0 ms-2">About Me</h1>
</div>
<hr>
<div class="card">
  <div class="card-header">Student Information</div>
  <div class="card-body">
    <p><strong>Name:</strong> Muhammad Jundi Rabbani</p>
    <p><strong>Student ID:</strong> A002010027</p>
    <p><strong>Course:</strong> Mr. Sofwan Romli's Course</p>
    <p><strong>Assignment:</strong> This project demonstrates a simple CodeIgniter 4 web application with form handling,
      database interaction, and a session-based authentication system.</p>
  </div>
</div>
<?= $this->endSection() ?>