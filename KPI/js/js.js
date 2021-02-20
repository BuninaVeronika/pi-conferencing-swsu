$("#userreg").on("click",function(){
     $.post("php/userreg.php",
    {
    lastname:$("#lastname").prop("value"),
    name:$("#name").prop("value"),
    firstname:$("#firstname").prop("value"),
    degree:$("#degree").prop("value"),
    academic:$("#academic").prop("value"),
    organization:$("#organization").prop("value"),
    address:$("#address").prop("value"),
    city:$("#city").prop("value"),
    phone:$("#phone").prop("value"),
    e_mail:$("#e_mail").prop("value"),
    password:$("#password").prop("value"),
    repassword:$("#repassword").prop("value")
    
},
   function(html) {
       if(html=="сохранили"){
            window.location.href="cabinetFull.php";
       }
       else{
       $("#error").html(html);
       }
    });
});

function publication(){
document.getElementById("progress").style.display = "block";
var formData = new FormData($('#publicat_form')[0]);
$.ajax({
      type: "POST",
      processData: false,
      contentType: false,
      url: "php/publication.php",
      data: formData,

      })
      .done(function(data) {
        
       if(data=="сохранили"){
            location.reload()
       }
       else{
        document.getElementById("progress").style.display = "none";
         $("#error").html(data);
       }
      }); 
  }
function avtoriz(){
var formData = new FormData($('#avtoriz')[0]);
$.ajax({
      type: "POST",
      processData: false,
      contentType: false,
      url: "php/avtoriz.php",
      data: formData 
      })
      .done(function(data) {
          if(data=="Авторизовали"){
            window.location.href="cabinetFull.php";
       }
       else{
        $("#error").html(data);
       }          
      });  
  }
  function userred(){
var formData = new FormData($('#userred')[0]);
$.ajax({
      type: "POST",
      processData: false,
      contentType: false,
      url: "php/userred.php",
      data: formData 
      })
      .done(function(data) {
        
       if(data=="сохранили"){
            window.location.href="cabinetFull.php";
       }
       else{
         $("#error").html(data);
       }
      });  
  }

$("#email").on("click",function(){
     $.post("php/email.php",
    {
    mail:$("#mail").prop("value")
    
},
   function(html) {
       if(html=="сохранили"){
           window.location.href="changepassword.php?rep=Код из сообщения отправленного на электронною почту";
       }
       else{
       $("#error").html(html);
       }
    });
});
$("#repasswrd").on("click",function(){
     $.post("php/repassword.php",
    {
    unick:$("#unick").prop("value"),
    password:$("#password").prop("value"),
    repassword:$("#repassword").prop("value")
    
},
   function(html) {
       if(html=="сохранили"){
            window.location.href="auth.php";
       }
       else{
       $("#error").html(html);
       }
    });
});

function redpublication(){
document.getElementById("progress").style.display = "block";
var formData = new FormData($('#publicat_form')[0]);
$.ajax({
      type: "POST",
      processData: false,
      contentType: false,
      url: "php/redpublication.php",
      data: formData 
      })
      .done(function(data) {
        
       if(data=="сохранили"){
            window.location.href="cabinetFull.php";
       }
       else{
        document.getElementById("progress").style.display = "none";
         $("#error").html(data);
       }
      }); 
  }
  function deletepub(){
var formData = new FormData($('#delete')[0]);
$.ajax({
      type: "POST",
      processData: false,
      contentType: false,
      url: "php/destroypub.php",
      data: formData 
      })
      .done(function(data) {
        
       if(data=="удалили"){
            window.location.href="cabinetFull.php";
       }
       else{
         alert(data);
       }
      }); 
  }

$("form.redsec").submit("click",function(){
var formData = new FormData($(this)[0]);
$.ajax({
      type: "POST",
      processData: false,
      contentType: false,
      url: "php/redsec.php",
      data: formData 
      })
      .done(function(data) {
        
       if(data=="сохранили"){
           alert(data);
       }
       else{
        alert(data);
       }
      });  
  });

  function dobsec(){
var formData = new FormData($('#dobsec')[0]);
$.ajax({
      type: "POST",
      processData: false,
      contentType: false,
      url: "php/dobsec.php",
      data: formData 
      })
      .done(function(data) {
        
       if(data=="сохранили"){
           alert(data);
       }
       else{
        alert(data);
       }
      });  
  }

function getCheckedCheckBoxes() {
document.getElementById("progress").style.display = "block";
  var a=$('input:checked'); //выбираем все отмеченные checkbox
  var out=[]; //выходной массив
 
for (var x=0; x<a.length;x++){ //перебераем все объекты
        out.push(a[x].value); //добавляем значения в выходной массив
        }

    $.ajax({
            url: "php/filter.php",
            type: 'post',
            data: {out: out},
            success: function(data)
            {
              document.getElementById("progress").style.display = "none";
              document.getElementById("close").style.display = "none";
              document.getElementById("close_slide").style.display = "none";
              $("#toy").html(data);
            }
    });

}
 function getsearch(){
document.getElementById("progress").style.display = "block";
var formData = new FormData($('.form_find')[0]);
$.ajax({
      type: "POST",
      processData: false,
      contentType: false,
      url: "php/search.php",
      data: formData 
      })
      .done(function(data) {
              document.getElementById("progress").style.display = "none";
              document.getElementById("close").style.display = "none";
              document.getElementById("close_slide").style.display = "none";
              $("#toy").html(data);
      });  
  }


  $(".buttonstatus").on("click",function(){
var isstatus= confirm("Отредактировать статус статьи?");
if(isstatus==true){
document.getElementById("progress").style.display = "block";
$.post("php/pub_g.php",
    {
        vle:$(this).attr("vle"),
        value:$(this).prop("value")
    },
   function(data) {
       window.location.reload();
      });
}
else{}
  });

$("form.upload_form").change(function(ev){
document.getElementById("progress").style.display = "block";
 var formData = new FormData($(this)[0]);
 $.ajax({
      type: "POST",
      processData: false,
      contentType: false,
      url: "php/obnov_file.php",
      data: formData 
      })
      .done(function(data) {
       window.location.reload();
      }); 
});


$(document).ready(function() {

    $(".main_input_file").change(function() {

      var f_name = [];

      for (var i = 0; i < $(this).get(0).files.length; ++i) {

        f_name.push(" " + $(this).get(0).files[i].name);

      }

      $("#f_name").val(f_name.join(", "));
    });

  });
