<?php

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width" initial-sacle="1">
  <title>PHP 웹 사이트</title>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    $(function() {
       $("#id").blur(function(){
          if($(this).val() == "") {
              $("#id_check_msg").html("아이디를 입력하세요.").css("color", "red").attr("data-check", "0");
              $(this).focus();
          } else {
              checkIdAjax();
          }
       });

       $("#pass_confirm").blur(function () {
           if($("#pass_confirm").val() != $("#pass").val()) {
               $("#pw_check_msg").html("비밀번호가 일치하지 않습니다.").css("color", "red").attr("data-check", "0");
           } else {
               $("#pw_check_msg").html("비밀번호가 일치합니다.").css("color", "green").attr("data-check", "0");
           }
       })
    });

    function checkIdAjax() {
        $.ajax({
            url : "./checkId.php",
            type : "post",
            dataType : "json",
            data : {
                "id" : $("#id").val()
            },
            success : function (data) {
                if(data.check) {
                    $('#id_check_msg').html("사용 가능한 아이디입니다.").css("color", "green").attr("data-check", "1");
                } else {
                    $('#id_check_msg').html("중복된 아이디입니다.").css("color", "red").attr("data-check", "0");
                    $('#id').focus();
                }
            }
        })
    }

    function check_input() {
        if(!$("#id").val()) {
            alert("아이디를 입력하세요!");
            $("#id").focus();
            return;
        }
        if(!$("#pass").val()) {
            alert("비밀번호를 입력하세요!");
            $("#pass").focus();
            return;
        }
        if(!$("#pass_confirm").val()) {
            alert("비밀번호확인을 입력하세요!");
            $("#pass_confirm").focus();
            return;
        }
        if(!$("#name").val()) {
            alert("이름을 입력하세요!");
            $("#name").focus();
            return;
        }
        if(!$("#phone").val()) {
            alert("전화번호를 입력하세요!");
            $("#phone").focus();
            return;
        }
        if(!$("#email").val()) {
            alert("이메일을 입력하세요!");
            $("#email").focus();
            return;
        }
        if($("#pass").val() != $("#pass_confirm").val()) {
            alert("비밀번호가 일치하지 않습니다. \n다시 입력해 주세요!");
            $("#pass").focus();
            $("#pass").select();
            return;
        }



        document.join.submit();

        /*초기화*/
        document.join.id.value = "";
        document.join.pass.value = "";
        document.join.pass_confirm.value = "";
        document.join.name.value = "";
        document.join.gender.value = "";
        document.join.phone.value = "";
        document.join.email.value = "";
        document.join.id.focus();
        return;
    }

    function reset_form() {
        document.join.id.value = "";
        document.join.pass.value = "";
        document.join.pass_confirm.value = "";
        document.join.name.value = "";
        document.join.gender.value = "";
        document.join.phone.value = "";
        document.join.email.value = "";
        document.join.id.focus();
    }

  </script>
</head>
  <body>
  <nav class="navbar navbar-default">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                  data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="main.php">PHP 게시판 웹 사이트</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
              <li class="active"><a href="main.php">메인</a></li>
              <li><a href="list.php">게시판</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                      aria-haspopup="true" aria-expanded="false">접속하기<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li class="active"><a href="login.php">로그인</a></li>
                      <li><a href="join.php">회원가입</a></li>
                  </ul>
              </li>
          </ul>
      </div>
  </nav>
    <div class="container">
      <div class="col-lg-4"></div>
      <div class="col-lg-4">
        <div class="jumbotron" style="padding-top: 20px;">
          <form name="join" method="post" action="join_ok.php">
            <h3 style="text-align: center">회원가입 화면</h3>
            <div class="col-lg-4"></div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="아이디" name="id" id="id" maxlength="15">
            </div>
            <div class="form-group">
              <span id="id_check_msg" data-check="0"></span>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="비밀번호" name="pass" id="pass" maxlength="20">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="비밀번호 확인" name="pass_confirm" id="pass_confirm" maxlength="20">
            </div>
            <div class="form-group">
                <span id="pw_check_msg" data-check="0"></span>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="이름" name="name" id="name" maxlength="20">
            </div>
            <div class="form-group" style="text-align: center">
              <div class="btn-group" data-toggle="buttons">
                  <label class="btn btn-primary active">
                    <input type="radio" name="gender" id="gender1" autocomplete="off" value="남자" checked>남자</label>
                  </label>
                  <label class="btn btn-primary active">
                      <input type="radio" name="gender" id="gender2" autocomplete="off" value="여자" checked>여자</label>
                  </label>
              </div>
            </div>
            <div class="form-group">
                <input type="tel" class="form-control" placeholder="전화번호" name="phone" id="phone" maxlength="20">
            </div>
            <div class="col-lg-4"></div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="이메일" name="email" id="email" maxlength="80">
            </div>
            <span class="btn btn-primary form-control" onclick="check_input()">회원가입</span>&nbsp;
            <span class="btn btn-primary form-control" onclick="reset_form()">초기화</span>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>


