@extends('layout.main')

@section('contenido')

  @component('layout.table')
    @slot('id','dt-cobranza')
    @slot('headers',['Estado','Fecha Documento','Documento','Cliente'])
    @section('body')
      @foreach ($cobranzas as $c => $c)
        <tr>
          <td>{{ $c->estado }}</td>
          <td>{{ $c->documento->tipo }} - {{ $c->documento->folio }}</td>
          <td>{{ $c->documento->fecha }}</td>
          <td>{{ $c->cliente->nombre }}</td>
        </tr>

      @endforeach
    @endsection
  @endcomponent
  @parent
@endsection
