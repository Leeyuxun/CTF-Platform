<?php session_start();
	if(!@$_SESSION["username"])
	{
		echo '<script>window.location="login.html"</script>'; 
		die();
	}
	else
	{
		$username=$_SESSION["username"];
	}
	
?>

<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>EXERCISES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    
	
	<link rel="stylesheet" href="exercises_filess/bootstrap.min.css">
    <link href="exercises_files/css.css" rel="stylesheet" type="text/css">
    <link href="exercises_files/font-awesome.css" rel="stylesheet">
    <link href="exercises_files/bootstrap.css" rel="stylesheet">
    <link href="exercises_files/templatemo-style.css" rel="stylesheet">
	<link rel="stylesheet" href="exercises_files/normalize.css">
	<link rel="stylesheet" href="exercises_files/style.css">
	<link rel="stylesheet" href="exercises_files/color.css">
	
	<link href="exercises_files/bootstrap_002.css" rel="stylesheet">
    <link href="exercises_files/material-dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="exercises_files/materialicon.css">
    <link rel="stylesheet" type="text/css" href="exercises_files/roboto.css">
    <link rel="stylesheet" href="exercises_files/font-awesome_002.css">
    <link href="exercises_files/jquery.css" rel="stylesheet">
	<link href="exercises_files/icon.css" rel="stylesheet">
	
	<script type="text/javascript">
        function load()
        {
			window.setInterval('showRealTime(clock)',1000);
		}
	</script>

  </head>
	
  <body style="overflow:-Scroll;overflow-x:hidden; width: 100%; height: 100%;" height:800px onload="load()">
	<section id="slider">
		<div class="single-slider">
			<div id="particles-js">
			</div>
			<div class="col-md-12">
				<div class="templatemo-flex-row black-bg">
    				<!--Left column-->
					<div class="templatemo-sidebar">
    					<!--title-->
        				<header class="templatemo-site-header">
       		  				<h1 style="font-family: 'Comic Sans MS', cursive; color:#07E7FC;font-size: '35px'"><em class="fa fa-flag-checkered fa-fw"></em>LEECTF</h1>
        				</header>		
			
		    			<!--menu-->			
    	    			<nav class="templatemo-left-nav">
        	  				<ul>
            					<li><a style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:24px;width: 500px;" href="user_information.php"><em class="fa fa-user fa-fw"></em>user information</a></li>
            					<li><a href="#" style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:24px;width: 500px;"><i class="fa fa-book fa-fw"></i>exercises</a></li>
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
      				<!--right column-->
					<div style="overflow:-Scroll;overflow-x:hidden; "  class="main-panel">
              				<div class="content">
                  				<div class="container-fluid">
									
									<!--WEB-->
                      				<div class="row">
                          				<div class="col-lg-12 col-md-12">
                              				<button id="select_web" class="btn btn-warning btn-sm">Web</button>
                          				</div>
                      				</div>
                      				<br>
                      				<div class="row">
                          				<div id="qstage" class="col-lg-12 col-md-12">

											<div id="card21" class="col-lg-3 col-md-6 col-sm-6">
												<div class="card card-stats"><div class="card-header" data-background-color="orange">
                                                  <i class="material-icons">web</i>
                                                  </div><div class="card-content">
                                                  	<h4 class="title">Sign in 1</h4>
                                                  	<button class="btn btn-primary" data-toggle="modal" data-target="#q21" data-background-color="orange">browse</button>
                                                  </div>
                                                  <div class="card-footer">
                                                    <h4 class="stats">score：<a class="text-muted"><b>10</b></a></h4>
													<h4 class="stats">accumulate number：<a class="text-muted"><b>
													<?php
														$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
														if (!$con) 
														{
															die('数据库连接失败'.$mysqli_error());
														}
														mysqli_select_db($con,"ctf_platform_db");
														$num=0;
														$result=mysqli_query($con,"select * from achievement where exercise_num = 21 ");
														while ($row=mysqli_fetch_array($result)) //while循环将$result中的结果找出来
														{
															$num++;
														}
														echo "$num";
														mysqli_close($con);
													?>
													</b></a></h4>
                                                  </div>
                                              </div>
											</div>

											<div id="card22" class="col-lg-3 col-md-6 col-sm-6">
												<div class="card card-stats"><div class="card-header" data-background-color="orange">
                                                  <i class="material-icons">web</i>
                                                  </div><div class="card-content">
                                                  	<h4 class="title">Sign in 2</h4>
                                                  	<button class="btn btn-primary" data-toggle="modal" data-target="#q22" data-background-color="orange">browse</button>
                                                  </div>
                                                  <div class="card-footer">
                                                    <h4 class="stats">score：<a class="text-muted"><b>20</b></a></h4>
													<h4 class="stats">accumulate number：<a class="text-muted"><b>
													<?php
														$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
														if (!$con) 
														{
															die('数据库连接失败'.$mysqli_error());
														}
														mysqli_select_db($con,"ctf_platform_db");
														$num=0;
														$result=mysqli_query($con,"select * from achievement where exercise_num = 22 ");
														while ($row=mysqli_fetch_array($result)) //while循环将$result中的结果找出来
														{
															$num++;
														}
														echo "$num";
														mysqli_close($con);
													?>
													</b></a></h4>
                                                  </div>
                                              </div>
											</div>

											<div id="card23" class="col-lg-3 col-md-6 col-sm-6">
												<div class="card card-stats"><div class="card-header" data-background-color="orange">
                                                  <i class="material-icons">web</i>
                                                  </div><div class="card-content">
                                                  	<h4 class="title">Not Web</h4>
                                                  	<button class="btn btn-primary" data-toggle="modal" data-target="#q23" data-background-color="orange">browse</button>
                                                  </div>
                                                  <div class="card-footer">
                                                    <h4 class="stats">score：<a class="text-muted"><b>20</b></a></h4>
													<h4 class="stats">accumulate number：<a class="text-muted"><b>
													<?php
														$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
														if (!$con) 
														{
															die('数据库连接失败'.$mysqli_error());
														}
														mysqli_select_db($con,"ctf_platform_db");
														$num=0;
														$result=mysqli_query($con,"select * from achievement where exercise_num = 23 ");
														while ($row=mysqli_fetch_array($result)) //while循环将$result中的结果找出来
														{
															$num++;
														}
														echo "$num";
														mysqli_close($con);
													?>
													</b></a></h4>
                                                  </div>
                                              </div>
											</div>

										</div>
									</div>
									
									<!--REV-->
									<div class="row">
                          				<div class="col-lg-12 col-md-12">
                              				<button id="select_rev" class="btn btn-info btn-sm">Rev</button>
                          				</div>
                      				</div>
                      				<br>
									<div class="row">
                          				<div id="qstage" class="col-lg-12 col-md-12">		

											<div id="card1" class="col-lg-3 col-md-6 col-sm-6">
												<div class="card card-stats">	
													<div class="card-header" data-background-color="blue">
														<i class="material-icons">adb</i>
													</div>
													<div class="card-content">
														<h4 class="title">Pinstore</h4>
														<button class="btn btn-primary" data-toggle="modal" data-target="#q1" data-background-color="blue">browse</button>
													</div>
													<div class="card-footer">
														<h4 class="stats">score：<a class="text-muted"><b>20</b></a>
														</h4>
														<h4 class="stats">accumulate number：<a class="text-muted"><b>
													<?php
														$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
														if (!$con) 
														{
															die('数据库连接失败'.$mysqli_error());
														}
														mysqli_select_db($con,"ctf_platform_db");
														$num=0;
														$result=mysqli_query($con,"select * from achievement where exercise_num = 1 ");
														while ($row=mysqli_fetch_array($result)) //while循环将$result中的结果找出来
														{
															$num++;
														}
														echo "$num";
														mysqli_close($con);
													?>
													</div>
												</div>
											</div>
											
											<div id="card2" class="col-lg-3 col-md-6 col-sm-6">
												<div class="card card-stats">	
													<div class="card-header" data-background-color="blue">
														<i class="material-icons">adb</i>
													</div>
													<div class="card-content">
														<h4 class="title">Easy_vb</h4>
														<button class="btn btn-primary" data-toggle="modal" data-target="#q2" data-background-color="blue">browse</button>
													</div>
													<div class="card-footer">
														<h4 class="stats">score：<a class="text-muted"><b>20</b></a>
														</h4>
														<h4 class="stats">accumulate number：<a class="text-muted"><b>
													<?php
														$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
														if (!$con) 
														{
															die('数据库连接失败'.$mysqli_error());
														}
														mysqli_select_db($con,"ctf_platform_db");
														$num=0;
														$result=mysqli_query($con,"select * from achievement where exercise_num = 2 ");
														while ($row=mysqli_fetch_array($result)) //while循环将$result中的结果找出来
														{
															$num++;
														}
														echo "$num";
														mysqli_close($con);
													?>
													</div>
												</div>
											</div>

										</div>
									</div>

									<!--CODING-->
									<div class="row">
                          				<div class="col-lg-12 col-md-12">
                             				<button id="select_cod" class="btn btn-success btn-sm">Coding</button>
                          				</div>
                      				</div>
                      				<br>
									<div class="row">
                          				<div id="qstage" class="col-lg-12 col-md-12">

											<div id="card5" class="col-lg-3 col-md-6 col-sm-6">
												<div class="card card-stats">
													<div class="card-header" data-background-color="green">
														<i class="material-icons">code</i>
													</div>
													<div class="card-content">
														<h4 class="title">Seek prime</h4>
														<button class="btn btn-primary" data-toggle="modal" data-target="#q5" data-background-color="green">browse</button>
													</div>
													<div class="card-footer">
														<h4 class="stats">score：<a class="text-muted"><b>10</b></a>
														</h4>
														<h4 class="stats">accumulate number：<a class="text-muted"><b>
													<?php
														$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
														if (!$con) 
														{
															die('数据库连接失败'.$mysqli_error());
														}
														mysqli_select_db($con,"ctf_platform_db");
														$num=0;
														$result=mysqli_query($con,"select * from achievement where exercise_num = 5 ");
														while ($row=mysqli_fetch_array($result)) //while循环将$result中的结果找出来
														{
															$num++;
														}
														echo "$num";
														mysqli_close($con);
													?>
													</div>
												</div>
											</div>

											<div id="card6" class="col-lg-3 col-md-6 col-sm-6">
												<div class="card card-stats">
													<div class="card-header" data-background-color="green">
														<i class="material-icons">code</i>
													</div>
													<div class="card-content">
														<h4 class="title">Decrypt</h4>
														<button class="btn btn-primary" data-toggle="modal" data-target="#q6" data-background-color="green">browse</button>
													</div>
													<div class="card-footer">
														<h4 class="stats">score：<a class="text-muted"><b>10</b></a>
														</h4>
														<h4 class="stats">accumulate number：<a class="text-muted"><b>
													<?php
														$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
														if (!$con) 
														{
															die('数据库连接失败'.$mysqli_error());
														}
														mysqli_select_db($con,"ctf_platform_db");
														$num=0;
														$result=mysqli_query($con,"select * from achievement where exercise_num = 6 ");
														while ($row=mysqli_fetch_array($result)) //while循环将$result中的结果找出来
														{
															$num++;
														}
														echo "$num";
														mysqli_close($con);
													?>
													</div>
												</div>
											</div>
											
										</div>
									</div>

									<!--PWN-->
									<div class="row">
                          				<div class="col-lg-12 col-md-12">
                              				<button id="select_pwn" class="btn btn-primary btn-sm">Pwn</button>
                          				</div>
                      				</div>
                      				<br>
									<div class="row">
                          				<div id="qstage" class="col-lg-12 col-md-12">

											<div id="card9" class="col-lg-3 col-md-6 col-sm-6">
												<div class="card card-stats">
													<div class="card-header" data-background-color="purple">
														<i class="material-icons">bug_report</i>
													</div>
													<div class="card-content">
														<h4 class="title">waiting</h4>
														<button class="btn btn-primary" data-toggle="modal" data-target="#q27" data-background-color="purple">browse</button>
													</div>
													<div class="card-footer">
														<h4 class="stats">score：<a class="text-muted"><b>0</b></a>
														</h4>
														<h4 class="stats">accumulate number：<a class="text-muted"><b>
													<?php
														$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
														if (!$con) 
														{
															die('数据库连接失败'.$mysqli_error());
														}
														mysqli_select_db($con,"ctf_platform_db");
														$num=0;
														$result=mysqli_query($con,"select * from achievement where exercise_num = 9 ");
														while ($row=mysqli_fetch_array($result)) //while循环将$result中的结果找出来
														{
															$num++;
														}
														echo "$num";
														mysqli_close($con);
													?>
													</div>
												</div>
											</div>
										
										</div>
									</div>

									<!--MISC-->
									<div class="row">
                          				<div class="col-lg-12 col-md-12">
                              				<button id="select_mis" class="btn btn-danger btn-sm">Misc</button>
                          				</div>
                      				</div>
                      				<br>
									<div class="row">
                          				<div id="qstage" class="col-lg-12 col-md-12">

											<div id="card15" class="col-lg-3 col-md-6 col-sm-6">
												<div class="card card-stats">
													<div class="card-header" data-background-color="red">
														<i class="material-icons">extension</i>
													</div>
													<div class="card-content">
														<h4 class="title">waiting</h4>
														<button class="btn btn-primary" data-toggle="modal" data-target="#q15" data-background-color="red">browse</button>
													</div>
													<div class="card-footer">
														<h4 class="stats">score：<a class="text-muted"><b>0</b></a></h4>
														<h4 class="stats">accumulate number：<a class="text-muted"><b>
													<?php
														$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
														if (!$con) 
														{
															die('数据库连接失败'.$mysqli_error());
														}
														mysqli_select_db($con,"ctf_platform_db");
														$num=0;
														$result=mysqli_query($con,"select * from achievement where exercise_num = 15 ");
														while ($row=mysqli_fetch_array($result)) //while循环将$result中的结果找出来
														{
															$num++;
														}
														echo "$num";
														mysqli_close($con);
													?>
													</div>
												</div>
											</div>

                          				</div>
									</div>
                				</div>
            				</div>
					</div>

				<!--拟态框-->	
				<div id="question">
					<div class="modal fade in" id="q1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <center>
                                  <h4 class="modal-title text-center;font-size:35px" id="myModalLabel">pinstore</h4><br>
                                  	<a style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:20px">format： Flag:xxx</a><br>
                                  </center>
								</div>
								<div class="modal-body text-center">
									<p class="catagory">
										<a href="http://www.leeyuxun.online/questions/pinstore.zip" target="_Blank">http://www.leeyuxun.online/questions/pinstore.zip</a>
									</p>
									<div class="col-lg-2 col-md-2 col-sm-2">
									</div>
									<div class="col-lg-8 col-md-8 col-sm-8">
										<form class="form">

											<div class="form-group">
												<input type="hidden" value="1" class="form-control" id="qid1" style="display:none">
												<span class="material-input"></span>
											</div>
											<div class="input-group">
											</div>
											
											<div class="input-group">
												<span class="input-group-addon"><i class="material-icons">flag</i></span>
												<div class="form-group is-empty">
													<input type="text" placeholder="Flag" class="form-control" id="flag1">
													<span class="material-input"></span>
												</div>
											</div>

											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">fingerprint</i>
												</span>
												<input name="authcode" id="authcode" class="form-control" placeholder="authcode" type="text">
												<span class="input-group-addon">
													<img src="php/authcode.php" onClick="this.src='php/authcode.php?nocache='+Math.random()" style="cursor:hand" alt="点击换一张"/>
												</span>
											</div>

										</form>
										<button type="button" id="flagsubmit" class="btn btn-danger btn-simple">submit</button>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2"></div>
								</div>
								<div class="modal-footer">
									<div class="col-lg-12 col-md-12 col-sm-12 text-center">
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade in" id="q2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <center>
                                  <h4 class="modal-title text-center;font-size:35px" id="myModalLabel">Easy_vb</h4><br>
                                  	<a style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:20px">format： Flag:{xxx}</a><br>
                                  </center>
								</div>
								<div class="modal-body text-center">
									<p class="catagory">
										<a href="http://www.leeyuxun.online/questions/easy_vb.zip" target="_Blank">http://www.leeyuxun.online/questions/easy_vb.zip</a>
									</p>
									<div class="col-lg-2 col-md-2 col-sm-2">
									</div>
									<div class="col-lg-8 col-md-8 col-sm-8">
										<form class="form">

											<div class="form-group">
												<input type="hidden" value="2" class="form-control" id="qid2" style="display:none">
												<span class="material-input"></span>
											</div>

											<div class="input-group">
												<span class="input-group-addon"><i class="material-icons">flag</i></span>
												<div class="form-group is-empty">
													<input type="text" placeholder="Flag" class="form-control" id="flag2">
													<span class="material-input"></span>
												</div>
											</div>

											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">fingerprint</i>
												</span>
												<input name="authcode" id="authcode" class="form-control" placeholder="authcode" type="text">
												<span class="input-group-addon">
													<img src="php/authcode.php" onClick="this.src='php/authcode.php?nocache='+Math.random()" style="cursor:hand" alt="点击换一张"/>
												</span>
											</div>

										</form>
										<button type="button" id="flagsubmit" class="btn btn-danger btn-simple">submit</button>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2"></div>
								</div>
								<div class="modal-footer">
									<div class="col-lg-12 col-md-12 col-sm-12 text-center">
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade in" id="q5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <center>
                                  <h4 class="modal-title text-center;font-size:35px" id="myModalLabel">Seek prime</h4><br>
                                  	<a style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:20px">设一个等差数列，首元素为367，公差为186, </a><br>
                                  	<a style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:20px">现在要求找出属于该等差数列中的第151个素数并输出。</a><br>
                                  	<a style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:20px">格式：CTF{xxx}</a><br>
                                  </center>
								</div>
								<div class="modal-body text-center">
										<div class="col-lg-2 col-md-2 col-sm-2">
											</div>
											<div class="col-lg-8 col-md-8 col-sm-8">
												<form class="form">
													<div class="form-group">
														<input type="hidden" value="5" class="form-control" id="qid5" style="display:none">
														<span class="material-input"></span>
													</div>
													<div class="input-group">
														<span class="input-group-addon"><i class="material-icons">flag</i></span>
														<div class="form-group is-empty">
															<input type="text" placeholder="Flag" class="form-control" id="flag5">
															<span class="material-input"></span>
														</div>
													</div>

													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">fingerprint</i>
														</span>
														<input name="authcode" id="authcode" class="form-control" placeholder="authcode" type="text">
														<span class="input-group-addon">
															<img src="php/authcode.php" onClick="this.src='php/authcode.php?nocache='+Math.random()" style="cursor:hand" alt="点击换一张"/>
														</span>
													</div>

												</form>
												<button type="button" id="flagsubmit" class="btn btn-danger btn-simple">submit</button>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-2"></div>
										</div>
								<div class="modal-footer">
									<div class="col-lg-12 col-md-12 col-sm-12 text-center">
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="modal fade in" id="q6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <center>
                                  <h4 class="modal-title text-center;font-size:35px" id="myModalLabel">Decrypt</h4><br>
                                  	<a style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:20px">密文xztiofwhf是用仿射函数y=5x+11加密得到的</a><br>
                                  </center>
								</div>
								<div class="modal-body text-center">
										<div class="col-lg-2 col-md-2 col-sm-2">
											</div>
											<div class="col-lg-8 col-md-8 col-sm-8">
												<form class="form">
													<div class="form-group">
														<input type="hidden" value="6" class="form-control" id="qid6" style="display:none">
														<span class="material-input"></span>
													</div>
													<div class="input-group">
														<span class="input-group-addon"><i class="material-icons">flag</i></span>
														<div class="form-group is-empty">
															<input type="text" placeholder="Flag" class="form-control" id="flag6">
															<span class="material-input"></span>
														</div>
													</div>

													<div class="input-group">
														<span class="input-group-addon">
															<i class="material-icons">fingerprint</i>
														</span>
														<input name="authcode" id="authcode" class="form-control" placeholder="authcode" type="text">
														<span class="input-group-addon">
															<img src="php/authcode.php" onClick="this.src='php/authcode.php?nocache='+Math.random()" style="cursor:hand" alt="点击换一张"/>
														</span>
													</div>
													
												</form>
												<button type="button" id="flagsubmit" class="btn btn-danger btn-simple">submit</button>
											</div>
											<div class="col-lg-2 col-md-2 col-sm-2"></div>
										</div>
								<div class="modal-footer">
									<div class="col-lg-12 col-md-12 col-sm-12 text-center">
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="modal fade in" id="q21" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <center>
                                  <h4 class="modal-title text-center;font-size:35px" id="myModalLabel">Sign in 1</h4><br>
                                  	<a style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:20px">format：flag:leectf{xxx}</a><br>
                                  </center>
								</div>
								<div class="modal-body text-center">
									<p class="catagory">
										<a href="questions/Q21/Q21.html" target="_Blank">Link</a>
									</p>
									<div class="col-lg-2 col-md-2 col-sm-2">
									</div>
									<div class="col-lg-8 col-md-8 col-sm-8">
										<form action="php/exercise/Q21.php" method="post">


											<div class="form-group">
												<input type="hidden" value="21" class="form-control" id="qid21" style="display:none">
												<span class="material-input">
												</span>
											</div>


											<div class="input-group">
												<span class="input-group-addon"><i class="material-icons">flag</i></span>
												<div class="form-group is-empty">
													<input type="text" placeholder="flag" class="form-control" name="flag21" id="flag21">
													<span class="material-input"></span>
												</div>
											</div>

											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">fingerprint</i>
												</span>
												<input name="authcode" id="authcode" class="form-control" placeholder="authcode" type="text">
												<span class="input-group-addon">
													<img src="php/authcode.php" onClick="this.src='php/authcode.php?nocache='+Math.random()" style="cursor:hand" alt="点击换一张"/>
												</span>
											</div>


											<button type="submit" class="btn btn-danger btn-simple">submit</button>
										</form>	
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2"></div>
								</div>
								<div class="modal-footer">
									<div class="col-lg-12 col-md-12 col-sm-12 text-center">
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade in" id="q22" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <center>
                                  <h4 class="modal-title text-center;font-size:35px" id="myModalLabel">Sign in 2</h4><br>
                                  	<a style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:20px">format：flag:leectf{xxx}</a><br>
                                  </center>
								</div>
								<div class="modal-body text-center">
									<p class="catagory">
										<a href="questions/Q22/index.html" target="_Blank">Link</a>
									</p>
									<div class="col-lg-2 col-md-2 col-sm-2">
									</div>
									<div class="col-lg-8 col-md-8 col-sm-8">
										<form action="php/exercise/Q22.php" method="post">

											<div class="form-group">
												<input type="hidden" value="22" class="form-control" id="qid22" style="display:none">
												<span class="material-input">
												</span>
											</div>

											<div class="input-group">
												<span class="input-group-addon"><i class="material-icons">flag</i></span>
												<div class="form-group is-empty">
													<input type="text" placeholder="Flag" class="form-control" name="flag22" id="flag22">
													<span class="material-input"></span>
												</div>
											</div>
														
											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">fingerprint</i>
												</span>
												<input name="authcode" id="authcode" class="form-control" placeholder="authcode" type="text">
												<span class="input-group-addon">
													<img src="php/authcode.php" onClick="this.src='php/authcode.php?nocache='+Math.random()" style="cursor:hand" alt="点击换一张"/>
												</span>
											</div>

											<button type="submit" class="btn btn-danger btn-simple">submit</button>
										</form>	
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2"></div>
								</div>
								<div class="modal-footer">
									<div class="col-lg-12 col-md-12 col-sm-12 text-center">
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="modal fade in" id="q23" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                  <center>
                                  <h4 class="modal-title text-center;font-size:35px" id="myModalLabel">Not Web</h4><br>
                                  	<a style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:20px">format：flag:leectf{xxx}</a><br>
                                  </center>
								</div>
								<div class="modal-body text-center">
									<p class="catagory">
										<a href="questions/Q23/Q23.html" target="_Blank">Link</a>
									</p>
									<div class="col-lg-2 col-md-2 col-sm-2">
									</div>
									<div class="col-lg-8 col-md-8 col-sm-8">
										<form action="php/exercise/Q23.php" method="post">

											<div class="form-group">
												<input type="hidden" value="22" class="form-control" id="qid22" style="display:none">
												<span class="material-input">
												</span>
											</div>

											<div class="input-group">
												<span class="input-group-addon"><i class="material-icons">flag</i></span>
												<div class="form-group is-empty">
													<input type="text" placeholder="Flag" class="form-control" name="flag23" id="flag23">
													<span class="material-input"></span>
												</div>
											</div>

											<div class="input-group">
												<span class="input-group-addon">
													<i class="material-icons">fingerprint</i>
												</span>
												<input name="authcode" id="authcode" class="form-control" placeholder="authcode" type="text">
												<span class="input-group-addon">
													<img src="php/authcode.php" onClick="this.src='php/authcode.php?nocache='+Math.random()" style="cursor:hand" alt="点击换一张"/>
												</span>
											</div>

											<button type="submit" class="btn btn-danger btn-simple">submit</button>
										</form>	
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2"></div>
								</div>
								<div class="modal-footer">
									<div class="col-lg-12 col-md-12 col-sm-12 text-center">
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			    </div>
			</div>
		</div>
	</section>
	  
	  
	  
	  
    <!-- JS -->
    <script type="text/javascript" src="exercises_files/jquery-1.js"></script>
    <script type="text/javascript" src="exercises_files/bootstrap-filestyle.js"></script>
    <script type="text/javascript" src="exercises_files/templatemo-script.js"></script>
	<script src="exercises_files/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="exercises_files/bootstrap.min.js" type="text/javascript"></script>	
	<script src="exercises_files/material.min.js" type="text/javascript"></script>
	<script src="exercises_files/jquery.countdown.js"></script>
	<script src="exercises_files/countdown.js"></script>
	<script src="exercises_files/material-dashboard.js"></script>
	 
	<!--js设置背景-->
	<script src="exercises_files/particles.js"></script>
	<script src="exercises_files/particle-code.js"></script>

	</body>
</html>