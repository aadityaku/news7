<?php include "config.php"?>
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
    <?php include "header.php"?>
    <div class="container mt-3">
        <div class="row">
        <div class="col-3">
                <?php include "side.php";?>
            </div>
            <div class="col-lg-9">
                <?php
              if(isset($_POST['go'])){
                  $search=$_POST['search'];
                  $query=$datawork->callingData("posts","title LIKE '%$search%'");
              }  
            elseif(isset($_GET['id'])){
                $id=$_GET['id'];
                
                $query=$datawork->callingData("posts","cat_id='$id'");
                // $count=mysqli_num_rows($query);
                // if($count<1){
                //     echo "<div class='alert alert-danger mt-3'>
                //     <h1 class='alert-heading text-center'>Not Found </h1> <p class='text-center'> Sorry Try Again </p>
                //   </div>";
                // }
            } 
            elseif(isset($_GET['title'])){
                $id=$_GET['title'];
                $query=$datawork->callingData("posts","id='$id'");
            } 
            else{ 
            $query = $datawork->callingData("posts");
            }
            foreach($query as $row){

            ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="h4"><?= $row['title'];?></h2>
                        <div class="container my-2">
                            <div class="row small text-mutted">
                                <div class="col"><i class="bi bi-person-fill"></i><?= $row['author'];?></div>
                                <div class="col"><i class="bi bi-clock"></i><?= $row['date'];?></div>
                                <div class="col"><i class="bi bi-eye"></i><?= $row['views'];?></div>
                            </div>
                        </div>
                        <p class="small"><?=  substr($row['content'],0,700);?>...</p>
                        <a href="view.php?id=<?= $row['id'];?>" class="btn btn-success float-end">Read More</a>

                    </div>
                </div>
<?php }?>
            </div>
            
        </div>
    </div>
</body>
</html>