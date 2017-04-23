<?php
    $item = array('name' => 'Harry Potter The Tales of Beedle the Bard', 'description' => 'lorem ipsum', 
        'category_name' => 'Book', 'price' => '4.99', 'safe_meeting'=>'Cafe Rosso', 'list_date' => '04/19/2017');
    $registered_user = array('name' => ($_SESSION['registered_user']['name'] = 'Samuel'), 
        'email' => ($_SESSION['registered_user']['email'] = 'sjackson@gmail.com'),
        'phone'=> ($_SESSION['registered_user']['phone'] = '(678) 999-8212'));
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
                    <?php echo "<h3>Welcome Back,  $registered_user[name]</h3>";?>
                </div>
                
                <div class="panel-body">
                    <div class="col-sm-9">
                        <?php echo "<label>Email:</label> $registered_user[email]"; ?>
                        <p></p>
                        <?php echo "<label>Phone Number:</label> $registered_user[phone]";?>
                    </div>
                    <div class="col-sm-3">
                        <h5><a href="<?=  site_url('ViewMessages')?>">View All Messages</a></h5>
                        <h5><a href="<?=  site_url('forgotPwd')?>">Forgot Password?</a></h5>
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
                    <div class="row">
                       <div class="col-md-1"></div>
                       <div class="col-md-3">
                                <img src="<?= site_url('thumbnail/32'); ?>" class="img-responsive">
                                <?php
                                    echo "";
                                    $path = site_url("thubmnail/32");
                                 ?>
                            </div>
                        <div class="col-md-6">
                                <?php
                                    echo "<p><strong>Item: </strong>$item[name]</p>";
                                    echo "<p><strong>Price: $</strong>$item[price]</p>";
                                    echo "<p><strong>Category: </strong>$item[category_name]</p>";
                                    echo "<p><strong>Safe Meeting: </strong>$item[safe_meeting]</p>";
                                ?>
                            </div>
                        <div class="col-md-2">
                            <button class="btn btn-default" type="button" onclick="">Delete</button>
                        </div>
                    </div>
                    <p></p>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-3">
                                <img src="<?= site_url('thumbnail/32'); ?>" class="img-responsive">
                                <?php
                                    echo "";
                                    $path = site_url("thubmnail/32");
                                 ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                    echo "<p><strong>Item: </strong>$item[name]</p>";
                                    echo "<p><strong>Price: $</strong>$item[price]</p>";
                                    echo "<p><strong>Category: </strong>$item[category_name]</p>";
                                    echo "<p><strong>Safe Meeting: </strong>$item[safe_meeting]</p>";
                                ?>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-default" type="button" onclick="">Delete</button>
                            </div>
                    </div>
                    
                    <p></p>  
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    
</div>