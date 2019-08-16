@extends('layout.main')
@section('contenido')
  <div class="row">
    <div class="col-lg-6">
      <div class="panel panl-default">
        <div class="panel-heading">

        </div>
        <div class="panel-body">
          <div class="row">
            <label for="">{{ $deudor->rut }}</label>
          </div>
          <div class="row">
            <label for="">{{ $deudor->razonSocial }}</label>
          </div>

        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="panel panl-default">
        <div class="panel-heading">

        </div>
        <div class="panel-body">
          {{ $acreedor->rut }}
          {{ $acreedor->razonSocial }}

        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <a href="{{ route('deudores') }}" class="btn btn-xs btn-success">Volver</a>
  </div>
@endsection
