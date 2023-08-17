<!doctype html>
<html lang="en">

<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css2/style.css">
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <!-- <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
      </div> -->
      <div class="p-4">
        <center>
          <img src="/images/logo.png" class="rounded" width="50px" alt="">
          <h3 class="text-warning">BPPKAD <br>Kota Kediri</h3>
        </center>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="admin"><span class="fa fa-user mr-3"></span>Data Permohonan</a>
          </li>
        </ul>

      </div>
    </nav>

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
            <form action="/perpajakan/storeOp" method="post">
              @csrf
              <div class="form-group row">
                <div class="col-md-2">
                  <label for="jenisPajak">Jenis Pajak</label>
                </div>
                <div class="col-md-4">
                  <select class="form-control @error('jenis_pajak') is-invalid @enderror" id="jenisPajak" name="jenis_pajak">
                    <option value="">Silahkan Pilih</option>
                    @foreach ($jenis_pajak as $jp)
                    <option value="{{ $jp->id_jenis_pajak }}" {{$jp->id_jenis_pajak == old('jenis_pajak', session()->get('formulir2.jenis_pajak') ?? '') ? 'selected' : '' }}>{{ $jp->id_jenis_pajak }} | {{ $jp->jenis_pajak }}</option>
                    @endforeach
                  </select>
                  @error('jenis_pajak')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label for="bidang_usaha">Bidang Usaha</label>
                  </div>
                  <div class="col-md-4">
                    <select class="form-control @error('bidang_usaha') is-invalid @enderror" id="bidangUsaha" name="bidang_usaha">
                      <option value="">Silahkan Pilih</option>
                      {{-- @foreach ($bidang_usaha as $bu)
                    <option value="{{ $bu->bidang_usaha }}" {{$bu->bidang_usaha == old('bidang_usaha', session()->get('formulir2.bidang_usaha') ?? '') ? 'selected' : '' }}>{{ $bu->bidang_usaha }}</option>
                      @endforeach --}}
                    </select>
                    @error('bidang_usaha')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-1">
                    <label for="nomor">Nomor</label>
                  </div>
                  <div class="col-md-4">
                    <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" placeholder="Masukkan Nomor" name="nomor" value="{{old('nomor', session()->get('formulir2.nomor') ?? null)}}">
                    @error('nomor')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control @error('nama_op') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama_op" value="{{old('nama_op', session()->get('formulir2.nama') ?? null)}}">
                  @error('nama_op')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label for="alamat">Alamat</label>
                  </div>
                  <div class="col-md-4">
                    <textarea class="form-control @error('alamat_op') is-invalid @enderror" name="alamat_op" id="alamat">{{old('alamat_op', session()->get('formulir2.alamat') ?? null)}}</textarea>
                    @error('alamat_op')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-1">
                    <label>RT/RW</label>
                  </div>
                  <div class="col-md-1">
                    <input class="form-control @error('rt_op') is-invalid @enderror" placeholder="RT" name="rt_op" value="{{old('rt_op', session()->get('formulir2.rt') ?? null)}}"></input>
                    @error('rt_op')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col-md-1">
                    <input class="form-control @error('rw_op') is-invalid @enderror" placeholder="RW" name="rw_op" value="{{old('rw_op', session()->get('formulir2.rw') ?? null)}}"></input>
                    @error('rw_op')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <br>
                <div class="form-group" id="mycode">
                  <div class="row">
                    <div class="col-md-2">
                      <label for="kecamatan">Kecamatan</label>
                    </div>
                    <div class="col-md-4">
                      <select class="form-control @error('kecamatan_op') is-invalid @enderror" id="kecamatan" name="kecamatan_op">
                        <option value="">Silahkan Pilih</option>
                        @foreach ($kecamatan_op as $kcm_op)
                        <option value="{{ $kcm_op->id_kecamatan }}" {{$kcm_op->id_kecamatan == old('kecamatan_op', session()->get('formulir2.kecamatan') ?? '') ? 'selected' : '' }}>{{ $kcm_op->id_kecamatan }} | {{ $kcm_op->kecamatan }}</option>
                        @endforeach
                      </select>
                      @error('kecamatan_op')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-md-2">
                      <label for="kelurahan">Kelurahan</label>
                    </div>
                    <div class="col-md-4">
                      <select class="form-control @error('kelurahan_op') is-invalid @enderror" id="kelurahan" name="kelurahan_op">
                        <option value="">Silahkan Pilih</option>
                        {{-- @foreach ($kelurahan_op as $klh_op)
                    <option value="{{ $klh_op->kelurahan }}" {{$klh_op->kelurahan == old('kelurahan_op', session()->get('formulir2.kelurahan') ?? '') ? 'selected' : '' }}>{{ $klh_op->kelurahan }}</option>
                        @endforeach --}}
                      </select>
                      @error('kelurahan_op')
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
                      <input type="text" class="form-control @error('no_telp_op') is-invalid @enderror" id="no_telp" name="no_telp_op" placeholder="Masukkan No. Telp" value="{{old('no_telp_op', session()->get('formulir2.no_telp') ?? null)}}"></input>
                      @error('no_telp_op')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="col-md-2">
                      <label for="no_hp">No. HP</label>
                    </div>
                    <div class="col-md-4">
                      <input class="form-control @error('no_hp_op') is-invalid @enderror" id="no_hp" name="no_hp_op" placeholder="Masukkan Nomor HP" value="{{old('no_hp_op', session()->get('formulir2.no_hp') ?? null)}}"></input>
                      @error('no_hp_op')
                      <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control @error('kode_pos_op') is-invalid @enderror" id="kode_pos" placeholder="Masukkan Kode Pos" name="kode_pos_op" value="{{old('kode_pos_op', session()->get('formulir2.kode_pos') ?? null)}}">
                    @error('kode_pos_op')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="alert alert-danger" role="alert">
                  Data Spasial
                </div>
                <br>
                <div class="form-group">
                  <h6 class="text-info">Penanggung Jawab</h6>
                  <div class="row">
                    <div class="col-md-2">
                      <label for="nama_pj">Nama</label>
                    </div>
                    <div class="col-md-4">
                      <input class="form-control @error('nama_pj') is-invalid @enderror" id="nama_pj" name="nama_pj" placeholder="Nama Penanggung Jawab" value="{{old('nama_pj', session()->get('formulir2.nama_pj') ?? null)}}"></input>
                    </div>
                    <div class="col-md-1">
                      <label for="alamat_pj">Alamat</label>
                    </div>
                    <div class="col-md-4">
                      <textarea class="form-control @error('alamat_pj') is-invalid @enderror" id="alamat_pj" name="alamat_pj">{{old('alamat_pj', session()->get('formulir2.alamat_pj') ?? null)}}</textarea>
                    </div>
                  </div>
                </div>
                <br>
                <div class="rst-footer-buttons" role="navigation" aria-label="footer navigation">
                  <button type="submit" class="btn btn-info float-right btn-lg">Next</button>
                </div>
                <br><br>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js2/jquery.min.js"></script>
  <script src="js2/popper.js"></script>
  <script src="js2/bootstrap.min.js"></script>
  <script src="js2/main.js"></script>
</body>

</html>