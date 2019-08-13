$(document).ready(function(){
  $(".btn-ver").bind('click',function(e){
    // alert('Mostrando Detallex!!');
    e.preventDefault();
    var row = $(this).parents('tr');
    var form = $(this).parents('form');
    var url = form.attr('action');

    $.post( url , form.serialize() , function(response){
      if(!response.error){
        setModalDetalle(response.modal,true);
        // alert(response.modal);

      }else{
        alert('Error');
      }
    }).fail(function(){
      alert('Falló la comunicacion con el servidor. Intentalo nuevamente.');
    });

  });

});


function setModalDetalle(html,show){
  var modal = $("#modalDetalle").find('.modal-body').html(html);
  // console.log(modal);
  // alert('seteando modal');
  if(show===true){
    $('#modalDetalle').modal('show');
  }
}
