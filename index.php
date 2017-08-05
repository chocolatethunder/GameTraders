<?php
	
	// intruision detection system
	///////////////////////////////
	set_include_path(
	get_include_path()
	. PATH_SEPARATOR
	. 'includes'
	);
	
	require_once 'includes/IDS/Init.php';
	$request = array(
	  'GET' => $_GET,
	  'COOKIE' => $_COOKIE
	);
	$init = IDS_Init::init('includes/IDS/Config/Config.ini');
	$ids = new IDS_Monitor($request, $init);
	$result = $ids->run();
	
	if (!$result->isEmpty()) {
		header("Location: 404.php");
		die();
	}
	////////////////////////////////
	
	require_once("includes/connection.php");	
	require_once("includes/functions.php");
	
	//redirection for mobile devices
	mobileredirect();
	
	///////////////////////////////////////
	session_set_save_handler('_open','_close','_read','_write','_destroy','_clean');
	
	session_start();	
	
	if (!isset($_SESSION['initiated']))
	{
		session_regenerate_id();
		$_SESSION['initiated'] = true;
	}
	
	if ($_SESSION['logged'] == true) {
		check_session();
	} elseif (isset($_COOKIE['hash']) && isset($_COOKIE['user'])) {		
		check_cookie();		
	}
	
	if ($_SESSION['userid'] == 0 || $_SESSION['username'] == "" || $_SESSION['logged'] == false) {
		default_session();
	}	
	
	//////////////////////////////////////
	
	// global variables //
	$validchars = "/^[A-Za-z0-9_-]+$/";
	$validchars2 = "/^[A-Za-z0-9\(\) \.\:\'-]+$/";
	$antihackey = randomKey(7);
	$_SESSION['antihackey'] = $antihackey;
	//////////////////////
	
	$check_page = array();

	switch ($_GET['action'])
	{
		case 'search':
		
		case 'addgame':
		case 'list':
		case 'game':
		case 'learnmore':
		case 'edit':
		case 'viewprofile':
		
		case 'newuser':
		case 'activate':
		case 'account':
		case 'logout':
		case 'login':
		
		case 'bugreport':
		case 'feedback':
		case 'privacypp':
		case 'privacytou':
		case 'privacytou#tou':
		case 'sitemap':
			$check_page['page'] = urldecode(htmlentities($_GET['action']));
		break;
	}
	
	// checks!
	switch ($check_page['page']) {
		
		case "game":
		// check if gameid exists
		if (isset($_GET['gameid']) && $_GET['gameid'] != "" && is_numeric($_GET['gameid']) == true ) {
			$id = $_GET['gameid'];
			
			//check if gameid exists in the database
			$query = mysql_query("SELECT * FROM games WHERE id = ".mysql_clean($id).";") or die ("Error connecting to database");
			$check_query = mysql_num_rows($query);
	
			if ($check_query != 1) {
				goto("404.php");
			} else {				
				$include_game = 1;
			}
			break;

		} else {
			goto("404.php");
		}
		break;
		
		//check if gameid exits
		case "edit":		
		if ($_SESSION['userid'] == 0 || $_SESSION['username'] == "" || $_SESSION['logged'] == false) {
			default_session();
			$_SESSION['login_err'] = "<b>Error: </b>You must login to <b>edit</b> this game! <br/>";
			goto("?action=login");
		} else {
			if (isset($_GET['gameid']) && $_GET['gameid'] != "" && is_numeric($_GET['gameid']) ) {
				$id = $_GET['gameid'];
				
				//check if gameid exists in the database
				$query = mysql_query("SELECT * FROM games WHERE id =".mysql_clean($id).";") or die ("Error connecting to database");
				$check_query = mysql_num_rows($query);
				
				if ($check_query != 1) {
					goto("404.php");
				} else {				
					$edit_allow = 1;
				}
				break;			
				
			} else {
				goto("404.php");
			}
		}			
		break;
		
		//check if uid exits
		case "viewprofile":		
		  if (isset($_GET['uid']) && $_GET['uid'] != "" && is_numeric($_GET['uid']) ) {
			  $uid = htmlspecialchars($_GET['uid']);
			  
			  //check if gameid exists in the database
			  $query = mysql_query("SELECT id FROM users WHERE id =".mysql_clean($uid).";") or die ("Error connecting to database");
			  $check_query = mysql_num_rows($query);
			  
			  if ($check_query != 1) {
				  goto("404.php");
			  } else {				
				  $viewprofile_allow = 1;
			  }
			  break;			
			  
		  } else {
			  goto("404.php");
		  }			
		break;
		
		//login
		case "login":
		if ($_SESSION['userid'] == 0 || $_SESSION['username'] == "" || $_SESSION['logged'] == false) {
			login_user();
			if ($loginsuccess == 1) {
				goto("index.php?action=account");
			}
		}		
		break;
		
		//logout
		case "logout":
		default_session();
		session_destroy();
		setcookie('hash', $cookie, time()-604800);
		setcookie('user', $username, time()-604800);
		break;
		
		case "addgame":
		if ($_SESSION['userid'] == 0 || $_SESSION['username'] == "" || $_SESSION['logged'] == false) {
		default_session();
		$_SESSION['login_err'] = "<b>Error: </b>You must login to <b>add</b> a game! <br/>";
		goto("?action=login");
		} else {
			$addgame_allow = 1;
		}
		break;
		
		case "account":
		if ($_SESSION['userid'] == 0 || $_SESSION['username'] == "" || $_SESSION['logged'] == false) {
		default_session();
		goto("?action=login");
		} else {
			$account_allow = 1;
		}
		break;
		
		case "newuser":
		if ($_SESSION['userid'] != 0 || $_SESSION['username'] != "" || $_SESSION['logged'] == true) {
		goto("?action=account");
		} else {
			$newuser_allow = 1;
		}
		break;
		
		case "activate";
		if ($_SESSION['userid'] == 0 && $_SESSION['username'] == "" && $_SESSION['logged'] == false && isset($_GET['key']) && $_GET['key'] != "" && strlen($_GET['key']) > 30 && strlen($_GET['key']) < 55 ) {
			$activate_allow = 1;
		} else {
			goto("404.php");
		}
		break;
	
	}
	
	include ("includes/header.php");	
	
	//include pages
	switch ($check_page['page']) {
		
		case "search":
		include ("pages/search.php");
		break;		
		
		case "addgame":
			if (isset($addgame_allow) && $addgame_allow == 1) {
				include ("pages/addgame.php");
				$addgame_allow = 0;
			}
		break;
		
		case "list":
		include ("pages/list.php");
		break;
		
		case "game":
			if (isset($include_game) && $include_game == 1) {
				include ("pages/game.php");
			}
		break;
		
		case "learnmore":
		include ("pages/learnmore.php");
		break;
		
		case "edit":
			if (isset($edit_allow) && $edit_allow == 1) {
				include ("pages/edit.php");
				$edit_allow = 0;
			}
		break;
		
		case "viewprofile":
			if (isset($viewprofile_allow) && $viewprofile_allow == 1) {
				include ("pages/viewprofile.php");
				$viewprofile_allow = 0;
			}
		break;		
		
		case "newuser":
		include ("pages/newuser.php");
		break;	
		
		case "account":
			if (isset($account_allow) && $account_allow == 1) {
				include ("pages/account.php");
				$account_allow = 0;
			}
		break;
				
		case "logout":
		include ("pages/logout.php");
		break;
		
		case "login":
		include ("pages/login.php");
		break;
		
		
		case "bugreport":
		include ("pages/bugreport.php");
		break;
		
		case "feedback":
		include ("pages/feedback.php");
		break;
				
		case "newuser":
			if (isset($newuser_allow) && $newuser_allow == 1) {
				include ("pages/newuser.php");
				$newuser_allow = 0;
			}
		break;
		
		case "privacypp":
		include ("pages/privacy.php");
		break;

		case "privacytou":
		include ("pages/privacy.php");
		break;
		
		case "sitemap":
		include ("pages/sitemap.php");
		break;
		
		case "activate":
		if (isset($activate_allow) && $activate_allow == 1) {
				include ("pages/activate.php");
				$activate_allow = 0;
			}
		break;
		
		default:
		include ("pages/home.php");
		break;
	}
	
	include ("includes/footer.php");
	
	//close database connection
	mysql_close($connect);
?>