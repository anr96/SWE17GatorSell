<?php

    $items = array(
        array('id' => 15, 'name' => 'Harry Potter The Tales of Beetle and Bard', 'price' => 5.99, 'photo_id' => 20),
        array('id' => 16, 'name' => 'Modern Programming Languages', 'price' => 9.99, 'photo_id' => 18),
        array('id' => 17, 'name' => 'Understanding OOP with Java', 'price' => 9.99, 'photo_id' => 19),
        array('id' => 18, 'name' => 'Introduction to Java Programming', 'price' => 9.99, 'photo_id' => 20)
    );
    
    $items = array(
        'id' => 15, 'name' => 'Harry Potter The Tales of Beetle and Bard', 'price' => 5.99, 'photo_id' => 32
    );

?>

<div class="container-fluid min-lr-pad">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h3>Welcome to Gatorsell!  This website is a proud sponsor of San Franciso State University and with the help of our professor Dr. Petkovic of CSC648.02 class.</h3>
                <a href="<?= site_url('about');?>"><div><center>Meet the Developers</center></div></a>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <center><a href="<?= site_url('items');?>"><img src="<?= base_url('assets/img/cart-300px.png'); ?>" class="img-responsive"></a></center>
                </div>
                <div>
                    <a href="<?= site_url('items');?>"><div class="btn-primary" style="height:40px;"><center><b style="font-size: 20px">Buy</b> your items from other students!</center></div></a>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <center><a href="<?= site_url('Add_New_Post');?>"><img src="<?= base_url('assets/img/Dollar-Sign.png'); ?>" class="img-responsive"></a></center>
                </div>
                <div>
                    <a href="<?= site_url('Add_New_Post');?>"><div class="btn-primary" style="height:40px"><center><b style="font-size:20px">Sell</b> your items to make a profit!</center></div></a>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>   
</div>

    <div class="container-fluid min-lr-pad">
        <div class="row">
            <br>
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active" >
                            <img src='<?=site_url("dbimg/18")?>' width='300' height='200'>
                        </div>

                        <div class="item">
                            <img src='<?=site_url("dbimg/19")?>' width='300' height='200'>
                        </div>

                        <div class="item">
                            <img src='<?=site_url("dbimg/20")?>' width='300' height='200'>
                        </div>

                        <div class="item">
                            <img src='<?=site_url("dbimg/21")?>' width='300' height='200'>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div> 

