<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>news portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <?php include "header.php";?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="">Category</label>
                                <input type="text" name="cat_title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="submit" class="btn btn-success w-100">
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['submit'])){
                            $d=['cat_title'=>$_POST['cat_title']];
                            $datawork->insertData("category",$d);
                            $datawork->refresh("insert.php");
                        }
                        ?>
                    </div>
                </div>
            </div>
         <div class="col-9">
             <div class="card">
                 <div class="card-body">
                     <form action="insert.php" method="post" enctype="multipart/form-data">
                         <div class="mb-3">
                             <label for="">Title</label>
                             <input type="text" name="title" class="form-control">
                         </div>
                         <div class="mb-3">
                             <label for="">author</label>
                             <input type="text" name="author" class="form-control">
                         </div>
                         <div class="mb-3">
                             <label for="">Category</label>
                            <select name="cat_id" class="form-select">
                                <?php 
                                $cat=$datawork->callingData("category");
                                foreach($cat as $r){
                                    ?>
                                    <option value="<?= $r['c_id'];?>"><?= $r['cat_title'];?></option>
                                    <?php } ?>
                            </select>
                         </div>
                         <div class="mb-3">
                             <label for="">content</label>
                             <input type="text" name="content" class="form-control">
                         </div>
                         <div class="mb-3">
                             <label for="">News image</label>
                             <input type="file" name="img" class="form-control">
                         </div>
                         <div class="mb-3">
                            
                             <input type="submit" name="Go" class="btn btn-success w-100">
                         </div>
                     </form>
                     <?php 
                     if(isset($_POST['Go'])){
                        $img=$_FILES['img']['name'];
                        $tmp_img=$_FILES['img']['tmp_name'];
                        move_uploaded_file($tmp_img,"images/$img");
                         $data=[
                         'title'=>$_POST['title'],
                         'author'=>$_POST['author'],
                         'content'=>$_POST['content'],
                         'cat_id'=>$_POST['cat_id'],
                         'img'=>$img
                         ];
                         $datawork->insertData("posts",$data);
                         $datawork->refresh();
                     }
                     ?>
                 </div>
             </div>
         </div>
        </div>
    </div>
</body>
</html>