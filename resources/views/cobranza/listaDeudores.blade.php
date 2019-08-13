@extends('layout.main')

@section('contenido')
  @component('layout.table')
    @slot('id','dt-deudores')
    @slot('headers',['Rut','Razon Social','N° Cuotas','Fecha Deuda','Monto Adeudado',''])
    @section('body')
      @foreach($deudores as $d)
        <tr>
          <td>{{ $d->rut }}</td>
          <td>{{ $d->razonSocial }}</td>
          <td>{{ count($d->getDeudas()) }}</td>
          <td>{{ $d->getFechaPrimeraCuota() }}</td>
          <td>$ {{ number_format($d->totalDeuda(),0,',','.') }}</td>
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
