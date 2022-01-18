<div class="card">
    <div class="card-header text-white text-center bg-danger">Popular News</div>
    <div class="card-body p-0">
      <div class="list-group list-group-flash">
          <?php
          $data=$datawork->orderData("posts","views","4");
          foreach($data as $row){
          ?>
             <a href="index.php?title=<?= $row['id'];?>" class='list-group-item list-group-item-action small text-truncate'><?= $row['title'];?></a>
          
          <?php } ?>

      </div>
    </div>
</div>