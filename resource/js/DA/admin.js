$(function(){
  $("#loginForm").submit(function (event){
    event.preventDefault();
    $("#id_alert").addClass("hidden");
    $("pw_alert").addClass("hidden");
    if($("#loginForm").find('input[name=user_id]').val() == ""){
      $("#id_alert").removeClass("hidden");
      return ;
    }
    if($("#loginForm").find('input[name=user_pw]').val() == ""){
      $("#pw_alert").removeClass("hidden");
      return ;
    }
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
