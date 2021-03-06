<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index,follow">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="email=no">
    <meta name="format-detection" content="adress=no">
    <title>主页 - 午安网 - 过你想过的生活</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/wuan.css">
</head>
<body>
<!-- file="head.html"-->
<!-- head start-->
<div class="nav navbar navbar-fixed-top navbar-head-color navbar-head">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-brand navbar-header">
                    <a class="" href="index.php">午安网</a>
                </div>
                <div class="pull-left hidden-sm hidden-xs">
                    <ul class="list-inline">
                        <li><a href="index.php">发现</a></li>
                        <li><a href="myGroup.php">我的星球</a></li>
                        <li><a href="groups.php">全部星球</a></li>
                    </ul>
                </div>
                <div class=" pull-right">
                    <ul class="list-inline">
                        <li><a href="login.php">登录</a></li>
                        <li><a href="reg.php">注册</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- head end-->
<!-- framework-->
<!-- content-->
<div class="framework-content">
    <div class="container text-center">
        <div class="text-center form-logo">
        </div>
        <form class="form-signin" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <label for="userName" class="sr-only">userName</label>
            <input type="text" id="userName" class="form-control" placeholder="用户名" required="" autofocus="" name="name">
            <label for="petName" class="sr-only">petName</label>
            <input type="text" id="petName" class="form-control" placeholder="昵&#12288;称" required="" autofocus="" name="nickName">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="密&#12288;码" required="" name="password">
            <label for="userEmail" class="sr-only">Email</label>
            <input type="email" id="userEmail" class="form-control" placeholder="邮&#12288;箱" required="" name="Email">
            <button class="btn btn-primary btn-block" type="submit" >注册</button>
        </form>

    </div>
</div>

<?php
if(!empty($_POST)) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $nickName = $_POST['nickName'];
    $Email = $_POST['Email'];
    if (preg_match("/^[a-zA-Z0-9]{1,16}$/", $name)) {
        if (preg_match('/^[0-9a-zA-Z\x{4e00}-\x{9fa5}]{1,16}+$/u', $nickName)) {
            if (preg_match('/^[\s|\S]{6,18}$/u', $password)) {


                $db_host = "localhost";
                $db_user = "root";
                $db_pass = "root";
                $db_data = "wuan";
                $conn = mysql_connect($db_host, $db_user, $db_pass);
                if ($conn) {
                    //echo "连接成功";
                } else {
                    echo "连接失败";
                }
                if (mysql_select_db($db_data)) {
                    //echo "选择数据库成功";
                } else {
                    echo "选择数据库失败";
                }


                if (!get_magic_quotes_gpc()) {
                    $name = addslashes($name);
                    $password = addslashes($password);
                    $nickName = addslashes($nickName);
                    $Email = addslashes($Email);
                }

                $password = md5($password);
                mysql_query("set names 'utf8'");
                $sql = "INSERT INTO user_base (name,password,nickName,Email) VALUE ('$name','$password','$nickName','$Email')";
                $retval = mysql_query($sql, $conn);
                $sql2="SELECT ID FROM user_base WHERE name='$name'";
                $arr=mysql_query($sql2,$conn);
                if ($retval) {
                    $nickName = urlencode($nickName);
                    $userID = $arr['ID'];
                    /*      //  --session方法
                            session_start();
                            $_SESSION['nickName']=$nickName;
                            if(isset($_SESSION['userurl'])){
                                $url=$_SESSION['userurl'];
                            }else{
                                $url="index.php";
                            }
                            echo "<script>alert ('注册成功!');</script>";
                            echo "<script>window.location.href=\"$url\"</script>";*/

//       -- cookie方法
                    setcookie('nickName', $nickName, time() + 3600 * 24 * 7 * 2);
                    setcookie('userID', $userID, time() + 3600 * 24 * 7 * 2);

                    if (isset($_COOKIE['userurl'])) {
                        if (isset($_COOKIE['loginurl'])) {
                            $url = "index.php";
                        } else {
                            $url = $_COOKIE['userurl'];
                        }

                    } else {
                        $url = "index.php";
                    }
//        echo "<script>alert('注册成功！');</script>";
                    echo "<script>window.location.href=\"$url\"</script>";

                } else {
                    echo "<script>alert('用户名已占用！');</script>";
//        echo "<script>window.location.href='reg.php'</script>";
                }


            } else {
                echo "<script>alert('密码长度为6-18位！');</script>";
            }
        } else {
            echo "<script>alert('昵称只能为中文、英文、数字，不得超过16位！');</script>";
        }
    } else {
        echo "<script>alert('用户名只能为数字和字母，不得超过16位！');</script>";
    }
}

?>
<script src="js/jquery-1.11.3.min.js"></script>
</body>
</html>
