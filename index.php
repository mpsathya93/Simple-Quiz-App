<?php
session_start();
include_once 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home | Koding Made Simple</title>
	<!--my code -->
	<script type="text/javascript">
	var seconds = 600;
	function secondPassed()
	{
		 var minutes = Math.round((seconds - 30)/60);
		 var remainingSeconds = seconds%60;
		 if (remainingSeconds < 10)
		 {
		  remainingSeconds = "0" + remainingSeconds;
		 }
		 document.getElementById('countdown').innerHTML = minutes + ":" + remainingSeconds;
		 if (seconds == 0)
		 {
		  clearInterval(countdownTimer);
		  document.getElementById('countdown').innerhtml = "buzz buss";
		 }
		 else
		 {
		  seconds--;
		 }
	}
	var countdownTimer = setInterval('secondPassed()',1000);
    </script>
	<!-- end of my code -->

	<meta content="width=device-width, initial-scale=1.0" name="viewport" >
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
</head>
<!-- my code -->
<body onload="setTimeout('document.test.submit();',600000);">


<!--end of my code-->

<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Koding Made Simple</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Sign Up</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
<!-- My code-->

<div id="countdown" class="timer" style=" right:30px; position:fixed;color:red;"></div>

<?php
// $con=mysqli_connect('localhost','root','','code_tri');
//mysql_select_db('code_tri');
  echo "<center><h1>CODE TRIATHALON</h1></center>";
  $i=0;
	echo "<form name=\"test\" action=\"result.php\" method=\"POST\"> ";
  $array=array();	 
  while($i<9)
	{	  
	$id = mt_rand(1,10);
  if(!(in_array($id,$array)))
  {
      $array[]=$id;
    	$sample = mysqli_query($con,"SELECT * FROM questions WHERE id = $id");
    	echo "<br><br>";
    		while($sample1 = mysqli_fetch_assoc($sample)){
            		
               echo"<b>";echo $i+1;  echo '. ' .$sample1['question'].'</b><br>';
               echo "<input type=\"radio\" value=\"a\" name=\"".$sample1['id']."\">".$sample1['option1'].'<br>'; 
               echo "<input type=\"radio\" value=\"b\" name=\"".$sample1['id']."\">".$sample1['option2'].'<br>';
               echo "<input type=\"radio\" value=\"c\" name=\"".$sample1['id']."\">".$sample1['option3'].'<br>';
              echo "<input type=\"radio\" value=\"d\" name=\"".$sample1['id']."\">".$sample1['option4'].'<br>';
              //echo "<input type=\"radio\" value=\"sample\" >";
              $i=$i+1;
    		}
	}
}
	echo "<input type=\"submit\" value=\"Submit\"></form>";
	mysqli_close($con);
?>
<!--end of my code-->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

