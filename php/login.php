<?php 
		session_start();//登录系统开启一个session内容
		//用户名格式要求
		$error=0;
		if((strpos($_REQUEST["username"],'/')!==false) or (strpos($_REQUEST["username"],'*')!==false) or (strpos($_REQUEST["username"],'$')!==false) or (strpos($_REQUEST["username"],'!')!==false) or (strpos($_REQUEST["username"],'^')!==false) or (strpos($_REQUEST["username"],'@')!==false) or (strpos($_REQUEST["username"],'#')!==false) or (strpos($_REQUEST["username"],'%')!==false) or (strpos($_REQUEST["username"],'(')!==false) or (strpos($_REQUEST["username"],'<')!==false) or (strpos($_REQUEST["username"],'>')!==false) or (strpos($_REQUEST["username"],'?')!==false) or (strpos($_REQUEST["username"],'\\')!==false) or (strpos($_REQUEST["username"],'+')!==false) or (strpos($_REQUEST["username"],'-')!==false) or (strpos($_REQUEST["username"],'=')!==false) or (strpos($_REQUEST["username"],'&')!==false) or (strpos($_REQUEST["username"],'{')!==false) or (strpos($_REQUEST["username"],'}')!==false) or (strpos($_REQUEST["username"],';')!==false) or (strpos($_REQUEST["username"],':')!==false) or (strpos($_REQUEST["username"],'"')!==false) or (strpos($_REQUEST["username"],'\'')!==false) or (strpos($_REQUEST["username"],'|')!==false) or (strpos($_REQUEST["username"],'[')!==false) or (strpos($_REQUEST["username"],']')!==false) or (strpos($_REQUEST["username"],'~')!==false) or (strpos($_REQUEST["username"],'`')!==false) or (strpos($_REQUEST["username"],'.')!==false))
		{
			?>
			<script type="text/javascript">
				alert("Username fotmat error! Please try again.");
				window.location.href="../login.html";
			</script>
			<?php 
			$error=1;
		}
		else if((strlen($_REQUEST["username"])<5) or (strlen($_REQUEST["username"])>20) )
		{
			?>
			<script type="text/javascript">
				alert("The length of username must be limited to a range between 5 and 20! Please try again.");
				window.location.href="../login.html";
			</script>
			<?php 
			$error=1;
		}
		//password格式要求
		else if((strlen($_REQUEST["password"])<5) or (strlen($_REQUEST["password"])>20) )
		{
			?>
			<script type="text/javascript">
				alert("The length of password must be limited to a range between 5 and 20! Please try again.");
				window.location.href="../login.html";
			</script>
			<?php 
			$error=1;
		}
		//密码是否正确
		if((strpos($_REQUEST["password"],'/')!==false) or (strpos($_REQUEST["password"],'*')!==false) or (strpos($_REQUEST["password"],'$')!==false) or (strpos($_REQUEST["password"],'!')!==false) or (strpos($_REQUEST["password"],'^')!==false) or (strpos($_REQUEST["password"],'@')!==false) or (strpos($_REQUEST["password"],'#')!==false) or (strpos($_REQUEST["password"],'%')!==false) or (strpos($_REQUEST["password"],'(')!==false) or (strpos($_REQUEST["password"],'<')!==false) or (strpos($_REQUEST["password"],'>')!==false) or (strpos($_REQUEST["password"],'?')!==false) or (strpos($_REQUEST["password"],'\\')!==false) or (strpos($_REQUEST["password"],'+')!==false) or (strpos($_REQUEST["password"],'-')!==false) or (strpos($_REQUEST["password"],'=')!==false) or (strpos($_REQUEST["password"],'&')!==false) or (strpos($_REQUEST["password"],'{')!==false) or (strpos($_REQUEST["password"],'}')!==false) or (strpos($_REQUEST["password"],';')!==false) or (strpos($_REQUEST["password"],':')!==false) or (strpos($_REQUEST["password"],'"')!==false) or (strpos($_REQUEST["password"],'\'')!==false) or (strpos($_REQUEST["password"],'|')!==false) or (strpos($_REQUEST["password"],'[')!==false) or (strpos($_REQUEST["password"],']')!==false) or (strpos($_REQUEST["password"],'~')!==false) or (strpos($_REQUEST["password"],'`')!==false) or (strpos($_REQUEST["password"],'.')!==false))
		{
			?>
			<script type="text/javascript">
				alert("Password fotmat error! Please try again.");
				window.location.href="../login.html";
			</script>
			<?php 
			$error=1;
		}
		//验证码是否正确
		if(strcasecmp($_POST['authcode'],$_SESSION['authcode']))
		{
			?>
			<script type="text/javascript">
				alert('authcode error！');
				window.location.href="../login.html";
			</script>
			<?php 
			$error=1;
		}
		//符合要求后
		if($error==0)
		{
			$username=htmlspecialchars($_REQUEST["username"]);//获取html中的用户名（通过post请求）
			$password=htmlspecialchars(md5($_REQUEST["password"]));//获取html中的密码（通过post请求）
	 
			$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
			if (!$con) 
			{
				die('数据库连接失败'.$mysqli_error());
			}
			mysqli_select_db($con,"ctf_platform_db");//use ctf_platform_db数据库；
			$dbusername=null;
			$dbpassword=null;
			$result=mysqli_query($con,"select * from user_info where username ='{$username}'");//查出对应用户名的信息
			while ($row=mysqli_fetch_array($result)) //while循环将$result中的结果找出来
			{
				$dbusername=$row["username"];
				$dbpassword=$row["password"];
			}
			if (is_null($dbusername)) //用户名在数据库中不存在时跳回login.html界面
			{
				?>
				<script type="text/javascript">
					alert("This username dose not exist!!! Pleaes try again.");
					window.location.href="../login.html";
				</script>
				<?php 
              mysqli_close($con);
			}
			else 
			{
				if ($dbpassword!=$password)//当对应密码不对时跳回login.html界面
				{
					?>
					<script type="text/javascript">
						alert("Password Error!!! Pleaes try again.");
						window.location.href="../login.html";
					</script>
					<?php 
                  mysqli_close($con);
				}
				else 
				{
					mysqli_query($con,"insert into login_log(username,logintime,login_state) values('$username',now(),1)") or die("存入数据库失败".mysqli_error($con)) ;
					$_SESSION["username"]=$username;
					?>
					<script type="text/javascript">
						window.location.href="../user_information.php";
					</script>
					<?php 
				}
			}
			mysqli_close($con);//关闭数据库连接，如不关闭，下次连接时会出错	
		}

?>