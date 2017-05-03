<?php
if (!isset($messages)) {
    $messages = array(
        array('id' => 3, 'photo_id' => 22, 'sender_name' => 'John Smith', 'item_name' => 'Harry Potter Book', 'category_id' => 1, 'category_name' => 'book', 'receiver_name' => 'Jason', 'date_sent' => '2017-04-17 22:58:33', 'price' => '4.99', 'message' => "hello, i wanted to see if you can meet me at Quad.", 'location_name' => 'The Quad'),
        array('id' => 3, 'photo_id' => 22, 'sender_name' => 'John Smith', 'item_name' => 'Harry Potter Book', 'category_id' => 1, 'category_name' => 'book', 'receiver_name' => 'Jason', 'date_sent' => '2017-04-17 22:58:33', 'price' => '4.99', 'message' => "hello, i wanted to see if you can meet me at Quad.", 'location_name' => 'The Quad'),
        array('id' => 3, 'photo_id' => 22, 'sender_name' => 'John Smith', 'item_name' => 'Harry Potter Book', 'category_id' => 1, 'category_name' => 'book', 'receiver_name' => 'Jason', 'date_sent' => '2017-04-17 22:58:33', 'price' => '4.99', 'message' => "hello, i wanted to see if you can meet me at Quad.", 'location_name' => 'The Quad'),
        array('id' => 3, 'photo_id' => 22, 'sender_name' => 'John Smith', 'item_name' => 'Harry Potter Book', 'category_id' => 1, 'category_name' => 'book', 'receiver_name' => 'Jason', 'date_sent' => '2017-04-17 22:58:33', 'price' => '4.99', 'message' => "hello, i wanted to see if you can meet me at Quad.", 'location_name' => 'The Quad'),
        array('id' => 3, 'photo_id' => 22, 'sender_name' => 'John Smith', 'item_name' => 'Harry Potter Book', 'category_id' => 1, 'category_name' => 'book', 'receiver_name' => 'Jason', 'date_sent' => '2017-04-17 22:58:33', 'price' => '4.99', 'message' => "hello, i wanted to see if you can meet me at Quad.", 'location_name' => 'The Quad'),
    );
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h2>Messages</h2>
                </div>
                <div class="panel-body min-lr-pad">
                    <?php
                    foreach ($messages as $message) {
                        ?>   
                        <div class = "panel panel-default">
                            <div class = "panel-body">
                                <div class = "container-fluid">
                                    <div class = "row">
                                        <div class="col-md-2 min-lr-pad">
                                            <img src="<?= site_url("thumbnail/$message[photo_id]") ?>" class="image-responsive">
                                        </div>
                                        <div class="col-md-8">
                                            <p><strong>Item: </strong><?=$message['item_name']?></p>
                                            <p><strong>Sent by: </strong><?=$message['sender_name']?></p>
                                            <p><strong>Date Sent: </strong><?=$message['date_sent']?></p>
                                        </div>
                                        <div class="col-md-2 min-lr-pad">
                                            <a href="<?= site_url("messages/view_message/$message[id]")?>" class="btn btn-primary btn-block">Read</a>
                                            <a href="<?= site_url("messages/delete/$message[id]")?>" class="btn btn-default btn-block">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>                   
                </div>
            </div>            
        </div>
        <div class="col-md-2"></div>
    </div>



</div>

<script>
    function formatColumn1() {
        var text = document.getElementById("date").innerHTML;
        if (text === "Date ▲")
            document.getElementById("date").innerHTML = "Date ▼";
        else if (text === "Date ▼")
            document.getElementById("date").innerHTML = "Date ▲";
    }
    function formatColumn2() {
        var text = document.getElementById("item").innerHTML;
        if (text === "Item ▲")
            document.getElementById("item").innerHTML = "Item ▼";
        else if (text === "Item ▼")
            document.getElementById("item").innerHTML = "Item ▲";
    }
    function formatColumn3() {
        var text = document.getElementById("messenger").innerHTML;
        if (text === "Messenger ▲")
            document.getElementById("messenger").innerHTML = "Messenger ▼";
        else if (text === "Messenger ▼")
            document.getElementById("messenger").innerHTML = "Messenger ▲";
    }
</script>
