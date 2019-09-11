$(".btn-cobranza").on('click',function(){

  var datos = {
    'accion' : $(this).data().accion
    , 'idDeudor' : $("#idDeudor").val()
    , 'idAcreedor' : $("#idAcreedor").val()
  };

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
    //URL RECIBE POST
    url : "/cobranza/getOpcionCobranza"
    , type : 'POST'
    , data : datos
    , success : function(respuesta){
        console.log(respuesta);

        $(".panel-inicial").hide(100);

        $("#panel-cobranza").find('.panel-accion-cobranza').html(respuesta);
        $(".btn-cobranza-back").on('click',function(){
          $(".panel-accion-cobranza").hide(100);
          $(".panel-inicial").show(100);
        })
        $(".chk-pdf").bootstrapToggle({
          on : "Solicitar Envio"
          , off : "No Solicitar Envio"
          , size : "mini"
          , width : 130
          , onstyle : "success"
        });


        //eventos por-confirmar
        $(".chk-confirmar-contacto").bootstrapToggle({
          on : "Si"
          , off : "No"
          , size : "mini"
          , width : 20
          , onstyle : "success"
        });
        $("[data-toggle=\"datepicker\"]").datepicker();

        /*  eventos pago-realizado  */
        var dtMp = $("#dt-mp").DataTable({
          ordering : false
          , searching : false
        });
        //agregar medio pago
        $(".btn-mp").click( agregarMedioPago(dtMp) );
        $(".number-only").ForceNumericOnly();


        $(".panel-accion-cobranza").show(100);
    }
    , error : function(){
        alert(' ERROR EN LA COMUNICACION');
    }
  });


  //
  // switch(accion){
  //   case 0:
  //     $(".panel-cobranza-0").show(100);
  //     break;
  //   case 1:
  //     $(".panel-cobranza-1").show(100);
  //     break;
  //   case 2:
  //   $(".panel-cobranza-2").show(100);
  //     break;
  //   case 3:
  //     break;
  //   case 4:
  //     break;
  //   case 5:
  //     break;
  //   default:
  //     $(".panel-cobranza-0").hide(100);
  //     $(".panel-cobranza-1").hide(100);
  //     $(".panel-cobranza-2").hide(100);
  //     $(".panel-cobranza-3").hide(100);
  //     $(".panel-cobranza-4").hide(100);
  //     $(".panel-inicial").show(100);
  // }
});

function agregarMedioPago(tabla){
  // if( tabla==null ) return false;
  // console.log(tabla);
  return false;
  tabla.row().add([
    "<a  class=\"btn-x-mp btn btn-sm btn-danger\"><i class=\"glyphicon glyphicon-remove\"><i></a>"
    ,
  ]);

  //eliminar medio pago
  $(".btn-x-mp").unbind().click(function(){
    tabla.row( $(this).parents('tr') ).remove( ).draw(false);
  });

}

function verOpcionCobranza(accion){

}
