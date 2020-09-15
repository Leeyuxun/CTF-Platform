<?php 
		session_start();//登录系统开启一个session内容
		//用户名格式要求
		$error=0;
		if((strpos($_REQUEST["username"],'/')!==false) or (strpos($_REQUEST["username"],'*')!==false) or (strpos($_REQUEST["username"],'$')!==false) or (strpos($_REQUEST["username"],'!')!==false) or (strpos($_REQUEST["username"],'^')!==false) or (strpos($_REQUEST["username"],'@')!==false) or (strpos($_REQUEST["username"],'#')!==false) or (strpos($_REQUEST["username"],'%')!==false) or (strpos($_REQUEST["username"],'(')!==false) or (strpos($_REQUEST["username"],'<')!==false) or (strpos($_REQUEST["username"],'>')!==false) or (strpos($_REQUEST["username"],'?')!==false) or (strpos($_REQUEST["username"],'\\')!==false) or (strpos($_REQUEST["username"],'+')!==false) or (strpos($_REQUEST["username"],'-')!==false) or (strpos($_REQUEST["username"],'=')!==false) or (strpos($_REQUEST["username"],'&')!==false) or (strpos($_REQUEST["username"],'{')!==false) or (strpos($_REQUEST["username"],'}')!==false) or (strpos($_REQUEST["username"],';')!==false) or (strpos($_REQUEST["username"],':')!==false) or (strpos($_REQUEST["username"],'"')!==false) or (strpos($_REQUEST["username"],'\'')!==false) or (strpos($_REQUEST["username"],'|')!==false) or (strpos($_REQUEST["username"],'[')!==false) or (strpos($_REQUEST["username"],']')!==false) or (strpos($_REQUEST["username"],'~')!==false) or (strpos($_REQUEST["username"],'`')!==false) or (strpos($_REQUEST["username"],'.')!==false))
		{
			?>
			<script type="text/javascript">
				alert("Username fotmat error! Please try again.");
				window.location.href="../sign_up.html";
			</script>
			<?php 
			$error=1;
		}
		if((strlen($_REQUEST["username"])<5) or (strlen($_REQUEST["username"])>20) )
		{
			?>
			<script type="text/javascript">
				alert("The length of username must be limited to a range between 5 and 20! Please try again.");
				window.location.href="../sign_up.html";
			</script>
			<?php 
			$error=1;
		}
		//邮箱格式要求
		if((strpos($_REQUEST["email"],'/')!==false) or (strpos($_REQUEST["email"],'*')!==false) or (strpos($_REQUEST["email"],'$')!==false) or (strpos($_REQUEST["email"],'!')!==false) or (strpos($_REQUEST["email"],'^')!==false) or (strpos($_REQUEST["email"],'#')!==false) or (strpos($_REQUEST["email"],'%')!==false) or (strpos($_REQUEST["email"],'(')!==false) or (strpos($_REQUEST["email"],'<')!==false) or (strpos($_REQUEST["email"],'>')!==false) or (strpos($_REQUEST["email"],'?')!==false) or (strpos($_REQUEST["email"],'\\')!==false) or (strpos($_REQUEST["email"],'+')!==false) or (strpos($_REQUEST["email"],'-')!==false) or (strpos($_REQUEST["email"],'=')!==false) or (strpos($_REQUEST["email"],'&')!==false) or (strpos($_REQUEST["email"],'{')!==false) or (strpos($_REQUEST["email"],'}')!==false) or (strpos($_REQUEST["email"],';')!==false) or (strpos($_REQUEST["email"],':')!==false) or (strpos($_REQUEST["email"],'"')!==false) or (strpos($_REQUEST["email"],'\'')!==false) or (strpos($_REQUEST["email"],'|')!==false) or (strpos($_REQUEST["email"],'[')!==false) or (strpos($_REQUEST["email"],']')!==false) or (strpos($_REQUEST["email"],'~')!==false) or (strpos($_REQUEST["email"],'`')!==false))
		{
			?>
			<script type="text/javascript">
				alert("Email address fotmat error! Please try again.");
				window.location.href="../sign_up.html";
			</script>
			<?php 
			$error=1;
		}
		if(preg_match('/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/',$_REQUEST["email"])==false)
		{
			?>
			<script type="text/javascript">
				alert("Email address fotmat error! Please try again.");
				window.location.href="../sign_up.html";
			</script>
			<?php 
			$error=1;
		}
		//password格式要求
		if((strlen($_REQUEST["password"])<5) or (strlen($_REQUEST["password"])>20) )
		{
			?>
			<script type="text/javascript">
				alert("The length of password must be limited to a range between 5 and 20! Please try again.");
				window.location.href="../sign_up.html";
			</script>
			<?php 
			$error=1;
		}
		if((strpos($_REQUEST["password"],'/')!==false) or (strpos($_REQUEST["password"],'*')!==false) or (strpos($_REQUEST["password"],'$')!==false) or (strpos($_REQUEST["password"],'!')!==false) or (strpos($_REQUEST["password"],'^')!==false) or (strpos($_REQUEST["password"],'@')!==false) or (strpos($_REQUEST["password"],'#')!==false) or (strpos($_REQUEST["password"],'%')!==false) or (strpos($_REQUEST["password"],'(')!==false) or (strpos($_REQUEST["password"],'<')!==false) or (strpos($_REQUEST["password"],'>')!==false) or (strpos($_REQUEST["password"],'?')!==false) or (strpos($_REQUEST["password"],'\\')!==false) or (strpos($_REQUEST["password"],'+')!==false) or (strpos($_REQUEST["password"],'-')!==false) or (strpos($_REQUEST["password"],'=')!==false) or (strpos($_REQUEST["password"],'&')!==false) or (strpos($_REQUEST["password"],'{')!==false) or (strpos($_REQUEST["password"],'}')!==false) or (strpos($_REQUEST["password"],';')!==false) or (strpos($_REQUEST["password"],':')!==false) or (strpos($_REQUEST["password"],'"')!==false) or (strpos($_REQUEST["password"],'\'')!==false) or (strpos($_REQUEST["password"],'|')!==false) or (strpos($_REQUEST["password"],'[')!==false) or (strpos($_REQUEST["password"],']')!==false) or (strpos($_REQUEST["password"],'~')!==false) or (strpos($_REQUEST["password"],'`')!==false) or (strpos($_REQUEST["password"],'.')!==false))
		{
			?>
			<script type="text/javascript">
				alert("Password fotmat error! Please try again.");
				window.location.href="../sign_up.html";
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
		
		//全部符合要求后
		if($error==0)
		{
			$username=htmlspecialchars($_REQUEST["username"]);//获取html中的用户名（通过post请求）
			$email=htmlspecialchars($_REQUEST["email"]);//获取html中的email（通过post请求）
			$password=md5(htmlspecialchars($_REQUEST["password"]));//获取html中的密码（通过post请求）
	
			$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
			if (!$con) 
			{
				die('数据库连接失败'.$mysqli_error());
			}
			mysqli_select_db($con,"ctf_platform_db");//use ctf_platform_db数据库；
			$dbusername=null;
			$dbemail=null;
			$result1=mysqli_query($con,"select * from user_info where username ='{$username}'");//查出对应用户名的信息
			while ($row=mysqli_fetch_array($result1)) 
			{//while循环将$result中的结果找出来
				$dbusername=$row["username"];
			}
			if(!is_null($dbusername))
			{
				?>
					<script type="text/javascript">
						alert("This username already exists.");
						window.location.href="../sign_up.html";
					</script>	
				<?php
              mysqli_close($con);
			}
			$result2=mysqli_query($con,"select * from user_info where email ='{$email}'");//查出对应用户名的信息
			while ($row=mysqli_fetch_array($result2)) 
			{//while循环将$result中的结果找出来
				$dbemail=$row["email"];
			}
			if(!is_null($dbemail))
			{
				?>
					<script type="text/javascript">
						alert("This email adress is already in use.");
						window.location.href="../sign_up.html";
					</script>	
				<?php 
              mysqli_close($con);
			}
			mysqli_query($con,"insert into user_info(username,email,password,total_score) values('$username','$email','$password',0)") or die("存入数据库失败".mysqli_error($con)) ;
			mysqli_close($con);
			?>
			<script type="text/javascript">
				alert("Registered successfully!!!");
				window.location.href="../login.html";
			</script>
			<?php
		}
?>
	