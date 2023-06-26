<div class="sidebar-menu">
  <ul class="menu">
    <li class="sidebar-item">
      <a href="<?= site_url('admin'); ?>" class="sidebar-link">
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
        <span>Kelola Siswa</span>
      </a>
      <ul class="submenu">
        <li class="submenu-item">
          <a href="<?= site_url('jurusan'); ?>" class="submenu-link">Data Jurusan</a>
        </li>
        <li class="submenu-item">
          <a href="<?= site_url('kelas'); ?>" class="submenu-link">Data Kelas</a>
        </li>
        <li class="submenu-item">
          <a href="<?= site_url('siswa'); ?>" class="submenu-link">Data Seluruh Siswa</a>
        </li>
        <li class="submenu-item">
          <a href="" class="submenu-link">Data Siswa per Kelas</a>
        </li>
        <li class="submenu-item">
          <a href="" class="submenu-link">Data Izin Siswa</a>
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