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
            <form action="/perpajakan/storeUf" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <div class="row">
                  <div class="col-md-5">
                    @if(isset($formulir->Ktp))
                    <img alt="KTP" src="/storage/ktp/{{$formulir->Ktp}}" />
                    @endif
                    <div class="form-group">
                      <label for="ktp"> KTP (Maks 2MB, format JPEG/PNG)</label>
                      <br>
                      <input type="file" {{ (!empty($formulir->Ktp)) ? "disabled" : ''}} class="form-control-file" id="ktp" name="ktp">
                    </div>
                  </div>
                  <div class="col-md-5">
                    @if(isset($formulir->Sku))
                    <img alt="SKU" src="/storage/sku/{{$formulir->Sku}}" />
                    @endif
                    <div class="form-group">
                      <label for="sku">Surat Kepemilikan Usaha (Maks 2MB, format JPEG/PNG)</label>
                      <br>
                      <input type="file" {{ (!empty($formulir->Sku)) ? "disabled" : ''}} class="form-control-file" id="sku" name="sku">
                    </div>
                  </div>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
              </div>
              <br><br><br><br><br><br><br><br><br><br><br><br>
              <div class="rst-footer-buttons" role="navigation" aria-label="footer navigation">
                <button type="submit" class="btn btn-info float-right btn-lg">Simpan</button>
              </div>
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