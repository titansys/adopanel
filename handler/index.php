<?php
/**
 * @name AdoPanel
 * @author Titan Systems
 */

if(!isset($_GET["id"]) || strlen($_GET["id"]) < 2):
	header("location: https://github.com/titansys/adopanel");
else:
	$id = md5(str_replace(" ", "", filter_var($_GET["id"], FILTER_SANITIZE_STRING)));

	if($id == md5("connect")):
		if(isset($_POST["unique"], $_POST["url"]) && !empty($_POST["url"]) && !empty($_POST["unique"])):
			$unique = md5(str_replace(" ", "", filter_var($_POST["unique"], FILTER_SANITIZE_STRING)));
			$url = filter_var($_POST["url"], FILTER_SANITIZE_URL);
			file_put_contents("sessions/{$unique}.url", trim($url));
			die("Remote URL saved!");
		else:
			header("location: https://github.com/titansys/adopanel");
		endif;
	else:
		if(!empty($id)):
			if(file_exists("sessions/{$id}.url")):
				$url = file_get_contents("sessions/{$id}.url");

				if(empty($url)):
					die("Remote URL is empty! Please make sure that your ado machine is connected to the internet on boot!");
				else:
					header("location: {$url}");
				endif;
			else:
				die("ID is available, you can use it for your machine!");
			endif;
		else:
			die("ID is available, you can use it for your machine!");
		endif;
	endif;
endif;