<html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<?php
include "Admintrial.php";
?>

<?php
$conn = mysqli_connect('localhost', 'root', '', 'galipette');
            
if (!$conn)
{
    die ( "connection failed".mysqli_connect_error());
}


?>
</head>
    <body>

        <div style="margin-left:0%">

            <div class="w3-container w3-blue">
                <h1>Home</h1>
            </div>

                
            <div class="w3-container">
                <h3>Welcome to Galipette admin dashboard </h3>
            </div>
        </div>
         
    </body>

    <script>
    
    </script>

</html>