<form action="{{ route('finalizarCobranza') }}" method="post">
  <div class="col-lg-8">
    @component('layout.table')
      @slot('id','tablaCuotas')
      @slot('headers',['','Fecha Vencimiento','Documento','Pendiente'])
      @section('body')
        @foreach( $deudor->getDocumentosAdeudados($acreedor->id) as $documento )
          @foreach( $documento->cuotas() as $cuota )
            @if( $cuota->isPendiente() )
              <tr>
                <td>
                  <input type="checkbox" name="" value="">
                </td>
                <td>{{ $cuota->fechaVencimiento }}</td>
                <td>Cuota #{{ $cuota->numeroCuota }}</td>
                <td>{{ $cuota->getMontoPendiente() }}</td>
              </tr>
            @endif
          @endforeach
        @endforeach
      @endsection
    @endcomponent
  </div>
  <div class="col-lg-4">

  </div>
  <div class="col-lg-6">
    <label for="">Observaciones</label>
    <textarea name="name" class="form-control" rows="3"></textarea>
  </div>
  <div class="col-lg-6">
    Fecha : {{ Carbon\Carbon::now()->format('d/m/Y') }}
    <br>
      @foreach ($deudor->getDocumentosAdeudados($acreedor->id) as $i => $doc)

      {{-- @if($doc->getPDF()!=null)

      @else

      @endif --}}

      {{ $doc->nombreDoc() }} #{{ $doc->folio }} <button type="button" name="button" class="btn btn-danger btn-round btn-xs">Reenviar PDF</button>
      <input type="checkbox" class="chk-pdf">
      <br>
    @endforeach
    <!--
    <p style="color:red;">*Se solicitará al cliente confirmacion de datos de contacto</p>
  -->
    <br>
    <div class="button-group">
      <button class="btn btn-success btn-sm " type="submit" name="button"><i class="glyphicon glyphicon-ok"></i> Finalizar</button>
      <a class="btn btn-warning btn-sm btn-cobranza-back" type="button" name="button"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
    </div>
  </div>
</form>
