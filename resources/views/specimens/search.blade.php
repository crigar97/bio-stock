@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/specimens/search.css') }}">
@endpush

@push('scripts')
  <script type="text/javascript" src="{{ asset('js/specimens/search.js') }}"></script>
@endpush

@section('content')

<div class="container mt-4">

  <h1> <b> Selecciona tus atributos </b> </h1>
  <div class="row">
    <div class="col text-center mt-5">
      <button type="button" class="btn-add-data" data-toggle="modal" data-target="#add-data-attribute"> Datos <b> + </b> </button>
      <button type="button" class="btn-add-taxonomie ml-3" data-toggle="modal" data-target="#add-taxonomie-attribute" data-whatever="@mdo"> Taxonomía <b> + </b> </button>
      <button type="button" class="btn-add-curatorial ml-3" data-toggle="modal" data-target="#add-curatorial-attribute"> Curatorial <b> + </b> </button>
      <button type="button" class="btn-add-collection ml-3" data-toggle="modal" data-target="#add-collection-attribute"> Colecta <b> + </b> </button>
      <button type="button" class="btn-add-caste ml-3" data-toggle="modal" data-target="#add-caste-attribute"> Casta <b> + </b> </button>
    </div>
  </div>

  {{-- Modal: Add Data Attibute --}}
  <div class="modal fade" id="add-data-attribute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title txt-addDataAtt" id="exampleModalLabel"> Datos </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="data-attribute-option" class="col-form-label"> Atributo </label>
              <select id="data-attribute-option" class="form-control">
                <option value="collection_notes" selected> Notas de la Colección </option>
                <option value="correction_notes"> Notas de Correciones </option>
              </select>
              {{-- <input type="text" class="form-control" id="recipient-name"> --}}
            </div>
            <div class="form-group">
              <label for="data-attribute-value" class="col-form-label"> Valor </label>
              <textarea class="form-control" id="data-attribute-value"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar </button>
          <button type="button" class="btn md-btn-add-data-attribute" onclick='addAttribute("data-attribute-option", "data-attribute-value", "data_attributes_section")' data-dismiss="modal"> <b> Agregar </b> </button>
        </div>
      </div>
    </div>
  </div>
  {{-- /Modal: Add Data Attibute --}}

  {{-- Modal: Add Taxonomie Attibute --}}
  <div class="modal fade" id="add-taxonomie-attribute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title txt-addTaxoAtt" id="exampleModalLabel"> Taxonomía </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="taxonomie-attribute-option" class="col-form-label"> Atributo </label>
              <select id="taxonomie-attribute-option" class="form-control">
                <option value="subfamily" selected> Subfamilia </option>
                <option value="tribe"> Tribu </option>
                <option value="genus"> Género </option>
                <option value="subgenre"> Subgénero </option>
                <option value="complex"> Complejo o Grupo </option>
                <option value="specie"> Especie </option>
                <option value="subspecie"> Subespecie </option>
                <option value="author"> Autor </option>
              </select>
              {{-- <input type="text" class="form-control" id="recipient-name"> --}}
            </div>
            <div class="form-group">
              <label for="taxonomie-attribute-value" class="col-form-label"> Valor </label>
              <textarea class="form-control" id="taxonomie-attribute-value"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar </button>
          <button type="button" class="btn md-btn-add-taxonomie-attribute" onclick='addAttribute("taxonomie-attribute-option", "taxonomie-attribute-value", "taxonomie_attributes_section")' data-dismiss="modal"> <b> Agregar </b> </button>
        </div>
      </div>
    </div>
  </div>
  {{-- /Modal: Add Taxonomie Attibute --}}

  {{-- Modal: Add Curatorial Attibute --}}
  <div class="modal fade" id="add-curatorial-attribute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title txt-addCuraAtt" id="exampleModalLabel"> Curatorial </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="curatorial-attribute-option" class="col-form-label"> Atributo </label>
              <select id="curatorial-attribute-option" class="form-control">
                <option value="prepared_by" selected> Preparado Por </option>
                <option value="prepared_at"> Fecha de Preparado </option>
                <option value="determined_by"> Determinado Por </option>
                <option value="determined_at"> Fecha de Determinado </option>
                <option value="life_stage_sex"> Vida </option>
                <option value="medium"> Medio </option>
                <option value="owned_by"> Proporcionado Por </option>
                <option value="located_at"> Localizado </option>
                <option value="notes"> Notas del Espécimen </option>
                <option value="collection_code"> Número de Bitácora </option>
              </select>
              {{-- <input type="text" class="form-control" id="recipient-name"> --}}
            </div>
            <div class="form-group">
              <label for="curatorial-attribute-value" class="col-form-label"> Valor </label>
              <textarea class="form-control" id="curatorial-attribute-value"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar </button>
          <button type="button" class="btn md-btn-add-curatorial-attribute" onclick='addAttribute("curatorial-attribute-option", "curatorial-attribute-value", "curatorial_attributes_section")' data-dismiss="modal"> <b> Agregar </b> </button>
        </div>
      </div>
    </div>
  </div>
  {{-- /Modal: Add Curatorial Attibute --}}

  {{-- Modal: Add Collection Attibute --}}
  <div class="modal fade" id="add-collection-attribute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title txt-addColleAtt" id="exampleModalLabel"> Colecta </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="collection-attribute-option" class="col-form-label"> Atributo </label>
              <select id="collection-attribute-option" class="form-control">
                <option value="country" selected> País </option>
                <option value="state"> Estado </option>
                <option value="municipality"> Municipio </option>
                <option value="locality"> Localidad </option>
                <option value="site"> Sitio </option>
                <option value="latitude"> Latitud </option>
                <option value="longitude"> Longitud </option>
                <option value="altitude"> Altitud </option>
                <option value="collected_at"> Fecha de Colecta </option>
                <option value="method"> Método de Colecta </option>
                <option value="habitat"> Hábitat </option>
                <option value="microhabitat"> Microhábitat </option>
                <option value="collector_1"> Colector (1) </option>
                <option value="collector_2"> Colector (2) </option>
                <option value="relation"> Relación Ejemplares en Alcohol </option>
              </select>
              {{-- <input type="text" class="form-control" id="recipient-name"> --}}
            </div>
            <div class="form-group">
              <label for="collection-attribute-value" class="col-form-label"> Valor </label>
              <textarea class="form-control" id="collection-attribute-value"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar </button>
          <button type="button" class="btn md-btn-add-collection-attribute" onclick='addAttribute("collection-attribute-option", "collection-attribute-value", "collection_attributes_section")' data-dismiss="modal"> <b> Agregar </b> </button>
        </div>
      </div>
    </div>
  </div>
  {{-- /Modal: Add Collection Attibute --}}

  {{-- Modal: Add Caste Attibute --}}
  <div class="modal fade" id="add-caste-attribute" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title txt-addCasteAtt" id="exampleModalLabel"> Casta </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="caste-attribute-option" class="col-form-label"> Atributo </label>
              <select id="caste-attribute-option" class="form-control">
                <option value="workers" selected> Obreras </option>
                <option value="soldiers"> Soldados </option>
                <option value="queens"> Reinas </option>
                <option value="males"> Machos </option>
              </select>
              {{-- <input type="text" class="form-control" id="recipient-name"> --}}
            </div>
            <div class="form-group">
              <label for="caste-attribute-value" class="col-form-label"> Valor </label>
              <textarea class="form-control" id="caste-attribute-value"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar </button>
          <button type="button" class="btn md-btn-add-caste-attribute" onclick='addAttribute("caste-attribute-option", "caste-attribute-value", "caste_attributes_section")' data-dismiss="modal"> <b> Agregar </b> </button>
        </div>
      </div>
    </div>
  </div>
  {{-- /Modal: Add Caste Attibute --}}

  {{-- Attribute Tag --}}
  <div class="col-6 mt-4" id="new_attribute" style="display: none;">
    <span class="tag-taxo mr-3"></span>
    <input type="text" class="text-muted" style="outline: none; border: none;" readonly>
    <button type="button" class="close" onclick='deleteAttribute(this)'>
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  {{-- /Attribute Tag --}}

  <hr>

<form action="{{ route('specimens.find') }}" method="GET">
    @csrf

    <div class="row mb-5" id="data_attributes_section"></div>
    <div class="row mb-5" id="taxonomie_attributes_section"></div>
    <div class="row mb-5" id="curatorial_attributes_section"></div>
    <div class="row mb-5" id="collection_attributes_section"></div>
    <div class="row mb-5" id="caste_attributes_section"></div>
  
    <hr>
  
    <div class="row">
      <div class="col-2 offset-10 mt-4 mb-4">
        <button type="submit" class="btn btn-search"> <b> Buscar </b> </button>
      </div>
    </div>

  </form>

  

</div>

@endsection