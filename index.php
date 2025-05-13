<!-- <!DOCTYPE html>
<html>
<head>
    
	<title>Crime Portal</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="home.css">
    
</head>
    
<body>

 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="userlogin.php">User Login  <i class="fa fa-user"></i></a></li>
        <li><a href="official_login.php">Official Login  <i class="fa fa-user"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>

 <div class="container">
 	<div class="row">
 		<div class="col-lg-12">
 			<div class="content">
 				<h1>Have a Complaint?</h1>
 				<h3>Register Below &nbsp &nbsp<i class="fa fa-hand-o-down" aria-hidden="true"></i></h3>
 				<hr>
          <a href="registration.php" class="btn btn-default btn-lg" role="button" aria-pressed="true">Sign Up!</a>
 			</div>
 		</div>
 	</div>
 </div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
</body>
</html> -->


<!-- <!DOCTYPE html>
<html>
<head>
    <title>Crime Portal</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>

 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="userlogin.php">User Login  <i class="fa fa-user"></i></a></li>
        <li><a href="official_login.php">Official Login  <i class="fa fa-user"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>

 <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="content text-center">
                <h1>Have a Complaint?</h1>
                <h3>Register Below &nbsp;&nbsp;<i class="fa fa-hand-o-down" aria-hidden="true"></i></h3>
                <hr>
                <a href="registration.php" class="btn btn-default btn-lg" role="button" aria-pressed="true">Sign Up!</a>
                <br><br>

                <!-- Emergency Alert Button --
                <button id="alertButton" class="btn btn-danger btn-lg">
                    Emergency Alert <i class="fa fa-bell"></i>
                </button>
                <button id="findStation" class="btn btn-primary btn-lg">
                Find Nearest Police Station <i class="fa fa-map-marker"></i>
                  </button>



                <!-- Hidden Audio --
                <audio id="siren" src="police_siren.mp3"></audio>
            </div>
        </div>
    </div>
 </div>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

 <script>
    document.getElementById('alertButton').addEventListener('click', function () {
        // Play police siren
        document.getElementById('siren').play();

        // Get user location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                // Send location to backend (save_alert.php)
                $.ajax({
                    url: 'save_alert.php',
                    type: 'POST',
                    data: { lat: latitude, lon: longitude },
                    success: function (response) {
                        alert("Emergency alert sent to the police!");
                    },
                    error: function () {
                        alert("Failed to send emergency alert. Try again.");
                    }
                });

            }, function (error) {
                alert("Location access denied. Enable GPS and try again.");
            });
        } else {
            alert("Geolocation is not supported by your browser.");
        }
    });

    document.getElementById('findStation').addEventListener('click', function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;

                // Open Google Maps with search query
                var mapUrl = https://www.google.com/maps/search/police+station/@${lat},${lon},15z;
                window.open(mapUrl, '_blank');
            }, function () {
                alert("Location access denied. Enable GPS and try again.");
            });
        } else {
            alert("Geolocation is not supported by your browser.");
        }
    });

 </script>

</body>
</html> -->



<!-- <!DOCTYPE html>
<html>
<head>
    <title>Crime Portal</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>

 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>Crime Portal</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="userlogin.php">User Login  <i class="fa fa-user"></i></a></li>
        <li><a href="official_login.php">Official Login  <i class="fa fa-user"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>

 <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="content text-center">
                <h1>Have a Complaint?</h1>
                <h3>Register Below &nbsp;&nbsp;<i class="fa fa-hand-o-down"></i></h3>
                <hr>
                <a href="registration.php" class="btn btn-default btn-lg">Sign Up!</a>
                <br><br>

                <!-- Emergency Alert Button --
                <button id="alertButton" class="btn btn-danger btn-lg">
                    Emergency Alert <i class="fa fa-bell"></i>
                </button>
                <button id="findStation" class="btn btn-primary btn-lg">
                    Find Nearest Police Station <i class="fa fa-map-marker"></i>
                </button>

                <!-- Hidden Audio --
                <audio id="siren" src="police_siren.mp3"></audio>
            </div>
        </div>
    </div>
 </div>

 <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

 <script>
    document.getElementById('alertButton').addEventListener('click', function () {
        var siren = document.getElementById('siren');

        // Attempt to play sound
        try {
            siren.play().catch(error => {
                console.log("Audio play error: " + error);
                alert("Audio playback blocked. Please enable sound.");
            });
        } catch (error) {
            console.log("Error playing siren:", error);
        }

        // Get user location
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                // Send location to backend
                $.ajax({
                    url: 'save_alert.php',
                    type: 'POST',
                    data: { lat: latitude, lon: longitude },
                    success: function (response) {
                        alert("Emergency alert sent to the police!");
                        console.log("Server response:", response);
                    },
                    error: function (xhr, status, error) {
                        console.log("AJAX Error: ", status, error);
                        alert("Failed to send emergency alert. Try again.");
                    }
                });

            }, function (error) {
                alert("Location access denied. Enable GPS and try again.");
            });
        } else {
            alert("Geolocation is not supported by your browser.");
        }
    });

    document.getElementById('findStation').addEventListener('click', function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;

                // Open Google Maps with search query
                var mapUrl = https://www.google.com/maps/search/police+station/@${lat},${lon},15z;
                window.open(mapUrl, '_blank');
            }, function () {
                alert("Location access denied. Enable GPS and try again.");
            });
        } else {
            alert("Geolocation is not supported by your browser.");
        }
    });
 </script>

