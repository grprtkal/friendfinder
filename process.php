<?php 
include_once("connection.php"); 
session_start(); 

class Process 
{
	function __construct()
	{
		$this->connection = new Database();  

		if(isset($_POST['which_form']) && $_POST['which_form'] == "login")
		{
			$this->login();  
		}

		elseif(isset($_POST['which_form']) && $_POST['which_form'] == "registration")
		{
			$this->registration(); 
		}

		elseif(isset($_POST['which_form']) && $_POST['which_form'] == "add_as_friend")
		{
			$this->insertFriends();  
			$this->displayFriends(); 
			// var_dump($_POST);
			// var_dump($_SESSION);
		}
		else
		{
			$this->logout();
		}
	}


	function registration()
	{
			$errormessages = array(); 
			$users = array(); 
		
			//always interpret what is in the () first, then add the ! (if all the conditions are not true then echo an error)

			if(!(isset($_POST['firstname']) && is_string($_POST['firstname']) && strlen($_POST['firstname'])>0))
			{
				$errormessages[] = "First name is not valid. <br />"; 
	
			}

			if(!(isset($_POST['lastname']) && is_string($_POST['lastname']) && strlen($_POST['lastname'])>0))
			{
				$errormessages[] = "Last name is not valid. <br />";
		
			}

			if(!(isset($_POST['regemail']) && filter_var($_POST['regemail'], FILTER_VALIDATE_EMAIL)))
			{
				$errormessages[] = "Email is not valid. <br />";

			}

			if(!(isset($_POST['password']) && strlen($_POST['password']) > 6))
			{
				$errormessages[] = "Password must be more than 6 characters. <br />"; 

			}
			if(count($errormessages) > 0)
			{
				$_SESSION['errormessages'] = $errormessages;
				header("location: index.php"); 
			}
			else
			{
				//if no errors in inputting information for registration, check if email is already taken 

				$query = "SELECT email FROM users WHERE email = '{$_POST['regemail']}'"; 
				$emails = $this->connection->fetchAll($query); 

				if (count($emails) > 0 )
				{
					$errormessages[] = "Email is already taken. Please try another email."; 
					$_SESSION['errormessages'] = $errormessages; 
					header("location: index.php");
				}
				else
				{	
					$password = md5($_POST['password']);
					//Insert User Registration in Database
					$query = "INSERT users(first_name, last_name, email, password, created_at, updated_at) VALUES ('{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['regemail']}', '{$password}', NOW(), NOW())"; 
					mysql_query($query); 

					// var_dump($query); 
					$_SESSION['regsuccessmessages'] = "<p class = friend>" . "Welcome to Friend Finder!" . "</p>";  
					$this->displayFriends();
					header("location: friends.php"); 
				}
			}
	}

	function login()
	{
			$loginmessages = array(); 
			$successmessages = array(); 

			if(!(isset($_POST['loginemail']) && filter_var($_POST['loginemail'], FILTER_VALIDATE_EMAIL)))
			{
				$loginmessages[] = "Invalid email. Try again. <br />";
			}
			if(!(isset($_POST['logpassword']) && strlen($_POST['logpassword']) > 6))
			{
				$loginmessages[] = "Invalid password. Try again. <br />"; 
			}
			else
			{
				$password = md5($_POST['logpassword']);
				$query = "SELECT * FROM users WHERE email = '{$_POST['loginemail']}' AND password = '{$password}'";
				$users = $this->connection->fetchRecord($query); 


				if(count($users > 0)) 
				{
					//if user information in SQL matches user's login email and password, store their information (i.e. first name, last name, email) in a $_SESSION  
					//which we can use later on other pages (i.e. Welcome Gurpreet!)
					$_SESSION['logged_in'] = true;
					$_SESSION['user']['id'] = $users['id'];
					$_SESSION['user']['firstname'] = $users['first_name']; 
					$_SESSION['user']['lastname'] = $users['last_name']; 
					$_SESSION['user']['regemail'] = $users['email']; 
					$successmessages []= "<p class = friend>" . "Welcome," . " " . $users['first_name'] . "!" . "</p>"; 
				}
				else
				{
					$loginmessages[] = "Invalid login information."; 
				}

			}
			if(count($loginmessages) > 0)
			{
				$_SESSION['loginmessages'] = $loginmessages;
				header("location: index.php");
			}
			else
			{
				$_SESSION['successmessages'] = $successmessages; 
				$this->displayUsers(); 
				$this->displayFriends(); 
				header("location: friends.php");

			}
	}

	function logout()
	{
		session_destroy();
		echo "logged out";
	}

	function displayUsers()
	{
			$query = "SELECT id, first_name, last_name, email FROM users"; 
			$users = $this->connection->fetchAll($query);
			  
			$_SESSION['users'] = $users; 
			//Grab data regarding user info data on process page; echo out data on the friends.php page 
	}

	function insertFriends()
	{
		$query = "INSERT INTO friendsidentities(user_id, friend_id) VALUES ('{$_SESSION['user']['id']}', '{$_POST['user_id']}')"; 
		$queryreverse = "INSERT INTO friendsidentities(user_id, friend_id) VALUES ('{$_POST['user_id']}', '{$_SESSION['user']['id']}')"; 
		header("location: friends.php"); 
		mysql_query($query); 
		mysql_query($queryreverse); 
		// var_dump($query); 
	}

	function displayFriends()
	{
		$queryusers = "SELECT first_name, last_name, email, id FROM users"; 
		$queryfriendsid = "SELECT * FROM friendsidentities WHERE user_id = '{$_SESSION['user']['id']}'";

		$users = $this->connection->fetchAll($queryusers); 
		$friends = $this->connection->fetchAll($queryfriendsid); 


		$_SESSION['users'] = $users; 
		$_SESSION['friends'] = $friends; 
		// var_dump($friends);
	}
 }

 $process = new Process; 

 ?>
