@extends('layout.main')

@section('contenido')
  @component('layout.table')
    @slot('id','dt-deudores')
    @slot('headers',['Deudor','Acreedor','N° Cuotas','Fecha Deuda','Monto Adeudado',''])
    @section('body')
      @foreach($deudas as $d)
        <tr>
          <td>{{ $d['deudor']->rut }}<br>{{ $d['deudor']->razonSocial }}</td>
          <td>{{ $d['acreedor']->rut }}<br>{{ $d['acreedor']->razonSocial }}</td>
          <td>{{ count($d['deudor']->getDocumentosAdeudados($d['acreedor'])) }}</td>
          <td>{{ $d['deudor']->getFechaPrimeraCuota($d['acreedor']) }}</td>
          <td>$ {{ number_format($d['deudor']->getTotalAdeudado($d['acreedor']),0,',','.') }}</td>
          <td>
            {{-- {!! Form::open(['route' => ['verCobranza', $d->id ], 'method' => 'POST']) !!} --}}
              <a href="{{ route('verCobranza',$d->id) }}" class=" btn-ver btn btn-info btn-round btn-xs">Cobrar</a>
            {{-- {!! Form::close() !!} --}}
          </td>
        </tr>
      @endforeach
    @endsection
  @endcomponent
@endsection
