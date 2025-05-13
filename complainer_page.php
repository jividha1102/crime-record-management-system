 <!-- <!DOCTYPE html>
<html>
 
<?php
session_start();
    if(!isset($_SESSION['x']))
        header("location:userlogin.php");
    
    
    $conn=mysqli_connect("localhost","root","");
    if(!$conn)
    {
        die("could not connect".mysqli_error());
    }
    mysqli_select_db($conn,"crime_portal");
    
    $u_id=$_SESSION['u_id'];
        
        $result=mysqli_query($conn,"SELECT a_no FROM user where u_id='$u_id' ");
        $q2=mysqli_fetch_assoc($result);
        $a_no=$q2['a_no'];
    
        $result1=mysqli_query($conn,"SELECT u_name FROM user where u_id='$u_id' ");
        $q2=mysqli_fetch_assoc($result1);
        $u_name=$q2['u_name'];
    
    
if(isset($_POST['s'])){
    $con=mysqli_connect('localhost','root','');
    if(!$con)
    {
        die('could not connect: '.mysqli_error());
    }
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        
        
        $location=$_POST['location'];
        $type_crime=$_POST['type_crime'];
        $d_o_c=$_POST['d_o_c'];
        $description=$_POST['description'];
        
        $var=strtotime(date("Ymd"))-strtotime($d_o_c);
        
        
    if($var>=0)
    {
          
      $comp="insert into complaint(a_no,location,type_crime,d_o_c,description) values('$a_no','$location','$type_crime','$d_o_c','$description')";
      mysqli_select_db($con,"crime_portal"); 
      $res=mysqli_query($conn,$comp);
      
      if(!$res)
      {
        $message1 = "Complaint already filed";
        echo "<script type='text/javascript'>alert('$message1');</script>";
      }
      else
      {
          $message = "Complaint Registered Successfully";
          echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
    else
    {
     $message = "Enter Valid Date";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
  }
}
?>
    
 <script>
     function f1()
        {
           var sta1=document.getElementById("desc").value;
           var x1=sta1.trim();
          if(sta1!="" && x1==""){
          document.getElementById("desc").value="";
          document.getElementById("desc").focus();
          alert("Space Found");
        }
}
 </script>
   
<head>
	<title>Complainer Home Page</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body style="background-size: cover;
    background-image: url(crime1.gif);
    background-position: center;">
	<nav  class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>Home</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="userlogin.php">User Login</a></li>
        <li class="active"><a href="complainer_page.php">User Home</a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="complainer_page.php">Log New Complain</a></li>
        <li><a href="complainer_complain_history.php">Complaint History</a></li>
        <li><a href="logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>
    
    
<div class="video" style="margin-top: 5%"> 
	<div class="center-container">
		 <div class="bg-agile">
			<br><br>
			<div class="login-form"><p><h2 style="color:white">Welcome <?php echo "$u_name" ?></h2></p><br>
                                    <p><h2>Log New Complain</h2></p><br>	
				<form action="#" method="post" style="color: gray">Aadhar
					<input type="text"  name="aadhar_number" placeholder="Aadhar Number" required="" disabled value=<?php echo "$a_no"; ?>>
					
				<div class="top-w3-agile" style="color: gray">Location of Crime
                    
                    <select class="form-control" name="location">
						<?php
                        $loc=mysqli_query($conn,"select location from police_station");
                        while($row=mysqli_fetch_array($loc))
                        {
                            ?>
                                	<option> <?php echo $row[0]; ?> </option>
                            <?php
                        }
                        ?>
					
				    </select>
				</div>
				<div class="top-w3-agile" style="color: gray">Type of Crime
					<select class="form-control" name="type_crime">
						<option>Theft</option>
						<option>Robbery</option>
                        <option>Pick Pocket</option>
                        <option>Murder</option>
                        <option>Rape</option>
                        <option>Molestation</option>
                        <option>Kidnapping</option>
                        <option>Missing Person</option>
				    </select>
				</div>
					<div class="Top-w3-agile" style="color: gray">
					Date Of Crime : &nbsp &nbsp  
						<input style="background-color: #313131;color: white" type="date" name="d_o_c" required>
					</div>
					<br>
					<div class="top-w3-agile" style="color: gray">
					Description
						<textarea  name="description" rows="20" cols="50" placeholder="Describe the incident in details with time" onfocusout="f1()" id="desc" required></textarea>
					</div>
					<input type="submit" value="Submit" name="s">
				</form>	
			</div>	
		</div>
	</div>	
</div>	
<div style="position: relative;
   left: 0;
   bottom: 0;
   width: 100%;
   height: 30px;
   background-color: rgba(0,0,0,0.8);
   color: white;
   text-align: center;">
  
</div>
 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>  -->



<!-- <!DOCTYPE html>
<html>

<?php
session_start();
if (!isset($_SESSION['x'])) {
    header("location:userlogin.php");
}

$conn = mysqli_connect("localhost", "root", "");
if (!$conn) {
    die("Could not connect: " . mysqli_error());
}
mysqli_select_db($conn, "crime_portal");

$u_id = $_SESSION['u_id'];

$result = mysqli_query($conn, "SELECT a_no FROM user WHERE u_id='$u_id'");
$q2 = mysqli_fetch_assoc($result);
$a_no = $q2['a_no'];

$result1 = mysqli_query($conn, "SELECT u_name FROM user WHERE u_id='$u_id'");
$q2 = mysqli_fetch_assoc($result1);
$u_name = $q2['u_name'];

if (isset($_POST['s'])) {
    $con = mysqli_connect('localhost', 'root', '');
    if (!$con) {
        die('Could not connect: ' . mysqli_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $location = $_POST['location'];
        $type_crime = $_POST['type_crime'];
        $d_o_c = $_POST['d_o_c'];
        $description = $_POST['description'];

        $var = strtotime(date("Ymd")) - strtotime($d_o_c);

        if ($var >= 0) {
            $comp = "INSERT INTO complaint (a_no, location, type_crime, d_o_c, description) 
                     VALUES ('$a_no', '$location', '$type_crime', '$d_o_c', '$description')";
            mysqli_select_db($con, "crime_portal");
            $res = mysqli_query($conn, $comp);

            if (!$res) {
                echo "<script type='text/javascript'>alert('Complaint already filed');</script>";
            } else {
                echo "<script type='text/javascript'>alert('Complaint Registered Successfully');</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Enter Valid Date');</script>";
        }
    }
}
?>

<head>
    <title>Complainer Home Page</title>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="complainer_page.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body style="background-size: cover; background-image: url(crime1.gif); background-position: center;">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><b>Home</b></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="userlogin.php">User Login</a></li>
                    <li class="active"><a href="complainer_page.php">User Home</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="complainer_page.php">Log New Complain</a></li>
                    <li><a href="complainer_complain_history.php">Complaint History</a></li>
                    <li><a href="logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="video" style="margin-top: 5%">
        <div class="center-container">
            <div class="bg-agile">
                <br><br>
                <div class="login-form">
                    <p><h2 style="color:white">Welcome <?php echo "$u_name" ?></h2></p><br>
                    <p><h2>Log New Complain</h2></p><br>
                    <form action="#" method="post" style="color: gray">
                        Aadhar
                        <input type="text" name="aadhar_number" placeholder="Aadhar Number" required="" disabled value=<?php echo "$a_no"; ?>>

                        <div class="top-w3-agile" style="color: gray">Location of Crime
                            <select class="form-control" name="location">
                                <?php
                                $loc = mysqli_query($conn, "SELECT location FROM police_station");
                                while ($row = mysqli_fetch_array($loc)) {
                                    echo "<option>" . $row[0] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="top-w3-agile" style="color: gray">Type of Crime
                            <select class="form-control" name="type_crime">
                                <option>Theft</option>
                                <option>Robbery</option>
                                <option>Pick Pocket</option>
                                <option>Murder</option>
                                <option>Rape</option>
                                <option>Molestation</option>
                                <option>Kidnapping</option>
                                <option>Missing Person</option>
                            </select>
                        </div>

                        <div class="Top-w3-agile" style="color: gray">
                            Date Of Crime : &nbsp &nbsp
                            <input style="background-color: #313131;color: white" type="date" name="d_o_c" required>
                        </div>

                        <br>

                        <div class="top-w3-agile" style="color: gray">
                            Description
                            <textarea name="description" rows="5" cols="50" placeholder="Describe the incident in details with time" id="desc" required></textarea>
                            <br>
                            <button type="button" onclick="startRecording()" style="background-color: #008CBA; color: white; padding: 5px 10px; border: none; cursor: pointer;">
                                🎙️ Start Recording
                            </button>
                            <p id="status" style="color: red; font-weight: bold;"></p>
                        </div>

                        <input type="submit" value="Submit" name="s">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div style="position: relative; left: 0; bottom: 0; width: 100%; height: 30px; background-color: rgba(0,0,0,0.8); color: white; text-align: center;">
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        function startRecording() {
            let recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
            recognition.lang = 'en-US';
            recognition.interimResults = false;

            document.getElementById("status").innerText = "Listening... Speak now.";

            recognition.start();

            recognition.onresult = function(event) {
                let speechText = event.results[0][0].transcript;
                document.getElementById("desc").value = speechText;
                document.getElementById("status").innerText = "Recorded successfully!";
            };

            recognition.onerror = function(event) {
                document.getElementById("status").innerText = "Error occurred: " + event.error;
            };
        }
    </script>
</body>

</html> -->



<!-- <!DOCTYPE html>
<html>

<?php
session_start();
if (!isset($_SESSION['x'])) {
    header("location:userlogin.php");
}

$conn = mysqli_connect("localhost", "root", "", "crime_portal");
if (!$conn) {
    die("Could not connect: " . mysqli_error($conn));
}

$u_id = $_SESSION['u_id'];

$result = mysqli_query($conn, "SELECT a_no, u_name FROM user WHERE u_id='$u_id'");
$q2 = mysqli_fetch_assoc($result);
$a_no = $q2['a_no'];
$u_name = $q2['u_name'];

if (isset($_POST['s'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $location = $_POST['location'];
        $manual_location = $_POST['manual_location'];

        // If user entered a custom location, override the dropdown selection
        if (!empty($manual_location)) {
            $location = $manual_location;
        }

        $type_crime = $_POST['type_crime'];
        $d_o_c = $_POST['d_o_c'];
        $description = $_POST['description'];

        $var = strtotime(date("Ymd")) - strtotime($d_o_c);

        if ($var >= 0) {
            $comp = "INSERT INTO complaint (a_no, location, type_crime, d_o_c, description) 
                     VALUES ('$a_no', '$location', '$type_crime', '$d_o_c', '$description')";
            $res = mysqli_query($conn, $comp);

            if (!$res) {
                echo "<script>alert('Complaint already filed');</script>";
            } else {
                echo "<script>alert('Complaint Registered Successfully');</script>";
            }
        } else {
            echo "<script>alert('Enter Valid Date');</script>";
        }
    }
}
?>

<head>
    <title>Complainer Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet">
    <link href="complainer_page.css" rel="stylesheet">
</head>

<body style="background-size: cover; background-image: url(crime1.gif); background-position: center;">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><b>Home</b></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="userlogin.php">User Login</a></li>
                    <li class="active"><a href="complainer_page.php">User Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="complainer_page.php">Log New Complain</a></li>
                    <li><a href="complainer_complain_history.php">Complaint History</a></li>
                    <li><a href="logout.php">Logout &nbsp <i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="video" style="margin-top: 5%">
        <div class="center-container">
            <div class="bg-agile">
                <br><br>
                <div class="login-form">
                    <p><h2 style="color:white">Welcome <?php echo "$u_name" ?></h2></p><br>
                    <p><h2>Log New Complain</h2></p><br>
                    <form action="#" method="post" style="color: gray">
                        Aadhar
                        <input type="text" name="aadhar_number" placeholder="Aadhar Number" required disabled value="<?php echo "$a_no"; ?>">

                        <!-- Location Selection --
                        <div class="top-w3-agile" style="color: gray">Location of Crime
                            <select class="form-control" id="locationSelect" name="location">
                                <option value="">Select from list</option>
                                <?php
                                $loc = mysqli_query($conn, "SELECT location FROM police_station");
                                while ($row = mysqli_fetch_array($loc)) {
                                    echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Checkbox to enter a custom location --
                        <div class="top-w3-agile" style="color: gray">
                            <input type="checkbox" id="manualLocationCheck" onclick="toggleManualLocation()"> Enter Other Location
                        </div>

                        <!-- Text input for manual location --
                        <div class="top-w3-agile" id="manualLocationDiv" style="display: none; color: gray">
                            <input type="text" class="form-control" id="manualLocation" name="manual_location" placeholder="Enter crime location manually">
                        </div>

                        <div class="top-w3-agile" style="color: gray">Type of Crime
                            <select class="form-control" name="type_crime">
                                <option>Theft</option>
                                <option>Robbery</option>
                                <option>Pick Pocket</option>
                                <option>Murder</option>
                                <option>Rape</option>
                                <option>Molestation</option>
                                <option>Kidnapping</option>
                                <option>Missing Person</option>
                            </select>
                        </div>

                        <div class="Top-w3-agile" style="color: gray">
                            Date Of Crime: 
                            <input type="date" name="d_o_c" required>
                        </div>

                        <br>

                        <div class="top-w3-agile" style="color: gray">
                            Description
                            <textarea name="description" rows="5" cols="50" placeholder="Describe the incident in detail" id="desc" required></textarea>
                            <br>
                            <button type="button" onclick="startRecording()" style="background-color: #008CBA; color: white; padding: 5px 10px; border: none;">
                                🎙️ Start Recording
                            </button>
                            <p id="status" style="color: red; font-weight: bold;"></p>
                        </div>

                        <input type="submit" value="Submit" name="s">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleManualLocation() {
            var checkbox = document.getElementById("manualLocationCheck");
            var selectBox = document.getElementById("locationSelect");
            var textInput = document.getElementById("manualLocationDiv");

            selectBox.disabled = checkbox.checked;
            textInput.style.display = checkbox.checked ? "block" : "none";
        }

        function startRecording() {
            let recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
            recognition.lang = 'en-US';
            recognition.start();
            recognition.onresult = function(event) {
                document.getElementById("desc").value = event.results[0][0].transcript;
            };
        }
    </script>
</body>
</html> -->




<!-- <!DOCTYPE html>
<html>

<?php
session_start();
if (!isset($_SESSION['x'])) {
    header("location:userlogin.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "crime_portal");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$u_id = $_SESSION['u_id'];

// Fetch user details
$result = mysqli_query($conn, "SELECT a_no, u_name FROM user WHERE u_id='$u_id'");
$q2 = mysqli_fetch_assoc($result);
$a_no = $q2['a_no'];
$u_name = $q2['u_name'];

// Generate a unique form token to prevent duplicate submissions
if (!isset($_SESSION['form_token'])) {
    $_SESSION['form_token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['s'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_token']) && $_POST['form_token'] === $_SESSION['form_token']) {
        
        // Reset token after submission
        unset($_SESSION['form_token']);

        $location = $_POST['location'];
        $manual_location = $_POST['manual_location'];

        // If the user entered a custom location, use it
        if (!empty($manual_location)) {
            $location = $manual_location;
        }

        $type_crime = $_POST['type_crime'];
        $d_o_c = $_POST['d_o_c'];
        $description = $_POST['description'];

        $var = strtotime(date("Ymd")) - strtotime($d_o_c);

        if ($var >= 0) {
            $comp = "INSERT INTO complaint (a_no, location, type_crime, d_o_c, description) 
                     VALUES ('$a_no', '$location', '$type_crime', '$d_o_c', '$description')";
            $res = mysqli_query($conn, $comp);

            if ($res) {
                echo "<script>alert('Complaint Registered Successfully');</script>";
                echo "<script>window.location.href = 'complainer_page.php';</script>"; // Redirect after submission
                exit();
            } else {
                echo "<script>alert('Error: Unable to register complaint');</script>";
            }
        } else {
            echo "<script>alert('Enter a valid date');</script>";
        }
    }
}
?>

<head>
    <title>Complainer Home Page</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="complainer_page.css" rel="stylesheet" type="text/css">
</head>

<body style="background-size: cover; background-image: url(crime1.gif); background-position: center;">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><b>Home</b></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="userlogin.php">User Login</a></li>
                    <li class="active"><a href="complainer_page.php">User Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="complainer_page.php">Log New Complaint</a></li>
                    <li><a href="complainer_complain_history.php">Complaint History</a></li>
                    <li><a href="logout.php">Logout &nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="video" style="margin-top: 5%">
        <div class="center-container">
            <div class="bg-agile">
                <br><br>
                <div class="login-form">
                    <p><h2 style="color:white">Welcome <?php echo "$u_name"; ?></h2></p><br>
                    <p><h2>Log New Complaint</h2></p><br>
                    <form action="#" method="post" onsubmit="disableSubmit()" style="color: gray">
                        <input type="hidden" name="form_token" value="<?php echo $_SESSION['form_token']; ?>">

                        Aadhar
                        <input type="text" name="aadhar_number" placeholder="Aadhar Number" required="" disabled value="<?php echo "$a_no"; ?>">

                        <div class="top-w3-agile" style="color: gray">Location of Crime
                            <select class="form-control" name="location" id="location">
                                <?php
                                $loc = mysqli_query($conn, "SELECT location FROM police_station");
                                while ($row = mysqli_fetch_array($loc)) {
                                    echo "<option>" . $row[0] . "</option>";
                                }
                                ?>
                                <option value="other">Other (Enter Manually)</option>
                            </select>
                            <input type="text" name="manual_location" id="manual_location" placeholder="Enter location" style="display: none;">
                        </div>

                        <div class="top-w3-agile" style="color: gray">Type of Crime
                            <select class="form-control" name="type_crime">
                                <option>Theft</option>
                                <option>Robbery</option>
                                <option>Pick Pocket</option>
                                <option>Murder</option>
                                <option>Rape</option>
                                <option>Molestation</option>
                                <option>Kidnapping</option>
                                <option>Missing Person</option>
                            </select>
                        </div>

                        <div class="Top-w3-agile" style="color: gray">
                            Date Of Crime: &nbsp;&nbsp;
                            <input style="background-color: #313131;color: white" type="date" name="d_o_c" required>
                        </div>

                        <br>

                        <div class="top-w3-agile" style="color: gray">
                            Description
                            <textarea name="description" rows="5" cols="50" placeholder="Describe the incident in details with time" id="desc" required></textarea>
                            <br>
                            <button type="button" onclick="startRecording()" style="background-color: #008CBA; color: white; padding: 5px 10px; border: none; cursor: pointer;">
                                🎙️ Start Recording
                            </button>
                            <p id="status" style="color: red; font-weight: bold;"></p>
                        </div>

                        <input type="submit" value="Submit" name="s">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("location").addEventListener("change", function() {
            if (this.value === "other") {
                document.getElementById("manual_location").style.display = "block";
            } else {
                document.getElementById("manual_location").style.display = "none";
            }
        });

        function disableSubmit() {
            document.querySelector("input[type=submit]").disabled = true;
        }

        function startRecording() {
            let recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
            recognition.lang = 'en-US';

            document.getElementById("status").innerText = "Listening... Speak now.";
            recognition.start();

            recognition.onresult = function(event) {
                document.getElementById("desc").value = event.results[0][0].transcript;
                document.getElementById("status").innerText = "Recorded successfully!";
            };
        }
    </script>
</body>
</html> ---->





<!-- <!DOCTYPE html>
<html>

<?php
session_start();
if (!isset($_SESSION['x'])) {
    header("location:userlogin.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "crime_portal");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$u_id = $_SESSION['u_id'];

// Fetch user details
$result = mysqli_query($conn, "SELECT a_no, u_name FROM user WHERE u_id='$u_id'");
$q2 = mysqli_fetch_assoc($result);
$a_no = $q2['a_no'];
$u_name = $q2['u_name'];

// Generate a token
if (!isset($_SESSION['form_token'])) {
    $_SESSION['form_token'] = bin2hex(random_bytes(32));
}

$show_success = false; // FLAG TO TRIGGER JS ALERT

if (isset($_POST['s'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_token']) && $_POST['form_token'] === $_SESSION['form_token']) {
        unset($_SESSION['form_token']); // Reset token

        $location = $_POST['location'];
        $manual_location = $_POST['manual_location'];

        if (!empty($manual_location)) {
            $location = $manual_location;
        }

        $type_crime = $_POST['type_crime'];
        $d_o_c = $_POST['d_o_c'];
        $description = $_POST['description'];

        $var = strtotime(date("Ymd")) - strtotime($d_o_c);

        if ($var >= 0) {
            $comp = "INSERT INTO complaint (a_no, location, type_crime, d_o_c, description) 
                     VALUES ('$a_no', '$location', '$type_crime', '$d_o_c', '$description')";
            $res = mysqli_query($conn, $comp);

            if ($res) {
                $show_success = true; // trigger JS later
            } else {
                echo "<script>alert('Error: Unable to register complaint');</script>";
            }
        } else {
            echo "<script>alert('Enter a valid date');</script>";
        }
    }
}
?>


<head>
    <title>Complainer Home Page</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="complainer_page.css" rel="stylesheet" type="text/css">
</head>

<body style="background-size: cover; background-image: url(crime1.gif); background-position: center;">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><b>Home</b></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="userlogin.php">User Login</a></li>
                    <li class="active"><a href="complainer_page.php">User Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="complainer_page.php">Log New Complaint</a></li>
                    <li><a href="complainer_complain_history.php">Complaint History</a></li>
                    <li><a href="logout.php">Logout &nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="video" style="margin-top: 5%">
        <div class="center-container">
            <div class="bg-agile">
                <br><br>
                <div class="login-form">
                    <p><h2 style="color:white">Welcome <?php echo "$u_name"; ?></h2></p><br>
                    <p><h2>Log New Complaint</h2></p><br>
                    <form action="#" method="post" onsubmit="disableSubmit()" style="color: gray">
                        <input type="hidden" name="form_token" value="<?php echo $_SESSION['form_token']; ?>">

                        Aadhar
                        <input type="text" name="aadhar_number" placeholder="Aadhar Number" required="" disabled value="<?php echo "$a_no"; ?>">

                        <div class="top-w3-agile" style="color: gray">Location of Crime
                            <select class="form-control" name="location" id="location">
                                <?php
                                $loc = mysqli_query($conn, "SELECT location FROM police_station");
                                while ($row = mysqli_fetch_array($loc)) {
                                    echo "<option>" . $row[0] . "</option>";
                                }
                                ?>
                                <option value="other">Other (Enter Manually)</option>
                            </select>
                            <input type="text" name="manual_location" id="manual_location" placeholder="Enter location" style="display: none;">
                        </div>

                        <div class="top-w3-agile" style="color: gray">Type of Crime
                            <select class="form-control" name="type_crime">
                                <option>Theft</option>
                                <option>Robbery</option>
                                <option>Pick Pocket</option>
                                <option>Murder</option>
                                <option>Rape</option>
                                <option>Molestation</option>
                                <option>Kidnapping</option>
                                <option>Missing Person</option>
                            </select>
                        </div>

                        <div class="Top-w3-agile" style="color: gray">
                            Date Of Crime: &nbsp;&nbsp;
                            <input style="background-color: #313131;color: white" type="date" name="d_o_c" required>
                        </div>

                        <br>

                        <div class="top-w3-agile" style="color: gray">
                            Description
                            <textarea name="description" rows="5" cols="50" placeholder="Describe the incident in details with time" id="desc" required></textarea>
                            <br>
                            <button type="button" onclick="startRecording()" style="background-color: #008CBA; color: white; padding: 5px 10px; border: none; cursor: pointer;">
                                🎙️ Start Recording
                            </button>
                            <p id="status" style="color: red; font-weight: bold;"></p>
                        </div>

                        <input type="submit" value="Submit" name="s">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("location").addEventListener("change", function() {
            if (this.value === "other") {
                document.getElementById("manual_location").style.display = "block";
            } else {
                document.getElementById("manual_location").style.display = "none";
            }
        });

        function disableSubmit() {
            document.querySelector("input[type=submit]").disabled = true;
        }

        function startRecording() {
            let recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
            recognition.lang = 'en-US';

            document.getElementById("status").innerText = "Listening... Speak now.";
            recognition.start();

            recognition.onresult = function(event) {
                document.getElementById("desc").value = event.results[0][0].transcript;
                document.getElementById("status").innerText = "Recorded successfully!";
            };
        }
    </script>
    <?php if ($show_success): ?>
<script>
    alert("Complaint Registered Successfully");
    window.location.href = "complainer_page.php";
</script>
<?php endif; ?>

</body>
</html> -->






 <!-- <!DOCTYPE html>
<html>

<?php
session_start();
if (!isset($_SESSION['x'])) {
    header("location:userlogin.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "crime_portal");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$u_id = $_SESSION['u_id'];

// Fetch user details
$result = mysqli_query($conn, "SELECT a_no, u_name FROM user WHERE u_id='$u_id'");
$q2 = mysqli_fetch_assoc($result);
$a_no = $q2['a_no'];
$u_name = $q2['u_name'];

// Generate a unique form token to prevent duplicate submissions
if (!isset($_SESSION['form_token'])) {
    $_SESSION['form_token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['s'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_token']) && $_POST['form_token'] === $_SESSION['form_token']) {

        unset($_SESSION['form_token']); // Reset token

        $location = mysqli_real_escape_string($conn, $_POST['location']);
        $manual_location = mysqli_real_escape_string($conn, $_POST['manual_location']);

        if (!empty($manual_location)) {
            $location = $manual_location;
        }

        $type_crime = mysqli_real_escape_string($conn, $_POST['type_crime']);
        $d_o_c = $_POST['d_o_c']; // Input format is yyyy-mm-dd
        $description = mysqli_real_escape_string($conn, $_POST['description']);

        $var = strtotime(date("Ymd")) - strtotime($d_o_c);
        if ($var >= 0) {
            // Also insert inc_status, pol_status, and p_id with default values
            $comp = "INSERT INTO complaint (a_no, location, type_crime, d_o_c, description, inc_status, pol_status, p_id) 
                     VALUES ('$a_no', '$location', '$type_crime', '$d_o_c', '$description', 'Unassigned', NULL, NULL)";
            $res = mysqli_query($conn, $comp);

            if ($res) {
                echo "<script>alert('Complaint Registered Successfully');</script>";
                echo "<script>window.location.href = 'complainer_page.php';</script>";
                exit();
            } else {
                echo "<script>alert('Database Error: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Enter a valid date');</script>";
        }
    }
}
?>

<head>
    <title>Complainer Home Page</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="complainer_page.css" rel="stylesheet" type="text/css">
</head>

<body style="background-size: cover; background-image: url(crime1.gif); background-position: center;">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><b>Home</b></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="userlogin.php">User Login</a></li>
                    <li class="active"><a href="complainer_page.php">User Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="complainer_page.php">Log New Complaint</a></li>
                    <li><a href="complainer_complain_history.php">Complaint History</a></li>
                    <li><a href="logout.php">Logout &nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="video" style="margin-top: 5%">
        <div class="center-container">
            <div class="bg-agile">
                <br><br>
                <div class="login-form">
                    <p><h2 style="color:white">Welcome <?php echo "$u_name"; ?></h2></p><br>
                    <p><h2>Log New Complaint</h2></p><br>
                    <form action="#" method="post" onsubmit="disableSubmit()" style="color: gray">
                        <input type="hidden" name="form_token" value="<?php echo $_SESSION['form_token']; ?>">

                        Aadhar
                        <!-- <input type="text" name="aadhar_number" placeholder="Aadhar Number" required="" disabled value="<?php echo "$a_no"; ?>">
                          --
                          <input type="text" name="aadhar_number" placeholder="Aadhar Number" required readonly value="<?php echo "$a_no"; ?>">


                        <div class="top-w3-agile" style="color: gray">Location of Crime
                            <select class="form-control" name="location" id="location">
                                <?php
                                $loc = mysqli_query($conn, "SELECT location FROM police_station");
                                while ($row = mysqli_fetch_array($loc)) {
                                    echo "<option>" . $row[0] . "</option>";
                                }
                                ?>
                                <option value="other">Other (Enter Manually)</option>
                            </select>
                            <input type="text" name="manual_location" id="manual_location" placeholder="Enter location" style="display: none;">
                        </div>

                        <div class="top-w3-agile" style="color: gray">Type of Crime
                            <select class="form-control" name="type_crime">
                                <option>Theft</option>
                                <option>Robbery</option>
                                <option>Pick Pocket</option>
                                <option>Murder</option>
                                <option>Rape</option>
                                <option>Molestation</option>
                                <option>Kidnapping</option>
                                <option>Missing Person</option>
                            </select>
                        </div>

                        <div class="Top-w3-agile" style="color: gray">
                            Date Of Crime: &nbsp;&nbsp;
                            <input style="background-color: #313131;color: white" type="date" name="d_o_c" required>
                        </div>

                        <br>

                        <div class="top-w3-agile" style="color: gray">
                            Description
                            <textarea name="description" rows="5" cols="50" placeholder="Describe the incident in details with time" id="desc" required></textarea>
                            <br>
                            <button type="button" onclick="startRecording()" style="background-color: #008CBA; color: white; padding: 5px 10px; border: none; cursor: pointer;">
                                🎙️ Start Recording
                            </button>
                            <p id="status" style="color: red; font-weight: bold;"></p>
                        </div>

                        <input type="submit" value="Submit" name="s">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("location").addEventListener("change", function() {
            if (this.value === "other") {
                document.getElementById("manual_location").style.display = "block";
            } else {
                document.getElementById("manual_location").style.display = "none";
            }
        });

        function disableSubmit() {
            document.querySelector("input[type=submit]").disabled = true;
        }

        function startRecording() {
            let recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
            recognition.lang = 'en-US';

            document.getElementById("status").innerText = "Listening... Speak now.";
            recognition.start();

            recognition.onresult = function(event) {
                document.getElementById("desc").value = event.results[0][0].transcript;
                document.getElementById("status").innerText = "Recorded successfully!";
            };
        }
    </script>
</body>
</html> 


 -->





 <!-- <!DOCTYPE html>
<html>

<?php
session_start();
if (!isset($_SESSION['x']))
    header("location:userlogin.php");

$conn = mysqli_connect("localhost", "root", "", "crime_portal");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$u_id = $_SESSION['u_id'];
$result = mysqli_query($conn, "SELECT a_no, u_name FROM user WHERE u_id='$u_id'");
$user = mysqli_fetch_assoc($result);
$a_no = $user['a_no'];
$u_name = $user['u_name'];

if (isset($_POST['s']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $type_crime = mysqli_real_escape_string($conn, $_POST['type_crime']);
    $d_o_c = $_POST['d_o_c'];
    $description = mysqli_real_escape_string($conn, trim($_POST['description']));

    $var = strtotime(date("Ymd")) - strtotime($d_o_c);

    if ($var < 0) {
        echo "<script>alert('Enter a valid date');</script>";
    } else {
        // Check for duplicate complaint
        $check_query = "SELECT * FROM complaint 
                        WHERE a_no='$a_no' AND location='$location' AND type_crime='$type_crime' 
                        AND d_o_c='$d_o_c' AND description='$description'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            echo "<script>alert('This complaint has already been filed.');</script>";
        } else {
            // Insert complaint
            $comp = "INSERT INTO complaint (a_no, location, type_crime, d_o_c, description) 
                     VALUES ('$a_no', '$location', '$type_crime', '$d_o_c', '$description')";
            $res = mysqli_query($conn, $comp);

            if ($res) {
                echo "<script>alert('Complaint Registered Successfully');</script>";
            } else {
                echo "<script>alert('Error while registering complaint');</script>";
            }
        }
    }
}
?>

<head>
    <title>Complainer Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="complainer_page.css" rel="stylesheet" type="text/css">
</head>

<body style="background-size: cover; background-image: url(crime1.gif); background-position: center;">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php"><b>Home</b></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="userlogin.php">User Login</a></li>
                    <li class="active"><a href="complainer_page.php">User Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Log New Complaint</a></li>
                    <li><a href="complainer_complain_history.php">Complaint History</a></li>
                    <li><a href="logout.php">Logout <i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="video" style="margin-top: 5%;">
        <div class="center-container">
            <div class="bg-agile">
                <div class="login-form">
                    <h2 style="color:white">Welcome <?php echo htmlspecialchars($u_name); ?></h2><br>
                    <h2 style="color:white">Log New Complaint</h2><br>
                    <form action="#" method="post" style="color: gray">
                        Aadhar
                        <input type="text" name="aadhar_number" class="form-control" value="<?php echo $a_no; ?>" readonly>

                        <label>Location of Crime</label>
                        <select class="form-control" name="location" required>
                            <?php
                            $loc = mysqli_query($conn, "SELECT location FROM police_station");
                            while ($row = mysqli_fetch_array($loc)) {
                                echo "<option>" . htmlspecialchars($row[0]) . "</option>";
                            }
                            ?>
                        </select>

                        <label>Type of Crime</label>
                        <select class="form-control" name="type_crime" required>
                            <option>Theft</option>
                            <option>Robbery</option>
                            <option>Pick Pocket</option>
                            <option>Murder</option>
                            <option>Rape</option>
                            <option>Molestation</option>
                            <option>Kidnapping</option>
                            <option>Missing Person</option>
                        </select>

                        <label>Date Of Crime</label>
                        <input type="date" name="d_o_c" class="form-control" required>

                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Describe the incident in details with time" required></textarea>

                        <br>
                        <input type="submit" value="Submit" name="s" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function f1() {
            var sta1 = document.getElementById("desc").value;
            var x1 = sta1.trim();
            if (sta1 != "" && x1 == "") {
                document.getElementById("desc").value = "";
                document.getElementById("desc").focus();
                alert("Space Found");
            }
        }
    </script>
</body>
</html> -->



<!-- <!DOCTYPE html>
<html>

<?php
session_start();
if (!isset($_SESSION['x']))
    header("location:userlogin.php");

$conn = mysqli_connect("localhost", "root", "", "crime_portal");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$u_id = $_SESSION['u_id'];
$result = mysqli_query($conn, "SELECT a_no, u_name FROM user WHERE u_id='$u_id'");
$user = mysqli_fetch_assoc($result);
$a_no = $user['a_no'];
$u_name = $user['u_name'];

if (isset($_POST['s']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $type_crime = mysqli_real_escape_string($conn, $_POST['type_crime']);
    $d_o_c = $_POST['d_o_c'];
    $description = mysqli_real_escape_string($conn, trim($_POST['description']));

    $image_path = "";
    if (isset($_FILES["evidence_image"]) && $_FILES["evidence_image"]["error"] == 0) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES["evidence_image"]["name"]);
        $target_file = $target_dir . time() . "_" . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["evidence_image"]["tmp_name"]);
        if ($check !== false && in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            if (move_uploaded_file($_FILES["evidence_image"]["tmp_name"], $target_file)) {
                $image_path = $target_file;
            } else {
                echo "<script>alert('Error uploading image.');</script>";
            }
        } else {
            echo "<script>alert('Only JPG, JPEG & PNG files are allowed.');</script>";
        }
    }

    $var = strtotime(date("Ymd")) - strtotime($d_o_c);

    if ($var < 0) {
        echo "<script>alert('Enter a valid date');</script>";
    } else {
        $check_query = "SELECT * FROM complaint 
                        WHERE a_no='$a_no' AND location='$location' AND type_crime='$type_crime' 
                        AND d_o_c='$d_o_c' AND description='$description'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            echo "<script>alert('This complaint has already been filed.');</script>";
        } else {
            $comp = "INSERT INTO complaint (a_no, location, type_crime, d_o_c, description, evidence_image) 
                     VALUES ('$a_no', '$location', '$type_crime', '$d_o_c', '$description', '$image_path')";
            $res = mysqli_query($conn, $comp);

            if ($res) {
                echo "<script>alert('Complaint Registered Successfully');</script>";
            } else {
                echo "<script>alert('Error while registering complaint');</script>";
            }
        }
    }
}
?>

<head>
    <title>Complainer Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="complainer_page.css" rel="stylesheet" type="text/css">
</head>

<body style="background-size: cover; background-image: url(crime1.gif); background-position: center;">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="home.php"><b>Home</b></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="userlogin.php">User Login</a></li>
                    <li class="active"><a href="complainer_page.php">User Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Log New Complaint</a></li>
                    <li><a href="complainer_complain_history.php">Complaint History</a></li>
                    <li><a href="logout.php">Logout <i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="video" style="margin-top: 5%;">
        <div class="center-container">
            <div class="bg-agile">
                <div class="login-form">
                    <h2 style="color:white">Welcome <?php echo htmlspecialchars($u_name); ?></h2><br>
                    <h2 style="color:white">Log New Complaint</h2><br>
                    <form action="#" method="post" enctype="multipart/form-data" style="color: gray">
                        Aadhar
                        <input type="text" name="aadhar_number" class="form-control" value="<?php echo $a_no; ?>" readonly>

                        <label>Location of Crime</label>
                        <select class="form-control" name="location" id="locationSelect" onchange="toggleManualLocation()" required>
                            <option value="">Select Location</option>
                            <?php
                            $loc = mysqli_query($conn, "SELECT location FROM police_station");
                            while ($row = mysqli_fetch_array($loc)) {
                                echo "<option value='" . htmlspecialchars($row[0]) . "'>" . htmlspecialchars($row[0]) . "</option>";
                            }
                            ?>
                            <option value="manual">Other (Enter manually)</option>
                        </select>

                        <input type="text" name="unused_location" id="manualLocation" class="form-control" placeholder="Enter location manually" style="display:none; margin-top:10px;">

                        <label>Type of Crime</label>
                        <select class="form-control" name="type_crime" required>
                            <option>Theft</option>
                            <option>Robbery</option>
                            <option>Pick Pocket</option>
                            <option>Murder</option>
                            <option>Rape</option>
                            <option>Molestation</option>
                            <option>Kidnapping</option>
                            <option>Missing Person</option>
                        </select>

                        <label>Date Of Crime</label>
                        <input type="date" name="d_o_c" class="form-control" required>

                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Describe the incident in details with time" required></textarea><br>

                        <button type="button" class="btn btn-info" onclick="startDictation()">
                            <i class="fa fa-microphone"></i> Start Recording
                        </button><br><br>


                        <input type="submit" value="Submit" name="s" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleManualLocation() {
            const select = document.getElementById("locationSelect");
            const manualInput = document.getElementById("manualLocation");
            if (select.value === "manual") {
                manualInput.style.display = "block";
                manualInput.required = true;
                select.name = "unused_location";
                manualInput.name = "location";
            } else {
                manualInput.style.display = "none";
                manualInput.required = false;
                manualInput.name = "unused_location";
                select.name = "location";
            }
        }

        function startDictation() {
            if (!('webkitSpeechRecognition' in window)) {
                alert('Your browser does not support Speech Recognition');
                return;
            }

            const recognition = new webkitSpeechRecognition();
            recognition.continuous = false;
            recognition.interimResults = false;
            recognition.lang = "en-IN";

            recognition.start();

            recognition.onresult = function(event) {
                const transcript = event.results[0][0].transcript;
                const textarea = document.querySelector('textarea[name="description"]');
                textarea.value += (textarea.value ? ' ' : '') + transcript;
                recognition.stop();
            };

            recognition.onerror = function(event) {
                alert('Speech recognition error: ' + event.error);
                recognition.stop();
            };
        }
    </script>
</body>
<footer style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; text-align: center; position: fixed; bottom: 0; width: 100%;">
  <h4 style="color: white;">&copy; 2025 <b>Jividha & Karuna</b> | All Rights Reserved</h4>
</footer>

</html> -->



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Complainer Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <style>
        body {
            background-image: url('crime1.gif');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 30px;
            margin-top: 80px;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        footer {
            background-color: rgba(0, 0, 0, 0.8);
            padding: 15px;
            color: white;
            text-align: center;
            margin-top: 50px;
        }

        @media (max-width: 768px) {
            .form-container {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
<?php
session_start();
if (!isset($_SESSION['x']))
    header("location:userlogin.php");

$conn = mysqli_connect("localhost", "root", "", "crime_portal");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$u_id = $_SESSION['u_id'];
$result = mysqli_query($conn, "SELECT a_no, u_name FROM user WHERE u_id='$u_id'");
$user = mysqli_fetch_assoc($result);
$a_no = $user['a_no'];
$u_name = $user['u_name'];

if (isset($_POST['s']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $type_crime = mysqli_real_escape_string($conn, $_POST['type_crime']);
    $d_o_c = $_POST['d_o_c'];
    $description = mysqli_real_escape_string($conn, trim($_POST['description']));

    $image_path = "";
    if (isset($_FILES["evidence_image"]) && $_FILES["evidence_image"]["error"] == 0) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES["evidence_image"]["name"]);
        $target_file = $target_dir . time() . "_" . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["evidence_image"]["tmp_name"]);
        if ($check !== false && in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            if (move_uploaded_file($_FILES["evidence_image"]["tmp_name"], $target_file)) {
                $image_path = $target_file;
            } else {
                echo "<script>alert('Error uploading image.');</script>";
            }
        } else {
            echo "<script>alert('Only JPG, JPEG & PNG files are allowed.');</script>";
        }
    }

    $var = strtotime(date("Ymd")) - strtotime($d_o_c);

    if ($var < 0) {
        echo "<script>alert('Enter a valid date');</script>";
    } else {
        $check_query = "SELECT * FROM complaint 
                        WHERE a_no='$a_no' AND location='$location' AND type_crime='$type_crime' 
                        AND d_o_c='$d_o_c' AND description='$description'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            echo "<script>alert('This complaint has already been filed.');</script>";
        } else {
            $comp = "INSERT INTO complaint (a_no, location, type_crime, d_o_c, description, evidence_image) 
                     VALUES ('$a_no', '$location', '$type_crime', '$d_o_c', '$description', '$image_path')";
            $res = mysqli_query($conn, $comp);

            if ($res) {
                echo "<script>alert('Complaint Registered Successfully');</script>";
            } else {
                echo "<script>alert('Error while registering complaint');</script>";
            }
        }
    }
}
?>

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.php"><b>Home</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarNav">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="nav navbar-nav">
                <li><a href="userlogin.php">User Login</a></li>
                <li class="active"><a href="complainer_page.php">User Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Log New Complaint</a></li>
                <li><a href="complainer_complain_history.php">Complaint History</a></li>
                <li><a href="logout.php">Logout <i class="fa fa-sign-out"></i></a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 form-container">
            <h3 class="text-center"><b>Welcome <?php echo htmlspecialchars($u_name); ?></b></h3>
            <h4 class="text-center">Log New Complaint</h4>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Aadhar</label>
                    <input type="text" class="form-control" value="<?php echo $a_no; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Location of Crime</label>
                    <select class="form-control" name="location" id="locationSelect" onchange="toggleManualLocation()" required>
                        <option value="">Select Location</option>
                        <?php
                        $loc = mysqli_query($conn, "SELECT location FROM police_station");
                        while ($row = mysqli_fetch_array($loc)) {
                            echo "<option value='" . htmlspecialchars($row[0]) . "'>" . htmlspecialchars($row[0]) . "</option>";
                        }
                        ?>
                        <option value="manual">Other (Enter manually)</option>
                    </select>
                    <input type="text" name="unused_location" id="manualLocation" class="form-control" placeholder="Enter location manually" style="display:none; margin-top:10px;">
                </div>

                <div class="form-group">
                    <label>Type of Crime</label>
                    <select class="form-control" name="type_crime" required>
                        <option>Theft</option>
                        <option>Robbery</option>
                        <option>Pick Pocket</option>
                        <option>Murder</option>
                        <option>Rape</option>
                        <option>Molestation</option>
                        <option>Kidnapping</option>
                        <option>Missing Person</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Date of Crime</label>
                    <input type="date" class="form-control" name="d_o_c" required>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="4" placeholder="Describe the incident in detail" required></textarea>
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-info" onclick="startDictation()">
                        <i class="fa fa-microphone"></i> Start Recording
                    </button>
                </div>

                <div class="form-group">
                    <label>Upload Image Evidence (JPG/PNG)</label>
                    <input type="file" name="evidence_image" class="form-control">
                </div>

                <button type="submit" name="s" class="btn btn-primary btn-block">Submit Complaint</button>
            </form>
        </div>
    </div>
</div>

<footer>
    <h4>&copy; 2025 <b>Jividha & Karuna</b> | All Rights Reserved</h4>
</footer>

<script>
    function toggleManualLocation() {
        const select = document.getElementById("locationSelect");
        const manualInput = document.getElementById("manualLocation");
        if (select.value === "manual") {
            manualInput.style.display = "block";
            manualInput.required = true;
            select.name = "unused_location";
            manualInput.name = "location";
        } else {
            manualInput.style.display = "none";
            manualInput.required = false;
            manualInput.name = "unused_location";
            select.name = "location";
        }
    }

    function startDictation() {
        if (!('webkitSpeechRecognition' in window)) {
            alert('Your browser does not support Speech Recognition');
            return;
        }

        const recognition = new webkitSpeechRecognition();
        recognition.continuous = false;
        recognition.interimResults = false;
        recognition.lang = "en-IN";

        recognition.start();

        recognition.onresult = function(event) {
            const transcript = event.results[0][0].transcript;
            const textarea = document.querySelector('textarea[name="description"]');
            textarea.value += (textarea.value ? ' ' : '') + transcript;
            recognition.stop();
        };

        recognition.onerror = function(event) {
            alert('Speech recognition error: ' + event.error);
            recognition.stop();
        };
    }
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html> -->




<!DOCTYPE html>
<html>

<?php
session_start();
if (!isset($_SESSION['x']))
    header("location:userlogin.php");

$conn = mysqli_connect("localhost", "root", "", "crime_portal");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$u_id = $_SESSION['u_id'];
$result = mysqli_query($conn, "SELECT a_no, u_name FROM user WHERE u_id='$u_id'");
$user = mysqli_fetch_assoc($result);
$a_no = $user['a_no'];
$u_name = $user['u_name'];

if (isset($_POST['s']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $type_crime = mysqli_real_escape_string($conn, $_POST['type_crime']);
    $d_o_c = $_POST['d_o_c'];
    $description = mysqli_real_escape_string($conn, trim($_POST['description']));

    $image_path = "";
    if (isset($_FILES["evidence_image"]) && $_FILES["evidence_image"]["error"] == 0) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES["evidence_image"]["name"]);
        $target_file = $target_dir . time() . "_" . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["evidence_image"]["tmp_name"]);
        if ($check !== false && in_array($imageFileType, ["jpg", "jpeg", "png"])) {
            if (move_uploaded_file($_FILES["evidence_image"]["tmp_name"], $target_file)) {
                $image_path = $target_file;
            } else {
                echo "<script>alert('Error uploading image.');</script>";
            }
        } else {
            echo "<script>alert('Only JPG, JPEG & PNG files are allowed.');</script>";
        }
    }

    $var = strtotime(date("Ymd")) - strtotime($d_o_c);

    if ($var < 0) {
        echo "<script>alert('Enter a valid date');</script>";
    } else {
        $check_query = "SELECT * FROM complaint 
                        WHERE a_no='$a_no' AND location='$location' AND type_crime='$type_crime' 
                        AND d_o_c='$d_o_c' AND description='$description'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            echo "<script>alert('This complaint has  been filed.');</script>";
        } else {
            $comp = "INSERT INTO complaint (a_no, location, type_crime, d_o_c, description, evidence_image) 
                     VALUES ('$a_no', '$location', '$type_crime', '$d_o_c', '$description', '$image_path')";
            $res = mysqli_query($conn, $comp);

            if ($res) {
                echo "<script>alert('Complaint Registered Successfully');</script>";
            } else {
                echo "<script>alert('Error while registering complaint');</script>";
            }
        }
    }
}
?>

<head>
    <title>Complainer Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Make it responsive -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="complainer_page.css" rel="stylesheet" type="text/css">
</head>

<body style="background-size: cover; background-image: url(crime1.gif); background-position: center;">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Responsive Toggle Button -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><b>Crime Poratl</b></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="userlogin.php">User Login</a></li>
                    <li class="active"><a href="complainer_page.php">User Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Log New Complaint</a></li>
                    <li><a href="complainer_complain_history.php">Complaint History</a></li>
                    <li><a href="logout.php">Logout <i class="fa fa-sign-out"></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="video" style="margin-top: 5%;">
        <div class="center-container">
            <div class="bg-agile">
                <div class="login-form">
                    <h2 style="color:white">Welcome <?php echo htmlspecialchars($u_name); ?></h2><br>
                    <h2 style="color:white">Log New Complaint</h2><br>
                    <form action="#" method="post" enctype="multipart/form-data" style="color: gray">
                        Aadhar
                        <input type="text" name="aadhar_number" class="form-control" value="<?php echo $a_no; ?>" readonly>

                        <label>Location of Crime</label>
                        <select class="form-control" name="location" id="locationSelect" onchange="toggleManualLocation()" required>
                            <option value="">Select Location</option>
                            <?php
                            $loc = mysqli_query($conn, "SELECT location FROM police_station");
                            while ($row = mysqli_fetch_array($loc)) {
                                echo "<option value='" . htmlspecialchars($row[0]) . "'>" . htmlspecialchars($row[0]) . "</option>";
                            }
                            ?>
                            <option value="manual">Other (Enter manually)</option>
                        </select>

                        <input type="text" name="unused_location" id="manualLocation" class="form-control" placeholder="Enter location manually" style="display:none; margin-top:10px;">

                        <label>Type of Crime</label>
                        <select class="form-control" name="type_crime" required>
                            <option>Theft</option>
                            <option>Robbery</option>
                            <option>Pick Pocket</option>
                            <option>Murder</option>
                            <option>Rape</option>
                            <option>Molestation</option>
                            <option>Kidnapping</option>
                            <option>Missing Person</option>
                        </select>

                        <label>Date Of Crime</label>
                        <input type="date" name="d_o_c" class="form-control" required>

                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4" placeholder="Describe the incident in details with time" required></textarea><br>

                        <button type="button" class="btn btn-info" onclick="startDictation()">
                            <i class="fa fa-microphone"></i> Start Recording
                        </button><br><br>

                       
                        <br>
                        <input type="submit" value="Submit" name="s" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
        function toggleManualLocation() {
            const select = document.getElementById("locationSelect");
            const manualInput = document.getElementById("manualLocation");
            if (select.value === "manual") {
                manualInput.style.display = "block";
                manualInput.required = true;
                select.name = "unused_location";
                manualInput.name = "location";
            } else {
                manualInput.style.display = "none";
                manualInput.required = false;
                manualInput.name = "unused_location";
                select.name = "location";
            }
        }

        function startDictation() {
            if (!('webkitSpeechRecognition' in window)) {
                alert('Your browser does not support Speech Recognition');
                return;
            }

            const recognition = new webkitSpeechRecognition();
            recognition.continuous = false;
            recognition.interimResults = false;
            recognition.lang = "en-IN";

            recognition.start();

            recognition.onresult = function(event) {
                const transcript = event.results[0][0].transcript;
                const textarea = document.querySelector('textarea[name="description"]');
                textarea.value += (textarea.value ? ' ' : '') + transcript;
                recognition.stop();
            };

            recognition.onerror = function(event) {
                alert('Speech recognition error: ' + event.error);
                recognition.stop();
            };
        }
    </script>

    <style>
        /* Responsive Enhancements */
        @media screen and (max-width: 768px) {
            .video {
                margin-top: 15%;
            }

            .login-form {
                padding: 10px;
                width: 90%;
                margin: auto;
            }

            .navbar-brand, .navbar-nav > li > a {
                font-size: 16px;
            }

            .form-control {
                font-size: 14px;
            }

            textarea.form-control {
                height: auto;
            }
        }
    </style>
</body>

<footer style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; text-align: center; position: fixed; bottom: 0; width: 100%;">
    <h4 style="color: white;">&copy; 2025 <b>Jividha & Karuna</b> | All Rights Reserved</h4>
</footer>

</html>
