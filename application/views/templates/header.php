<!DOCTYPE html>
<?php
$this->load->helper('url');
$this->load->helper('html');
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo $title; ?></title>

        <!-- Bootstrap -->
        <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/style.css'); ?>" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="content">        
            <div class="container min-lr-pad">
                <?php
                if(!isset($selected)) $selected = 0;
                $this->load->view('widgets/sfsu_notice');
                $this->load->view('widgets/navbar');
                ?>