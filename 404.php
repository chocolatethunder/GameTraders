<?php

$msgtype = rand(1,3);

if ($msgtype == 1) {
	$error404 = "Jimmy was a computer nerd but Jimmy is no more <br>
				what Jimmy thought was a URL, was actually a four-o-four.<br><br>
				
				Awesome you killed Jimmy. Anymore dreams you would like to shatter today?";
} else if ($msgtype == 2) {
	$error404 = "WTF? THANKS FOR BREAKING THE INTERWEBS <br><br>
	
				We made every possible effort to make sure this would not happen.<br>
				Man, this has to be reported... What were you using to surf the website? A spoon or 
				a fork?<br><br>
				
				Well, good job cause you just unearthed our 404 page!";
} else if ($msgtype == 3) {
	$error404 = "Jimmy was a php programmer but Jimmy is no more <br />
				Because what you just discovered is a server 404 <br /><br />

				Good job you just killed Jimmy.";
}

?>

<body style="background-color:#e2eaf9;">

<div style="position:relative; left:auto; right:auto; top:500px; text-align:center;"><a href="http://localhost/Gametraders" style="outline:none; color:#000000; font-weight:bold; text-decoration:none; font-family:Arial, Helvetica, sans-serif; font-size:12px;">Click here before you rip apart the fabric of space time continuum</a></div>

<center><div style="margin-top:-30px;"><img src="http://localhost/Gametraders/images/messages/404_1.png" width="1075" height="576" border="0" /></center>

<input type="hidden" value="That's right we know your are viewing the source now so here it is again! THANKS! Not only you destroyed gravity and all the laws of physics, but you managed to Fux0r the website as well. It’s broken into several pieces and is currently floating towards outterspace. I hope you are happy now. What were you using to surf the website - a spatula, a telsa coil or a particle accelerator?" />

</body>

<?php

//include("includes/footer.php");

?>