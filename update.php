<?php
    include "./db_con.php";
    include "./config.php";

    $sql = dbConnect("SELECT * FROM board WHERE idx = '".$_GET['idx']."' ");
    $board = $sql->fetch_array();
    $bno = $_GET['idx'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" initial-sacle="1">
    <title>PHP 웹 사이트</title>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
          <?php if(!$userid) { ?>
              <ul class="nav navbar-navbar-right">
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                          aria-haspopup="true" aria-expanded="false">접속하기<span class="caret"></span></a>
                      <ul class="dropdwon-menu">
                          <li class="active"><a href="login.php">로그인</a></li>
                          <li><a href="join.php">회원가입</a></li>
                      </ul>
                  </li>
              </ul>
          <?php } else {
            $logged = $username."(".$userid.")";
            ?>
              <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                         aria-haspopup="true" aria-expanded="false"><b><?=$logged ?></b>님의 회원관리<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="logout.php">로그아웃</a></li>
                      </ul>
                  </li>
              </ul>
          <?php } ?>
        </div>
    </nav>
    <div class="container">
        <div id="board_write">
            <form action="update_ok.php/<?php echo $board['idx']; ?>" method="post">
                <input type="hidden" name="idx" value="<?=$bno?>">
                <table class="table table-striped" style="text-align: center; border: 1px solid #ddddda;">
                    <thead>
                        <tr>
                            <td colspan="2" style="background-color: #eeeeee; text-align: center;">
                                <h3>게시판 수정하기</h3>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <span class="pull-left">&nbsp;&nbsp;&nbsp;아이디 : <b><?=$userid?></b></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" placeholder="글 제목" name="title" id="utitle" value="<?=$board['title']?>" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" class="form-control" placeholder="글 비밀번호" name="pw" id="upw" style="width: 150px;"   >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <textarea class="form-control" placeholder="글 내용" name="content" id="ucontent" style="height: 350px;" required>
                                    <?=$board['content']?>
                                </textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">글쓰기</button>
                <button type="button" class="btn btn-primary" onclick="location.href='list.php'">돌아가기</button>
            </form>
        </div>
    </div>
</body>
</html>
