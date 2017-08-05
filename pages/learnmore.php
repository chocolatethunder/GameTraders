<?php

// page protection
if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
	header("Location: ../404.php");
	unset($antihackey);
	unset($_SESSION['antihackey']);
}

?>

<script type="text/javascript">var currLayerId = "1";</script>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/c_topleft.png" width="4" height="4" /></td>
    <td width="100%" bgcolor="#e2eaf9"></td>
    <td><img src="images/c_topright.png" width="4" height="4" /></td>
  </tr>
  <tr>
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td bgcolor="#e2eaf9"><span class="headdings">Learn more about the website</span></td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="4" height="4" /></td>
  </tr>
</table><br />

<table width="845" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/c_topleft.png" width="4" height="4" /></td>
    <td width="100%" bgcolor="#e2eaf9"></td>
    <td><img src="images/c_topright.png" width="4" height="4" /></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td bgcolor="#e2eaf9"><span class="headdings2">Take a tour</span></td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td>&nbsp;&nbsp;</td>
    <td><hr noshade="noshade" color="#e2eaf9" width="742" /></td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="4" height="4" /></td>
    <td></td>
    <td></td>
  </tr>
</table><br />

<div id="takeatour">

<div id="1"><img src="images/lm_slide1.png" border="0" width="850" height="300" align="middle" /><br /><br />
<b>Welcome</b><br /><br />
<div class="lm_text">
Welcome to Gametraders Canada. A community where gamers of all ages can gather and share a variety of information about video games that they own or they have owned in the past, especially the trade in values for each game. On GametradersCanada you can add, edit, and find Trade in Values for your favourite games as well as a whole lot more.
</div>
</div>

<div id="2" style="display:none;"><img src="images/lm_slide2.png" border="0" width="850" height="300" align="middle" /><br /><br />
<b>Extensive Information</b><br /><br />
<div class="lm_text">
All the games come with a variety of information so that you are well informed. Each game that is listed on this website is provided courtesy of either you or another member and every game comes with a detailed description of their title, boxart, trailer, community rating, who added the game, and most importantly their trade in values. 
</div>
</div>

<div id="3" style="display:none;"><img src="images/lm_slide3.png" border="0" width="850" height="300" align="middle" /><br /><br />
<b>Graphs</b><br /><br />
<div class="lm_text">
In addition to the extensive details provided about your game of choice, we also provide you with a graph of all the trade in values. These graphs can be customized by you to display all graphs for comparison or selected graphs to avoid confusion. Thus, making it easier for you to filter the data to your own customized needs.
</div>
</div>

<div id="4" style="display:none;"><img src="images/lm_slide4.png" border="0" width="850" height="300" align="middle" /><br /><br />
<b>User based editing</b><br /><br />
<div class="lm_text">
It's always nice to have users do a little thing or two to your website to maintain interactivity. But why not let them take full control? (Well, almost all control) GametradersCanada lets you edit pretty much anything you want about a particular game that is listed on this website. Edit its title, trailer link, game cover art and especially their trade in value. This gives the power to you the user and keeps things fresh
</div>
</div>

<div id="5" style="display:none;"><img src="images/lm_slide5.png" border="0" width="850" height="300" align="middle" /><br /><br />
<b>Contribute</b><br /><br />
<div class="lm_text">
As a user, you are not only allowed to edit a current entry of game but you can add your own game if you wish. It is as easy as clicking the Add Game button, filling out a few fields and viola, the game is now ready for other people to look at and edit. Congratulations! You have just made it easier for other users to add trade in values and contributed positively to the community! Thank you for being so awesome. May the force of LOLCAT be with you. 
</div>
</div>

<div id="watch" style="display:none;">
Coming Soon!
</div>

</div>

<a href="" onclick="toggleLayer('1');return false;" class="tourbutn" >1</a>
<a href="" onclick="toggleLayer('2');return false;" class="tourbutn" >2</a>
<a href="" onclick="toggleLayer('3');return false;" class="tourbutn" >3</a>
<a href="" onclick="toggleLayer('4');return false;" class="tourbutn" >4</a>
<a href="" onclick="toggleLayer('5');return false;" class="tourbutn" >5</a>
<a href="" onclick="toggleLayer('watch');return false;" class="tourbutn" >Video Tour</a>
<a href="index.php?action=newuser" class="tourbutn" >Join Us!</a>

<br /><br /><br />


<table width="845" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/c_topleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_topright.png" width="4" height="4" /></td>
    <td></td>
    <td width="100%"></td>
  </tr>
  <tr>
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td bgcolor="#e2eaf9"><span class="headdings2">FAQ</span></td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td>&nbsp;&nbsp;</td>
    <td><hr noshade="noshade" color="#e2eaf9" /></td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="4" height="4" /></td>
    <td></td>
    <td></td>
  </tr>
</table><br />

<div class="bodytext">

