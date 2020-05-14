@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
@endpush

@push('scripts')
  <script type="text/javascript" src="{{ asset('js/home.js') }}"></script>
@endpush

@section('content')

<div class="container mt-5 mb-5">

  <span style="font-size: 45px; font-weight: bold; color: rgb(26, 145, 93);"> Bienvenido </span>
    
    <div class="row mt-5">

      <div class="col-3">
      <a href="{{ route('specimens.create') }}" style="text-decoration: none;">
        <div class="text-center menu-item pt-5 pb-5">
          <img src="{{ url('storage/view-images/add-specie.png') }}" alt="icon-add-specie">
          <h2 class="title__menu-item mt-3"> Agregar </h2>
        </div>
      </a>
      </div>
      
      <div class="col-3">
        <a href="{{ route('specimens.search') }}" style="text-decoration: none;">
          <div class="text-center menu-item pt-5 pb-5">
            <img src="{{ url('storage/view-images/find-specie.png') }}" alt="icon-find-specie">
            <h2 class="title__menu-item mt-3"> Buscar </h2>
          </div>
        </a>
      </div>
      
      <div class="col-3">
        <a href="{{ route('specimens.index') }}" style="text-decoration: none;">
          <div class="text-center menu-item pt-5 pb-5">
            <img src="{{ url('storage/view-images/list-specie.png') }}" alt="icon-find-specie">
            <h2 class="title__menu-item mt-3"> Listar </h2>
          </div>
        </a>
      </div>
      
    </div>
  
  <div class="row mt-3">

    <div class="col-3">
      <a href="{{ route('specimens.import') }}" style="text-decoration: none;">
        <div class="text-center menu-item pt-5 pb-5">
          <img src="{{ url('storage/view-images/import-specie.png') }}" alt="icon-find-specie">
          <h2 class="title__menu-item mt-3"> Importar </h2>
        </div>
      </a>
    </div>

    <div class="col-3">
      <a href="{{ route('specimens.export', urlencode(serialize(null))) }}" style="text-decoration: none;">
        <div class="text-center menu-item pt-5 pb-5">
          <img src="{{ url('storage/view-images/export-specie.png') }}" alt="icon-find-specie">
          <h2 class="title__menu-item mt-3"> Exportar </h2>
        </div>
      </a>
    </div>

  </div>
</div>

@endsection