</body>
</html> -->




<!DOCTYPE html>
<html>
<head>
    <title>Crime Portal</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>

 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><b>Crime Portal</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="userlogin.php">User Login  <i class="fa fa-user"></i></a></li>
        <li><a href="official_login.php">Official Login  <i class="fa fa-user"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>

 <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="content text-center">
                <h1>Have a Complaint?</h1>
                <h3>Register Below &nbsp;&nbsp;<i class="fa fa-hand-o-down"></i></h3>
                <hr>
                <a href="registration.php" class="btn btn-default btn-lg">Sign Up!</a>
                <br><br>

                <!-- Emergency Alert Button -->
                <!-- <button id="alertButton" class="btn btn-danger btn-lg">
                    Emergency Alert <i class="fa fa-bell"></i>
                </button>--->
                <button id="findStation" class="btn btn-primary btn-lg">
                    Find Nearest Police Station <i class="fa fa-map-marker"></i>
                </button>

                <!-- Hidden Audio --
                <audio id="siren">
                    <source src="police_siren.mp3" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio> -->
                <!-- Emergency Alert Button -->
<button id="alertButton" class="btn btn-danger btn-lg">
    Emergency Alert <i class="fa fa-bell"></i>
</button>

<!-- Hidden siren audio -->
<audio id="siren">
    <source src="police_siren.mp3" type="audio/mpeg">
</audio>
            </div>
        </div>
    </div>
 </div>

 <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

 <script>
    // document.getElementById('alertButton').addEventListener('click', function () {
    //     var siren = document.getElementById('siren');

    //     siren.play().then(() => {
    //         console.log("Siren is playing.");
    //     }).catch(error => {
    //         console.error("Error playing siren:", error);
    //         alert("Audio playback blocked or file not found. Try clicking again or check the audio file.");
    //     });

    //     if (navigator.geolocation) {
    //         navigator.geolocation.getCurrentPosition(function (position) {
    //             var latitude = position.coords.latitude;
    //             var longitude = position.coords.longitude;

    //             console.log("User Location: ", latitude, longitude);

    //             $.ajax({
    //                 url: 'view_alerts.php',
    //                 type: 'POST',
    //                 data: { lat: latitude, lon: longitude },
    //                 success: function (response) {
    //                     alert("Emergency alert sent to the police!");
    //                     console.log("Server response:", response);
    //                 },
    //                 error: function (xhr, status, error) {
    //                     console.log("AJAX Error:", status, error);
    //                     alert("Failed to send emergency alert. Try again.");
    //                 }
    //             });

    //         }, function (error) {
    //             console.log("Geolocation error:", error);
    //             alert("Location access denied. Enable GPS and try again.");
    //         });
    //     } else {
    //         alert("Geolocation is not supported by your browser.");
    //     }
    // });
    document.getElementById('alertButton').addEventListener('click', function () {
    var siren = document.getElementById('siren');
    siren.play();

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            $.ajax({
                url: 'view_alerts.php',
                type: 'POST',
                data: { lat: latitude, lon: longitude },
                success: function (response) {
                    alert("Emergency alert sent successfully!");
                    console.log(response);
                },
                error: function () {
                    alert("Failed to send alert.");
                }
            });
        }, function (error) {
            alert("Enable GPS to send alert.");
        });
    } else {
        alert("Geolocation not supported.");
    }
});

    document.getElementById('findStation').addEventListener('click', function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;

                var mapUrl = `https://www.google.com/maps/search/${encodeURIComponent('police station')}@${lat},${lon},15z`;
                window.open(mapUrl, '_blank');
            }, function (error) {
                console.log("Geolocation error:", error);
                alert("Location access denied. Enable GPS and try again.");
            });
        } else {
            alert("Geolocation is not supported by your browser.");
        }
    });
</script>


</body>
<footer style="background-color: rgba(0, 0, 0, 0.7); padding: 20px; text-align: center; position: fixed; bottom: 0; width: 100%;">
  <h4 style="color: white;">&copy; 2025 <b>Jividha & Karuna</b> | All Rights Reserved</h4>
</footer>

</html> 


