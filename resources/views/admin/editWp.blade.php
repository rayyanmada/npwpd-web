@extends('layout/main2')

@section('title', 'Admin')

@section('content')

<!-- Page Content  -->
<div id="content" class="p-4 p-md-2 pt-0">
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
      <h6 class="text-light">User</h6>
      <button class="btn btn-light d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      </button>
    </div>
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="navbar navbar-light bg-white justify-content-between">
          <a class="navbar-brand">Data Wajib Pajak</a>
          <form class="form-inline">
            <a href="showOp" class="btn btn-outline-info my-2 my-sm-0" type="submit">Data Objek Pajak</a>
          </form>
        </nav>
        <br>
        <form action="/admin/updateWp/{{ $wajibPajak->id }}" method="post">
          @method('patch')
          @csrf
          <div class="form-group row">
            <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pendaftaran</label>
            <div class="col-sm-4">
              <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ $wajibPajak->tanggal }}">
              @error('tanggal')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label for="jenisDaftar">Jenis Pendaftaran</label>
              </div>
              <div class="col-md-4">
                <select class="form-control @error('jenis_daftar_wp') is-invalid @enderror" id="jenisDaftar" name="jenis_daftar_wp">
                  <option value="{{ $wajibPajak->jenis_daftar }}">{{ $wajibPajak->jenis_daftar }}</option>
                  <option value="Wajib Pajak" {{'Wajib Pajak' == old('jenis_daftar_wp', $formulir->jenis_daftar ?? '') ? 'selected' : '' }}>P || Wajib Pajak</option>
                  <option value="Retribusi" {{ 'Retribusi' == old('jenis_daftar_wp', $formulir->jenis_daftar ?? '') ? 'selected' : '' }}>R || Retribusi</option>
                </select>
                @error('jenis_daftar_wp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-2">
                <label for="bidangUsaha">Bidang Usaha</label>
              </div>
              <div class="col-md-4">
                <select class="form-control @error('bidang_usaha_wp') is-invalid @enderror" id="bidangUsaha" name="bidang_usaha_wp">
                  <option value="{{ $wajibPajak->bidang_usaha }}">{{ $wajibPajak->bidang_usaha }}</option>
                  <option value="Pribadi" {{'Pribadi' == old('bidang_usaha_wp', $formulir->bidang_usaha ?? '') ? 'selected' : '' }}>01 || Pribadi</option>
                  <option value="Badan Usaha" {{'Badan Usaha' == old('bidang_usaha_wp', $formulir->bidang_usaha ?? '') ? 'selected' : '' }}>02 || Badan Usaha</option>
                </select>
                @error('bidang_usaha_wp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="nik_npwp" class="col-sm-2 col-form-label">NIK/NPWP</label>
            <div class="col-sm-4">
              <input type="text" class="form-control @error('nik_npwp_wp') is-invalid @enderror" id="nik_npwp" placeholder="Masukkan NIK/NPWP" name="nik_npwp_wp" value="{{ $wajibPajak->nik_npwp }}">
              @error('nik_npwp_wp')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror

            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-4">
              <input type="text" class="form-control @error('nama_wp') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama_wp" value="{{ $wajibPajak->nama }}">
              @error('nama_wp')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-4">
              <textarea class="form-control @error('alamat_wp') is-invalid @enderror" id="alamat" name="alamat_wp">{{ $wajibPajak->alamat }}</textarea>
              @error('alamat_wp')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label for="rt">RT</label>
              </div>
              <div class="col-md-1">
                <input class="form-control @error('rt_wp') is-invalid @enderror" id="rt" name="rt_wp" value="{{ $wajibPajak->rt }}"></input>
                @error('rt_wp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <br>
              <div class="col-md-1">
                <label for="rw">RW</label>
              </div>
              <div class="col-md-1">
                <input class="form-control @error('rw_wp') is-invalid @enderror" id="rw" name="rw_wp" value="{{ $wajibPajak->rw }}"></input>
                @error('rw_wp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="kabupaten_kota" class="col-sm-2 col-form-label">Kabupaten/Kota</label>
            <div class="col-sm-4">
              <div class="form-check form-check-inline">
                <input class="form-check-input @error('kabupaten_kota_wp') is-invalid @enderror" type="radio" name="kabupaten_kota_wp" id="dalam_kota" value="Dalam Kota" checked onclick="nilai(0)" {{'Dalam Kota' == old('Dalam Kota', $formulir->kabupaten_kota ?? '') ? 'checked' : '' }}>
                <label class="form-check-label" for="dalam_kota">
                  Dalam Kota
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input @error('kabupaten_kota_wp') is-invalid @enderror" type="radio" name="kabupaten_kota_wp" id="luar_kota" value="Luar Kota" onclick="nilai(1)" {{'Luar Kota' == old('Luar Kota', $formulir->kabupaten_kota ?? '') ? 'checked' : '' }}>
                <label class="form-check-label" for="luar_kota">
                  Luar Kota
                </label>
                @error('kabupaten_kota_wp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group" id="mycode">
            <div class="row">
              <div class="col-md-2">
                <label for="kecamatan">Kecamatan</label>
              </div>
              <div class="col-md-4">
                <select class="form-control @error('kecamatan_wp') is-invalid @enderror" id="kecamatan" name="kecamatan_wp">
                  <option value="{{ $wajibPajak->kecamatan }}">{{ $wajibPajak->kecamatan }}</option>
                  <option value="">Silahkan Pilih</option>
                  @foreach ($kecamatan_wp as $kcm)
                  <option value="{{ $kcm->id_kecamatan }}" {{$kcm->id_kecamatan == old('kecamatan_wp', $formulir->kecamatan ?? '') ? 'selected' : '' }}>{{ $kcm->id_kecamatan }} | {{ $kcm->kecamatan }}</option>
                  @endforeach
                </select>
                @error('kecamatan_wp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-2">
                <label for="kelurahan">Kelurahan</label>
              </div>
              <div class="col-md-4">
                <select class="form-control @error('kelurahan_wp') is-invalid @enderror" id="kelurahan" name="kelurahan_wp">
                  <option value="{{ $wajibPajak->kelurahan }}">{{ $wajibPajak->kelurahan }}</option>
                  <option value="">Silahkan Pilih</option>
                  {{-- @foreach ($kelurahan_wp as $klh)
                    <option value="{{ $klh->kelurahan }}" {{$klh->kelurahan == old('kelurahan_wp', $formulir->kelurahan ?? '') ? 'selected' : '' }}>{{ $klh->kelurahan }}</option>
                  @endforeach --}}
                </select>
                @error('kelurahan_wp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group" id=mycode2 style="display: none">
            <div class="row">
              <div class="col-md-2">
                <label for="kecamatan2">Kecamatan</label>
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control @error('kecamatan2_wp') is-invalid @enderror" id="kecamatan2" name="kecamatan2_wp" placeholder="Masukkan Kecamatan" value="{{old('kecamatan2_wp', $formulir->kecamatan ?? null)}}"></input>
                @error('kecamatan2_wp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-2">
                <label for="kelurahan2">Kelurahan</label>
              </div>
              <div class="col-md-4">
                <input class="form-control @error('kelurahan2_wp') is-invalid @enderror" id="kelurahan2" name="kelurahan2_wp" placeholder="Masukkan Kelurahan" value="{{old('kelurahan2_wp', $formulir->kelurahan ?? null)}}"></input>
                @error('kelurahan2_wp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-2">
                <label for="no_telp">No. Telp</label>
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control @error('no_telp_wp') is-invalid @enderror" id="no_telp" name="no_telp_wp" placeholder="Masukkan No. Telp" value="{{ $wajibPajak->no_telp }}"></input>
                @error('no_telp_wp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="col-md-2">
                <label for="no_hp">No. HP</label>
              </div>
              <div class="col-md-4">
                <input class="form-control @error('no_hp_wp') is-invalid @enderror" id="no_hp" name="no_hp_wp" placeholder="Masukkan Nomor HP" value="{{ $wajibPajak->no_hp }}"></input>
                @error('no_hp_wp')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-4">
              <input type="email" class="form-control @error('email_wp') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email_wp" value="{{ $wajibPajak->email }}"></input>
              @error('email_wp')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
            <div class="col-sm-4">
              <input type="text" class="form-control @error('kode_pos_wp') is-invalid @enderror" id="kode_pos" placeholder="Masukkan Kode Pos" name="kode_pos_wp" value="{{ $wajibPajak->kode_pos }}">
              @error('kode_pos_wp')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <br>
          <div class="rst-footer-buttons" role="navigation" aria-label="footer navigation">
            <button type="submit" class="btn btn-info float-right btn-lg">Simpan</button>
          </div>
          <br><br>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('dropdown')