@extends('admin.layouts.index')

@section('title')
  <title>Set Jam Kerja Karyawan</title>
  {{-- <link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable.css') }}" /> --}}
@endsection

@section('main')
  <div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Set Jam Kerja Karyawan</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
          <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('karyawan.index') }}">Master Karyawan</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Set Jam Kerja
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="page-content">
    <div class="row">
      <div class="col-sm-12 col-md-4">
        <div class="card">
          <div class="card-body py-4 px-4">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl">
                @php
                  $path = Storage::url('uploads/karyawan/' . $karyawan->foto);
                @endphp
                @if (!empty($karyawan->foto))
                  <img src="{{ url($path) }}" alt="Avatar">
                @else
                  <img src="{{ asset('assets/img/default.png') }}" alt="">
                @endif
              </div>
              <div class="ms-3 name">
                <h5 class="font-bold">{{ $karyawan->nama_lengkap }}</h5>
                <h6 class="text-muted mb-0">{{ $karyawan->nik }} | {{ $karyawan->jabatan }}</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <form class="form form-horizontal">
              <div class="form-body">
                <div class="row">
                  <div class="col-md-4">
                    <label>Senin</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <select name="kd_jam" id="kd_jam" class="form-select">
                      <option value="">Pilih Jam</option>
                      @foreach ($jam as $j)
                        <option value="{{ $j->kd_jam }}">{{ $j->nama_jam }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Selasa</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <select name="kd_jam" id="kd_jam" class="form-select">
                      <option value="">Pilih Jam</option>
                      @foreach ($jam as $j)
                        <option value="{{ $j->kd_jam }}">{{ $j->nama_jam }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Rabu</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <select name="kd_jam" id="kd_jam" class="form-select">
                      <option value="">Pilih Jam</option>
                      @foreach ($jam as $j)
                        <option value="{{ $j->kd_jam }}">{{ $j->nama_jam }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Kamis</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <select name="kd_jam" id="kd_jam" class="form-select">
                      <option value="">Pilih Jam</option>
                      @foreach ($jam as $j)
                        <option value="{{ $j->kd_jam }}">{{ $j->nama_jam }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Jumat</label>
                  </div>
                  <div class="col-md-8 form-group">
                    <select name="kd_jam" id="kd_jam" class="form-select">
                      <option value="">Pilih Jam</option>
                      @foreach ($jam as $j)
                        <option value="{{ $j->kd_jam }}">{{ $j->nama_jam }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-8">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Master Jam Kerja</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table mb-0">
                <thead>
                  <tr>
                    <th scope="col">Kode Jam</th>
                    <th scope="col">Nama Jam</th>
                    <th scope="col">Awal Jam</th>
                    <th scope="col">Akhir Jam</th>
                    <th scope="col">Jam Masuk</th>
                    <th scope="col">Jam Pulang</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($jam as $j)
                    <tr>
                      <td>{{ $j->kd_jam }}</td>
                      <td>{{ $j->nama_jam }}</td>
                      <td>{{ $j->awal_jam }}</td>
                      <td>{{ $j->akhir_jam }}</td>
                      <td>{{ $j->jam_masuk }}</td>
                      <td>{{ $j->jam_pulang }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('adminScript')
  {{-- <script src="{{ asset('assets/admin/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/admin/static/js/pages/simple-datatables.js') }}"></script> --}}
@endpush
