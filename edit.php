<html>

<head>
<?php include "Admintrial.php";?>
</head>

<body>



<?php

    # choice to edit the categories
	if (isset($_GET['editCategory'])) {
		$id = $_GET['editCategory'];
        $sqledit= "SELECT * FROM 
        category WHERE categoryID='$id' ";
		$record = $conn->query($sqledit);
        
		if ($record->num_rows > 0) {
            while($row = $record->fetch_assoc()) {
                $name = $row['nameC'];
            }
        } ?>
	

<div style="margin-left:0%">

    <div class="w3-container w3-blue">
    <h1>Edit categories</h1>
    </div>
    <div class="w3-container">
        <br>
    <form method="post">

        Name: <input type="text" name="name" value="<?php echo $name; ?> "> <br><br>
        <input type="submit" name="submit" value="save">
    </form>
            <?php
                if(isset($_POST["submit"])){
                    $sqlupdate="UPDATE category set nameC='".$_POST["name"]."' WHERE categoryID='$id'";
                    $resultU=mysqli_query($conn,$sqlupdate) or die( mysqli_error($conn));
                    header('location: categories.php');
                    $row= mysqli_fetch_array($resultU);

                }
            ?>

</div> 
    </div>
    <?php  } ?>
    <?php 

    # choice to edit the gallery
    if (isset($_GET['editGallery'])) {
        $id = $_GET['editGallery'];
        $sqledit= "SELECT * FROM gallery WHERE id='$id'";
        $record = $conn->query($sqledit);
        
        if ($record->num_rows > 0) {
            while($row = $record->fetch_assoc()) {
                $name = $row['name'];
                $category = $row['category'];
                $image =base64_encode($row['image']);
                $content = $row['content'];
            }
        } 
    ?>   


        <div style="margin-left:0%">

            <div class="w3-container w3-blue">
            <h1>Edit products</h1>
            </div>
            <div class="w3-container">

            <h1>  </h1>

            <form method="post" enctype="multipart/form-data" >

                Name: <input type="text" name="name" value="<?php echo $name; ?> "> <br><br>
                Category: <select name="category" > <?php   

                    $sqll="SELECT * FROM gallery 
                    RIGHT JOIN category ON category.nameC=gallery.categoryName 
                    AND category.categoryID='$id'";
                    $resultt=$conn->query($sqll);
                    ?>
                    <option value="item1" >Choose a category</option>
                    <?php
                    if ($resultt->num_rows > 0) {
                        while($row = $resultt->fetch_assoc()) {
                            echo "<option value=".$row['categoryID'].">".$row['categoryID']."-".$row['nameC']."</option><br><br>";
                        }
                    }
                    ?>
                    </select> <br><br>
                    <?php ob_start(); ?>  <!-- solution that removed the header error -->
                Content: <input type="text" name="content" value="<?php echo $content; ?>" > <br> <br>
                Image: <input type="file" name="image"  value="<?php echo $image; ?>"> 
                 <br><br>
                <input type="submit" name="submit">
            </form>

                    <?php
                        
                        # need to solve the problem of changing the categories id when the user didn't change it
                        # i think that we have to read from database the id of the previous input (from table gallery) 
                            # then store it in a variable and then write a condidition to check if it's the same or empty 
                               # if empty -> send the variable  if not send the new input normaly  

                        if(isset($_POST["submit"])){
                            
                            $selected = $_POST['category'];
                            if ($selected == "item1" ) {
                                echo '<script>alert("Please Choose a category ")</script>';
                            }

                            # in this case image is not changed
                            if($_POST['image'] =" "){ 
                                
                            $sqlupdate="UPDATE gallery set name='".$_POST["name"]."',category='".$_POST["category"]."'
                            ,content='".$_POST["content"]."' WHERE id='$id' ";
                            $resultU=mysqli_query($conn,$sqlupdate) or die( mysqli_error($conn));
                            if ($resultU === TRUE) {
                                #echo "<br><h3>success</h3>";
                                header('location: Products.php');
                               #echo "After:".$_POST['category'];
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                            //$row= mysqli_fetch_array($resultU);
                            }

                            # in this case image is changed
                            else{

                                #File handling #how to update a BLOB image
                                $tmp_name = $_FILES['image']['tmp_name'];
                                $file_content = addslashes(file_get_contents($tmp_name));
                                
                                $sqlupdate="UPDATE gallery set name='".$_POST["name"]."',category='".$_POST["category"]."'
                                ,image='{$file_content}',content='".$_POST["content"]."' WHERE id='$id' ";
                                $resultU=mysqli_query($conn,$sqlupdate) or die( mysqli_error($conn));
                                if ($resultU === TRUE) {
                                    #echo "<br><h3>success</h3>";
                                    header('location: Products.php');
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                                //$row= mysqli_fetch_array($resultU);
                            }


                        }

                        ob_flush();

                    ?>

        </div> 

<?php }  ?>

</body>

</html>