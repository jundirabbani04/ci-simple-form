<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title><?= $this->renderSection('title') ?> | CI Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <style>
    :root {
      --sidebar-width: 250px;
    }

    body {
      margin: 0;
      background-color: #f4f6f9;
    }

    .wrapper {
      display: flex;
    }

    .sidebar {
      width: var(--sidebar-width);
      background: #343a40;
      color: white;
      padding-top: 20px;
      flex-shrink: 0;
      transition: margin-left 0.3s ease;
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      z-index: 1000;
    }

    .sidebar a {
      padding: 15px 25px;
      text-decoration: none;
      font-size: 18px;
      color: #d1d1d1;
      display: block;
      border-left: 3px solid transparent;
    }

    .sidebar a:hover,
    .sidebar a.active {
      background-color: #495057;
      color: white;
      border-left: 3px solid #0d6efd;
    }

    .content {
      flex-grow: 1;
      padding: 30px;
      margin-left: var(--sidebar-width);
      transition: margin-left 0.3s ease;
    }

    .sidebar-toggle-btn {
      font-size: 1.5rem;
      background: none;
      border: none;
      color: #333;
      cursor: pointer;
      padding: 0 10px;
    }

    /* Collapsed State */
    .sidebar-collapsed .sidebar {
      margin-left: calc(-1 * var(--sidebar-width));
    }

    .sidebar-collapsed .content {
      margin-left: 0;
    }

    @media (max-width: 768px) {
      .sidebar-toggle-btn {
        display: block;
      }

      body:not(.sidebar-collapsed) .sidebar {
        margin-left: 0;
      }

      body.sidebar-collapsed .sidebar {
        margin-left: calc(-1 * var(--sidebar-width));
      }
    }
  </style>

  <script>
    (function () {
      const savedState = localStorage.getItem('sidebarState');
      if (savedState === 'collapsed') {
        document.documentElement.className = 'sidebar-collapsed';
      } else if (savedState === 'expanded') {
        // Do nothing, the default is expanded (no class)
      } else {
        // No saved state, default to collapsed on mobile
        if (window.innerWidth <= 768) {
          document.documentElement.className = 'sidebar-collapsed';
        }
      }
    })();
  </script>
</head>

<body>
  <div class="wrapper">
    <div class="sidebar">
      <h4 class="text-center mb-4">CI Form</h4>
      <nav>
        <a href="<?= base_url('/') ?>" class="nav-link <?= ($activePage === 'form') ? 'active' : '' ?>">
          <i class="bi bi-ui-checks-grid me-2"></i>Form
        </a>
        <a href="<?= base_url('submissions') ?>"
          class="nav-link <?= ($activePage === 'submissions') ? 'active' : '' ?>">
          <i class="bi bi-file-earmark-text me-2"></i>Submissions
        </a>
        <a href="<?= base_url('about') ?>" class="nav-link <?= ($activePage === 'about') ? 'active' : '' ?>">
          <i class="bi bi-person-circle me-2"></i>About
        </a>
      </nav>
    </div>

    <main class="content">
      <?= $this->renderSection('content') ?>
    </main>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const body = document.body;
      const toggleButtons = document.querySelectorAll('.sidebar-toggle-btn');

      toggleButtons.forEach(button => {
        button.addEventListener('click', () => {
          // Toggle the class
          body.classList.toggle('sidebar-collapsed');

          // Save the new state to localStorage
          if (body.classList.contains('sidebar-collapsed')) {
            localStorage.setItem('sidebarState', 'collapsed');
          } else {
            localStorage.setItem('sidebarState', 'expanded');
          }
        });
      });

      // Auto-close sidebar on mobile after clicking a link
      document.querySelectorAll('.sidebar .nav-link').forEach(link => {
        link.addEventListener('click', function () {
          if (window.innerWidth <= 768) {
            body.className = 'sidebar-collapsed';
            localStorage.setItem('sidebarState', 'collapsed');
          }
        });
      });
    });
  </script>

  <?= $this->renderSection('scripts') ?>
</body>

</html>