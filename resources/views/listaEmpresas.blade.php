@extends('layout.main')

@section('contenido')
  @component('layout.table')
    @slot('id','dt-empresas')
    @slot('headers',['Rut','Nombre','Contactos','Cobranzas'])
    @section('body')
      @foreach($empresas as $e)
        <tr>
          <td>{{ $e->rut }}</td>
          <td>{{ $e->razonSocial }}</td>
          <td></td>
          <td></td>
        </tr>
      @endforeach()
    @endsection
  @endcomponent

  <br>
  <div class="row">
      <button type="submit" name="button" class="btn btn-success" data-target="#md-agregarEmpresa">Agregar Empresa</button>
  </div>


  @component('layout.modal')
    @slot('id','md-empresa')
    @slot('title','AgregarEmpresa')
  @endcomponent

@endsection

{{-- <!--
<script type="text/javascript">
    window.onload = function(){
      $("#isSucursal").on('change',function(){

          if( $(this).val()=='0' ){
            var options = "<option value=''>--No Seleccionado--</option>"
            @foreach($adminsBodega as $a)
              + "<option value='{{ $a->id }}'>{{ $a->nombre }} {{ $a->apellido }}</option>";
            @endforeach;
          }else{
            var options = "<option value=''>--No Seleccionado--</option>"
            @foreach($adminsSucursal as $a)
              + "<option value='{{ $a->id }}'>{{ $a->nombre }} {{ $a->apellido }}</option>";
            @endforeach;
          }
          $("#administrador").html(options);

      });
    }
</script>
--> --}}
