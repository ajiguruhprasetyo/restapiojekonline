<?php
defined('BASEPATH') OR exit('No direct script access allowed');
function rupiah($angka){	return "Rp " . number_format($angka,2,',','.');}
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="<?=base_url()?>asset/css/fullcalendar.css" />
	<link rel="stylesheet" href="<?=base_url()?>asset/css/matrix-style.css" />
	<link rel="stylesheet" href="<?=base_url()?>asset/css/matrix-media.css" />
	<link rel="stylesheet" href="<?=base_url()?>asset/css/colorpicker.css" />
	<link rel="stylesheet" href="<?=base_url()?>asset/css/datepicker.css" />
	<link rel="stylesheet" href="<?=base_url()?>asset/css/uniform.css" />
	<link rel="stylesheet" href="<?=base_url()?>asset/css/select2.css" />
	<link rel="stylesheet" href="<?=base_url()?>asset/css/bootstrap-wysihtml5.css" />
	<link href="<?=base_url()?>asset/fa/css/font-awesome.min.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php $this->load->view("sidebar");?>