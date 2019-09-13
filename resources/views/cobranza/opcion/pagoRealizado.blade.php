<style media="screen">
  .datepicker-container {
    z-index: 99999 !important;
  }
</style>

<form action="{{ route('finalizarCobranza') }}" method="post">
  <div class="col-lg-6">
    @component('layout.table')
      @slot('id','tablaCuotas')
      @slot('headers',['','Fecha Vencimiento','Documento','Pendiente'])
      @slot('body')
        @foreach( $deudor->getDocumentosAdeudados($acreedor->id) as $documento )
          @foreach( $documento->cuotas() as $cuota )
            @if( $cuota->isPendiente() )
              <tr>
                <td>
                  <input type="checkbox" name="" value="">
                </td>
                <td>{{ $cuota->fechaVencimiento->format('d/m/Y') }}</td>
                <td>Cuota #{{ $cuota->numeroCuota }}</td>
                <td>{{ $cuota->getMontoPendiente() }}</td>
              </tr>
            @endif
          @endforeach
        @endforeach
      @endslot
    @endcomponent
  </div>
  <div class="col-lg-6">
    <h4>Indica los documentos con los que paga: </h4>
    <div class="row">
      @component('layout.table')
        @slot('id','dt-mp')
        @slot('headers',['','Fecha','Tipo','Monto',''])
        @slot('body')
      @endcomponent
    </div>
    <div class="row">
      <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#md-add-mp"><i class="glyphicon glyphicon-plus" ></i> Agregar Pago </button>
    </div>
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

    @component('layout.modal')
      @slot('id','md-add-mp')
      @slot('title','Agregar Pago')
      @slot('size','sm')
      @slot('footer')
        <div class="button-group">
          <button type="button" class="btn btn-success btn-add-mp">Aceptar</button>
        </div>
      @endslot
      @slot('body')
        <div class="form-group col-xs-12">
          <div class="has-feedback">
            <label for="">Fecha</label>
            <input data-toggle="datepicker" class="fecha-mp form-control has-feedback-left">
            <span class="fa fa-calendar-o form-control-feedback left"></span>
          </div>
        </div>
        <div class="select-mp form-group col-xs-12">
          <label for="">Medio Pago</label>
          <select class="form-control ">
            @foreach ($mediosPago as $mp)
              <option value="{{ $mp->id }}">{{ $mp->nombre }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-xs-12">
          <div class="has-feedback">
            <label for="">Monto</label>
            <input  class="monto-mp form-control has-feedback-left number-only">
            <span class="fa fa-usd form-control-feedback left"></span>
          </div>
        </div>
      @endslot
    @endcomponent
  </div>
</form>
