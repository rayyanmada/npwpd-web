<!doctype html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css2/style.css">
  <script>
    function nilai(x) {
      if (x == 0) {
        document.getElementById("mycode").style.display = "block";
        document.getElementById("mycode2").style.display = "none";
        document.getElementById("kecamatan2").value = "";
        document.getElementById("kelurahan2").value = "";

      } else {
        document.getElementById("mycode").style.display = "none";
        document.getElementById("mycode2").style.display = "block";
        document.getElementById("kecamatan").value = "";
        document.getElementById("kelurahan").value = "";
      }
      return;
    }
  </script>
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
    @yield('content')
  </div>
  @yield('dropdown')
  <script src="js2/jquery.min.js"></script>
  <script src="js2/popper.js"></script>
  <script src="js2/bootstrap.min.js"></script>
  <script src="js2/main.js"></script>
  {{-- Untuk dependent dropdown --}}
  <script src="http://code.jquery.com/jquery-3.4.1.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#kecamatan').on('change', function() {
        let id = $(this).val();
        $('#kelurahan').empty();
        $('#kelurahan').append(`<option value="0" disabled selected>Processing...</option>`);
        $.ajax({
          type: 'GET',
          url: '/cariKelurahan/' + id,
          success: function(response) {
            var response = JSON.parse(response);
            console.log(response);
            $('#kelurahan').empty();
            $('#kelurahan').append(`<option value="">Silahkan Pilih</option>`);
            response.forEach(element => {
              $('#kelurahan').append(`<option value="${element['id_kelurahan']}">${element['kelurahan']}</option>`);
            });
          }
        });
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#jenisPajak').on('change', function() {
        let id = $(this).val();
        $('#bidangUsaha').empty();
        $('#bidangUsaha').append(`<option value="0" disabled selected>Processing...</option>`);
        $.ajax({
          type: 'GET',
          url: '/cariBidangUsaha/' + id,
          success: function(response) {
            var response = JSON.parse(response);
            console.log(response);
            $('#bidangUsaha').empty();
            $('#bidangUsaha').append(`<option value="">Silahkan Pilih</option>`);
            response.forEach(element => {
              $('#bidangUsaha').append(`<option value="${element['id_bidang_usaha']}">${element['bidang_usaha']}</option>`);
            });
          }
        });
      });
    });
  </script>
</body>

</html>