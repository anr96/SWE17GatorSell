<?php
if (!isset($currentPage)) {
    $currentPage = "";
}
$links = array(
    array('name' => 'Browse', 'uri' => 'items'),
    array('name' => 'Sell', 'uri' => 'Add_New_Post'),
    array('name' => 'About', 'uri' => 'about'),
);
$numMessages = 3;
?>

<nav class="min-b-margin navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a style="width: 60px;" class="navbar-left" href="<?= site_url(); ?>">
                <img src="<?= base_url('assets/img/gatorsell_sm.png'); ?>" style="max-height: 60px;" class="img-responsive">
            </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <?php
                foreach ($links as $link) {
                    $li = $link['name'] == $currentPage ? '<li class="active">' : '<li>';
                    $url = site_url($link['uri']);
                    echo "$li<a href='$url'>{$link['name']}</a></li>\n";
                }
                ?>
            </ul>
            <ul>
                <?php $this->load->view('widgets/navBarSearch',array('selected'=>$selected));?>
            </ul>
<!--            <form class="navbar-form navbar-left">
                <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>-->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= site_url('SellerProfile'); ?>"><span class="glyphicon glyphicon-briefcase"></span> Account</a></li>
                <li><a href="<?= site_url('ViewMessages'); ?>"><span class="glyphicon glyphicon-envelope"></span> Mail <span class="badge"><?=$numMessages;?></span></a></li>
                <li><a href="<?= site_url('Register'); ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="<?= site_url('Login'); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>
