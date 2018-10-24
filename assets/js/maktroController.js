// function initMap() {
//   var mapOptions = {
//       center: new google.maps.LatLng(51.5, -0.12),
//       zoom: 10,
//       mapTypeId: google.maps.MapTypeId.HYBRID
//   }
//   var map = new google.maps.Map(document.getElementById("map"), mapOptions);
// }


function valida(){
  field = $("#email").val();
  usuario = field.substring(0, field.indexOf("@"));
  dominio = field.substring(field.indexOf("@")+ 1, field.length);

  if ((usuario.length >=1) &&
    (dominio.length >=3) &&
    (usuario.search("@")==-1) &&
    (dominio.search("@")==-1) &&
    (usuario.search(" ")==-1) &&
    (dominio.search(" ")==-1) &&
    (dominio.search(".")!=-1) &&
    (dominio.indexOf(".") >=1)&&
    (dominio.lastIndexOf(".") < dominio.length - 1)) {
      $(".alert-danger-email-text").alert('close');
    } else{
      $('.alert-danger-email-text').show();
    }
}
function send(){
  var data = {
    name: $("#name").val(),
    email: $("#email").val(),
    content: $("#content").val(),
    token: "tttttt"
  }

  $.ajax({
    type: "POST",
    data: data,
    url: "email.php",
    success: function(ret) {
      data = JSON.parse(ret);
      if(data.status == 'success'){
        console.log(data);
        $('.alert-success').show();
      }else if(data.status == 'error'){
        console.log(data);
        $('.alert-danger-email').show();
      }
    },
  });


  setTimeout(function(){ $(".alert-success").alert('close'); }, 5000);
}
