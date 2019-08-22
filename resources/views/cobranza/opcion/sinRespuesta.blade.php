  <form action="{{ route('finalizarCobranza') }}" method="post">
    <div class="col-lg-6">
      <p style="color:red;">El contacto ha respondido previamente?</p>
      <div class="col-lg-6">
        <label for="">Solicitar confirmacion de contacto?</label>
      </div>
      <input type="checkbox" name="confirmar-contacto">
      <br>
      <div class="button-group">
        <button class="btn btn-success btn-sm " type="submit" name="button"><i class="glyphicon glyphicon-ok"></i> Finalizar</button>
        <a class="btn btn-warning btn-sm btn-cobranza-back" type="button" name="button"><i class="glyphicon glyphicon-remove"></i> Cancelar</a>
      </div>
    </div>
    <div class="col-lg-6">
      <label for="">Observaciones</label>
      <textarea name="name" class="form-control" rows="3"></textarea>
    </div>
  </form>
