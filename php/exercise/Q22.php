<?php 
        session_start();//登录系统开启一个session内容
        $error = 0;
        //验证码是否正确
		if(strcasecmp($_POST['authcode'],$_SESSION['authcode']))
		{
			?>
			<script type="text/javascript">
				alert('authcode error！');
				window.location.href="../../exercises.php";
			</script>
			<?php 
			$error=1;
		}
        if((strpos($_REQUEST["flag22"],'/')!==false) or (strpos($_REQUEST["flag22"],'*')!==false) or (strpos($_REQUEST["flag22"],'$')!==false) or (strpos($_REQUEST["flag22"],'!')!==false) or (strpos($_REQUEST["flag22"],'^')!==false) or (strpos($_REQUEST["flag22"],'@')!==false) or (strpos($_REQUEST["flag22"],'#')!==false) or (strpos($_REQUEST["flag22"],'%')!==false) or (strpos($_REQUEST["flag22"],'(')!==false) or (strpos($_REQUEST["flag22"],'<')!==false) or (strpos($_REQUEST["flag22"],'>')!==false) or (strpos($_REQUEST["flag22"],'?')!==false) or (strpos($_REQUEST["flag22"],'\\')!==false) or (strpos($_REQUEST["flag22"],'+')!==false) or (strpos($_REQUEST["flag22"],'-')!==false) or (strpos($_REQUEST["flag22"],'=')!==false) or (strpos($_REQUEST["flag22"],'&')!==false) or (strpos($_REQUEST["flag22"],';')!==false) or (strpos($_REQUEST["flag22"],':')!==false) or (strpos($_REQUEST["flag22"],'"')!==false) or (strpos($_REQUEST["flag22"],'\'')!==false) or (strpos($_REQUEST["flag22"],'|')!==false) or (strpos($_REQUEST["flag22"],'[')!==false) or (strpos($_REQUEST["flag22"],']')!==false) or (strpos($_REQUEST["flag22"],'~')!==false) or (strpos($_REQUEST["flag22"],'`')!==false) or (strpos($_REQUEST["flag22"],'.')!==false))
		{
			?>
			<script type="text/javascript">
				alert("Flag fotmat error! Please try again.");
				window.location.href="../../exercises.php";
			</script>
			<?php 
          $error=1;
		}
        if($error==0)
        {
            $qid22=htmlspecialchars(md5($_REQUEST["flag22"]));//获取html中的flag（通过post请求）
            $username=$_SESSION["username"];
            $con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
            if (!$con) 
            {
                die('数据库连接失败'.$mysqli_error());
            }
            mysqli_select_db($con,"ctf_platform_db");
            $result=mysqli_query($con,"select * from achievement where exercise_num =22 and username='{$username}'");//查出对应用户名的信息
            if($result->num_rows)
            {
                echo '<script type="text/javascript">
                alert("You have gotten the flag.");
                window.location.href="../../exercises.php";
                </script>';
                mysqli_close($con);
            }
            else
            {
                mysqli_select_db($con,"ctf_platform_db");//use information数据库；
                $result=mysqli_query($con,"select flag from exercise where exercise_num =22");
                while ($row=mysqli_fetch_array($result)) //while循环将$result中的结果找出来
                {
                    $dbflag=$row["flag"];
                }
                if($dbflag==$qid22)
                {
                    $totalscore=mysqli_query($con,"select total_score from user_info where username='$username'");
                    while ($row=mysqli_fetch_array($totalscore)) //while循环将$result中的结果找出来
                    {
                        $dbtotalscore=$row["total_score"];
                    }
                    $exercisetitle=mysqli_query($con,"select exercise_title from exercise where exercise_num=22");
                    while ($row=mysqli_fetch_array($exercisetitle)) 
                    {
                        $dbexercisetitle=$row["exercise_title"];
                    }
                    //print_r($dbtotalscore);
                    $dbnewtotalscore=$dbtotalscore+20;
                    mysqli_query($con,"update user_info set total_score=$dbnewtotalscore where username='$username'") or die("存入数据库失败1".mysqli_error($con)) ;
                    mysqli_query($con,"insert into achievement(exercise_num,exercise_title,username,score,atime) values(22,'$dbexercisetitle','$username',20,now())") or die("存入数据库失败2".mysqli_error($con)) ;
                    ?>
                    <script type="text/javascript">
                        alert("Congratulations,you got the flag!");
                        window.location.href="../../exercises.php";
                        </script>;
                    <?php
                } 
                else
                {
                    ?>
                    <script type="text/javascript">
                        alert("Wrong flag!");
                        window.location.href="../../exercises.php";
                        </script>;
                    <?php
                  mysqli_close($con);
                }
                
            //print_r($dbflag);
            //print_r($qid21);
            }
            mysqli_close($con);//关闭数据库连接，如不关闭，下次连接时会出错
            
        }
?>