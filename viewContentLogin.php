<?php
class viewContentLogin{	
	function viewContentLogin(){
		
	}
	
	function createView($contentModelLogin)
	{
		echo '
		<div id="login" class="modal">
			  <form id="form-login" class="modal-content animate" name="form">
				<div class="imgcontainer">
				  <label id="login-title"><h2>'.$contentModelLogin->titleSection.'<h2></label>
				</div>

				<div class="container">
				  <label><b>'.$contentModelLogin->userName.'</b></label>
				  <input id ="userName"type="text" placeholder="'.$contentModelLogin->placeholderUserName.'" name="uname" required>

				  <label><b>'.$contentModelLogin->password.'</b></label>
				  <input id="passwordA" type="password" placeholder="'.$contentModelLogin->placeHolderpass.'" name="psw" required>

				  <button id="loginbtn" type="button" onclick="login();">'.$contentModelLogin->logIn.'</button>
				</div>
			  </form>
		</div>
		
		';
	
	}
	
}