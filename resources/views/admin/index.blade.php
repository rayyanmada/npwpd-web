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

          <ul class="navbar-nav">
            <li class="nav-item active dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div class="dropdown-divider">
                  {{ Auth::user()->name }}
                </div>
                <form class="dropdown-item">
                  {{ Auth::user()->email }}
                </form>
                <a class="dropdown-item" href="{{ route('login') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                  @csrf
                </form>
              </div>
            </li>
          </ul>
          <button class="btn btn-light d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          </button>
        </div>
      </nav>

      <div class="container">
        <div class="row">
          <div class="col-12">
            <nav class="navbar navbar-light bg-white justify-content-between">
              <a class="navbar-brand">Data Pendaftar Pajak</a>
              <form class="form-inline" action="/admin">
                <input class="form-control mr-sm-2 bg-secondary" type="text" placeholder="Search.." aria-label="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
              </form>
              <!-- <form class="form-inline">
                <input class="form-control mr-sm-2 bg-secondary" type="text" placeholder="Search.." aria-label="Search" name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
              </form> -->
            </nav>

            @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
            @endif

            <table class="table">
              <thead class="thead-dark">
                <tr>
                  <th class="text-center" scope="col">No</th>
                  <th class="text-center" scope="col">Nama</th>
                  <th class="text-center" scope="col">Email</th>
                  <th class="text-center" scope="col">Tanggal Pendaftaran</th>
                  <th class="text-center" scope="col">Alamat</th>
                  <th class="text-center" scope="col">Selengkapnya</th>
                </tr>
              </thead>
              <?php $i = 1; ?>
              @foreach ($wajibPajak as $wp)
              <tbody>
                <tr>
                  <th scope="row">{{ $i }}</th>
                  <td>{{ $wp->nama }}</td>
                  <td>{{ $wp->email }}</td>
                  <td>{{ $wp->tanggal }}</td>
                  <td>{{ $wp->alamat }}</td>
                  <td>
                    <center>
                      <a href="/admin/showWp/{{ $wp->id }}" class="btn btn-success">Lihat</a>
                    </center>
                  </td>
                </tr>
              </tbody>
              <?php $i++; ?>
              @endforeach
            </table>
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