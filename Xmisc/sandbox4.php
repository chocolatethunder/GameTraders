<?php

include ("../includes/functions.php");

//$key = "119efe652eaae4c82c8a7010d9d4d725";
//$new_user = "craeyonlol";
//
//$akey = randomKey(16).base64_encode($new_user).randomKey(16);
//
//echo strlen($key);
//echo "<br>";
//echo strlen($akey);



////----------------------------------------------------------------- NEWUSER.PHP <starts> --------------------------------------------------------------------------------------
//
//function isSet(variable) {
//	return( typeof(variable) != 'undefined' );
//}
//
//function errorformat(field_name) {
//		document.newuserForm.elements[field_name].style.background = "yellow";
//	 	document.newuserForm.elements[field_name].style.border = "2px solid gray";	
//}
//
//function reformat(field_name) {
//		document.newuserForm.elements[field_name].style.background = "white";
//		document.newuserForm.elements[field_name].style.border = "1px solid #999";
//		document.newuserForm.elements[field_name].style.padding = "1px";
//		document.newuserForm.elements[field_name].style.height = "18px";
//}
//
//function clearfield(){
//		var fields = Array("user","pass","pass_confirm","email","email_confirm");
//		
//		for (y=0; y<=4; y++) {
//			document.newuserForm.elements[fields[y]].style.background = "white";
//			document.newuserForm.elements[fields[y]].style.border = "1px solid #999";
//			document.newuserForm.elements[fields[y]].style.padding = "1px";
//			document.newuserForm.elements[fields[y]].style.height = "18px";
//		}		
//		document.getElementById("errorlnk").innerHTML = "";
//}
//
//function newuserForm_validate() {
//	check = true;	
//	document.getElementById("errorlnk").innerHTML = "";
//	var errorplus = document.getElementById("errorlnk").innerHTML;
//	invChars = "!@#$%^&*()+=-[]\\\';,./{}|\":<>?"	;
//	len_chk_usr = document.newuserForm.user.value.length;
//	len_chk_pass = document.newuserForm.pass.value.length;
//	len_chk_pass_c = document.newuserForm.pass_confirm.value.length;
//	
//	// check if username exists
//	
//	if (document.newuserForm.user.value == "") {
//		document.getElementById("errorlnk").innerHTML = "<b>Error:</b> You must enter a username!<br>";
//		errorformat("user");
//		check = false;
//	} else {
//		var user = document.newuserForm.user.value;
//		reformat("user");
//		
//		// checks for username length
//		
//		if (len_chk_usr > 10) {
//			document.getElementById("errorlnk").innerHTML = "<b>Error:</b> Username is too long!<br>";
//			errorformat("user");
//			check = false;
//		} else if (len_chk_usr < 4) {
//			document.getElementById("errorlnk").innerHTML = "<b>Error:</b> Username is too short!<br>";
//			errorformat("user");
//			check = false;
//		} else {			
//		
//			// checks for special characters
//		
//			for (var i = 0; i < document.newuserForm.user.value.length; i++) {
//				if (invChars.indexOf(document.newuserForm.user.value.charAt(i)) != -1) {
//					document.getElementById("errorlnk").innerHTML = errorplus+"<b>Error:</b> Your username contains special characters!<br>";
//					errorformat("user");
//					check = false ;
//				} else {
//					reformat("user");
//				}
//			}
//		}
//	}
//	
//	var errorplus = document.getElementById("errorlnk").innerHTML;
//	
//	//check if password exists
//	
//	if (document.newuserForm.pass.value == "") {
//		document.getElementById("errorlnk").innerHTML = errorplus+"<b>Error:</b> You must enter a password!<br>";
//		errorformat("pass");
//		errorformat("pass_confirm");
//		check = false;
//	} else {
//		var pass = document.newuserForm.pass.value;
//		reformat("pass");
//		
//		// checks for username length
//		
//		if (len_chk_pass > 10 || len_chk_pass_c >10) {
//			document.getElementById("errorlnk").innerHTML = "<b>Error:</b> Password is too long!<br>";
//			errorformat("pass");
//			errorformat("pass_confirm");
//			check = false;
//		} else if (len_chk_pass < 4 || len_chk_pass_c < 4) {
//			document.getElementById("errorlnk").innerHTML = "<b>Error:</b> Password is too short!<br>";
//			errorformat("pass");
//			errorformat("pass_confirm");
//			check = false;
//		} else {
//		
//			// check if password re-enter exists
//			
//			if (document.newuserForm.pass_confirm.value == "") {
//				document.getElementById("errorlnk").innerHTML = errorplus+"<b>Error:</b> You must re-enter your password!<br>";
//				errorformat("pass_confirm");
//				check = false;
//			} else {
//				var pass_c = document.newuserForm.pass_confirm.value;
//				reformat("pass_confirm");
//				
//
//				// check if passwords match
//	
//				if (isSet(pass) && isSet(pass_c) && pass != pass_c) {
//					document.getElementById("errorlnk").innerHTML = errorplus+"<b>Error:</b> Your passwords don't match!<br>";
//					errorformat("pass");
//					errorformat("pass_confirm");
//					check = false;
//				} else {
//								
//					// checks for special characters
//		
//					for (var i = 0; i < document.newuserForm.pass.value.length; i++) {
//						if (invChars.indexOf(document.newuserForm.pass.value.charAt(i)) != -1 && invChars.indexOf(document.newuserForm.pass_confirm.value.charAt(i)) != -1) {
//							document.getElementById("errorlnk").innerHTML = errorplus+"<b>Error:</b> Your password contains special characters!<br>";
//							errorformat("pass");
//							errorformat("pass_confirm");
//							check = false ;
//						} else {
//							reformat("pass");
//							reformat("pass_confirm");
//						}
//					}
//				}
//			}
//		}
//	}
//	
//	var errorplus = document.getElementById("errorlnk").innerHTML;
//	
//	// check if email address exists
//	
//	if (document.newuserForm.email.value == "") {
//		document.getElementById("errorlnk").innerHTML = errorplus+"<b>Error:</b> You must enter an email address!<br>";
//		errorformat("email");
//		errorformat("email_confirm");
//		check = false;
//	} else {
//		var email = document.newuserForm.email.value;
//		reformat("email");
//		
//		// check if email address is re-entered
//	
//		if (document.newuserForm.email_confirm.value == "") {
//			document.getElementById("errorlnk").innerHTML = errorplus+"<b>Error:</b> You must re-enter your email address!<br>";
//			errorformat("email_confirm");	
//			check = false;
//		} else {
//			var email_c = document.newuserForm.email_confirm.value;
//			reformat("email_confirm");
//			
//			// check if email addresses match
//	
//			if (isSet(email) && isSet(email_c) && email != email_c) {
//				document.getElementById("errorlnk").innerHTML = errorplus+"<b>Error:</b> Your email address don't match!<br>";
//				errorformat("email");
//				errorformat("email_confirm");
//				check = false;
//			} else {
//				reformat("email");
//				reformat("email_confirm");
//			}
//		}
//	}
//	
//	var errorplus = document.getElementById("errorlnk").innerHTML; 
// 	document.getElementById("errorlnk").innerHTML = errorplus+"<br>";
//	
//	return check;
//}

