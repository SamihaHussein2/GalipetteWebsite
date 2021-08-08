<html>

<head>
<?php include "Admintrial.php";?>

</head>


<body>

<div style="margin-left:0%">

    <div class="w3-container w3-blue">
    <h1>Products from database</h1>
    </div>
    
    <div class="w3-container">
      <br>  
    <a href="add.php?addP" ><input type="submit" class="add" value="add Product"></a>
    

<?php

# problem here is i can't display the category name of each product in gallery table by inner join it just worked in add and edit
# search for another solution to display the name of the category of each categoryid in the gallery table from category table


$conn = mysqli_connect('localhost', 'root', '', 'galipette');
            
        if (!$conn)
        {
            die ( "connection failed".mysqli_connect_error());
        }
        #lEFT JOIN category ON gallery.category=category.categoryID AND gallery.categoryName=category.nameC 
       
        $sql="SELECT * FROM gallery ";
        $result=$conn->query($sql);


        

        if ($result->num_rows > 0 ) {
            while($row = $result->fetch_assoc() ) {
              /*  echo "<h5>";
                echo $row["name"];
                echo "</h5><br><br>";
                echo '<img src="data:image/jpg/png/jpeg;base64,' . base64_encode( $row['image'] ) . '" height="150" />';
                echo "<br><br>"; */
                
                

                echo "<table>";
                echo "<thead><tr>" ;
                echo "<th> ID </th> 
                <th> Name </th> 
                <th>Category</th>
                 <th>Content</th> 
                <th>Image</th> 
                <th>Edit</th> 
                <th>Delete</th>";
                echo "</thead></tr>";  


                echo "<tbody><tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['category'].$row['categoryName']."</td>";
                echo "<td>".$row['content']."</td>";
                echo '<td><img src="data:image/jpeg/png/jpg;base64,'.base64_encode($row['image']).'"height="50" ></td>';
                echo '<td><a href="edit.php?editGallery='.$row['id'].'">Edit</a></td>';
                echo '<td><a href="delete.php?deleteGallery='.$row['id'].'">Delete</a></td>';
                echo "</tbody></tr></table>";

            }
        }


      
?>

</div> 
    </div>


</body>



</html>