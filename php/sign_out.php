<?php
    session_start() ;
    $con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
    if (!$con) 
    {
        die('数据库连接失败'.$mysqli_error());
    }
    $username = @$_SESSION['username'];
    mysqli_select_db($con,"ctf_platform_db");
    mysqli_query($con,"update login_log set logintime = now(),login_state = 0 where username = '$username' && login_state = 1") or die("存入数据库失败".mysqli_error($con)) ;
    
    //清除SESSION值.
    $_SESSION = array(); 
    if(isset($_COOKIE[session_name()])) //判断客户端的cookie文件是否存在,存在的话将其设置为过期.
    { 
        setcookie(session_name(),'',time()-1,'/');
    }
    session_destroy();  //清除服务器的sesion文件

   echo '<script>window.location="../index.php"</script>'; 
?>