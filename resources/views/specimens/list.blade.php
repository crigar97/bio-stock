@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/specimens/list.css') }}">
@endpush

@push('scripts')
  <script type="text/javascript" src="{{ asset('js/specimens/list.js') }}"></script>
@endpush

@section('content')

<div class="container">

  <div class="row mt-5">
    <div class="col-9">
      <h1 class=""> Lista de Espécimens: {{ $count }} REGISTROS </h1>
    </div>
    <div class="col-3 text-right">
      <form action="{{ route('specimens.export', urlencode(serialize($ids))) }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-download pt-2 pb-2 pl-4 pr-4">
          <div class="flex-row">
            <img class="export_img" src="{{ url('storage/view-images/download.png') }}">
            <b class="ml-2"> Exportar </b>
          </div>
        </button>
      </form>
    </div>
  </div>

  <table class="table mt-5">
    <thead>
      <tr>
        <th scope="col" style="font-size: 25px;"> # </th>
        <th scope="col" style="font-size: 25px;"> Número de Catálogo </th>
        <th scope="col" style="font-size: 25px;"> Notas de Colección </th>
        <th scope="col" style="font-size: 25px;"> Notas de Corrección </th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($specimens as $specimen)
        <tr>
          <th scope="row"> {{ $specimen->id }} </th>
          <td class="pl-5"> {{ $specimen->catalog_number }} </td>
          <td> ... </td>
          <td> ... </td>
          <td>
            <div class="d-flex justify-content-center">
              <a href="{{ route('specimens.edit', $specimen) }}" class="btn btn-primary mr-3"> EDITAR </a>
              <form action="{{ route('specimens.destroy', $specimen) }}" method="POST">
                @method('DELETE')
                @csrf
                <input 
                  class="btn btn-danger" 
                  type="submit" 
                  value="ELIMINAR" 
                  onclick="return confirm('¿Estás seguro de eliminar este espécimen?')" >
              </form>
            </div>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>

  <div class="d-flex justify-content-center">
    {{ $specimens->links() }}
  </div>

</div>

@endsection