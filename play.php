<?php
session_start();
if((!isset($_SESSION['username'])))
	{
		header("location:index");
	}
	
	?>

<html>
   <head>
 <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
   <title>Play</title>
   <link rel="stylesheet" href="Assets/css/style.css">
     
     <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
</head> 
      <body>
      <?php
		  if(isset($_SESSION['start'])&& $_SESSION['lev']!=3)
			 {
			  echo'
      <div class="sub_navbartimer"><div id="clockdiv" style="
    zoom: 0.4;
		  -moz-transform: scale(0.4);"><span id="tl">Time Left :</span>
	<div><span class="hours" id="hours">00</span><div class="smalltext">Hours</div></div>
	<div><span class="minutes" id="minutes">00</span><div class="smalltext">Minutes</div></div>
	<div><span class="seconds" id="seconds">00</span><div class="smalltext">Seconds</div></div>
	</div></div><form method="post" action="check.php" name="finalSubmit"></form>'; 
			 }
		  else
		  {
      echo'<ul class="sub_navbarul">
  <li class="sub_navbarli"><a href="finish">Logout</a></li>
  
</ul>';
		  }
		  ?>
    
     <?php
		  if(isset($_SESSION['atm']))
		  {
			  echo "<div id='wrapper' class='div'> <div class='div'>
		<center><h2>You have already attempted the quiz</h2></center></div></div>";
		  }
		  elseif(isset($_SESSION['start']))
			 {
			  echo'<iframe width="70%" height="100%" align="right" src="ui.php" name="ui" frameborder="0" allowtransparency="true"></iframe>
    <iframe width="28%" height="100%" align="left" src="qlist.php" name="qlist" frameborder="0" allowtransparency="true"></iframe>';
		  }
		  elseif($_SESSION['lev']==1)
		  			{
						 echo'<iframe width="100%" height="100%" align="right" src="rule1.php" frameborder="0" allowtransparency="true"></iframe>';
					} elseif($_SESSION['lev']==2)
		  			{
						 echo'<iframe width="100%" height="100%" align="right" src="rule2.php" frameborder="0" allowtransparency="true"></iframe>';
					}elseif($_SESSION['lev']==3)
		  			{
						 echo'<iframe width="100%" height="100%" align="right" src="rule3.php" frameborder="0" allowtransparency="true"></iframe>';
					}
		  ?></body>
</html>
 <script type="text/javascript">
	var xmlHttp;
function srvTime(){
    try {
        //FF, Opera, Safari, Chrome
        xmlHttp = new XMLHttpRequest();
    }
    catch (err1) {
        //IE
        try {
            xmlHttp = new ActiveXObject('Msxml2.XMLHTTP');
        }
        catch (err2) {
            try {
                xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
            }
            catch (eerr3) {
                //AJAX not supported, use CPU time.
                alert("AJAX not supported");
            }
        }
    }
    xmlHttp.open('HEAD',window.location.href.toString(),false);
    xmlHttp.setRequestHeader("Content-Type", "text/html");
    xmlHttp.send('');
    return xmlHttp.getResponseHeader("Date");
}
	 var deadline = Date.parse(<?php echo '"'.$_SESSION['stime'].'"';?>)+<?php if($_SESSION['lev']==1)
	echo '1230000';
		 elseif ($_SESSION['lev']==2)
			 echo '1530000';
		 ?>;

var st = srvTime();
    var t = (deadline-Date.parse(new Date(st)))/1000;
    var downloadTimer = setInterval(function(){
    t--;
	var seconds = Math.floor( (t) % 60 );
	var minutes = Math.floor( (t/60) % 60 );
	var hours = Math.floor( (t/(60*60)) % 24 );
		document.getElementById("hours").textContent=('0'+hours).slice(-2);
		document.getElementById("minutes").textContent=('0'+minutes).slice(-2);
		document.getElementById("seconds").textContent=('0'+seconds).slice(-2);
    if(t <= 0)
{
        clearInterval(downloadTimer);
	document.finalSubmit.submit();
}
    },1000);
	


</script> 
