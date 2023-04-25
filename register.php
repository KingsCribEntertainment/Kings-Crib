<?php 
?>
<h3>Register username</h3>
<form action="" id="registrerBrukerSkjema" name="registrerBrukerSkjema" method="post">
 Username <input name="username" type="text" id="username" required> <br />
 Password <input name="password" type="text" id="password" required> <br />
 <input type="submit" name="registrerBrukerKnapp" value="Registrer bruker">
 <input type="reset" name="nullstill" id="nullstill" value="Nullstill"> <br />
</form>
<?php
 if (isset($_POST ["registrerBrukerKnapp"]))
 {
 include("db-tilkobling.php");
 $username=$_POST ["username"];
 $password=$_POST["password"];
 if (!$username || !$password)
 {
 print ("Brukernavn og passord m&aring; fylles ut <br />");
 }
 else
 {
 $sqlSetning="SELECT * FROM user WHERE username ='$username';";
 $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
 if (mysqli_num_rows($sqlResultat)!=0) /* brukernavnet er registrert fra før */
 {
 print ("Brukernavnet er registrert fra f&oslash;r <br />");
 }
 else
 {
 $sqlSetning="INSERT INTO user VALUES('$username','$password');";
 mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; registrere data i databasen");
 print ("F&oslash; lgende data er n&aring; registrert: <br /> ");
 print ("Username: $username <br /> Password: $password <br /> <br />");
 print ("<a href='innlogging.php'>G&aring; til innloggingsside </a>");
 }
 }
 }
?>