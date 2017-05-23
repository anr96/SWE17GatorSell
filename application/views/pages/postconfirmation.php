
<?php
if(!isset($item)){
    $item = array(
        "name" => "Harry Potter",
        "photo_id" => 32,
        "long_description" => "This is a book!",
        "price" => 5.99
    );
}
?>
<div class="containter-fluid">
    <div class="text-center">
        <h1>Thank you for posting!</h1> 
    </div>

    <h2>Review:</h2>

    <div class = "row">
        <div class = "col-md-3 min-lr-pad">
            <img src="<?=site_url("dbimg/$item[photo_id]")?>" class="img-responsive">
        </div>
        <div class = "col-md-7">
            <h2><strong>Item Name: </strong><?= htmlentities($item['name'])?></h2>
            <h3><strong>Description </strong></h3><br>
            <pre><?= htmlentities($item['long_description'])?></pre>
        </div>
        <div class = "col-md-2">
            <h3>Price: $<?= number_format($item['price'], 2); ?></h3>
        </div>
    </div>

    <div class="text-center">
        <a href="<?= $_SESSION['cancel_destination'] ?>" class="btn btn-success">Continue</a>
    </div>
</div>


