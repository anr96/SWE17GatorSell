<?php
$item = array('name' => 'Harry Potter The Tales of Beedle the Bard', 
    'description' => 'lorem ipsum', 'photo_id' => 32,
    'category_name' => 'Book', 'price' => '4.99');
$message = array('sender_name' => 'John Smith', 'receiver_name' => 'Morty Smith',
    'date_sent' => '2017-04-17 22:58:33', 
    'message' => "hello, i wanted to see if you can meet me at Quad.",
    'location_name' => "Quad");
$photo_path = site_url("thumbnail/$item[photo_id]");
?>

<div class="container-fluid"> 
    <h1></h1>
    <div class="row">
        <div class="col-md-2"></div>
        <div class ="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h1>Message Seller</h1>
                </div>
                <div class="panel-body">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="row">
                            <p>Message the seller about purchasing the item or about questions pertaining to the product</p> 
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="<?= $photo_path ?>" class="img-responsive">                                
                            </div>
                            <div class="col-md-9">
                                <?php
                                    echo "<h4><strong>To: </strong>$message[receiver_name]</h4>";
                                    echo "<h4><strong>Item: </strong>$item[name]</h4>";
                                    echo "<h4><strong>Price: $</strong>$item[price]</h4>";
                                    echo "<h4><strong>Safe Meeting Location: </strong>$message[location_name]</h4>";
                                ?>
                            </div>
                        </div>
                        <div class="row ">
                            <form class="form-horizontal" action='<?= site_url('confirmation'); ?>' method="POST">
                                <div class="row">
                                    <h4><strong>Message: </strong></h4>
                                    <textarea class="form-control" rows="6" id="message" required="true"></textarea>
                                    <p></p>
                                    
                                    
                                    <div class="text-right">
                                        <button class="btn btn-danger" type="button" onclick="window.history.back();">Cancel</button>
                                        <button class="btn btn-success" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>    
                    </div>
                    <div class="col-md-1"></div>              
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>  
</div>