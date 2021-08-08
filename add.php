<html>

<head>

<?php
include "Admintrial.php";
?>

</head>

<body>

<!-- Page Content -->
    <div style="margin-left:0%">

        <?php if(isset($_GET["addC"])) { ?>
        <div class="w3-container w3-blue">
        <h1>Add category</h1>
        </div>

        <div class="w3-container" >
        
            <h3> Add new category </h3>

            <form method="post">
            Name: <input type="text" name="name" required> <br><br>
            <input type="submit" name="submit" class="add">
            </form>
            
            <?php

                if(isset($_POST["submit"]) ){
                    
                    $sql = "INSERT into category (nameC) VALUES ('".$_POST['name']."')  ";
                    $result = $conn->query($sql);
                    
                    if ($result === TRUE) {
                        echo "<br><h3>success</h3>";
                        header('location: categories.php');
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                
                }

            ?>
        </div>
        <?php } ?>
        <?php if(isset($_GET['addP'])){  ?>

            <div class="w3-container w3-blue">
        <h1>Add new product</h1>
        </div>

        <div class="w3-container" id="home">
        
        <br>

        <form method="post" enctype="multipart/form-data">
        Name: <input type="text" name="name" required> <br><br>
        Category: <select name="category" required> <?php   

            $sqll="SELECT * FROM gallery
            RIGHT JOIN category ON category.nameC=gallery.categoryName 
            AND category.categoryID=gallery.category ";
            $resultt=$conn->query($sqll);
            
            if ($resultt->num_rows > 0) {
                while($row = $resultt->fetch_assoc()) {
                    echo "<option value=".$row['categoryID'].">".$row['categoryID']."-".$row['nameC']."</option><br><br>";
                } 
            }
            ?>
            </select> <br><br>
        Content: <input type="text" name="content" required> <br><br>
        Image: <input type="file" name="image" required> <br><br>
        <input type="submit" name="submit" class="add">
        </form>
        
        <?php

            if(isset($_POST["submit"])){
                #VALUES ('".$_POST['name']."','".$_POST['categoryID']."','".$_POST['image']."' )

                #File handling

                    $tmp_name = $_FILES['image']['tmp_name'];
                    $file_content = addslashes(file_get_contents($tmp_name));

                    $sql = "INSERT into gallery (name,category,content,image) 
                    VALUES ('".$_POST['name']."','".$_POST['category']."','".$_POST['content']."','{$file_content}') ";
                    $result = $conn->query($sql);
                    
                    if ($result === TRUE) {
                        echo "<br><h3>success</h3>";
                        header('location: Products.php');
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                
            }

        ?>
        </div>


        <?php }  ?>

    </div>
</body>

        

</html>