<?php
if (!isset($items)) {
    $items = array(
        array('id' => 15, 'name' => 'Harry Potter The Tales of Beetle and Bard', 'price' => 5.99, 'photo_id' => 17),
        array('id' => 16, 'name' => 'Modern Programming Languages', 'price' => 9.99, 'photo_id' => 18),
        array('id' => 17, 'name' => 'Understanding OOP with Java', 'price' => 9.99, 'photo_id' => 19),
        array('id' => 18, 'name' => 'Introduction to Java Programming', 'price' => 9.99, 'photo_id' => 20)
    );
}
?>

<div class="container-fluid min-lr-pad">
    <div class="panel panel-heading   min-b-margin" style="background-color: #e6f7ff">
        <h4 class="text-center">Welcome to Gatorsell! </h4>
        <h5 class="text-center">Features easy access for all SFSU students to browse and purchase items</h5>
        <a href="<?= site_url('about'); ?>"><div><center>Meet the Developers</center></div></a>
    </div>
    <div class="jumbotron min-b-margin min-lr-pad" style="background-color: #05052d">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3 col-xs-6 ">
                <div class="panel panel-default min-lr-margin">
                    <div class="panel-body">

                        <center><a href="<?= site_url('items'); ?>"><img src="<?= base_url('assets/img/buy_icon.jpg'); ?>" class="img-responsive"></a></center>

                    </div>
                    <div>
                        <a href="<?= site_url('items'); ?>"><div class="btn-primary"><center><b style="font-size: 20px">Buy</b> from SFSU students</center></div></a>
                    </div>
                </div>

            </div>
            <div class="col-md-2"></div>
            <div class="col-md-3 col-xs-6">
                <div class="panel panel-default min-lr-margin">
                    <div class="panel-body">
                        <center><a href="<?= site_url('items/new_item'); ?>"><img src="<?= base_url('assets/img/sell_icon.jpg'); ?>" class="img-responsive"></a></center>
                    </div>
                    <div>
                        <a href="<?= site_url('items/new_item'); ?>"><div class="btn-primary"><center><b style="font-size:20px">Sell</b> to SFSU students</center></div></a>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div> 
        <div class="row">
            <div class="panel panel-info new-items">
                <div class="panel-heading text-center">
                    <h4>New Items</h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="carousel slide multi-item-carousel" id="theCarousel">
                            <div class="carousel-inner">
                                <?php
                                $count = 0;
                                foreach ($items as $item) {
                                    echo '<div class="item' . ($count++ ? '">' : ' active">');
                                    echo '<div class="col-xs-4"><a href="' . site_url("item/$item[id]") . '"><img src="' . site_url("dbimg/$item[photo_id]") . '" class="img-responsive carousel-img"></a></div>';
                                    echo '</div>';
                                }
                                ?>
                            </div>
                            <a class="left carousel-control" href="#theCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <a class="right carousel-control" href="#theCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                        </div>
                    </div>

                </div>

            </div>
        </div>        
    </div>



</div>


