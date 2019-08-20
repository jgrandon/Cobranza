$(".btn-cobranza").on('click',function(){
  var accion = $(this).data().accion;
  $(".panel-inicial").hide(100);
  switch(accion){
    case 0:
      $(".panel-cobranza-0").show(100);
      break;
    case 1:
      $(".panel-cobranza-1").show(100);
      break;
    case 2:
      break;
    case 3:
      break;
    case 4:
      break;
    case 5:
      break;
    default:
      $(".panel-cobranza-0").hide(100);
      $(".panel-cobranza-1").hide(100);
      $(".panel-cobranza-2").hide(100);
      $(".panel-cobranza-3").hide(100);
      $(".panel-cobranza-4").hide(100);
      $(".panel-inicial").show(100);
  }
});

$(".chk-pdf").bootstrapToggle({
  on : "Solicitar Envio"
  , off : "No Solicitar Envio"
  , size : "mini"
  , width : 130
  , onstyle : "success"
});
