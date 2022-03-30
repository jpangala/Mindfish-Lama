<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="<?php echo base_url() ?>assets_landing/css2/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets_landing/css2/style_detail.css"> <!-- Resource style -->
	<script src="<?php echo base_url() ?>assets_landing/js/modernizr.js"></script> <!-- Modernizr -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"> <!-- Resource style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"> <!-- Resource style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Resource style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> <!-- Resource style -->

    
  		<style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");

            body {
                background-color: #eee;
                font-family: "Poppins", sans-serif;
                font-weight: 300
            }

            .height {
                height: 100vh
            }

            .search {
                position: relative;
                box-shadow: 0 0 40px rgba(51, 51, 51, .1)
            }

            .search input {
                height: 60px;
                text-indent: 25px;
                border: 2px solid #d6d4d4
            }

            .search input:focus {
                box-shadow: none;
                border: 2px solid blue
            }

            .search .fa-search {
                position: absolute;
                top: 24px;
                left: 16px
            }

            .search button {
                position: absolute;
                top: 5px;
                right: 5px;
                height: 50px;
                width: 110px;
                background: blue
            }
	</style>

	<title>Product Mindfish</title>
</head>
<body>
    <div class="row justify-content-center align-items-center">
            <div class="col-md-8 mt-5">
                <div class="search"> <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder="Have a question? Ask Now"> <button class="btn btn-primary">Search</button> </div>
            </div>
    </div>
	<header>
		<h1>Product Mindfish</h1>
	</header>
	<ul class="cd-items cd-container">
		<li class="cd-item">
			<img src="<?php echo base_url() ?>assets_landing/img/portfolio/budidaya_gurame.jpg" alt="Item Preview">
			<a href="#0" class="cd-trigger">Quick View</a>
		</li> <!-- cd-item -->

		<li class="cd-item">
			<img src="<?php echo base_url() ?>assets_landing/img/portfolio/budidaya_cupang.jpg" alt="Item Preview">
			<a href="#0" class="cd-trigger">Quick View</a>
		</li> <!-- cd-item -->

		<li class="cd-item">
			<img src="<?php echo base_url() ?>assets_landing/img/portfolio/budidaya_koi.jpg" alt="Item Preview">
			<a href="#0" class="cd-trigger">Quick View</a>
		</li> <!-- cd-item -->

		<li class="cd-item">
			<img src="<?php echo base_url() ?>assets_landing/img/portfolio/budidaya_koi.jpg" alt="Item Preview">
			<a href="#0" class="cd-trigger">Quick View</a>
		</li> <!-- cd-item -->
	</ul> <!-- cd-items -->

	<div class="cd-quick-view">
		<div class="cd-slider-wrapper">
			<ul class="cd-slider">
				<li class="selected"><img src="<?php echo base_url() ?>assets_landing/img/portfolio/budidaya_cupang.jpg" alt="Product 1"></li>
			</ul> <!-- cd-slider -->
		</div> <!-- cd-slider-wrapper -->

		<div class="cd-item-info">
			<h2>Produt Title</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, omnis illo iste ratione. Numquam eveniet quo, ullam itaque expedita impedit. Eveniet, asperiores amet iste repellendus similique reiciendis, maxime laborum praesentium.</p>

			<ul class="cd-item-action">
				<li><button class="add-to-cart">Add to cart</button></li>					
				<li><a href="#0">Learn more</a></li>	
			</ul> <!-- cd-item-action -->
		</div> <!-- cd-item-info -->
		<a href="#0" class="cd-close">Close</a>
	</div> <!-- cd-quick-view -->
<script src="<?php echo base_url() ?>assets_landing/js/jquery-2.1.1.js"></script>
<script src="<?php echo base_url() ?>assets_landing/js/velocity.min.js"></script>
<script src="<?php echo base_url() ?>assets_landing/js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>