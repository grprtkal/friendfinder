<?php
session_start(); 
include_once("connection.php"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Friend Finder</title>
	<link rel="stylesheet" type="text/css" href="OOPadvanced.css">
</head>
<body>
<div id = "wrapper">
	<?php 
		// Registration Validation - successful
			if(isset($_SESSION['regsuccessmessages']))
			{
				echo ($_SESSION['regsuccessmessages']); 
			}

		// Login Validation - successful
			if(isset($_SESSION['successmessages']))
			{
				foreach($_SESSION['successmessages'] as $successmessage)
				{
					echo $successmessage; 
					unset($_SESSION['successmessages']); 
				}
			}
	?>

	<h3 id = "friendstitle">List of Friends</h3>
	<!-- Display Friends Information  -->
	<div id = "friendstable"> 
		<table>
				<thead>
					<tr>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
					</tr>
				</thead> 
		<!-- </table> -->
			<tbody>
			<?php 
				if(isset($_SESSION['friends']) && isset($_SESSION['users']))
				{
					foreach ($_SESSION['users'] as $user)
					{
						foreach ($_SESSION['friends'] as $friend)
						{
							if ($user['id'] == $friend['friend_id'])
							{	

								echo "<tr>" . 
									"<td>" . $user['first_name'] . "</td>" .
									"<td>" . $user['last_name'] . "</td>" . 
									"<td>" . $user['email'] . "</td>" . 
									"</tr>"; 
							}
						}
					}
				} 
			?>
			</tbody> 
		</table>
	</div>

	<h3 id = "listheader">List of All Users Subscribed to Friend Finder</h3> 
	<div id = "table"> 
		<table>
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 	
					if(isset($_SESSION['friends']) && isset($_SESSION['users']))
					{
						// Display User Information with default as action as add-as-friend-button, otherwise action should be 'friends' or 'it's me'					foreach ($_SESSION['users'] as $user)
						
							foreach ($_SESSION['users'] as $user)
							{
								$action = "<form id = 'form' action='process.php' method='post'>" .
										 		"<input type='hidden' name='which_form' value='add_as_friend'>" .
												"<input type='hidden' name='user_id' value='".$user['id']."'>" . 
												 "<input type='submit' value='Add as a Friend'>" . 
										  "</form>"; 

								foreach ($_SESSION['friends'] as $friend)
								{

										if ($user['id'] == $friend['friend_id'])
										{				
											$action = "<p>friends</p>"; 
										}
								
										elseif ($user['id'] == $_SESSION['user']['id'])
										{
											 $action = "It's me!"; 

										}
								}
					
										echo	"<tr>" .
												"<td>" . $user['first_name'] . "</td>" .
												"<td>" . $user['last_name'] . "</td>" . 
												"<td>" . $user['email'] . "</td>" .
												"<td>" . 
													$action .
											    "</td>" .
											    "</tr>";
							}
					}
				?>
			</tbody> 
		</table> 
	</div>
</div> <!-- end of wrapper -->
</body> 
</html> 