//----------------------------------------------------------------- NEWUSER.PHP <ends> ----------------------------------------------------------------------------------------


// http://upload.wikimedia.org/wikipedia/en/thumb/8/83/Fallout_3_cover_art.PNG/256px-Fallout_3_cover_art.PNG

// http://i2.ytimg.com/vi/EiLMaeizgwM/default.jpg



//// define the filename extensions you're allowing 
//define('ALLOWED_FILENAMES', 'jpg|jpeg|gif|png|PNG'); 
//// define a directory the webserver can write to 
//define('IMAGE_DIR', '../misc/test'); 
//
//// check against a regexp for an actual http url and for a valid filename, also extract that filename using a submatch (see PHP's regexp docs to understand this) 
//if(!preg_match('#^http://upload.wikimedia.org/.*(\.('.ALLOWED_FILENAMES.'))$#', $_GET['img_url'], $m)) { 
//  die('Invalid url given');
//} 
//
////// try getting the image 
////if(!file_get_contents($_GET['img_url'])) { 
////  die('Getting that file failed'); 
////} 
////
////if(!$img = file_get_contents($_GET['img_url'])) { 
////  die('Getting that file failed'); 
////} 
//
//// try writing the file with the original filename -- note that this will overwrite any existing filename in the same directory -- that's up to you to check for
//if(!$f = fopen($_GET['img_url'], 'w')) {
//  die('Opening file for writing failed');
//}
//
//if (fwrite($f, $img) === FALSE) {
//  die('Could not write to the file');
//}
//
//fclose($f);



