<?php
include "config.php";//includ fisierul separat de parola, bd, hostname etc
session_start();//pornesc o sesiune de sql
$con = mysqli_connect($host, $user, $password,$dbname);//string de conectare
if(isset($_POST['but_submit'])){//daca butonul de login e apasat
    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);//adu in variabila uname ce am introdus in textbox cu id txt_uname
    $password = mysqli_real_escape_string($con,$_POST['txt_pswd']);//la fel pt parola
    if ($uname != "" && $password != ""){//daca variabilele sunt diferite de 0
        $sql_query = "select count(*) as cntUser from users where email='".$uname."' and password='".$password."'";// atunci interogheaza tabelul si verifica daca exista o astfel de inregistrare
        $result = mysqli_query($con,$sql_query); //si daca exista, rezultatul adu-l ca si un count in result
        $row = mysqli_fetch_array($result);//salveaza randul
        $count = $row['cntUser'];//ia variabila si pune o in count
        if($count > 0){//daca e >0 inseamna ca exista o inregistrare
            $_SESSION['uname'] = $uname;//variabila va fi ulterior transportata ca sa ne arate userul cu care suntem logati
            header('Location: home.php');//redirectioneaza spre Music Player
        }
		else//else throw error
		{
		echo '<div class="center">';
		echo '<p><h1>Password typed incorrectly</h1></p></div>'; //altfel prompteaza parola incorecta
		}
    }
}
$_SESSION = array();
session_destroy();
session_start();//pornesc o sesiune de sql
if(isset($_POST['but_submit3']))//daca butonul de signup este apasat
{    	
//get variables from input areas and if password verification ( retype form) is equal to setted pasword then show message and insert
        $email =  $_POST['txt_uname3'];//salveaza variabila de email din campul respectiv
        $pass = $_POST['txt_pswd3'];//salveaza parola
		$pass2 = $_POST['txt_pswd4'];//salveaza confirma parola
		$date=date("Y/m/d");//salveaza data
		if($pass == $pass2)//daca parolele se matchuiesc
		{	 	
			$sql = "INSERT INTO users (email,password,creation_date) VALUES ('$email','$pass','$date')"; //iinsereaza in tabela
			if(!(  $email == "" or $password == ""))//daca variabilele de email si parola sunt nevide
			if (mysqli_query($con, $sql)) {//daca a fost executata conexiunea si insertul
			echo '<div class="center">';
			echo '<p><h1>New account has been created successfully </a></h1></p></div>';	//afiseaza mesaj
		} else {//altfel arunca eroare
			echo "Error: " . $sql . ":-" . mysqli_error($con);
		}
		}
		else//altfel arunca eroare
		{
		echo '<div class="center">';
		echo '<p><h1>Password typed incorrectly</h1></p></div>';
		}
     mysqli_close($con);
}
$_SESSION = array();
session_destroy();
?>



<html lang="en" dir="ltr">
  <head>
  <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta charset="utf-8">
    <title>Login & Signup</title>
    <link rel="stylesheet" href="style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">Login</div>
        <div class="title signup">Signup</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form method = "post" action="" class="login">
            <div class="field">
              <input type="text" id="txt_uname" name="txt_uname" placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="The email format is invalid" required>
            </div>
            <div class="field">
              <input type="password" id="txt_pswd" name="txt_pswd" placeholder="Password"  required>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <!-- <button type="submit">Login</button> -->
             <!-- <input type="submit" value="Login"> -->
			  <button type="submit" value="submit" name="but_submit" id="but_submit" class="btn">Sign in</button>
            </div>
			<div align="center">Sign in using your Google account </div>
            <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" align="center"></div>
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
      }
    </script>
			
			
            <div class="signup-link">Not a member? <a href="">Signup now</a></div>
          </form>
          <form method = "post" action="" class="signup">
            
            <div class="field">
              <input type="text"  id="txt_uname3" name="txt_uname3" placeholder="Email Address"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="The email format is invalid" required>
            </div>
            <div class="field">
              <input type="password"  id="txt_pswd3" name="txt_pswd3" placeholder="Password"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>
            <div class="field">
              <input type="password"  id="txt_pswd4" name="txt_pswd4" placeholder="Confirm password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
			  <button type="submit" value="submit" name="but_submit3" id="but_submit3" class="btn">Signup</button>

            </div>
          </form>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="main.js"></script>
    <script type="text/javascript" src="script1.js"></script>
    <script>

      const loginText = document.querySelector(".title-text .login");
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");
      signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
      });
      loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
      });
      signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
      });
    </script>

  </body>
</html>
