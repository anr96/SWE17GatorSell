<?php
$items = array(
    array('id' => 15, 'name' => 'Harry Potter The Tales of Beetle and Bard', 'price' => 5.99, 'photo_id' => 17),
    array('id' => 16, 'name' => 'Modern Programming Languages', 'price' => 9.99, 'photo_id' => 18),
    array('id' => 17, 'name' => 'Understanding OOP with Java', 'price' => 9.99, 'photo_id' => 19),
    array('id' => 18, 'name' => 'Introduction to Java Programming', 'price' => 9.99, 'photo_id' => 20)
);
?>

<div class="container-fluid min-lr-pad">
    <div class="jumbotron min-b-margin">
        <h4>Welcome to Gatorsell!  This website is a proud sponsor of San Franciso State University and with the help of our professor Dr. Petkovic of CSC648.02 class.</h4>
        <a href="<?= site_url('about'); ?>"><div><center>Meet the Developers</center></div></a>
    </div>
    <div class="jumbotron min-b-margin min-lr-pad" style="background-image: url('<?= base_url('assets/img/students.jpeg') ?>')">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-3 col-xs-6">
                <div class="panel panel-default min-lr-margin">
                    <div class="panel-body">
                        <center><a href="<?= site_url('items'); ?>"><img src="<?= base_url('assets/img/cart-300px.png'); ?>" class="img-responsive"></a></center>
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
                        <center><a href="<?= site_url('items/new_item'); ?>"><img src="<?= base_url('assets/img/Dollar-Sign.png'); ?>" class="img-responsive"></a></center>
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


