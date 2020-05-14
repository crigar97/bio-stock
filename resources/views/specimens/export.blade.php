@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/specimens/export.css') }}">
@endpush

@push('scripts')
  <script type="text/javascript" src="{{ asset('js/specimens/export.js') }}"></script>
@endpush

@section('content')

<div class="container mt-4 mb-5">

  <span style="font-size: 50px"> Exportar Registros </span style="font-size: 40px">

  <form action="{{ route('specimens.mass-show', urlencode(serialize($ids))) }}" method="GET">
    @csrf

    <h2 class="mt-5"> 1. Formato </h2>
    <p class="mt-4"> Elige el formato en el que deseas exportar tu información. </p>
    <div class="form-group mt-4">
      <div class="col offset-1">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="pdf" name="pdf">
          <label class="form-check-label" for="pdf"> Pdf </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="excel" name="excel" checked>
          <label class="form-check-label" for="excel"> Excel </label>
        </div>
      </div>
    </div>

    <div class="form-group">

      <h2 class="mt-4"> 2. Atributos </h2>
      <p class="mt-4"> Desmarca las casillas de los campos que no deseas exportar. </p>
      <h4 class="mt-4 ml-4"> Taxonomía </h4>
      <div class="form-group mt-4">
        <div class="col-10 offset-1">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="subfamily" name="subfamily" checked>
            <label class="form-check-label" for="subfamily"> Subfamilia </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="tribe" name="tribe" checked>
            <label class="form-check-label" for="tribe"> Tribu </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="genus" name="genus" checked>
            <label class="form-check-label" for="genus"> Género </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="subgenre" name="subgenre" checked>
            <label class="form-check-label" for="subgenre"> Subgénero </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="complex" name="complex" checked>
            <label class="form-check-label" for="complex"> Complejo o grupo </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="specie" name="specie" checked>
            <label class="form-check-label" for="specie"> Especie </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="subspecie" name="subspecie" checked>
            <label class="form-check-label" for="subspecie"> Subespecie </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="author" name="author" checked>
            <label class="form-check-label" for="author"> Autor </label>
          </div>
        </div>
      </div>

      <h4 class="mt-4 ml-4"> Curatorial </h4>
      <div class="form-group mt-4">
        <div class="col-10 offset-1">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="prepared_by" name="prepared_by" checked>
            <label class="form-check-label" for="prepared_by"> Preparado por </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="prepared_at" name="prepared_at" checked>
            <label class="form-check-label" for="prepared_at"> Fecha de preparación </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="determined_by" name="determined_by" checked>
            <label class="form-check-label" for="determined_by"> Determinado por </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="determined_at" name="determined_at" checked>
            <label class="form-check-label" for="determined_at"> Fecha de determinado </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="life_stage_sex" name="life_stage_sex" checked>
            <label class="form-check-label" for="life_stage_sex"> Vida </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="medium" name="medium" checked>
            <label class="form-check-label" for="medium"> Medio </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="owned_by" name="owned_by" checked>
            <label class="form-check-label" for="owned_by"> Proporcionado por </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="located_at" name="located_at" checked>
            <label class="form-check-label" for="located_at"> localizado </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="notes" name="notes" checked>
            <label class="form-check-label" for="notes"> Notas del Espécimen </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="collection_code" name="collection_code" checked>
            <label class="form-check-label" for="collection_code"> Número de Bitácora </label>
          </div>
        </div>
      </div>

      <h4 class="mt-4 ml-4"> Colecta </h4>
      <div class="form-group mt-4">
        <div class="col-10 offset-1">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="country" name="country" checked>
            <label class="form-check-label" for="country"> País </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="state" name="state" checked>
            <label class="form-check-label" for="state"> Estado </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="municipality" name="municipality" checked>
            <label class="form-check-label" for="municipality"> Municipio </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="locality" name="locality" checked>
            <label class="form-check-label" for="locality"> Localidad </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="site" name="site" checked>
            <label class="form-check-label" for="site"> Sitio </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="latitude" name="latitude" checked>
            <label class="form-check-label" for="latitude"> Latitud </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="longitude" name="longitude" checked>
            <label class="form-check-label" for="longitude"> Longitud </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="altitude" name="altitude" checked>
            <label class="form-check-label" for="altitude"> Altitud </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="collected_at" name="collected_at" checked>
            <label class="form-check-label" for="collected_at"> Fecha de colecta </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="method" name="method" checked>
            <label class="form-check-label" for="method"> Método de colecta </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="habitat" name="habitat" checked>
            <label class="form-check-label" for="habitat"> Hábitat </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="microhabitat" name="microhabitat" checked>
            <label class="form-check-label" for="microhabitat"> Microhábitat </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="collector_1" name="collector_1" checked>
            <label class="form-check-label" for="collector_1"> Collector (1) </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="collector_2" name="collector_2" checked>
            <label class="form-check-label" for="collector_2"> Collector (2) </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="relation" name="relation" checked>
            <label class="form-check-label" for="relation"> Relación ejemplares </label>
          </div>
        </div>
      </div>

      <h4 class="mt-4 ml-4"> Castas </h4>
      <div class="form-group mt-4">
        <div class="col-10 offset-1">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="workers" name="workers" checked>
            <label class="form-check-label" for="workers"> Obreras </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="soldiers" name="soldiers" checked>
            <label class="form-check-label" for="soldiers"> Soldados </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="queens" name="queens" checked>
            <label class="form-check-label" for="queens"> Reinas </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="males" name="males" checked>
            <label class="form-check-label" for="males"> Machos </label>
          </div>
        </div>
      </div>

      <h4 class="mt-4 ml-4"> Datos </h4>
      <div class="form-group mt-4">
        <div class="col-10 offset-1">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="collection_notes" name="collection_notes" checked>
            <label class="form-check-label" for="collection_notes"> Notas de la colección </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="correction_notes" name="correction_notes" checked>
            <label class="form-check-label" for="correction_notes"> Notas de Correcciones </label>
          </div>
        </div>
      </div>
      
    </div>

    <div class="col-3 offset-9" >
      <button type="submit" class="btn btn-download pt-2 pb-2 pl-4 pr-4"> <b> Descargar </b> </button>
    </div>

  </form>

</div>
    
@endsection