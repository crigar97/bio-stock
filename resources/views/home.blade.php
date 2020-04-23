@extends('layouts.app')

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
        <a href="{{ route('specimens.index') }}" style="text-decoration: none;">
          <div class="text-center menu-item pt-5 pb-5">
            <img src="{{ url('storage/view-images/list-specie.png') }}" alt="icon-find-specie">
            <h2 class="title__menu-item mt-3"> Listar </h2>
          </div>
        </a>
      </div>

      <div class="col-3">
        <a href="find-specimen.html" style="text-decoration: none;">
          <div class="text-center menu-item pt-5 pb-5">
            <img src="{{ url('storage/view-images/find-specie.png') }}" alt="icon-find-specie">
            <h2 class="title__menu-item mt-3"> Buscar </h2>
          </div>
        </a>
      </div>
      
      <div class="col-3">
        <a href="find-specimen.html" style="text-decoration: none;">
          <div class="text-center menu-item pt-5 pb-5">
            <img src="{{ url('storage/view-images/export-specie.png') }}" alt="icon-find-specie">
            <h2 class="title__menu-item mt-3"> Exportar </h2>
          </div>
        </a>
      </div>
    </div>
</div>

@endsection
