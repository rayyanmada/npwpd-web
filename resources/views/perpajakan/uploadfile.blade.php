@extends('layout/main')

@section('title', 'BPPKAD | Online (Pernyataan)')

@section('content')


    <!-- Page Content  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">

          <!-- <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button> -->
          <h6 class="text-light">Formulir Pendaftaran Upload File</h6>
          <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
          </button>
        </div>
      </nav>
      <h6 class="text-danger">Upload File</h4>
      <br>

      <form action="/perpajakan/storeUf" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <div class="row">
            <div class="col-md-5">
              @if(isset($formulir->Ktp))
                <img alt="KTP" src="/storage/ktp/{{$formulir->Ktp}}"/>
              @endif
              <div class="form-group">
                <label for="ktp"> KTP (Maks 2MB, format JPEG/PNG)</label>
                <br>
                <input type="file" {{ (!empty($formulir->Ktp)) ? "disabled" : ''}} class="form-control-file" id="ktp" name="ktp">
              </div>
            </div>
            <div class="col-md-5">
              @if(isset($formulir->Sku))
                <img alt="SKU" src="/storage/sku/{{$formulir->Sku}}"/>
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
          <button type="submit" class="btn btn-info float-right btn-lg">Next</button>
          <a href="/perpajakan/objekpajak" class="btn btn-info float-left">Previous</a>
        </div>
      </form>
    </div>
@endsection