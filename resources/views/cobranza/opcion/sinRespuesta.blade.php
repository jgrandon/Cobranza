  <form action="{{ route('finalizarCobranza') }}" method="post">
    <input type="hidden" name="accion" value="sin-respuesta">
    <input type="hidden" name="idDeudor" value="{{ $deudor->id }}">
    <input type="hidden" name=idAcreedor"" value="{{ $acreedor->id}}">
    <div class="col-lg-6">
      <div class="row">
        <h2>El contacto no ha contestado la llamada.</h2>
        <div class="col-lg-6">
          <label for="">Solicitar confirmacion de contacto?</label>
        </div>
        <input type="checkbox" class="chk-confirmar-contacto" name="confirmarContacto">
      </div>
      <br>
      <br>
      <div class="row">
        <div class="button-group">
          <button class="btn btn-success btn-sm " type="submit" name="button"><i class="glyphicon glyphicon-ok"></i> Finalizar</button>
          <a class="btn btn-warning btn-sm btn-cobranza-back" type="button" name="button"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
        </div>
      </div>

    </div>

    <div class="col-lg-6">
      <label for="">Observaciones</label>
      <textarea name="obsercacion" class="form-control" rows="3"></textarea>
    </div>
  </form>
