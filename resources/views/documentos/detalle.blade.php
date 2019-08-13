<div class="row">

  <div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">
          Deudor
      </div>
      <div class="panel-body">
        <div class="row">
          <label for="" class="col-lg-6">Rut</label>
          <label for="" class="col-lg-6">{{ $documento->deudor()->rut }}</label>
        </div>
        <div class="row">
          <label for="" class="col-lg-6">Razon Social</label>
          <label for="" class="col-lg-6">{{ $documento->deudor()->razonSocial }}</label>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">
          Documento
      </div>
      <div class="panel-body">
        <div class="row">
          <label for="" class="col-lg-6">{{ $documento->tipo }} - {{ $documento->folio }} </label>
        </div>
        <div class="row">
          <label for="" class="col-lg-6">Monto</label>
          <label for="" class="col-lg-6">{{ $documento->monto }}</label>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
          Cuotas
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="panel-group" id="accordionDetalle">
            @foreach ($documento->cuotas() as $nCuota => $cuota)
              <div class="panel
              @if( $cuota->isVencida() )
                {{-- Si está vencida --}}
                @if($cuota->fechaConciliacion!=null)
                  panel-success
                  <!--
                  <i class="glyphicon glyphicon-ok"></i>
                -->
                @else
                  panel-danger
                @endif
              @else
                panel-default
              @endif
              ">
                <div class="panel-heading">
                  <h4 class="panel-title">

                    <a data-toggle="collapse" data-parent="#accordionDetalle" href="#collapse-{{ $nCuota }}">Cuota N°{{ $nCuota + 1 }} - {{ $cuota->fechaVencimiento }}</a>
                    <div class="pull-right">
                      $ {{ number_format($cuota->monto,2,'.',',') }}.-
                    </div>
                  </h4>
                </div>
                <div class="panel-collapse collapse" id="collapse-{{ $nCuota }}">
                  <div class="panel-body">
                    <ul>
                      <li>cobranza 1 </li>
                      <li>cobranza 2</li>
                    </ul>
                    @foreach ($cuota->cobranzas() as $nCobranza => $cobranza )
                      {{ $nCobranza }}
                      <br>
                    @endforeach
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
