<?php
$item = array('name' => 'Harry Potter Book', 'description' => 'Descritipiont asdfsadf', 'category_id' => 'Book', 'price' => '4.99');
$message = array('sender_name' => 'John Smith', 'receiver_name' => 'Jason', 'date_sent' => '2017-04-17 22:58:33', 'message' => "hello, i wanted to see if you can meet me at Quad.", 'location_id' => "Quad");
$locations = array('location' => 'Quad');
?>
<div class="container-fluid">
    <div class = "row">
            <center><h1> View Message </h></center>
        </div>
    
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-2">
            <img src="<?= site_url('thumbnail/32'); ?>" class="img-responsive">
            <?php
            echo "";
            $path = site_url("thumbnail/32");
            ?>
        </div>
        <div class="col-md-3">
            <?php
            echo "<h4><strong>Item: </strong>$item[name]</h4>";
            echo "<h4><strong>Price: $</strong>$item[price]</h4>";
            echo "<h4><strong>Catageory: </strong>$item[category_id]</h4>";
            echo "<h4><strong>Safe Meeting Location: </strong>$locations[location]</h4>";
            ?>
        </div>
        <div class =" col-md-3">
         
<!--            <div id="map"></div>
            <script>
                initMap();
            </script>

            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPPBuI9Ok7SqFArQX8RjzG4DP4jfLZABc&callback=initMap">
            </script>-->

        </div>
                <div class="col-md-2"></div>

    </div>
    <form method="post" id="ViewMessage" action ="<?=$_SESSION['continue_destination'] ?>">

        <div class = "row">
            <div class ="col-md-2"></div>
            <div class ="col-md-8">
                <div class="center-block">
                    <?php
                    echo "<h3>From:" .htmlentities($message["sender_name"]) . "@ " .htmlentities($message['date_sent']) . "</h3>";
                    echo "<pre>" . htmlentities($message["message"]) . "</pre>";
                    ?>
                </div>


                <div class="form-group">
                    <label for="reply">Reply:</label>
                    <textarea class="form-control" rows="5" id="description" name = "reply" required = "true"></textarea>
                </div>

            </div>
            <div class ="col-md-2"></div>

        </div>

        <div class = "row">
            <div class = "col-md-5"> </div>
            <div class = "col-md-2"> 
                <a href="<?= site_url("ViewMessages"); ?>" class="btn btn-default btn-block" role="button">Back</a>
                <button type="submit" class="btn btn-success btn-block">Reply</button>

            </div>
            <div class = "col-md-5"> </div>
        </div>
    </form>

</div>