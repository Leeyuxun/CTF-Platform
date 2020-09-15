<?php session_start();
	if(!@$_SESSION["username"])
	{
		echo '<script>window.location="login.html"</script>'; 
		die();
	}
	else
	{
		$username=$_SESSION["username"];
		$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
		if (!$con) 
		{
			die('数据库连接失败'.$mysqli_error());
		}
		mysqli_select_db($con,"ctf_platform_db");//use ctf_platform_db数据库；
		$result=mysqli_query($con,"select * from user_info where username ='$username'");//查出对应用户名的信息
		while ($row=mysqli_fetch_array($result)) //while循环将$result中的结果找出来
		{
			$email=$row["email"];
			$score=$row["total_score"];
		}
		mysqli_close($con);
	}
	

?>


<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>USER INFORMATION</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    
    <link href="user_information_files/css.css" rel="stylesheet" type="text/css">
    <link href="user_information_files/font-awesome.css" rel="stylesheet">
    <link href="user_information_files/bootstrap.css" rel="stylesheet">
    <link href="user_information_files/templatemo-style.css" rel="stylesheet">
	<link rel="stylesheet" href="user_information_files/normalize.css">
	<link rel="stylesheet" href="user_information_files/style.css">
	<link rel="stylesheet" href="user_information_files/color.css">
	
	<link href="user_information_files/bootstrap_002.css" rel="stylesheet">
    <link href="user_information_files/material-dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="user_information_files/materialicon.css">
    <link rel="stylesheet" type="text/css" href="user_information_files/roboto.css">
    <link rel="stylesheet" href="user_information_files/font-awesome_002.css">
    <link href="user_information_files/jquery.css" rel="stylesheet">
	<link href="user_information_files/icon.css" rel="stylesheet">
	
	<script type="text/javascript">
        function load()
        {
			window.setInterval('showRealTime(clock)',1000);
		}
	</script>

  </head>
	
  <body onload="load()" style="height:100%; width=100%">
	<section id="slider">
		<div class="single-slider">
			<div id="particles-js">
				</div>
			<div class="col-md-12">
				<div class="templatemo-flex-row black-bg">
    				<!--Left column-->
					<div class="sidebar-wrapper">
						<div class="templatemo-sidebar">
							<!--title-->
							<header class="templatemo-site-header">
								<h1 style="font-family: 'Comic Sans MS', cursive; color:#07E7FC;font-size: '35px'"><em class="fa fa-flag-checkered fa-fw"></em>LEECTF</h1>
							</header>	
							<!--menu-->			
							<nav class="templatemo-left-nav">
								<ul>
									<li><a style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:24px;width: 500px;" href="#"><em class="fa fa-user fa-fw"></em>user information</a></li>
									<li><a href="exercises.php" style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:24px;width: 500px;"><i class="fa fa-book fa-fw"></i>exercises</a></li>
									<li><a href="ranking_list.php" style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:24px;width: 500px;"><i class="fa fa-list fa-fw"></i>ranking list</a></li>
									<li><a href="php/sign_out.php" style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:24px;width: 500px;"><em class="fa fa-power-off fa-fw"></em>sign out</a></li>
									<li><a href="php/time.php" style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:24px;width: 500px;">
										<div id="clock"></div>
										<script type="text/javascript" onload="load()">
											function showRealTime(clock){
												var d = new Date();
												var year = d.getFullYear();
												var month = d.getMonth() + 1;
												var date = d.getDate();
												var day = d.getDay();
												var hour = (d.getHours() < 10) ? ("0" + d.getHours()) : d.getHours();
												var min = (d.getMinutes() < 10) ? ("0" + d.getMinutes()) : d.getMinutes();
												var sec = (d.getSeconds() < 10) ? ("0" + d.getSeconds()) : d.getSeconds();
												clock.innerHTML = year + "-" + month + "-" + date + " " + hour + ":" + min + ":" + sec;
											}
										</script>
									</a></li>  
								</ul>
							</nav>
						</div>
					</div>
					<!--right column-->
					<!--information-->
					<div class="sidebar-wrapper">
						<!--basic information--->
						<div class="templatemo-sidebar">
							<div style="display:inline;">
								<h1 style="font-size: 30pt;color: #00e8ff;font-family: 'Comic Sans MS', cursive;font-weight: 600;">#LEECTF was set up on October 6th,2018.</h1>
								<div class="col-md-6">
									<div class="card">
										<div class="card-header">
											<h4 class="title">basic information</h4>
										</div>
										<div >
											<div class="row form-group">
												<div class="col-lg-6 col-md-6 form-group">
													<table style="margin-top：5px; margin-bottom:5px; width: 350px;height: 330px;">
														<!--Name-->
															<tr><td style="color:white"><em class="fa fa-user fa-fw"></em>Name</td><tr><br>
															<tr class="form-control highlight" style=" background-color:#03EEFC">
															<?php
																echo "<td>".$username."</td>";
															?>
															</tr>
														<!--email-->
																<tr><td style="color:white"><em class="fa fa-envelope fa-fw"></em>Email</td><tr><br>
															<tr class="form-control highlight" style=" background-color:#03EEFC">
															<?php

																echo "<td>".$email."</td>";
															?>
															</tr>
														<!--score-->
																<tr><td style="color:white"><em class="fa fa-spinner fa-fw"></em>Score</td><tr><br>
															<tr class="form-control highlight" style=" background-color:#03EEFC">
															<?php

																echo "<td>".$score."</td>";
															?>
															</tr>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--achievements--->
					<div class="main-panel">
					<div style="overflow:-Scroll;overflow-x:hidden">
						<div class="col-md-5">
							<div class="card">
								<div class="card-header">
									<h4 class="title">problem solving status</h4>
								</div>
								<div>
										<table id="personranktable" class="table">
											<tbody>
											<?PHP
												$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
												if (!$con) 
												{
													die('数据库连接失败'.$mysqli_error());
												}
												mysqli_select_db($con,"ctf_platform_db");
												$sqli="SELECT * FROM achievement order by id desc";
												$result=mysqli_query($con, $sqli);
													$id=1;
													while($row = mysqli_fetch_array($result))
													{  
														echo "<tr><td style='text-align: left; font-size:20px'>";
														echo "<em style='color:#EEEEEE;font-size:20px'>".$id."</em>";
														echo ".At ";
														echo "<em style='color:#EEEEEE;font-size:20px'>".$row["atime"]."</em>";
														echo " user ";
														echo "<b style='color:#ff2a00;font-size:20px'>".$row['username']."</b>";
														echo " submitted the flag of ";
														echo "<em style='color:#00ff00;font-size:20px'>".$row["exercise_title"]."</em>";
														echo " and got ";
														echo "<em style='color:#ffff00;font-size:20px'>".$row["score"]."</em>";
														echo " score.</td></tr>";
														$id++;
													}
												mysqli_close($con);
											?>
											</tbody>
										</table>
								</div>
							</div>
						</div>
					</div>
					<div style="overflow:-Scroll;overflow-x:hidden">
						<div class="col-md-5">
							<div class="card">
								<div class="card-header">
									<h4 class="title">achievement</h4>
								</div>
								<div>
										<table id="personranktable" class="table">
											<thead class="text-primary">
												<tr>
													<th>exercise</th>
													<th>score</th>  
													<th>time</th>
												</tr>
											</thead>
											<tbody>
											<?PHP
												$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
												if (!$con) 
												{
													die('数据库连接失败'.$mysqli_error());
												}
												mysqli_select_db($con,"ctf_platform_db");
												$sqli="SELECT exercise_title,score,atime FROM achievement where username='$username'";

												$retval=mysqli_query($con, $sqli);
												if(mysqli_num_rows($retval) > 0)
												{ 
													while($row = mysqli_fetch_assoc($retval))
													{  
														echo "<tr>";
														echo "<td style='color:#00ff00'>".$row['exercise_title']."</td>";
														echo "<td style='color:#ffff00'>".$row["score"]."</td>";
														echo "<td style='color:#eeeeee'>".$row["atime"]."</td>";
														echo "</tr>";
													}
													echo "<tr>
															<td colspan='3' style='font-size:25px;font-weight:700'>Well done. Contragulations!</td>
														</tr>";
												}
												else
												{
													echo "<tr>";
													echo "<td style='font-size:25px;font-weight:700'>NULL</td>";
													echo "<td style='font-size:25px;font-weight:700'>NULL</td>";
													echo "<td style='font-size:25px;font-weight:700'>NULL</td>";
													echo "</tr>";
													echo "<tr>";
													echo "<td colspan='3' style='font-size:40px;font-weight:600'>You are so lazy that you haven't gotten one flag!</td>";
													echo "</tr>";
												}
												
												mysqli_close($con);
											?>
											
											</tbody>
										</table>
								</div>
							</div>
						</div>
					</div>
               </div>
			</div>		
	  	</div>
	</section>
	  
	  
	  
	  
    <!-- JS -->
    <script type="text/javascript" src="user_information_files/jquery-1.js"></script>
    <script type="text/javascript" src="user_information_files/bootstrap-filestyle.js"></script>
	<script type="text/javascript" src="user_information_files/templatemo-script.js"></script>
	 
	<!--js设置背景-->
	<script src="user_information_files/particles.js"></script>
	<script src="user_information_files/particle-code.js"></script>


</body></html>