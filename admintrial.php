<html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<?php
$conn = mysqli_connect('localhost', 'root', '', 'galipette');
            
if (!$conn)
{
    die ( "connection failed".mysqli_connect_error());
}


?>
</head>
    <body>

        <!-- Sidebar -->
        <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%">
          
          <br><a href="home.php"><img src="galipette-logo-2.gif" height="40" style="padding:2px 30px;"></a>
          <!-- <img src="logo.png" width="150" height="50" >  -->
          <a href="home.php" class="w3-bar-item w3-button" >Home</a>
           <!-- <a href="addC.php" class="w3-bar-item w3-button" >Add Category</a> -->
          <a href="categories.php" class="w3-bar-item w3-button" >Manage Category</a>

          <!-- <a href="addP.php" class="w3-bar-item w3-button">Add Products</a> -->
          
          <a href="Products.php" class="w3-bar-item w3-button" >Manage Products</a>
          
        </div>

        <div style="margin-left:15%">


       
              
    </body>

    <script>
    
    </script>

</html>