<?php 
if (!isset($currentPage)) $currentPage = "";
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
            <ul class="nav navbar-nav navbar-left">
                <li><a href="<?= site_url('items/new_item'); ?>">Sell</a></li>
            </ul>
            <ul class="nav navbar-nav" >
                <?php $this->load->view('widgets/navbarSearch');?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(logged_in()){?>
                    <li><a href="<?= site_url('SellerProfile'); ?>"><span class="glyphicon glyphicon-briefcase"></span> Account</a></li>
                    <li><a href="<?= site_url('ViewMessages'); ?>"><span class="glyphicon glyphicon-envelope"></span> Mail <span class="badge"><?=$numMessages;?></span></a></li>
                    <li><a href="<?= site_url('login/logout'); ?>"><span class="glyphicon glyphicon-log-in"></span> Logout: <?= $_SESSION['registered_user']['name'];?> </a></li>
                <?php } else { ?>
                    <li><a href="<?= site_url('register'); ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="<?= site_url('login'); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } ?>
               
            </ul>
        </div>
    </div>
</nav>
