<form action="{{ route('finalizarCobranza') }}" method="post">
  @csrf()
  <input type="hidden" name="estado" value="compromiso">
  <input type="hidden" name="idDeudor" value="{{ $deudor->id }}">
  <input type="hidden" name="idAcreedor" value="{{ $acreedor->id }}">
  <h3>Indica que cuotas y en que fecha el cliente se compromete a pagar</h3>
  <br>
  <div class="col-lg-12">

    <div class="col-lg-8">
      @component('layout.table')
        @slot('id','tablaCuotas')
        @slot('headers',['','Fecha Vencimiento','Documento','Pendiente'])
        @slot('body')
          @foreach( $deudor->getDocumentosAdeudados($acreedor->id) as $documento )
            @foreach( $documento->cuotas() as $cuota )
              @if( $cuota->isPendiente() )
                <tr>
                  <td>
                    <input type="checkbox" name="cuotas[]" value="{{ $cuota->id }}">
                  </td>
                  <td>{{ $cuota->fechaVencimiento }}</td>
                  <td>Cuota #{{ $cuota->numeroCuota }}</td>
                  <td>{{ $cuota->getMontoPendiente() }}</td>
                </tr>
              @endif
            @endforeach
          @endforeach
        @endslot
      @endcomponent
    </div>
    <div class="col-lg-4">
      <div class="row col-lg-12">
        <label for="">Fecha Compromiso de Pago</label>
        <div class="col-md-12 form-group has-feedback">
          <input name="fechaCompromiso" data-toggle="datepicker" class="form-control has-feedback-left">
          <span class="fa fa-calendar-o form-control-feedback left"></span>
        </div>
        <div class="row col-lg-12">
          <label for="">Observaciones</label>
          <textarea name="observacion" class="form-control" rows="3"></textarea>
        </div>
      </div>
    </div>
  </div>


  <div class="col-lg-6">

    <div class="button-group">
      <button class="btn btn-success btn-sm " type="submit" name="button"><i class="glyphicon glyphicon-ok"></i> Finalizar</button>
      <a class="btn btn-warning btn-sm btn-cobranza-back" type="button" name="button"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
    </div>
  </div>
  <div class="col-lg-6">

  </div>
</form>
