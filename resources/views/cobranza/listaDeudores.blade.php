@extends('layout.main')

@section('contenido')
  @component('layout.table')
  @slot('headers',['Rut','Razon Social','N° Cuotas','Fecha Deuda','Monto Adeudado',''])
  @section('body')
    @foreach($deudores as $d)
      <tr>
        <td>{{ $d->rut }}</td>
        <td>{{ $d->razonSocial}}</td>
      </tr>
    @endforeach
  @endsection
  @endcomponent
@endsection
