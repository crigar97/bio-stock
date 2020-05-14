@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/specimens/import.css') }}">
@endpush

@push('scripts')
  <script type="text/javascript" src="{{ asset('js/specimens/import.js') }}"></script>
@endpush

@section('content')

<div class="container mt-5">

  <span style="font-size: 50px"> Importar Registros </span style="font-size: 40px">

  <p class="mt-5" style="font-size: 20px"> 
    Antes de importar cualquier archivo, debes considerar los siguientes aspectos: 
  </p>
  <ol>
    <li>
      El sistema solo podrá substraer información de hojas de cálculo de Excel. Es decir, solo son válidos 
      aquellos archivos con las extensiones <b> .xls </b>y <b> .xlsx</b>. 
    </li>
    <li>
      Los datos dentro del archivo deberán tener un <b> formato específico </b> que se explica en este 
      <a href="#"> documento</a>.
    </li>
  </ol>
  <p class="mt-5" style="font-size: 20px"> 
    ¿Ya tienes un archivo archivo que cumple los requisitos? Excelente, ahora sube tu archivo.
  </p>
  
  <div class="row mt-5">
    <div class="col-10 offset-1">
      <form enctype="multipart/form-data" action="{{ route('specimens.mass-store') }}" method="POST">
        @csrf
        {{-- file name & upload button --}}
        <div class="form-group row text-center">
          <input 
            id="file-name" 
            class="form-control form-control-lg col-7" 
            type="text" 
            placeholder="Ningún archivo cargado..." 
            readonly>

          <label for="file-upload" class="load col-4 ml-3">
            <img id="upload-icon" src="{{ url('storage/view-images/upload-file.png') }}" >
            <span onchange=""> SUBIR ARCHIVO </span>
          </label>
          <input id="file-upload" onchange='displayFileName()' type="file" name="file" style='display: none;'>
        </div>
        {{-- import button --}}
        <div class="form-group row text-center mt-5 mb-5">
          <div class="col-7"></div>
          <button id="btn-import" type="submit" class="btn btn-import col-4 ml-3" disabled> IMPORTAR </button>
        </div>
      </form>
    </div>
  </div>

</div>
    
@endsection