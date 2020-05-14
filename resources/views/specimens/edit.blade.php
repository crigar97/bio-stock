@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/specimens/edit.css') }}">
@endpush

@push('scripts')
  <script type="text/javascript" src="{{ asset('js/specimens/edit.js') }}"></script>
@endpush

@section('content')

<div class="container mt-5 mb-5">

  <h1 id="top" class=""> <b> Editar Espécimen </b> {{ $specimen->catalog_number }} </h1>
  
  <form action="{{ route('specimens.update', $specimen) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="row mt-5">
      <div class="col">
        <div class="accordion" id="accordionExample">

          <!-- Taxonomie -->
          <div class="card">
            <!-- title section: -->
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <a href="#top">
                  <button id="taxonomie" class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    TAXONOMIA
                  </button>
                </a>
              </h2>
            </div>
            <!-- collapse section: -->
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <div class="form-group">

                  <div class="row mt-3">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Subfamilia </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                    <input type="text" name="subfamily" value="{{ $specimen->taxonomie->subfamily }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Tribu </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                    <input type="text" name="tribe" value="{{ $specimen->taxonomie->tribe }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col-4 offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Género </label>
                    </div>
                    <div class="col-4">
                      <label style="font-size: 29px; font-weight: bold;"> Subgénero </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4 offset-2">
                      <input type="text" name="genus" value="{{ $specimen->taxonomie->genus }}" class="form-control form-control-lg" placeholder="">
                    </div>
                    <div class="col-4">
                      <input type="text" name="subgenre" value="{{ $specimen->taxonomie->subgenre }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Complejo o Grupo</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="complex" value="{{ $specimen->taxonomie->complex }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col-4 offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Especie </label>
                    </div>
                    <div class="col-4">
                      <label style="font-size: 29px; font-weight: bold;"> Subespecie </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4 offset-2">
                      <input type="text" name="specie" value="{{ $specimen->taxonomie->specie }}" class="form-control form-control-lg" placeholder="">
                    </div>
                    <div class="col-4">
                      <input type="text" name="subspecie" value="{{ $specimen->taxonomie->subspecie }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Autor </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="author" value="{{ $specimen->taxonomie->author }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>
          <!-- /Taxonomie -->

          <!-- Curatorial -->
          <div class="card">
            <!-- title section: -->
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <a href="#curatorial">
                  <button id="curatorial" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    CURATORIAL
                  </button>
                </a>
              </h2>
            </div>
            <!-- collapse section: -->
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <div class="form-group">
              
                  <div class="row mt-3">
                    <div class="col-4 offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Preparado Por </label>
                    </div>
                    <div class="col-4">
                      <label style="font-size: 29px; font-weight: bold;"> Fecha </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4 offset-2">
                      <input type="text" name="prepared_by" value="{{ $specimen->curatorial->prepared_by }}" class="form-control form-control-lg" placeholder="">
                    </div>
                    <div class="col-4">
                      <input type="text" name="prepared_at" value="{{ $specimen->curatorial->prepared_at }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col-4 offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Determinado Por </label>
                    </div>
                    <div class="col-4">
                      <label style="font-size: 29px; font-weight: bold;"> Fecha </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4 offset-2">
                      <input type="text" name="determined_by" value="{{ $specimen->curatorial->determined_by }}" class="form-control form-control-lg" placeholder="">
                    </div>
                    <div class="col-4">
                      <input type="text" name="determined_at" value="{{ $specimen->curatorial->determined_at }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Vida </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="life_stage_sex" value="{{ $specimen->curatorial->life_stage_sex }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Medio </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="medium" value="{{ $specimen->curatorial->medium }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Proporcionado Por </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="owned_by" value="{{ $specimen->curatorial->owned_by }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Localizado </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="located_at" value="{{ $specimen->curatorial->located_at }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
                  
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Notas del Espécimen </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="notes" value="{{ $specimen->curatorial->notes }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Número de Bitácora </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="collection_code" value="{{ $specimen->curatorial->collection_code }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                </div>
              </div>
            </div>

          </div>
          <!-- /Curatorial -->

          <!-- Collection -->
          <div class="card">
            <!-- title section: -->
            <div class="card-header" id="headingThree">
              <h2 class="mb-0">
                <a href="#collection">
                  <button id="collection" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    COLECTA
                  </button>
                </a>
              </h2>
            </div>
            <!-- collapse section: -->
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
              <div class="card-body">
                <div class="form-group">
              
                  <div class="row mt-3">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> País </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="country" value="{{ $specimen->collection->country }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Estado </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="state" value="{{ $specimen->collection->state }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Municipio </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="municipality" value="{{ $specimen->collection->municipality }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Localidad </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="locality" value="{{ $specimen->collection->locality }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Sitio </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="site" value="{{ $specimen->collection->site }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col-2 offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Latitud </label>
                    </div>
                    <div class="col-2 ml-3">
                      <label style="font-size: 29px; font-weight: bold;"> Longitud </label>
                    </div>
                    <div class="col-2 ml-3">
                      <label style="font-size: 29px; font-weight: bold;"> Altitud </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-2 offset-2">
                      <input type="text" name="latitude" value="{{ $specimen->collection->latitude }}" class="form-control form-control-lg" placeholder="">
                    </div>
                    <div class="col-2 ml-3">
                      <input type="text" name="longitude" value="{{ $specimen->collection->longitude }}" class="form-control form-control-lg" placeholder="">
                    </div>
                    <div class="col-2 ml-3">
                      <input type="text" name="altitude" value="{{ $specimen->collection->altitude }}" class="form-control form-control-lg" placeholder="">
                    </div>
                    {{-- Google Maps | title section --}}
                    <div class="col-2" id="headingMap">
                      <button
                        type="button" 
                        class="btn btn-view-map" 
                        data-toggle="collapse" 
                        data-target="#collapseMap" 
                        aria-expanded="true" 
                        aria-controls="collapseMap">
                        <img src="{{ url('storage/view-images/google_maps.png') }}" alt="export">
                      </button>
                    </div>
                  </div>

                  {{-- Google Maps | collapse section --}}
                  <div id="collapseMap" class="collapse mt-5 text-center" aria-labelledby="headingMap">
                    <iframe 
                      width="60%" 
                      height="450" 
                      src="https://maps.google.com/?q={{$specimen->collection->latitude}},{{$specimen->collection->longitude}}&z=18&t=m&output=embed" 
                      frameborder="0"
                      scrolling="no"
                      marginheight="0"
                      marginwidth="0">
                    </iframe>
                  </div>
              
                  <div class="row mt-5">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Fecha de Colecta </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="collected_at" value="{{ $specimen->collection->collected_at }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>

                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Método de Colecta </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="method" value="{{ $specimen->collection->method }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>

                  <div class="row mt-4">
                    <div class="col-4 offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Hábitat </label>
                    </div>
                    <div class="col-4">
                      <label style="font-size: 29px; font-weight: bold;"> Microhábitat </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4 offset-2">
                      <input type="text" name="habitat" value="{{ $specimen->collection->habitat }}" class="form-control form-control-lg" placeholder="">
                    </div>
                    <div class="col-4">
                      <input type="text" name="microhabitat" value="{{ $specimen->collection->microhabitat }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>

                  <div class="row mt-4">
                    <div class="col-4 offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Colector (1) </label>
                    </div>
                    <div class="col-4">
                      <label style="font-size: 29px; font-weight: bold;"> Collector (2) </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4 offset-2">
                      <input type="text" name="collector_1" value="{{ $specimen->collection->collector_1 }}" class="form-control form-control-lg" placeholder="">
                    </div>
                    <div class="col-4">
                      <input type="text" name="collector_2" value="{{ $specimen->collection->collector_2 }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>

                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Relación Ejemplares en Alcohol </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="relation" value="{{ $specimen->collection->relation }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                </div>
              </div>
            </div>

          </div>
          <!-- /Collection -->

          <!-- Castes -->
          <div class="card">
            <!-- title section: -->
            <div class="card-header" id="headingFour">
              <h2 class="mb-0">
                <a href="#caste">
                  <button id="caste" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    CASTAS
                  </button>
                </a>
              </h2>
            </div>
            <!-- collapse section: -->
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
              <div class="card-body">
                <div class="form-group">

                  <div class="row mt-3">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Obreras </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="workers" value="{{ $specimen->caste->workers }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Soldados </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="soldiers" value="{{ $specimen->caste->soldiers }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
              
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Reinas </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="queens" value="{{ $specimen->caste->queens }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
                  
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Machos </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="males" value="{{ $specimen->caste->males }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
                  
                </div>  
              </div>
            </div>

          </div>
          <!-- /Castes -->

          <!-- Data -->
          <div class="card">
            <!-- title section: -->
            <div class="card-header" id="headingFive">
              <h2 class="mb-0">
                <a href="#data">
                  <button id="data" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    DATOS
                  </button>
                </a>
              </h2>
            </div>
            <!-- collapse section: -->
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
              <div class="card-body">
                <div class="form-group">
              
                  <div class="row mt-3">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Notas de la Colección </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="collection_notes" value="{{ $specimen->collection_notes }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
                  
                  <div class="row mt-4">
                    <div class="col offset-2">
                      <label style="font-size: 29px; font-weight: bold;"> Notas de Correcciones </label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 offset-2">
                      <input type="text" name="correction_notes" value="{{ $specimen->correction_notes }}" class="form-control form-control-lg" placeholder="">
                    </div>
                  </div>
                  
                </div>  
              </div>
            </div>

          </div>
          <!-- /Data -->

        </div>
      </div>
    </div>

    <div class="d-flex justify-content-end mt-5">
      <button type="submit" class="btn btn-success pl-4 pr-4 pt-2 pb-2" style="font-size: 20px; font-weight: bold"> GUARDAR </button>
    </div>

  </form>
</div>
    
@endsection