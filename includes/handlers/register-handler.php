<?php
function sanitizeFormUsername($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ","",$inputText);
	return $inputText;

}
function sanitizeFormPassword($inputText){
	$inputText = strip_tags($inputText);
	return $inputText;
	}
function sanitizeFormString($inputText){
	$inputText = strip_tags($inputText);
	$inputText = str_replace(" ","",$inputText);
	$inputText = ucfirst(strtolower($inputText));
	return $inputText;
}
if (isset($_POST['SignUpButton'])) {
	//SignUp Button executed
	$Username = sanitizeFormUsername($_POST['Username']);
	$FirstName = sanitizeFormString($_POST['FirstName']);
	$LastName = sanitizeFormString($_POST['LastName']);
    $Email = sanitizeFormString($_POST['Email']);
    $Email2 = sanitizeFormString($_POST['Email2']);
    $SignUpPassword = sanitizeFormPassword($_POST['SignUpPassword']);
    $SignUpPassword2 = sanitizeFormPassword($_POST['SignUpPassword2']);

}



?>


