<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Statement Generator</title>
	<link href="<?=site_url('assets/bootstrap-5.3.3-dist/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?=site_url('assets/bootstrap-5.3.3-dist/css/bootstrap-datepicker.min.css') ?>" rel="stylesheet">

	<script src="<?=site_url('assets/js/jquery-3.7.1.slim.min.js') ?>"></script>
	<script src="<?=site_url('assets/bootstrap-5.3.3-dist/js/bootstrap-datepicker.min.js') ?>"></script>
</head>

<body>
<section class="image-section container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <a href="<?=site_url('welcome/brac_bank');?>">
                <img src="<?=site_url('assets/images/brac_bank.png') ?>" width="320px" />
            </a>
        </div>
        <div class="col-md-6">
            <a href="<?=site_url('welcome/home');?>">
                <img src="<?=site_url('assets/images/logo.png') ?>" width="320px" />
            </a>
        </div>
    </div>
</section>
</body>

</html>