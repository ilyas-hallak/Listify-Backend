<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title><?=$title ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>css/bootstrap/bootstrap2.min.css">

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <script type="text/javascript" src="../../js/pace.min.js"></script>


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 50px;
        }

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }

        .footer {
            padding-top: 40px;
            padding-bottom: 40px;
            margin-top: 40px;
            border-top: 1px solid #eee;
        }

        #profileImg {
            border-radius: 20px;
            margin-top: 8px;
        }
        div#listElementMenu {
            margin-right: 36px;
        }
        span.circle {
            width: 20px;
            border-radius: 10px;
            display: inline-block;
        }
        .pace .pace-progress {
            background: #29d;
            position: fixed;
            z-index: 2000;
            top: 60px;
            left: 0;
            height: 5px;

            -webkit-transition: width 1s;
            -moz-transition: width 1s;
            -o-transition: width 1s;
            transition: width 1s;
        }

        .pace-inactive {
            display: none;
        }
    </style>
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Listify</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="<?=($this->uri->segment(1)==='home')?'active':''?>"><?=anchor("home/index","Home")?></li>
                <li class="<?=($this->uri->segment(1)==='lists') || ($this->uri->segment(1)==='listelements')?'active':''?>"><?=anchor("lists/index","Meine Listen")?></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a style="padding: 0px;" href="<?=site_url("profile/index")?>">
                        <img id="profileImg" width="40" src="<?=base_url()."pics/".$this->session->userdata('logged_in')["pic"]?>"></a></li>
            </ul>

        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<br/>

<div class="container">

