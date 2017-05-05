<?php
if (!isset($items)) {
    $items = array(
        array('name' => 'Harry Potter The Tales of Beedle the Bard', 'short_description' => 'lorem ipsum', 'category_name' => 'Book', 'price' => '4.99', 'location_name' => 'Cafe Rosso', 'photo_id' => 22, 'list_date' => '04/19/2017'),
        array('name' => 'Harry Potter The Tales of Beedle the Bard', 'short_description' => 'lorem ipsum', 'category_name' => 'Book', 'price' => '4.99', 'location_name' => 'Cafe Rosso', 'photo_id' => 22, 'list_date' => '04/19/2017'),
        array('name' => 'Harry Potter The Tales of Beedle the Bard', 'short_description' => 'lorem ipsum', 'category_name' => 'Book', 'price' => '4.99', 'location_name' => 'Cafe Rosso', 'photo_id' => 22, 'list_date' => '04/19/2017'),
        array('name' => 'Harry Potter The Tales of Beedle the Bard', 'short_description' => 'lorem ipsum', 'category_name' => 'Book', 'price' => '4.99', 'location_name' => 'Cafe Rosso', 'photo_id' => 22, 'list_date' => '04/19/2017')
    );
}

if (!isset($registered_user)) {
    $registered_user = array('name' => 'Samuel', 'email' => 'sjackson@gmail.com', 'phone' => '(678) 999-8212');
}
?>

<div class="container-fluid">
    <div class="row">
        <h1 class="text-center">My Account</h1>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class ="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo "<h3>Welcome Back,  $registered_user[name]</h3>"; ?>
                </div>

                <div class="panel-body">
                    <div class="col-sm-9">
                        <?php echo "<label>Email:</label> $registered_user[email]"; ?>
                        <p></p>
                        <?php echo "<label>Phone Number:</label> $registered_user[phone]"; ?>
                    </div>
                    <div class="col-sm-3">
                        <h5><a href="<?= site_url('messages'); ?>">View All Messages</a></h5>
                    </div>
                    <p></p> 
                </div>

            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class ="col-md-8 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Current Items Posted</h3>
                </div>

                <div class="panel-body">
                    <?php if(sizeof($items) == 0){ ?>
                        <p>You have no items posted</p>
                    <?php 
                    } 
                    
                    foreach ($items as $item) {
                        
                        ?>
                     <div class="row panel" >   
                        
                            <div class="col-md-1"></div>
                            <div class="col-md-3">
                                <img src="<?= site_url("thumbnail/$item[photo_id]"); ?>" class="img-responsive">
                            </div>
                            <div class="col-md-6">
                                <p><strong>Item: </strong><?=$item['name']?></p>
                                <p><strong>Price: $</strong><?=$item['price']?></p>
                                <p><strong>Category: </strong><?=$item['category_name']?></p>
                                <p><strong>Safe Meeting: </strong><?=$item['location_name']?></p>
                            </div>
                            <div class="col-md-2">
                                <a href="<?= site_url("items/delete/$item[id]") ?>" class="btn btn-danger btn-block">Delete</a>
                            </div>
                            
                        
                    </div>
                    <?php } ?>
                        
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>

</div>
