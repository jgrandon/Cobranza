

    @section('body')
      <div class="x_panel">


          <div class="x_title">
              <h2>Crear Empresa </h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>

        <div class="x_content">
          <form id="demo-form2" data-parsley-validate
           class="form-horizontal form-label-left" action="{{ route('bodegas.guardar') }}" method="POST">
           @csrf()
            <input type="hidden" name="id" value="{{ $bodega->id }}">
            @if (session('mensaje'))
              <div class="alert alert-success">
                {{ session('mensaje') }}
              </div>
            @endif
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre Bodega <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="nombre" required="required" class="form-control col-md-7 col-xs-12" value="{{ $bodega->nombre }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ubicacion <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="ubicacion" required="required" class="form-control col-md-7 col-xs-12" value="{{ $bodega->ubicacion }}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tipo Bodega <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" id="isSucursal" name="isSucursal" required="required" class="form-control col-md-7 col-xs-12">
                    <option value="0">Bodega</option>
                    <option value="1" @if($bodega->isSucursal) selected @endif>Sucursal</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Administrador</label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" id="administrador" name="administrador" required="required" class="form-control col-md-7 col-xs-12">
                  <option value="">--No seleccionado--</option>
                  @if($bodega->isSucursal)
                    @foreach($adminsSucursal as $adm)
                      <option value="{{ $adm->id }}"
                      @if ($bodega->administrador == $adm->id)
                        selected
                      @endif
                      >{{ $adm->nombre }}</option>
                    @endforeach()
                  @else
                    @foreach($adminsBodega as $adm)
                      <option value="{{ $adm->id }}"
                      @if ($bodega->administrador == $adm->id)
                        selected
                      @endif
                      >{{ $adm->nombre }}</option>
                    @endforeach()
                  @endif
                </select>
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <!--<button type="submit" class="btn btn-success btn">
                  @if ($accion=="editar")
                  Modificar
                @else
                  Crear
                @endif
              </button>-->
                {{-- @if($accion=="editar")
                  <a type="button" name="button" class="btn btn-default" href="{{ route('modificarbodega')}}">Volver</a>
                @endif() --}}
              </div>
            </div>
          </form>
        </div>
    @endsection
