$(function(){
  $("#loginForm").find("input").on("keydown", function (event){
    $("#alertMsg").removeClass("alert alert-danger").html('');
  });
  $("#loginForm").find("select").on("change", function (event){
    $("#alertMsg").removeClass("alert alert-danger").html('');
  });
  $("#loginForm").submit(function (event){
    event.preventDefault();
    $.ajax({
      url: "/member/loginAction",
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
