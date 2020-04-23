@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <span style="font-size: 50px"> Nuevo Espécimen </span style="font-size: 40px">
    <div class="row mt-5">
      <div class="col">
      <form action="{{ route('specimens.store') }}" method="POST">
        @csrf

        <!-- Progress Bar -->
        <div class="progress" style="height: 50px;" id="top">
          <div class="progress-bar bg-dark" role="progressbar" style="width: 20%; font-size: 18px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
            TAXONOMÍA
          </div>
          <div class="progress-bar bg-dark" role="progressbar" style="width: 20%; font-size: 18px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
            CURATORIAL
          </div>
          <div class="progress-bar bg-dark" role="progressbar" style="width: 20%; font-size: 18px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
            COLECTA
          </div>
          <div class="progress-bar bg-dark" role="progressbar" style="width: 20%; font-size: 18px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
            CASTAS
          </div>
          <div class="progress-bar bg-dark" role="progressbar" style="width: 20%; font-size: 18px;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
            DATOS 
          </div>
        </div>
        <!-- /Progress Bar -->

        <!-- Content -->

        <!-- Taxonomie -->  
        <div class="row">
          <div class="col">
            <div class="collapse taxonomie-curatorial show" id="taxonomie">
              <div class="card card-body">
                <div class="container">
                  <div class="form-group mt-4">
                
                    <h1 style="font-weight: bold;"> TAXONOMÍA </h1>
                
                    <div class="row mt-5">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Subfamilia </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="subfamily" class="form-control form-control-lg" placeholder="Subfamilia">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Tribu </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="tribe" class="form-control form-control-lg" placeholder="Tribu">
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
                        <input type="text" name="genus" class="form-control form-control-lg" placeholder="Género">
                      </div>
                      <div class="col-4">
                        <input type="text" name="subgenre" class="form-control form-control-lg" placeholder="Subgénero">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Complejo o Grupo</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="complex" class="form-control form-control-lg" placeholder="Complejo o Grupo">
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
                        <input type="text" name="specie" class="form-control form-control-lg" placeholder="Especie">
                      </div>
                      <div class="col-4">
                        <input type="text" name="subspecie" class="form-control form-control-lg" placeholder="Subespecie">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Autor </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="author" class="form-control form-control-lg" placeholder="Autor">
                      </div>
                    </div>
                
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col offset-7">
                    <a href="#top">
                      <button 
                        class="btn btn-primary pl-5 pr-5 pt-2 pb-2 mt-3 mb-3 ml-5" 
                        style="font-size: 20px; font-weight: bold"
                        type="button" 
                        data-toggle="collapse" 
                        data-target=".taxonomie-curatorial" 
                        aria-expanded="false" 
                        aria-controls="taxonomie curatorial"> 
                        Siguiente
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /Taxonomie -->
        
        <!-- Curatorial -->
        <div class="row">
          <div class="col">
            <div class="collapse taxonomie-curatorial curatorial-collection" id="curatorial">
              <div class="card card-body">
                <div class="container">
                  <div class="form-group mt-4">
                
                    <h1  style="font-weight: bold;"> CURATORIAL </h1>
                
                    <div class="row mt-5">
                      <div class="col-4 offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Preparado Por </label>
                      </div>
                      <div class="col-4">
                        <label style="font-size: 29px; font-weight: bold;"> Fecha </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4 offset-2">
                        <input type="text" name="prepared_by" class="form-control form-control-lg" placeholder="Preparado Por">
                      </div>
                      <div class="col-4">
                        <input type="text" name="prepared_at" class="form-control form-control-lg" placeholder="Fecha de Preparación">
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
                        <input type="text" name="determined_by" class="form-control form-control-lg" placeholder="Determinado Por">
                      </div>
                      <div class="col-4">
                        <input type="text" name="determined_at" class="form-control form-control-lg" placeholder="Fecha de Determinado">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Vida </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="life_stage_sex" class="form-control form-control-lg" placeholder="Vida">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Medio </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="medium" class="form-control form-control-lg" placeholder="Medio">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Proporcionado Por </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="owned_by" class="form-control form-control-lg" placeholder="Proporcionado Por">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Localizado </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="located_at" class="form-control form-control-lg" placeholder="Localizado">
                      </div>
                    </div>
                    
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Notas del Espécimen </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="notes" class="form-control form-control-lg" placeholder="Notas del Espécimen">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Número de Bitácora </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="collection_code" class="form-control form-control-lg" placeholder="Número de Bitácora">
                      </div>
                    </div>
                
                  </div>
                </div>
                
                <div class="d-flex justify-content-around mt-3">
                  <a href="#top">
                    <button 
                    class="btn btn-danger m-3 pl-5 pr-5 pt-2 pb-2" 
                    style="font-size: 20px; font-weight: bold"
                    type="button"
                    data-toggle="collapse" 
                    data-target=".taxonomie-curatorial"
                    aria-expanded="false" 
                        aria-controls="taxonomie curatorial"> 
                        Regresar
                      </button>  
                    </a>
                    <a href="#top">
                      <button 
                        class="btn btn-primary m-3 pl-5 pr-5 pt-2 pb-2" 
                        style="font-size: 20px; font-weight: bold"
                        type="button"
                        data-toggle="collapse" 
                        data-target=".curatorial-collection"
                        aria-expanded="false" 
                        aria-controls="curatorial collection"> 
                        Siguiente
                      </button>  
                    </a>
                  </div>
                  
              </div>
            </div>
          </div>
        </div>
        <!-- /Curatorial -->
        
        <!-- Collection -->
        <div class="row">
          <div class="col">
            <div class="collapse curatorial-collection collection-castes" id="collection">
              <div class="card card-body">
                
                <div class="container">
                  <div class="form-group mt-4">
                
                    <h1 style="font-weight: bold;"> COLECTA </h1>
                
                    <div class="row mt-5">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> País </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="country" class="form-control form-control-lg" placeholder="País">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Estado </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="state" class="form-control form-control-lg" placeholder="Estado">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Municipio </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="municipality" class="form-control form-control-lg" placeholder="Municipio">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Localidad </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="locality" class="form-control form-control-lg" placeholder="Localidad">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Sitio </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="site" class="form-control form-control-lg" placeholder="Sitio">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col-3 offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Latitud </label>
                      </div>
                      <div class="col-3">
                        <label style="font-size: 29px; font-weight: bold;"> Longitud </label>
                      </div>
                      <div class="col-2">
                        <label style="font-size: 29px; font-weight: bold;"> Altitud </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-3 offset-2">
                        <input type="text" name="latitude" class="form-control form-control-lg" placeholder="Latitud">
                      </div>
                      <div class="col-3">
                        <input type="text" name="longitude" class="form-control form-control-lg" placeholder="Longitud">
                      </div>
                      <div class="col-2">
                        <input type="text" name="altitude" class="form-control form-control-lg" placeholder="Altitud">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Fecha de Colecta </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="collected_at" class="form-control form-control-lg" placeholder="Fecha de Colecta">
                      </div>
                    </div>

                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Método de Colecta </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="method" class="form-control form-control-lg" placeholder="Método de Colecta">
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
                        <input type="text" name="habitat" class="form-control form-control-lg" placeholder="Hábitat">
                      </div>
                      <div class="col-4">
                        <input type="text" name="microhabitat" class="form-control form-control-lg" placeholder="Microhábitat">
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
                        <input type="text" name="collector_1" class="form-control form-control-lg" placeholder="Colector (1)">
                      </div>
                      <div class="col-4">
                        <input type="text" name="collector_2" class="form-control form-control-lg" placeholder="Colector (2)">
                      </div>
                    </div>

                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Relación Ejemplares en Alcohol </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="relation" class="form-control form-control-lg" placeholder="Relación Ejemplares en Alcohol">
                      </div>
                    </div>
                
                  </div>
                </div>

                <div class="d-flex justify-content-around mt-3">
                  <a href="#top">
                    <button 
                      class="btn btn-danger m-3 pl-5 pr-5 pt-2 pb-2" 
                      style="font-size: 20px; font-weight: bold"
                      type="button"
                      data-toggle="collapse" 
                      data-target=".curatorial-collection"
                        aria-expanded="false" 
                        aria-controls="curatorial collection"> 
                      Regresar
                    </button>  
                  </a>
                  <a href="#top">
                    <button 
                      class="btn btn-primary m-3 pl-5 pr-5 pt-2 pb-2" 
                      style="font-size: 20px; font-weight: bold"
                      type="button"
                      data-toggle="collapse" 
                      data-target=".collection-castes"
                        aria-expanded="false" 
                        aria-controls="collection castes"> 
                      Siguiente
                    </button>  
                  </a>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <!-- /Collection -->
        
        <!-- Castes -->
        <div class="row">
          <div class="col">
            <div class="collapse collection-castes castes-data" id="castes">
              <div class="card card-body">
                
                <div class="container">
                  <div class="form-group mt-4">
                
                    <h1 style="font-weight: bold;"> CASTAS </h1>
                
                    <div class="row mt-5">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Obreras </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="workers" class="form-control form-control-lg" placeholder="Obreras">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Soldados </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="soldiers" class="form-control form-control-lg" placeholder="Soldados">
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Reinas </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="queens" class="form-control form-control-lg" placeholder="Reinas">
                      </div>
                    </div>
                    
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Machos </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="males" class="form-control form-control-lg" placeholder="Machos">
                      </div>
                    </div>
                    
                  </div>
                </div>
                
                <div class="d-flex justify-content-around mt-3">
                  <a href="#top">
                    <button 
                      class="btn btn-danger m-3 pl-5 pr-5 pt-2 pb-2" 
                      style="font-size: 20px; font-weight: bold"
                      type="button"
                      data-toggle="collapse" 
                      data-target=".collection-castes"
                      aria-expanded="false" 
                      aria-controls="collection castes"> 
                      Regresar
                    </button>  
                  </a>
                  <a href="#top">
                    <button 
                      class="btn btn-primary m-3 pl-5 pr-5 pt-2 pb-2" 
                      style="font-size: 20px; font-weight: bold"
                      type="button"
                      data-toggle="collapse" 
                      data-target=".castes-data"
                      aria-expanded="false" 
                      aria-controls="castes data"> 
                      Siguiente
                    </button>  
                  </a>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <!-- /Castes -->
        
        <!-- Data -->
        <div class="row">
          <div class="col">
            <div class="collapse castes-data" id="data">
              <div class="card card-body">
                
                <div class="container">
                  <div class="form-group mt-4">
                
                    <h1 style="font-weight: bold;"> DATOS </h1>
                
                    <div class="row mt-5">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Número de Catálogo </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <div class="input-group">
                          <select class="form-control form-control-lg" name="code">
                            <option> CMVF </option>
                            <option> CCMVF </option>
                            <option> ICUAPFOR </option>
                          </select>
                          <div class="input-group-append">
                            <label class="input-group-text pl-5 pr-5" style="font-size: 20px;"> ?????????? </label>
                          </div>
                        </div>
                      </div>
                    </div>
                
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Notas de la Colección </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="collection_notes" class="form-control form-control-lg" placeholder="Notas de la Colección">
                      </div>
                    </div>
                    
                    <div class="row mt-4">
                      <div class="col offset-2">
                        <label style="font-size: 29px; font-weight: bold;"> Notas de Correcciones </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-8 offset-2">
                        <input type="text" name="correction_notes" class="form-control form-control-lg" placeholder="Notas de Correcciones">
                      </div>
                    </div>
                    
                  </div>
                </div>
                
                <div class="d-flex justify-content-around mt-3">
                  <a href="#top">
                    <button 
                      class="btn btn-danger m-3 pl-5 pr-5 pt-2 pb-2" 
                      style="font-size: 20px; font-weight: bold"
                      type="button"
                      data-toggle="collapse" 
                      data-target=".castes-data"
                      aria-expanded="false" 
                      aria-controls="castes data"> 
                      Regresar
                    </button>  
                  </a>
                  <a href="#top">
                    <button 
                      class="btn btn-success m-3 pl-5 pr-5 pt-2 pb-2" 
                      style="font-size: 20px; font-weight: bold"
                      type="submit"> 
                      GUARDAR
                    </button> 
                  </a>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!-- /Data -->

        <!-- /Content -->

      </form>
    </div>
  </div>
</div>
@endsection