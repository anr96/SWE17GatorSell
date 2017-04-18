<?php $this->load->helper('html'); ?>
<div class = "panel panel-default">
    <div class = "panel-body">
        <div class = "container-fluid">
            <div class = "row">
                <div class = "col-md-2">
                    <?php
                    $thumbnailUrl = site_url("thumbnail/$item->photo");
                    $uri = "item/$item->id";
                    echo anchor($uri, "<img src='$thumbnailUrl' class='img-responsive'>");
                    ?>
                </div>
                <div class = "col-md-8">
                    <?php
                    echo "<h3><strong>Item name: </strong>$item->name</h3>";
                    echo "<strong>Description : </strong>$item->description ...<br>";
                    echo anchor($uri,"Read More","class = 'pull-right'"); ?>
                </div>
                <div class = "col-md-2">
                    <h4>Price: $<?= number_format($item->price, 2);?></h4>
                    <a href="<?=site_url('MessageSeller');?>" class="btn btn-warning btn-block btn-wrap"  role="button">Contact Seller</a>
                </div>
            </div>
        </div>
    </div>
</div>
