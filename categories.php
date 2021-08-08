
<html>

<head>
<?php include "Admintrial.php";?>
    <style>

        
    </style>
</head>


<body>

<div style="margin-left:0%">

    <div class="w3-container w3-blue">
        <h1>Products from database</h1>
    </div>

    <br>
    <div class="w3-container">

    <a href="add.php?addC" ><input type="submit" class="add" value="add category"></a>
    
    <h1>  </h1>
<?php

$conn = mysqli_connect('localhost', 'root', '', 'galipette');
        
    if (!$conn)
    {
        die ( "connection failed".mysqli_connect_error());
    }

    $sql="SELECT * FROM category";
    $result=$conn->query($sql);


    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          
            echo "<table>";
            echo "<tr>" ;
            echo "<th> ID </th> <th> Category Name </th>";
            echo "<th> Edit </th> <th> Delete </th>";
            echo "</tr>";  
            echo "<tr>";
            echo "<td>".$row['categoryID']."</td>";
            echo "<td>".$row['nameC']."</td>";
            echo '<td><a href="edit.php?editCategory='.$row['categoryID'].'">Edit</a></td>';
            echo '<td><a href="delete.php?deleteCategory='.$row['categoryID'].'">Delete</a></td>';
            echo "</table>";

        }
    }


  
?>


    </div> 
</div>

</body>



</html>