$(".btn-cobranza").on('click',function(){
  var accion = $(this).data().accion;
  switch(accion){
    case 0:
      $(".panel-inicial").hide(100);
      $(".panel-cobranza-0").show(100);
      break;
    case 1:
      break;
    case 2:
      break;
    case 3:
      break;
    case 4:
      break;
    case 5:
      break;
  }
});
