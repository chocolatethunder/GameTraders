<?php

							////////////////////////////////
							if (isset($_POST['name_of_the_game']) && $_POST['name_of_the_game'] != "" && empty($_POST['pretty_sure']) ){
								
								$namegame = $_POST['name_of_the_game'];
								
								$gamecheck = mysql_query("SELECT * FROM games WHERE game_name like \"%".$namegame."%\";") or die ("Error connecting to database");
								$numba = mysql_num_rows($gamecheck);				
								
								if ($numba > 0) {
									
									$err_msg .= "We may have your game in our database:<br />";
									
									$err_msg .= "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style =\"margin-top:5px;\">
												  <tr>
													<td><img src=\"images/err_c_topleft.png\" width=\"4\" height=\"4\" /></td>
													<td width=\"100%\" bgcolor=\"#fbc580\"></td>
													<td><img src=\"images/err_c_topright.png\" width=\"4\" height=\"4\" /></td>
												  </tr>
												  <tr>
													<td bgcolor=\"#fbc580\">&nbsp;</td>
													<td bgcolor=\"#fbc580\">";
									
									$err_msg .= "<div style = \"float:right;\"><input type=\"checkbox\" name=\"pretty_sure\" value=\"1\" />&nbsp;No, I am 100% positive this is genuine!&nbsp;</div>";
									
									for ($l=1; $l <= $numba; $l++) {	
									
										$getgameid = mysql_fetch_array($gamecheck);
										$err_msg .= "&nbsp;<a href = \"game.php?gameid=".$getgameid['id']."\" style=\"color:#900900\" target=\"_blank\" >".$getgameid['game_name']."</a><br />";
										
									}
				
									$err_msg .= "</td>
												<td bgcolor=\"#fbc580\">&nbsp;</td>
											  </tr>
											  <tr>
												<td><img src=\"images/err_c_bottomleft.png\" width=\"4\" height=\"4\" /></td>
												<td bgcolor=\"#fbc580\"></td>
												<td><img src=\"images/err_c_bottomright.png\" width=\"4\" height=\"4\" /></td>
											  </tr>
											</table><br />";
					
								} 
								
						}
						////////////////////////
						
						
												//$query="INSERT INTO games(game_name,image_url,trailer_url,esrb,consoles) VALUES('{$nameofgame}','{$imageurl}','{$videourl}','{$esrbrating}','{$console}');";
//						
//						if (mysql_query($query)){
//							
//							$query2="SELECT id FROM games WHERE game_name = '".$nameofgame."';";
//							
//							if (mysql_query($query2)){
//								
//								$game_id = mysql_fetch_array(mysql_query($query2));
//								
//								mysql_query("INSERT INTO polls(gameID,lik) VALUES(".$game_id['id'].",1);");
//								
//								$success = 1;
//								unset($_SESSION['allgood']);
//								
//							} else {
//								
//								$error = "We have an error";
//							}
//						} else {
//							
//							$error = "We have an error";
//						}	



///////////////////////////////////////////////////////////////////////////////////////////

// if pretty sure is NOT checked AND Session var of all good is not the same as the current game title
						if ( !(isset($_POST['pretty_sure'])) && $_SESSION['allgood'] != $nameofgame) {
							
							// explode the names
							$exploded_keywords = explode(" ", trim($nameofgame));
							$total_keywords = count($exploded_keywords)-1;
							
							// start making the search query
							$sql_search_query = "SELECT * FROM games WHERE game_name like ";
										
										// loop here
										
										foreach ($exploded_keywords as $keyword) {									
												$kw++;
												$sql_search_query .= "'%".$keyword."%' ";
												
												if ($kw <= $total_keywords) {
													$sql_search_query .= "OR game_name like ";
												}
												
										}
								
							// end making the search query 
							$sql_search_query .=";";
							
							// process the search query
							$gamecheck = mysql_query($sql_search_query) or die ("Error connecting to database");
							$numba = mysql_num_rows($gamecheck);									
									
									// if the search query comes back with results then show the user suggestions
									if (isset($numba) && $numba > 0) {
										
										$err_msg .= "We may have your game:<br />";
								
										$err_msg .= "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style =\"margin-top:5px;\">
														<tr>
														  <td><img src=\"images/err_c_topleft.png\" width=\"4\" height=\"4\" /></td>
														  <td width=\"100%\" bgcolor=\"#fbc580\"></td>
														  <td><img src=\"images/err_c_topright.png\" width=\"4\" height=\"4\" /></td>
														</tr>
														<tr>
														  <td bgcolor=\"#fbc580\">&nbsp;</td>
														  <td bgcolor=\"#fbc580\">";
														  
										$err_msg .= "<div style = \"float:right;\"><input type=\"checkbox\" name=\"pretty_sure\" value=\"1\" />&nbsp;No, I am 100% positive this is genuine!&nbsp;</div>";	
										
										// loop to display all the search results
										for ($l=1; $l <= $numba; $l++) {										
											$getgameid = mysql_fetch_array($gamecheck);
											$err_msg .= "&nbsp;<a href = \"game.php?gameid=".$getgameid['id']."\" style=\"color:#900900\" target=\"_blank\" >".$getgameid['game_name']."</a><br />";
											
										}
										
										$err_msg .= "</td>
											<td bgcolor=\"#fbc580\">&nbsp;</td>
										  </tr>
										  <tr>
											<td><img src=\"images/err_c_bottomleft.png\" width=\"4\" height=\"4\" /></td>
											<td bgcolor=\"#fbc580\"></td>
											<td><img src=\"images/err_c_bottomright.png\" width=\"4\" height=\"4\" /></td>
										  </tr>
										</table><br />";
										
										// set this session var so that above query doesn't happen again IF this session var remains the same AND pretty_sure IS CHECKED.
										//if (isset($_POST['pretty_sure']) ) {
											$_SESSION['allgood'] = $nameofgame;	
											$err_msg .= "<br/> HI!";
										//}
										
										
										
										$suggestion_var = 1;						
									
							}
							

						}

								
?>