<div class = "panel panel-default">
    <div class = "panel-body">
        <div class = "container-fluid">

            <div class = "row">
                <div class = "col-md-3">
                    <?php
                    $path = site_url("dbimg/$item->photo");
                    echo "<img src='$path' class='img-responsive'>";?>
                </div>
                <div class = "col-md-7">
                    <?php
                    echo "<h2><strong>Item name: </strong>$item->name</h2>";
                    echo "<h3><strong>Description </strong></h3><br>";
                    echo "<p>$item->description</p>"; ?>
                </div>
                <div class = "col-md-2">
                    <a href="#" class="btn btn-default btn-block btn-wrap" role="button">Buy Now! (goes nowhere in the prototype)</a>
                </div>
            </div>
        </div>
    </div>
</div>
