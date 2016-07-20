$(function(){
  $("#loginForm").submit(function (event){
    event.preventDefault();
    $.ajax({
      url: "/DA/login/loginAction",
      dataType: "json",
      type: "POST",
      data: $("#loginForm").serialize()
    }).done(function (result){
      if(result.code == 200){
        alert(result.msg);
        location.reload();
      }else{
        $("#alertMsg").addClass("alert").addClass("alert-danger").html('<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span><span class="sr-only">Error:</span>' + result.msg);
      }
    })
  });
});
