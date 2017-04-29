
<?php
if(!isset($item)){
    $item = array(
        "name" => "Harry Potter",
        "photo" => 32,
        "description" => "This is a book!",
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
            <?php
            $path = site_url("dbimg/{$item['photo']}");
            echo "<img src='$path' class='img-responsive'>";
            ?>
        </div>
        <div class = "col-md-7">
            <?php
            echo "<h2><strong>Item Name: </strong>{$item['name']}</h2>";
            echo "<h3><strong>Description </strong></h3><br>";
            echo "<p>{$item['description']}</p>";
            ?>
        </div>
        <div class = "col-md-2">
            <h3>Price: $<?= number_format($item['price'], 2); ?></h3>
        </div>
    </div>

    <div class="text-right">
        <a href="cancel_destination; ?>"<button type="continue" class="btn btn-default">Click here to edit</button> </a>
    </div>
</div>


