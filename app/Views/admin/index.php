<?php

use CodeIgniter\Debug\Timer;
use CodeIgniter\I18n\Time;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Beranda</title>

  <link rel="shortcut icon" href="<?= base_url() ?>/assets/compiled/svg/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/compiled/css/app.css" />
  <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/compiled/css/app-dark.css" /> -->

  <!-- ICON -->
  <link rel="stylesheet" href="<?= base_url() ?>/assets/extensions/@icon/dripicons/dripicons.css" />
  <link rel="stylesheet" href="<?= base_url() ?>/assets/compiled/css/ui-icons-dripicons.css" />
</head>

<body>
  <script src="<?= base_url() ?>/assets/static/js/initTheme.js"></script>
  <div id="app">
    <div id="sidebar">
      <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
          <div class="d-flex justify-content-between align-items-center">
            <div class="logo">
              <a href="index.html"><img src="<?= base_url() ?>/assets/compiled/svg/logo.svg" alt="Logo" srcset="" /></a>
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
              <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
          </div>
        </div>
        <div class="sidebar-menu">
          <ul class="menu">
            <li class="sidebar-item">
              <a href="index.html" class="sidebar-link">
                <i class="bi bi-pc-display-horizontal"></i>
                <span>Beranda</span>
              </a>
            </li>

            <li class="sidebar-item has-sub">
              <a href="#" class="sidebar-link">
                <i class="bi bi-menu-button-wide-fill"></i>
                <span>Kelola Menu</span>
              </a>
              <ul class="submenu">
                <li class="submenu-item">
                  <a href="" class="submenu-link">Acces User</a>
                </li>
                <li class="submenu-item">
                  <a href="" class="submenu-link">Menu</a>
                </li>
                <li class="submenu-item">
                  <a href="" class="submenu-link">Sub Menu</a>
                </li>
              </ul>
            </li>

            <li class="sidebar-item has-sub">
              <a href="#" class="sidebar-link">
                <i class="bi bi-calendar2-week"></i>
                <span>Kelola Absensi</span>
              </a>
              <ul class="submenu">
                <li class="submenu-item">
                  <a href="" class="submenu-link">Atur Libur</a>
                </li>
                <li class="submenu-item">
                  <a href="" class="submenu-link">Data Absensi</a>
                </li>
                <li class="submenu-item">
                  <a href="" class="submenu-link">Rekap Absen</a>
                </li>
                <li class="submenu-item">
                  <a href="" class="submenu-link">Jam Absen</a>
                </li>
              </ul>
            </li>

            <li class="sidebar-item has-sub">
              <a href="#" class="sidebar-link">
                <i class="bi bi-person-fill"></i>
                <span>Siswa</span>
              </a>
              <ul class="submenu">
                <li class="submenu-item">
                  <a href="" class="submenu-link">Data Seluruh Siswa</a>
                </li>
                <li class="submenu-item">
                  <a href="" class="submenu-link">Data Kelas & Jurusan</a>
                </li>
                <li class="submenu-item">
                  <a href="" class="submenu-link">Data Siswa per Kelas</a>
                </li>
                <li class="submenu-item">
                  <a href="" class="submenu-link">Data Izin</a>
                </li>
              </ul>
            </li>

            <li class="sidebar-item has-sub">
              <a href="#" class="sidebar-link">
                <i class="bi bi-people-fill"></i>
                <span>Users</span>
              </a>
              <ul class="submenu">
                <li class="submenu-item">
                  <a href="" class="submenu-link">Data User</a>
                </li>
                <li class="submenu-item">
                  <a href="" class="submenu-link">Data User Siswa</a>
                </li>
              </ul>
            </li>

            <li class="sidebar-item text-center fs-9 pt-5">
              <span class="text-primary">Sistem Informasi Absensi</span>
              <p><?= date('Y') ?> &copy; SIAB</p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div id="main" class="layout-navbar navbar-fixed">
      <header>
        <nav class="navbar navbar-expand navbar-light navbar-top">
          <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
              <i class="bi bi-justify fs-3"></i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="float-end" id="navbarSupportedContent">
              <div class="dropdown">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
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
      </div>

      <!-- Script Waktu -->
      <script type='text/javascript'>
        function currentTime() {
          var date = new Date(); /* creating object of Date class */
          var hour = date.getHours();
          var min = date.getMinutes();
          var sec = date.getSeconds();
          hour = updateTime(hour);
          min = updateTime(min);
          sec = updateTime(sec);
          document.getElementById("clocknow").innerText = hour + " : " + min + " : " + sec; /* adding time to the div */

          var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
          var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

          var curWeekDay = days[date.getDay()]; // get day
          var curDay = date.getDate(); // get date
          var curMonth = months[date.getMonth()]; // get month
          var curYear = date.getFullYear(); // get year
          var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear; // get full date
          document.getElementById("datenow").innerHTML = date;

          var t = setTimeout(function() {
            currentTime()
          }, 1000); /* setting timer */
        }

        function updateTime(k) {
          if (k < 10) {
            return "0" + k;
          } else {
            return k;
          }
        }

        if (document.getElementById("clocknow")) {
          currentTime(); /* calling currentTime() function to initiate the process */
        }
      </script>
      <footer>
        <div class="footer clearfix mb-0 text-muted">
          <div class="float-start">
            <p>
              Develop by <a href="http://github.com/pratamapujia/"> Riyan</a>
            </p>
          </div>
          <div class="float-end">
            <p>
              <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
              Template by <a href="https://github.com/zuramai/mazer">Mazer</a>
            </p>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- <script src="<?= base_url() ?>/assets/static/js/components/dark.js"></script> -->
  <script src="<?= base_url() ?>/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>/assets/compiled/js/app.js"></script>
</body>

</html>