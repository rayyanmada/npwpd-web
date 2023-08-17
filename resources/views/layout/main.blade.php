<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>@yield('title')</title>

  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" type="text/css" href="/css/sidebar.css">

  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

{{-- ajax --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


{{-- Untuk Kota/Kabupaten dalam/luar kota --}}
  <script>

    // if(session()->get('formulir.kabupaten_kota') == 'Luar Kota'){
    //   document.getElementById("mycode").style.display = "none";
    //   document.getElementById("mycode2").style.display = "block";
    //   }
      
    //   else if (session()->get('formulir.kabupaten_kota') == 'Dalam Kota'){
    //     document.getElementById("mycode").style.display = "block";
    //     document.getElementById("mycode2").style.display = "none";
    //   }

    function nilai(x) {
      if (x==0){ 
        document.getElementById("mycode").style.display = "block";
        document.getElementById("mycode2").style.display = "none";
        document.getElementById("kecamatan2").value = "";
        document.getElementById("kelurahan2").value = "";
        
      }else {
        document.getElementById("mycode").style.display = "none";
        document.getElementById("mycode2").style.display = "block";
        document.getElementById("kecamatan").value = "";
        document.getElementById("kelurahan").value = "";
      }return;
    }

  </script>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
      <div class="sidebar-header">
        <center>
          <img src="/images/logo.png" class="rounded" width="50px" alt="">
          <h3 class="text-warning">BPPKAD <br>Kota Kediri</h3>
        </center>
        <!-- <h3 class="text-warning">BPPKAD |</h3>
        <h3>Online</h3> -->
      </div>

      <ul class="list-unstyled components">
        <!-- <p>Dummy Heading</p> -->
        <li>
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pendaftaran</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <li>
              <a href="/">Pendaftaran NPWPD</a>
            </li>
          </ul>
        </li>
    </nav>

    @yield('content')

    @yield('dropdown')
      <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

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
                $(document).ready(function () {
                $('#kecamatan').on('change', function () {
                let id = $(this).val();
                $('#kelurahan').empty();
                $('#kelurahan').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                type: 'GET',
                url: 'cariKelurahan/' + id,
                success: function (response) {
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
                $(document).ready(function () {
                $('#jenisPajak').on('change', function () {
                let id = $(this).val();
                $('#bidangUsaha').empty();
                $('#bidangUsaha').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                type: 'GET',
                url: 'cariBidangUsaha/' + id,
                success: function (response) {
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