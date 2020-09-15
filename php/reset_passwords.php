<?php
	session_start();//登录系统开启一个session内容
	$error=0;
	//用户名格式要求
	if((strpos($_REQUEST["username"],'/')!==false) or (strpos($_REQUEST["username"],'*')!==false) or (strpos($_REQUEST["username"],'$')!==false) or (strpos($_REQUEST["username"],'!')!==false) or (strpos($_REQUEST["username"],'^')!==false) or (strpos($_REQUEST["username"],'@')!==false) or (strpos($_REQUEST["username"],'#')!==false) or (strpos($_REQUEST["username"],'%')!==false) or (strpos($_REQUEST["username"],'(')!==false) or (strpos($_REQUEST["username"],'<')!==false) or (strpos($_REQUEST["username"],'>')!==false) or (strpos($_REQUEST["username"],'?')!==false) or (strpos($_REQUEST["username"],'\\')!==false) or (strpos($_REQUEST["username"],'+')!==false) or (strpos($_REQUEST["username"],'-')!==false) or (strpos($_REQUEST["username"],'=')!==false) or (strpos($_REQUEST["username"],'&')!==false) or (strpos($_REQUEST["username"],'{')!==false) or (strpos($_REQUEST["username"],'}')!==false) or (strpos($_REQUEST["username"],';')!==false) or (strpos($_REQUEST["username"],':')!==false) or (strpos($_REQUEST["username"],'"')!==false) or (strpos($_REQUEST["username"],'\'')!==false) or (strpos($_REQUEST["username"],'|')!==false) or (strpos($_REQUEST["username"],'[')!==false) or (strpos($_REQUEST["username"],']')!==false) or (strpos($_REQUEST["username"],'~')!==false) or (strpos($_REQUEST["username"],'`')!==false) or (strpos($_REQUEST["username"],'.')!==false))
	{
		?>
		<script type="text/javascript">
			alert("Username fotmat error! Please try again.");
			window.location.href="../reset_passwords.html";
		</script>
		<?php 
		$error=1;
	}
	if((strlen($_REQUEST["username"])<5) or (strlen($_REQUEST["username"])>20) )
	{
		?>
		<script type="text/javascript">
			alert("The length of username must be limited to a range between 5 and 20! Please try again.");
			window.location.href="../reset_passwords.html";
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
			window.location.href="../reset_passwords.html";
		</script>
		<?php 
		$error=1;
	}
	if(preg_match('/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/',$_REQUEST["email"])==false)
	{
		?>
		<script type="text/javascript">
			alert("Email address fotmat error! Please try again.");
			window.location.href="../reset_passwords.html";
		</script>
		<?php 
		$error=1;
	}
	//password格式要求
	if((strlen($_REQUEST["newpassword"])<5) or (strlen($_REQUEST["newpassword"])>20) )
	{
		?>
		<script type="text/javascript">
			alert("The length of password must be limited to a range between 5 and 20! Please try again.");
			window.location.href="../reset_passwords.html";
		</script>
		<?php 
		$error=1;
	}
	if((strpos($_REQUEST["newpassword"],'/')!==false) or (strpos($_REQUEST["newpassword"],'*')!==false) or (strpos($_REQUEST["newpassword"],'$')!==false) or (strpos($_REQUEST["newpassword"],'!')!==false) or (strpos($_REQUEST["newpassword"],'^')!==false) or (strpos($_REQUEST["newpassword"],'@')!==false) or (strpos($_REQUEST["newpassword"],'#')!==false) or (strpos($_REQUEST["newpassword"],'%')!==false) or (strpos($_REQUEST["newpassword"],'(')!==false) or (strpos($_REQUEST["newpassword"],'<')!==false) or (strpos($_REQUEST["newpassword"],'>')!==false) or (strpos($_REQUEST["newpassword"],'?')!==false) or (strpos($_REQUEST["newpassword"],'\\')!==false) or (strpos($_REQUEST["newpassword"],'+')!==false) or (strpos($_REQUEST["newpassword"],'-')!==false) or (strpos($_REQUEST["newpassword"],'=')!==false) or (strpos($_REQUEST["newpassword"],'&')!==false) or (strpos($_REQUEST["newpassword"],'{')!==false) or (strpos($_REQUEST["newpassword"],'}')!==false) or (strpos($_REQUEST["newpassword"],';')!==false) or (strpos($_REQUEST["newpassword"],':')!==false) or (strpos($_REQUEST["newpassword"],'"')!==false) or (strpos($_REQUEST["newpassword"],'\'')!==false) or (strpos($_REQUEST["newpassword"],'|')!==false) or (strpos($_REQUEST["newpassword"],'[')!==false) or (strpos($_REQUEST["newpassword"],']')!==false) or (strpos($_REQUEST["newpassword"],'~')!==false) or (strpos($_REQUEST["newpassword"],'`')!==false) or (strpos($_REQUEST["newpassword"],'.')!==false))
	{
		?>
		<script type="text/javascript">
			alert("Password fotmat error! Please try again.");
			window.location.href="../reset_passwords.html";
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
	if($error==0)
	{
		$username=htmlspecialchars($_REQUEST["username"]);//获取html中的用户名（通过post请求）
		$email=htmlspecialchars($_REQUEST["email"]);//获取html中的email（通过post请求）
		$newpassword =htmlspecialchars(md5($_REQUEST ["newpassword"]));//获取html中的newpassword（通过post请求）
		
		$con = mysqli_connect ( "localhost", "leeyuxun", "274a5bedc3d9a559","ctf_platform_db");
		if (! $con) {
			die ( '数据库连接失败' . $mysqli_error () );
		}
		mysqli_select_db ($con, "ctf_platform_db");//use ctf_platform_db数据库；
		$dbusername = null;
		$dbemail = null;
		$result = mysqli_query ($con, "select * from user_info where username ='{$username}'");//查出对应用户名的信息
		while ( $row = mysqli_fetch_array ( $result ) ) {//while循环将$result中的结果找出来
			$dbusername = $row ["username"];
			$dbemail = $row ["email"];
		}
		if (is_null ( $dbusername )) {
			?>
		<script type="text/javascript">
			alert("This username dose not exist!!! Pleaes try again.");
			window.location.href="../reset_passwords.html";
		</script>	
		<?php
		}
		if ($email != $dbemail) {
			?>
		<script type="text/javascript">
			alert("This email adress error!!!Please try again.");
			window.location.href="../reset_passwords.html";
		</script>
		<?php
		}
		mysqli_query ($con, "update  user_info set password='{$newpassword}' where username='{$username}'" ) or die ( "存入数据库失败" . mysqli_error () );//如果上述用户名邮箱判定不错，则update进数据库中
		mysqli_close ( $con );
		?>
		<script type="text/javascript">
			alert("Reset password successfully!!!");
			window.location.href="../login.html";
		</script>
		<?php
	}
?>