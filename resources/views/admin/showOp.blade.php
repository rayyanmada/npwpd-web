<!doctype html>
<html lang="en">

<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css2/style.css">
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
            <a href="/admin"><span class="fa fa-user mr-3"></span>Data Permohonan</a>
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
              <a class="navbar-brand">Data Objek Pajak</a>
              <form class="form-inline">
                <a href="/admin/showWp/{{$objekPajak->id}}" class="btn btn-outline-info my-2 my-sm-0" type="submit">Data Wajib Pajak</a>
              </form>
              </a>
            </nav>
            <br>
            <center>
              <div class="col-9">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td class="text-center">Jenis Pajak</td>
                          <td colspan="0.5">{{ $objekPajak->jenis_pajak }}</td>
                        </tr>
                        <tr>
                          <td class="text-center">Bidang Usaha</td>
                          <td colspan="2">{{ $objekPajak->bidang_usaha }}</td>
                        </tr>
                        <tr>
                          <td class="text-center">Nomor</td>
                          <td colspan="2">{{ $objekPajak->nomor }}</td>
                        </tr>
                        <tr>
                          <td class="text-center">Nama</td>
                          <td colspan="2">{{ $objekPajak->nama }}</td>
                        </tr>
                        <tr>
                          <td class="text-center">Alamat</td>
                          <td colspan="2">{{ $objekPajak->alamat }}</td>
                        </tr>
                        <tr>
                          <td class="text-center">RT</td>
                          <td colspan="2">{{ $objekPajak->rt }}</td>
                        </tr>
                        <tr>
                          <td class="text-center">RW</td>
                          <td colspan="2">{{ $objekPajak->rw }}</td>
                        </tr>
                        <tr>
                          <td class="text-center">Kecamatan</td>
                          <td colspan="2">{{ $objekPajak->kecamatan }}</td>
                        </tr>
                        <tr>
                          <td class="text-center">Kelurahan</td>
                          <td colspan="2">{{ $objekPajak->kelurahan }}</td>
                        </tr>
                        <tr>
                          <td class="text-center">Nomor Telp</td>
                          <td colspan="2">{{ $objekPajak->no_telp }}</td>
                        </tr>
                        <tr>
                          <td class="text-center">Nomor HP</td>
                          <td colspan="2">{{ $objekPajak->no_hp }}</td>
                        </tr>
                        <tr>
                          <td class="text-center">Kode Pos</td>
                          <td colspan="2">{{ $objekPajak->kode_pos }}</td>
                        </tr>
                        <tr>
                          <td class="text-center">Nama Penanggung Jawab</td>
                          <td colspan="2">{{ $objekPajak->nama_pj }}</td>
                        </tr>
                        <tr>
                          <td class="text-center">Alamat Penanggung Jawab</td>
                          <td colspan="2">{{ $objekPajak->alamat_pj }}</td>
                        </tr>
                        <tr>
                          <td class="text-center">KTP</td>
                          <td colspan="2"><img src="{{ Storage::url($objekPajak->ktp) }}" class="img-thumbnail" width="300px" height="300px"> </td>
                        </tr>
                        <tr>
                          <td class="text-center">Surat Keterangan Tempat Usaha</td>
                          <td colspan="2"><img src="{{ Storage::url($objekPajak->surat_keterangan_usaha) }}" class="img-thumbnail" width="300px" height="300px">></td>
                        </tr>
                      </tbody>
                    </table>
                    <a href="/editOp/{ $objekPajak->id }/editOp" class="btn btn-primary">Edit</a>
                    <form action="" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="/admin" class="card-link">Kembali</a>
                  </div>
                </div>
              </div>
            </center>
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