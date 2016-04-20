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

      var slideimages = new Array()
    slideimages[0] = new Image() 
    slideimages[0].src = "image/nikitamaam.jpg" 
    slideimages[1] = new Image()
    slideimages[1].src = "image/Zydushospital.jpg"
    slideimages[2] = new Image()
    slideimages[2].src = "image/prachimaam.jpg"
    slideimages[3] = new Image()
    slideimages[3].src = "image/ddit.jpg"
    slideimages[4] = new Image()
    slideimages[4].src = "image/vatsalsir.jpg"
    slideimages[5] = new Image()
    slideimages[5].src = "image/shankarahospital.jpg"
    slideimages[6] = new Image()
    slideimages[6].src = "image/pooja.jpg"
    slideimages[7]=new Image()
    slideimages[7].src="image/paras hospital.jpg"
    slideimages[8] = new Image()
    slideimages[8].src = "image/divya.jpg"
    slideimages[9] = new Image()
    slideimages[9].src = "image/anandhospital.jpg"
    // slideimages[10] = new Image()
    // slideimages[10].src = "surat2.jpg"
    // slideimages[11] = new Image()
    // slideimages[11].src = "somani_big.jpg"
    // slideimages[12] = new Image()
    // slideimages[12].src = "tt.jpg"
    // slideimages[13] = new Image()
    // slideimages[13].src = "gym.jpg"

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
<!-- <div style=" border: 4px solid black; float: left; overflow: hidden; margin-left:16%; margin-top: 10px;min-width: 62%; max-width: 62%; min-height: 300px; max-height=300px;">
  <img src="image/nikitamaam.jpg" id="slide" style="height: 100%; width: 100%; object-fit: contain;" />
</div>       -->

<div class="rotator">
<img src="image/nikitamaam.jpg" id="slide" style="height: contain; width: 100%; object-fit: contain;">
</div>


        <script type="text/javascript">
        var step=0
        function slideit(){
           if (!document.images)
              return
           document.getElementById('slide').src = slideimages[step].src
           if (step<9)
              step++
           else
              step=0
           setTimeout("slideit()",2500)
          }

          slideit()
        </script>

<div class="ad"><img src="icons/advertise.jpg" style="height: 100%; width: 100%;"></div>

<div class="search" id="srch">
  <form action="search.php" method="post">
  <br />
   <center>
    <input type="text" style="font-size: 20px;"  name="searchbox" id="searchbox" value="Search.." required onfocus="clearText()" onblur="check()" />
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

<div class="ad"><img src="icons/advertise.jpg" style="height: 100%; width: 100%;"></div>

</div>
</body>
</html>