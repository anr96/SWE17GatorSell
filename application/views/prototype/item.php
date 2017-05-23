<div class = "container-fluid">
    <div class = "row">
        <div class = "col-md-3 min-lr-pad">
            <?php
            $path = site_url("dbimg/{$item['photo_id']}");
            echo "<img src='$path' class='img-responsive'>";
            ?>
        </div>
        <div class = "col-md-7">
            <h2><strong>Item Name: </strong><?= htmlentities($item['name'])?></h2>
            <h3><strong>Description </strong></h3>
            <pre><?= htmlentities($item['long_description'])?></pre>
        </div>
        <div class = "col-md-2">
            <h3>Price: $<?= number_format($item['price'], 2); ?></h3>
            <a href="<?= site_url("messages/message_seller/$item[id]");?>" class="btn btn-warning btn-block btn-wrap" role="button">Contact Seller</a>
        </div>
    </div>
</div>