//$fn = fopen( $_GET['img_url'],"w");
//while(!feof($f)){
//$fc.=fgets($f);
//};
//fwrite( $fn,$fc); 

//$lol = str_replace("http://","",$_GET['img_url']);
//
//$up = @fsockopen($lol, 80, $errno, $errstr, 30);  
//
//if ($up) {
//	echo "success";
//} else {
//	echo "failed";
//}

//function writefile($nameofgame){
//	// define the filename extensions you're allowing
//	define('ALLOWED_FILENAMES', 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG');
//	// define a directory the webserver can write to
//	define('IMAGE_DIR', 'test');
//	
//	// check against a regexp for an actual http url and for a valid filename, also extract that filename using a submatch (see PHP's regexp docs to understand this)
//	if(!preg_match('#^http://upload.wikimedia.org/.*(\.('.ALLOWED_FILENAMES.'))$#', $_POST['image_url'], $m)) {
//	  die('Invalid url given');
//	}
//	
//	// try getting the image
//	if(!$img = file_get_contents($_POST['image_url']) {
//	  die('Getting that file failed');
//	}
//	
//	// try writing the file with the original filename -- note that this will overwrite any existing filename in the same directory -- that's up to you to check for
//	if(!$f = fopen(IMAGE_DIR.'/'.$nameofgame.$m[1], 'w')) {
//	  die('Opening file for writing failed');
//	}
//	
//	if (fwrite($f, $img) === FALSE) {
//	  die('Could not write to the file');
//	}
//	
//	fclose($f);  
//	
//	$sourcedir = IMAGE_DIR."/".$nameofgame.$m[1];
//	
//	return $sourcedir;
//}
//
//function is_url_valid($url){
//	$ch = curl_init();
//	curl_setopt($ch, CURLOPT_URL, $url);
//	curl_setopt($ch, CURLOPT_HEADER, true);
//	curl_setopt($ch, CURLOPT_NOBODY, true);
//	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//	curl_setopt($ch, CURLOPT_MAXREDIRS, 10); //follow up to 10 redirections - avoids loops
//	$data = curl_exec($ch);
//	curl_close($ch);
//	preg_match_all("/HTTP\/1\.[1|0]\s(\d{3})/",$data,$matches);
//	$code = end($matches[1]);
//	if(!$data) {
//	  return false;
//	} else {
//	  if($code==200) {
//		return true;
//	  } elseif($code==404) {
//		 return false;
//	  }
//	}
//}
//
//echo writefile("Fallout3");


$inval_chars = array(":", "+", " ", "/", "'", ",");
$prenameofgame = str_replace($inval_chars, "_", "Halo 3: Collector's Edition");

echo $prenameofgame;

<!--<div style="float:right; margin-right:20px;">
        <script type="text/javascript"><!--
		google_ad_client = "pub-4844596130995747";
		/* 120x600, created 1/18/09 */
		google_ad_slot = "8918180310";
		google_ad_width = 120;
		google_ad_height = 600;
		//-->
		<!--</script>
		<script type="text/javascript"
		src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
</div>-->

?>

