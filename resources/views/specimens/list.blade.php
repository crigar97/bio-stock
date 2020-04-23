@extends('layouts.app')

@section('content')

<div class="container">

  <h1 class="mt-5"> Lista de Espécimens: {{ $count }} REGISTROS </h1>

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
          <td class="pl-5"> {{ $specimen->code }} </td>
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