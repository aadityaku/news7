<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container">
        <a href="" class="navbar-brand"><img src="logo.jpg" class="rounded-circle" alt="" style="height: 60px;" ></a>
    
    <form action="" method="post" class="d-flex">
        <input type="search" name="search" class="form-control" size="60" placeholder="Search here news title,category">
        <input type="submit" name="go"  class="btn btn-danger ms-1">
    </form>
    <ul class="navbar-nav">
        <li class="nav-item"><a href="index.php" class="nav-link text-white">Home</a></li>
        <li class="nav-item"><a href="" class="nav-link text-white">About</a></li>
        <li class="nav-item"><a href="insert.php" class="nav-link text-white">Insert news</a></li>
        <li class="nav-item"><a href="" class="nav-link text-white">Contact Us</a></li>
    </ul>
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-white bg-light py-1 sticky-top">
    <div class="container">
        <ul class="navbar-nav">
            <?php
            $data=$datawork->callingData("category");
            foreach($data as $r){
                ?>
            <li class="nav-item"><a href="index.php?id=<?= $r['c_id'];?>" class="nav-link"><?= $r['cat_title']?></a></li>
           <?php } ?>
        </ul>
    </div>
</nav>