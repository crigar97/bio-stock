@extends('layouts.app')

@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/users/profile.css') }}">
@endpush

@push('scripts')
  <script type="text/javascript" src="{{ asset('js/users/profile.js') }}"></script>
@endpush

@section('content')

{{-- Gradient & User Image --}}
<div class="container-fluid pt-0">
  <div class="row gradient_bio_stock">
    <div class="col-12 text-center mt-5">
      <img src="{{ url('storage/view-images/img-profile.png') }}" id="img-profile">
    </div>
  </div>
</div>
{{-- /Gradient & User Image --}}

{{-- This part shows all collaborators --}}
<div class="container mt-7">
  {{-- Name & Email Labels --}}
  <div class="row mb-5">
    <div class="col text-center">
      <h1 style="font-size: 60px;"> {{ $user->name }} </h1>
      <h4 style="font-style: italic"> {{ $user->email }} </h4>
    </div>
  </div>
  {{-- /Name & Email Labels --}}

  {{-- Section Only For Administrators --}}
  @if ($user->isAdministrator() || $user->isSuperadministrator())
    <hr>
    <h1 class="mt-5"> Mis Colaboradores </h1>
    
    <div class="container">
      <div class="row mt-5 mb-2 d-flex align-items-center">  
        {{-- All Collaborators Cards  --}}
        @foreach ($collaborators as $collaborator)
          <div class="col-4 mb-4">
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row no-gutters">
                <div class="col-md-4 pt-3 pl-3">
                  <img src="{{ url('storage/view-images/img-profile.png') }}" class="card-img">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <h5 class="card-title"> {{ $collaborator->name }} </h5>
                      <form action="{{ route('users.destroy', [ 'user' => $collaborator, ]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="close" data-dismiss="modal" aria-label="Close"
                          onclick="return confirm('¿Estás seguro de eliminar a este colaborador?')">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </form>
                    </div>
                    <p class="card-text"> {{ $collaborator->email }} </p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        {{-- /All Collaborators Cards  --}}

        {{-- Add Collaborator Button  --}}
        <div class="col-4 mb-4">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
              <div id="add_collaborator" class="col p-5 d-flex justify-content-center align-items-center">
                <label for="button">
                  {{-- <img src="{{ url('storage/view-images/add.svg') }}"> --}}
                  <span id="label"> + Agregar </span>
                </label>
                <button id="button" type="button" style="display: none;" data-toggle="modal" data-target="#addCollaboratorModal"></button>
              </div>
            </div>
          </div>
        </div>
        {{-- /Add Collaborator Button  --}}

        {{-- Add Collaborator Modal --}}
        <div class="modal fade" id="addCollaboratorModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              {{-- Modal Header --}}
              <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"> Nuevo Colaborador </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              {{-- /Modal Header --}}

              {{-- Modal Body --}}
              <div class="modal-body">
                <form action="{{ route('users.store') }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label"> Nombre </label>
                    <input type="text" class="form-control" id="recipient-name" name="name">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label"> Email </label>
                    <input type="text" class="form-control" id="recipient-name" name="email">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label"> Contraseña </label>
                    <input type="text" class="form-control" id="recipient-name" name="password">
                  </div>
                  <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar </button>
                    <button type="submit" class="btn btn-success ml-3"> Registrar </button>
                  </div>
                </form>
              </div>
              {{-- /Modal Body --}}
            </div>
          </div>
        </div>
        {{-- /Add Collaborator Modal --}}
      </div>

      {{-- Validation Errors --}}
      <div class="row mb-4">
        <div class="col">
          @if ($errors->any())
            <div id="errorMessages" class="alert alert-danger">
              <h5> Errores al tratar de guardar al nuevo colaborador: </h5>
                @foreach ($errors->all() as $error)
                · {{ $error }} <br>
                @endforeach
              </div>
            <script>
              goTo("errorMessages");
            </script>
          @endif
        </div>
      </div>
      {{-- /Validation Errors --}}
    </div>
  @endif
</div>
{{-- /This part shows all collaborators --}}

@endsection