General<br />

      <dt>1. lolwut?</dt>
      <dd>Yeah we know... we think it is a major problem as well...<br /><br /></dd>
      
      <dt>2. But why?</dt>
      <dd>Well because we wanted to. It was more like an impulse. Just like you, we are also gamers and we value a game with a good trade in value. Really there was no way to know what the trade in value for the game that is in your hands will be unless you were to call EB Games, Futureshop or Blockbuster. Those guys aren't open 24/7 but we are.<br /><br /></dd>
      
      <dt>3. Is the cake really a lie?</dt>
      <dd>We really don't know. We'll guess, we will have to wait for the next installment of Portal.<br /><br /></dd>
      
      <dt>4. Who is responsible for updating the content on this website?</dt>
      <dd>Well, since we haven't been able to find out the secret password into EB Games, Blockbuster's or Futureshop's computers to find out what they offer for trade in values, it becomes the responsibility of you, the user, to update the content so the others can benefit. A word of mouth can only go so far, a database like ours... well can be accessed from anywhere and by anyone.<br /><br /></dd>
      
      <dt>5. Why are you in Beta?</dt>
      <dd>Well just like any other good piece of software we want to make sure that all the bugs and problems are removed before the final version. This is not to say that we don't trust our coding but rather say that we wish to test and test our code to the point of perfection. Since, you, the user will be using our site on a regular bases and maybe stumbling across potential problems or bugs that we may have missed, which BTW, you can report <a href="index.php?action=bugreport">here</a>, we have decided to keep the website in beta mode.<br /><br /></dd>
      
      <dt>6. Why is my Captcha text or the verification image not showing up?</dt>
      <dd>It should show up. Refresh your page once or twice. If it becomes an issue contact us immediately via the General Help option provided <a href="index.php?action=feedback">here</a><br /></dd>

</div>

<br />Account<br />

<div class="bodytext">

      <dt>1. Can I have multiple accounts?</dt>
      <dd>No, unfortunately account polygamy is not allowed and it is only because we wish to protect the integrety of our user database.<br /><br /></dd>
      
      <dt>2. My account just got deleted, why?</dt>
      <dd>There can be several reasons for this. You may have violated our <a href="index.php?action=privacytou#tou">Terms of Use</a> or you may have been flagged by other users for deviance. If you think it is an error shoot an email and we will look into your issue.<br /><br /></dd>
      
      <dt>3. Why hasn't my confirmation email arrived?</dt>
      <dd>Please make sure that the email hasn't landed in your trash can or junk mail folder. If it has then please add it to your safe list. Some ISPs may also block the email. Also, please check that you are using the correct email address. If you are still having trouble please contact us via the General Help option provided <a href="index.php?action=feedback">here</a><br /><br /></dd>
      
      <dt>4. Why is my default avatar that of the mighty and great Rick Astley?</dt>
      <dd>Well, because he is never going to give you up, never going to let you down, and never going to turn around and desert you<br /></dd>

</div>

<br />Reporting<br />

<div class="bodytext">

      <dt>1. I see a problem with the website where do I report it?</dt>
      <dd>First of all, we'd like to thank you for spotting an issue/bug within the website and we are glad that you are taking your precious time to tell us about it. With respect to that, we have created the Error Reporting page for you which can be found <a href="index.php?action=bugreport">here.</a><br /><br /></dd>
      
      <dt>2. I like your website but I have ideas to improve it where should I go?</dt>
      <dd>Thank you for that comment. We certainly appreciate the fact that you like this website and appreciate it even more if you gave us some feedback on how to improve it. You may do so via the General Feedback option provided <a href="index.php?action=feedback">here</a>.<br /></dd>

</div>

<br />Game Information Page<br />

<div class="bodytext">

      <dt>1. Why is it that we have to fill out so much information about a particular game that we add?</dt>
      <dd>The reason why we ask you to fill a <u>modest</u> amount of information is partly to give your right brain some exercise and partly because we want to maintain a proper database of all the games. Trade in values of a game depends on which platforms they are available, how long have they been available for, what their content rating is and is the trailer appealing enough to entice the user to actually go in a buy a new/used copy and justify the market value or trade in value of the game.<br /><br /></dd>
      
      <dt>2. Why is there a rating system and how is it measured?</dt>
      <dd>The rating system on the right hand side of every game's info is there to provide an over all score <u>out of 100</u> of how the community feels about that game. It is determined based on very simple mathematics can you guess what they are?<br /><br /></dd>
      
      <dt>3. What are these charts and what are they there for?</dt>
      <dd>The charts are a simple and graphical way of representing the price as it has been changing along the time coordinate. It gives you a better over all picture of which store has had the highest trade in value for the game and what kind of average trade in values you can expect from a game who may have similar publishers, similar hyper, similar style in the future.<br /><br /></dd>
      
      <dt>4. I see an error in one of the game's information. What should I do?</dt>
      <dd>If you see an error in a game's information page such as incorrect trade in value, title of the game, incorrect logo, or any other incorrect information. Click the edit button on the top right corner to edit the information.<br /></dd>

</div>

<br />Spam and GameTraders Policy<br />

<div class="bodytext">

<dt>1. May I spam the whole site?</dt>
<dd>No you may not, and no you may not spam even a portion of this website. The website keeps a log of everyone who makes a change and to what part of the site. If anything close to spam shows up or you have been flagged by other users for spamming the website. Your account will be immediately terminated. You may refer to our <a href="index.php?action=privacy">Privacy Policy and Terms and Conditions</a> for more information.<br /><br /></dd>

</div>

<br />
<h2 style="color:#96b8f8;">My Question hasn't been answered here!</h2>
No worries! Ask us <a href="index.php?action=feedback">here</a> under Unanswered FAQ!
