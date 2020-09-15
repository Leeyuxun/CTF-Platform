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
    <title>RANKING LIST</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="">
    <meta name="author" content="templatemo">
    
    <link href="ranking_list_files/css.css" rel="stylesheet" type="text/css">
    <link href="ranking_list_files/font-awesome.css" rel="stylesheet">
    <link href="ranking_list_files/bootstrap.css" rel="stylesheet">
    <link href="ranking_list_files/templatemo-style.css" rel="stylesheet">
	<link rel="stylesheet" href="ranking_list_files/normalize.css">
	<link rel="stylesheet" href="ranking_list_files/style.css">
	<link rel="stylesheet" href="ranking_list_files/color.css">
	
	<link href="ranking_list_files/bootstrap_002.css" rel="stylesheet">
    <link href="ranking_list_files/material-dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="ranking_list_files/materialicon.css">
    <link rel="stylesheet" type="text/css" href="ranking_list_files/roboto.css">
    <link rel="stylesheet" href="ranking_list_files/font-awesome_002.css">
    <link href="ranking_list_files/jquery.css" rel="stylesheet">
	<link href="ranking_list_files/icon.css" rel="stylesheet">
	
	<script type="text/javascript">
        function load()
        {
			window.setInterval('showRealTime(clock)',1000);
		}
	</script>

  </head>
	
  <body onload="load()">
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
            					<li><a href="exercises.php" style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:24px;width: 500px;"><i class="fa fa-book fa-fw"></i>exercises</a></li>
								<li><a href="#" style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:24px;width: 500px;"><i class="fa fa-list fa-fw"></i>ranking list</a></li>
            					<li><a href="php/sign_out.php" style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:24px;width: 500px;"><em class="fa fa-power-off fa-fw"></em>sign out</a></li>
								<li><a href="php/time.php" style="font-family:'Comic Sans MS', cursive; color:#03AAC7; font-size:24px;width: 500px;"><div id="clock"></div>
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
					<div class="main-panel">
					<div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="title">RANKING LIST</h4>
                                </div>
                                <div class="card-content table-responsive">
                                    <table id="personranktable" class="table">
                                        <thead class="text-primary" style="text-align: center;font-size: 20px; font-weight:600">
                                            <tr><th style="text-align: center;font-size: 30px; font-weight:600">RANKING</th>
                                            <th style="text-align: center;font-size: 30px; font-weight:600">USE RNAME</th>
                                            <th style="text-align: center;font-size: 30px; font-weight:600">TOTAL SCORE</th>
                                        </tr></thead>
										<tbody style="text-align: center;font-size: 30px; font-weight:600">
										<?PHP
											$con=mysqli_connect("localhost","leeyuxun","274a5bedc3d9a559","ctf_platform_db");
											if (!$con) 
											{
												die('数据库连接失败'.$mysqli_error());
											}
											mysqli_select_db($con,"ctf_platform_db");
											$sqli="SELECT * FROM user_info order by total_score desc";
											$retval=mysqli_query($con, $sqli);
											if(mysqli_num_rows($retval) > 0)
											{  
												$id=1;
												while($row = mysqli_fetch_assoc($retval))
												{  
													echo "<tr>";
													echo "<td>".$id."</td>";
													echo "<td>".$row["username"]."</td>";
													echo "<td style='color:white'>".$row["total_score"]."</td>";
													echo "</tr>";
													$id=$id+1;
												} 
											}
											mysqli_close($con);//关闭数据库连接，如不关闭，下次连接时会出错
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
    <script type="text/javascript" src="ranking_list_files/jquery-1.js"></script>
    <script type="text/javascript" src="ranking_list_files/bootstrap-filestyle.js"></script>
    <script type="text/javascript" src="ranking_list_files/templatemo-script.js"></script>
	 
	<!--js设置背景-->
	<script src="ranking_list_files/particles.js"></script>
	<script src="ranking_list_files/particle-code.js"></script>


</body></html>