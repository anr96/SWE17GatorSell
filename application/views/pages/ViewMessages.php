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
$sortby = $_SESSION['message_sortby'];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading container-fluid">
                    <div class="row text-center">
                        <h2>Messages</h2>
                    </div>
                    <div class="row">
                        <form class="form-inline" action="<?= site_url('messages/sortby') ?>" method="post">
                        <div class="form-group pull-right">
                            <label for="sortby">Sort by:</label>
                            <select class="form-control" id="sortby" name="sortby" onchange="this.form.submit();">
                                <option value="0" <?= ($sortby == 0 ? 'selected' : '') ?>>Oldest Messages First</option>
                                <option value="1" <?= ($sortby == 1 ? 'selected' : '') ?>>Newest Messages First</option>
                                <option value="2" <?= ($sortby == 2 ? 'selected' : '') ?>>List by Item</option>
                                <option value="3" <?= ($sortby == 3 ? 'selected' : '') ?>>List by Seller</option>
                            </select>
                        </div>
                    </form>
                    </div>
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
                                            <a href="<?= site_url("messages/view_message/$message[id]") ?>"><img src="<?= site_url("thumbnail/$message[photo_id]") ?>" class="image-responsive"></a>
                                        </div>
                                        <div class="col-md-8">
                                            <p><strong>Item: </strong><?= htmlentities($message['item_name']) ?></p>
                                            <p><strong>Sent by: </strong><?= htmlentities($message['sender_name']) ?></p>
                                            <p><strong>Date Sent: </strong><?= $message['date_sent'] ?></p>
                                        </div>
                                        <div class="col-md-2 min-lr-pad">
                                            <a href="<?= site_url("messages/view_message/$message[id]") ?>" class="btn btn-primary btn-block">Read</a>
                                            <a href="<?= site_url("messages/delete/$message[id]") ?>" class="btn btn-default btn-block">Delete</a>
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
