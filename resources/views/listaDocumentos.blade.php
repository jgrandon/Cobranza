@extends('layout.main')

@section('contenido')

  @component('layout.table')
    @slot('id','dt-documentos')
    @slot('headers',['Opciones','Estado','Deudor','Documento','Fecha Emision','Fecha Vencimiento','Monto'])
    @section('body')
      @foreach ($documentos as $c => $d)
        <tr>
          <td>
            {!! Form::open(['route' => ['verDetalleDocumento', $d->id ], 'method' => 'POST']) !!}
              <a class=" btn-ver btn btn-info btn-round btn-xs">Ver</a>
            {!! Form::close() !!}
          </td>
          <td>
            {{ $d->estado() }}
          </td>
          <td>{{ $d->deudor()->razonSocial }}</td>
          <td>{{ $d->tipo }} - {{ $d->folio }}</td>
          <td>{{ $d->fechaEmision->format('Y-m-d') }}</td>
          <td>{{ $d->fechaVencimiento->format('Y-m-d') }}</td>
          <td>$ {{ number_format($d->monto,0,',','.') }}</td>
        </tr>
      @endforeach
    @endsection
  @endcomponent
  <a class="btn btn-success" href="{{ route('agregarDocumento') }}">Agregarrr Documento</a>
<!--
<form class="" action="{{ route('agregarDocumento') }}" method="post">
  <button type="success" class="btn btn-success" data-toggle="modal" data-target="#md-agregar" name="button">Agregar Documentos</button>
</form>
-->
  @component('layout.modal')
    @slot('id','modalDetalle')
    @slot('size','modal-lg')
    @slot('title','Detalle Documento')
  @endcomponent

@endsection


@section('script')
  <script type="text/javascript" src="{{ asset('js/documentos.js') }}"></script>
@endsection
