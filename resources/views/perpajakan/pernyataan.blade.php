@extends('layout/main')

@section('title', 'BPPKAD | Online (Pernyataan)')

@section('content')
    <!-- Page Content  -->
    <div id="content">

      <!-- <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb col-lg-19">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pernyataan</li>
          </ol>
        </nav>
      </div> -->
      <!-- <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>

          <h6 class="text-light">Formulir Pendaftaran Pernyataan</h6>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
          </button>
        </div>
      </nav> -->
      <form action="/perpajakan/storeSemua" method="POST">
        @csrf
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Perhatian!</strong> Jika ada pertanyaan terkait pengisian formulir segera hubungi
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <br>
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading"></h4>
          <center>
            <p>Pastikan dengan benar alamat email yang anda masukkan
              <hr>
            <p class="mb-0">Untuk melanjutkan proses pendaftaran, Admin akan mengirimkan ke alamat email yang anda daftarkan</p>
          </center>
        </div>

        <br><br><br><br><br><br><br><br><br><br><br><br><br>
        <div class="rst-footer-buttons" role="navigation" aria-label="footer navigation">
          <button type=submit class="btn btn-info float-right" title="Server Requirements" accesskey="n" rel="next">
            Simpan
          </button>
          <a href="/perpajakan/uploadfile" class="btn btn-info float-left" title="CodeIgniter4 User Guide" accesskey="p" rel="prev">
            <span class="fa fa-arrow-circle-left" aria-hidden="true"></span>
            Kembali
          </a>
        </div>
        <br><br>
      </form>
    </div>
  </div>
@endsection