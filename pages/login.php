<?php

// page protection
if (!isset($antihackey) || $antihackey != $_SESSION['antihackey']) {
	header("Location: ../404.php");
	unset($antihackey);
	unset($_SESSION['antihackey']);
}

?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="images/c_topleft.png" width="4" height="4" /></td>
    <td width="100%" bgcolor="#e2eaf9"></td>
    <td><img src="images/c_topright.png" width="4" height="4" /></td>
  </tr>
  <tr>
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td bgcolor="#e2eaf9"><span class="headdings">Login, cause you want to</span></td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="4" height="4" /></td>
  </tr>
  <?php    if(isset($_SESSION['login_err']) || isset($err_msg)){ ?>
  <tr>
  	<td></td>
    <td>
    	<table width="250" border="0" cellpadding="0" cellspacing="0">
           <tr>
            <td colspan="3" background="images/subheadshadow.png" height="5"></td>
           </tr>
          <tr>
            <td bgcolor="#fbc580">&nbsp;</td>
            <td width="100%" bgcolor="#fbc580"><div class="subheadder"><?php echo $_SESSION['login_err'];
																			 unset($_SESSION['login_err']);
																			 echo $err_msg;
																			 unset($err_msg); ?></div></td>
            <td bgcolor="#fbc580">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="images/err_c_bottomleft.png" width="4" height="4" /></td>
            <td bgcolor="#fbc580"></td>
            <td><img src="images/err_c_bottomright.png" width="4" height="4" /></td>
          </tr>
        </table>    
    </td>
    <td></td>
  </tr>
  <?php } ?>
  
  <?php    if(isset($err_activate)){ ?>
  <tr>
  	<td></td>
    <td align="center">
    	<table width="600" border="0" cellpadding="0" cellspacing="0">
           <tr>
            <td colspan="3" background="images/subheadshadow.png" height="5"></td>
           </tr>
          <tr>
            <td bgcolor="#fbc580">&nbsp;</td>
            <td width="100%" bgcolor="#fbc580">
            
            <div class="report_warning">
            
            <table cellpadding="0" cellspacing="0" border="0">
            	<tr align="left">
                	<td><img src="images/report_logo.png" width="50" height="42" border="0" /></td>
                    <td>&nbsp;&nbsp;</td>
                    <td><b>Error:</b> Your account has not been activated. Activation is required to recieve user privilidges. Please check you email and activate your account from there.</td>
				</tr>
			</table>
            
            </div>
            </td>
            <td bgcolor="#fbc580">&nbsp;</td>
          </tr>
          <tr>
            <td><img src="images/err_c_bottomleft.png" width="4" height="4" /></td>
            <td bgcolor="#fbc580"></td>
            <td><img src="images/err_c_bottomright.png" width="4" height="4" /></td>
          </tr>
        </table>    
    </td>
    <td></td>
  </tr>
  <tr>
  	<td colspan="3">&nbsp;</td>  
  </tr>
  <?php unset($err_activate); } ?>
  
</table><br />

<div id="errorlnk" class="errortext">
</div>


<table border="0" cellpadding="0" cellspacing="0" style="margin-left:auto; margin-right:auto; margin-top:15px; margin-bottom:15px;">
  <tr>
    <td></td>
    <td><img  src="images/login_title.png" width="96" height="26" border="0"  /></td>   
    <td></td>
    <td rowspan="4"><img src="images/or.png" width="151" height="175" border="0"  /></td>
    <td rowspan="4"><a href="index.php?action=newuser"><img src="images/signup.png" width="350" height="175" border="0"  /></a></td>
  </tr>
  <tr>
    <td><img src="images/c_topleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_topright.png" width="4" height="4" /></td>
  </tr>
  <tr>
 	
    <td bgcolor="#e2eaf9">&nbsp;</td>
    <td bgcolor="#e2eaf9">

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>?action=login" method="post" >
        
        <table border="0" cellpadding="5" cellspacing="0" style="margin-left:auto; margin-right:auto; margin:5px;">
        <tr>
            <td><span class="title">Username:</span></td>
            <td><input type="text" name="username" value="<?php if (isset($_POST['username'])) { echo $_POST['username']; } ?>" style="width:150px;" /></td>
            <td><?php if (isset($err_username)) {error();}	?></div></td>
        </tr>
        <tr>
            <td><span class="title">Password:</span></td>
            <td><input type="password" name="password" style="width:150px;" /></td>
            <td><?php if (isset($err_password)) {error();}	?></div></td>
        </tr>    
        <tr>
            <td></td>
            <td><input type="checkbox" name="rememberme" value="Remember Me" /> Remember Me</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;<input type="submit" name="submitlogin" value="Login" class="bodybutn"/></td>
            <td></td>
        </tr>
        
        </table>
        
        <?php 
        $logintoken = md5(uniqid(rand(), true));
        $_SESSION['logintoken'] = $logintoken;
        ?>
        <input type="hidden" name="logintoken" value="<?php echo $logintoken; ?>" />
        
    </form>

	</td>
    <td bgcolor="#e2eaf9">&nbsp;</td>
  </tr>
  <tr>
    <td><img src="images/c_bottomleft.png" width="4" height="4" /></td>
    <td bgcolor="#e2eaf9"></td>
    <td><img src="images/c_bottomright.png" width="4" height="4" /></td>
  </tr>
</table>
