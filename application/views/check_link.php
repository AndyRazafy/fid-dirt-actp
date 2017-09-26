<?php
	if(!isset($_SESSION["user_id"]))
	{
		redirect("Base_Controller");
	}