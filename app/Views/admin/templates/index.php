<?php

use CodeIgniter\Debug\Timer;
use CodeIgniter\I18n\Time;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <?= $this->renderSection('title'); ?>

  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->

  <!-- ICON -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/extensions/@icon/dripicons/dripicons.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/compiled/css/ui-icons-dripicons.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/extensions/@fortawesome/fontawesome-free/css/all.min.css" />

  <!-- Datatable -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/extensions/simple-datatables/style.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/compiled/css/table-datatable.css" />

  <!-- Sweet Alert 2 -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/extensions/sweetalert2/sweetalert2.min.css" />

  <link rel="shortcut icon" href="<?= base_url() ?>/assets/compiled/svg/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/compiled/css/app.css" />
  <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/compiled/css/app-dark.css" /> -->

</head>

<body>
  <script src="<?= base_url() ?>/assets/static/js/initTheme.js"></script>
  <div id="app">
    <div id="sidebar">
      <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
          <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
              <a href="<?= site_url('admin'); ?>"><img src="<?= base_url() ?>/assets/compiled/svg/logo.svg" alt="Logo" srcset="" /></a>
            </div>
            <!-- <div class="theme-toggle d-flex gap-2 align-items-center mt-2">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                  <g transform="translate(-210 -1)">
                    <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                    <circle cx="220.5" cy="11.5" r="4"></circle>
                    <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                  </g>
                </g>
              </svg>
              <div class="form-check form-switch fs-6">
                <input class="form-check-input me-0" type="checkbox" id="toggle-dark" style="cursor: pointer" />
                <label class="form-check-label"></label>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
              </svg>
            </div> -->
            <div class="sidebar-toggler x">
              <a href="javascript:void(0)" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
          </div>
        </div>

        <!-- Menu -->
        <?= $this->include('admin/templates/menu'); ?>
        <!-- End Menu -->

      </div>
    </div>
    <div id="main" class="layout-navbar navbar-fixed">
      <header>
        <nav class="navbar navbar-expand navbar-light navbar-top">
          <div class="container-fluid">
            <a href="javascript:void(0)" class="burger-btn d-block">
              <i class="bi bi-justify fs-3"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="ms-auto" id="navbarSupportedContent">
              <div class="dropdown">
                <a href="javascript:void(0)" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="user-menu d-flex">
                    <div class="user-name text-end me-3">
                      <h6 class="mb-0 text-gray-600">John Ducky</h6>
                      <p class="mb-0 text-sm text-gray-600">Administrator</p>
                    </div>
                    <div class="user-img d-flex align-items-center">
                      <div class="avatar avatar-md">
                        <img src="<?= base_url() ?>/assets/compiled/jpg/1.jpg" />
                      </div>
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem">
                  <li>
                    <a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                      Profile</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#"><i class="icon-mid bi bi-box-arrow-left me-2"></i>
                      Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </header>
      <div id="main-content">
        <!-- Jquery -->
        <script src="<?= base_url(); ?>/assets/extensions/jquery/jquery.min.js"></script>

        <!-- Main -->
        <?= $this->renderSection('main'); ?>
        <!-- End Main -->

      </div>
      <footer>
        <div class="d-flex footer clearfix mb-0 text-muted">
          <div class="mx-auto">
            <p>
              Develop by <a href="http://github.com/pratamapujia/"> Riyan </a>
              | Template by <a href="https://github.com/zuramai/mazer">Mazer </a>
              <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
            </p>
          </div>
        </div>
      </footer>
    </div>
  </div>


  <!-- <script src="</?= base_url() ?>/assets/static/js/components/dark.js"></script> -->
  <script src="<?= base_url() ?>/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>/assets/compiled/js/app.js"></script>

  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->


  <!-- Sweet Alert 2 -->
  <script src="<?= base_url() ?>/assets/extensions/sweetalert2/sweetalert2.min.js"></script>

  <!-- My Js -->
  <script src="<?= base_url(); ?>/assets/static/js/my.js"></script>

</body>

</html>