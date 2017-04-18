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
            <ul class="nav navbar-nav">
                <li><a href="<?= site_url('Add_New_Post'); ?>">Sell</a></li>
            </ul>
            <ul>
                <?php $this->load->view('widgets/navbarSearch',array('selected'=>$selected));?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['account'])){?>
                    <li><a href="<?= site_url('SellerProfile'); ?>"><span class="glyphicon glyphicon-briefcase"></span> Account</a></li>
                    <li><a href="<?= site_url('ViewMessages'); ?>"><span class="glyphicon glyphicon-envelope"></span> Mail <span class="badge"><?=$numMessages;?></span></a></li>
                    <li><a href="<?= site_url('logout'); ?>"><span class="glyphicon glyphicon-log-in"></span> Login out: <?= $_SESSION['account']['screen_name'];?> </a></li>
                <?php } else { ?>
                    <li><a href="<?= site_url('Register'); ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="<?= site_url('login'); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php } ?>
               
            </ul>
        </div>
    </div>
</nav>
