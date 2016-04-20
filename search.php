<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link href="style4.css" rel="stylesheet"/>
    <script type="text/javascript" source="homepage.js">
    
      function cl(){
        document.getElementById("searchbox").focus();
      }

      function clearText()
      {
        document.getElementById("searchbox").value="";
      }

      function check()
      {
        if(document.getElementById("searchbox").value=="")
          document.getElementById("searchbox").value="Search..";
      }
    </script>
</head>
<body>
<div class="bgimage"></div>
<div class="without">
<?php
  if(isset($_SESSION["logged"]))
?>
<nav>
<a class="left" href=".">Medical Reference System</a>
    <ul>

      <li><a href="home.html">Home</a></li>
      <li><a href="hospital.html">Hospitals</a></li>
      <li><a href="doctor.html">Doctors</a></li>
      <li><a href="disease.html">Disease</a></li>
        
      <?php
        session_start();
          if((!(isset($_SESSION["logged"]))) || ($_SESSION["logged"]!="yes"))
          {
            echo '<li><a href="./sign-up-login-form/">Sign Up</a>
                 <li><a href="./sign-up-login-form/">Log In</a>';
          }
          else   
            echo '<li class="sub"><a href="three.html">'.$_SESSION["name"].'</a>
                    <ul>
                      <li><a class="link" href="two.html">Edit Profile</a></li>
                      <li><a class="link" href="logout.php">Log Out</a></li>
                    </ul>
                  </li>';
      ?>
        
    <li><a href="abtus.html">About us</a></li>            
  </ul>
</nav>

<ul class="hor">
  <li><a class="hor" href="."><img src="icons/home.png" class="icon">Home</a></li>
  <li><a class="hor" href="hospital.html"><image src="icons/hospital.svg" class="icon">Hospital</a></li>
  <li><a class="hor" href="docotr.html" ><image src="icons/doctor.png" class="icon">Doctor</a></li>
  <li><a class="hor" href="disease.html"><image src="icons/disease.png" class="icon">Disease</a></li>
  <li><a class="hor" href="#"><image src="icons/search.png" class="icon"><button class="hor" style="background-color: #333; border: 1px solid #333; font-size: 20px; color:#aaa;" id="searchlink" onclick="cl()">Search</button></a></li>
  <li><a class="hor" href=""><image src="icons/abtus.png" class="icon">About Us</a></li>
</ul>

<div class="ad"><img src="icons/advertise.jpg" style="height: 100%; width: 100%;"></div>

<div class="search" id="srch">
  <form action="search.php" method="post">
  <br />
   <center>
    <input type="text" style="font-size: 20px;"  name="searchbox" id="searchbox" value="Search.." onfocus="clearText()" onblur="check()" />
    <br />
  <p style="font-size: 20px; color: ">What do you want to search ?</p>
    <select name="type" style="font-size: 15px;">
      <option value="none">Don't Know</option>
      <option value="Doctor">Doctor</option>
      <option value="Hospital">Hospital</option>
      <option value="Disease">Disease</option>
    </select> <br /><br />

    <input type="submit" style="font-size: 20px;" name="submit" value="Search" />
   </center>
  </form>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MRSDB";

if(isset($_POST["submit"]) && isset($_POST["searchbox"]))
{
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error); 

  $type=$_POST["type"];

  if($type=="none")
  {

  }

  else
  {
    $string=strip_tags(stripslashes(trim($_POST["searchbox"])));  

    if($type=="Doctor")
    {
      $parts=explode(" ", $string);
      
      $sql = "SELECT * from $type  where fname='$string[0]' AND lname='$string[1]';";
      $result = $conn->query($sql);

      if($result->num_rows > 0)
      { 
        while($row = $result->fetch_assoc())
        {
          $email=$row["email"];

       //   $sql = $sql = "SELECT * from $type  where fname='$string[0]' AND lname='$string[1]';";
        }
      }    

  }
<div class="results">
<div class="result"></div>
</div>




</div>
</body>
</html>