<?php include "config.php"?>
<?php
$id=$_GET['id'];
$updatview=$datawork->update("posts","id='$id'","views=views+1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
</head>
<body>
    <?php include "header.php";?>
    <?php 
    $id =$_GET['id'];
    $row=$datawork->singleCalling("posts","id='$id'");
   
    ?>
    <div class="container mt-2">
       
                <div class="card">
                    <div class="card-body">
                    <div class="row">
            <div class="col-8">
                        <h2 class="display-6"><?= $row['title'];?></h2>
                        <div class="container my-2">
                            <div class="row small text-mutted">
                            <div class="col"><i class="bi bi-person-fill"></i><?= $row['author'];?></div>
                           <div class="col"><i class="bi bi-clock"></i><?= $row['date'];?></div>
                            <div class="col"><i class="bi bi-eye"></i><?= $row['views'];?></div>
                            </div>
                        </div>
                        <p class="lead">
                          <?= $row['content'];?>
                          </p>
                    </div>
                    <div class="col-4">
                        <div class="card" >
                          
                            <img src="images/<?= $row['img'];?>" class="card-img-top"  style="height: 300px;"alt="">
                           
                        </div>
                     
                </div>
                </div>
                
            </div>
        </div>
    </div>
  
</body>
</html>