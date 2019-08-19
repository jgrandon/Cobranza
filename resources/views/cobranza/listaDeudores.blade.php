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
          <td>{{ count($d['deudor']->getDocumentosAdeudados($d['acreedor']->id)) }}</td>
          <td>{{ $d['deudor']->getFechaPrimeraCuota($d['acreedor']->id) }}</td>
          <td>$ {{ number_format($d['deudor']->getTotalAdeudado($d['acreedor']->id),0,',','.') }}</td>
          <td>
            {!! Form::open(['route' => ['verCobranza', 'deudor'=>$d['deudor']->id,'acreedor'=>$d['acreedor']->id ], 'method' => 'POST']) !!}
              <!--<a href="{{ route('verCobranza',$d['deudor']->id,$d['acreedor']->id) }}" class=" btn-ver btn btn-info btn-round btn-xs">Cobrar</a>-->
              <button type="success" class="btn btn-success btn-xs btn-round" name="button">Cobrar</button>
            {!! Form::close() !!}
          </td>
        </tr>
      @endforeach
    @endsection
  @endcomponent
@endsection
@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $("#dt-deudores").DataTable();
    });
  </script>
@endsection
