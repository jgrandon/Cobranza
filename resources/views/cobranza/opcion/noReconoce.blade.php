<form action="{{ route('finalizarCobranza') }}" class="form-group" method="post">
  @csrf()
  <input type="hidden" name="estado" value="no-reconoce">
  <input type="hidden" name="idDeudor" value="{{ $deudor->id }}">
  <input type="hidden" name="idAcreedor" value="{{ $acreedor->id }}">

  <h3>El cliente necesita mas informacion referente a los documentos adeudados.</h3>
  <div class="col-lg-6">
    <div class="col-lg-12">
      <div class="row">
      </div>
      {{-- Fecha : {{ Carbon\Carbon::now()->format('d/m/Y') }} --}}
      <br>
      <div class="row">
        <h2>Selecciona los documentos por confirmar o envialos si es que se encuentra cargados</h2>
      </div>
      <br>
      <div class="row">
        @foreach ($deudor->getDocumentosAdeudados($acreedor->id) as $i => $doc)
                  {{-- @if($doc->getPDF()!=null)

                @else

              @endif --}}
          <div class="col-lg-8">
            <label for="">{{ $doc->nombreDoc() }} #{{ $doc->folio }}</label>
          </div>
          <div class="col-lg-4">
            @if( $doc->pdfCargado )
              <button type="button" name="button" class="btn btn-danger btn-round btn-xs">Reenviar PDF</button>
            @else
              <input type="checkbox" class="chk-pdf" name="pdf[]" value="{{$doc->id}}">
            @endif
          </div>
          <br>
        @endforeach
      </div>
      <br>
      <br>
    </div>
    <!--
    <p style="color:red;">*Se solicitará al cliente confirmacion de datos de contacto</p>
  -->

    <div class="col-lg-12">
      <div class="button-group">
        <button class="btn btn-success btn-sm " type="submit" name="button"><i class="glyphicon glyphicon-ok"></i> Finalizar</button>
        <a class="btn btn-warning btn-sm btn-cobranza-back" type="button" name="button"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <br>
    <div class="row">
      <div class="col-lg-12">
        <label for="">Observaciones</label>
        <textarea name="observacion" class="form-control" rows="3"></textarea>

      </div>
    </div>
  </div>
</form>
