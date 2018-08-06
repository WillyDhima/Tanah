<!doctype html>
			<html>
    <head>
       <title><?php $this->load->view('content/title'); ?></title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
			<!-- Basic need -->
	<meta charset="UTF-8">
	<meta name="description" content="ReaLand - Real Estate HTML Template">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="profile" href="">
	<!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

	<!-- Mobile specific meta -->
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="format-detection" content="telephone-no">

	<!-- External Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Raleway:400,700,800|Roboto:400,500,700" rel="stylesheet"> 

	<!-- CSS files -->
	<link rel="stylesheet" href="<?php echo base_url();?>css/plugins.css">
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
    </head>
    <body>
	<header class="header header--blue">
	
  <div class="container">
		<div class="topbar">
			<ul class="topbar__contact">
				<li><span class="ion-ios-telephone-outline topbar__icon"></span><a href="tel:8801234567" class="topbar__link">0811-109-582</a></li>
				<li><span class="ion-ios-email-outline topbar__icon">
				<?php $login_data =$this->session->userdata("login"); ?>
				</span><a href="<?php echo $this->session->userdata('member_email'); ?>" class="topbar__link">
				Anda Login dengan Email : <?php echo $login_data['fullname'] ?>  </a></li>
			</ul><!-- .topbar__contact -->

			<ul class="topbar__user">
				<span class="ion-ios-person-outline topbar__user-icon"></span>
				<li><a href="<?php echo base_url('login/logout'); ?>"class="topbar__link">Logout</a></li>
	
			</ul>
		</div><!-- .topbar -->

		<div class="header__main">
			<div class="header__logo">
				<a href="index.html">
					<h1 class="screen-reader-text">Tanah.com</h1>
					<img src="<?php echo base_url();?>images/tanah-logo.jpg" width="100" alt="Tanah.com">
				</a>
			</div><!-- .header__main -->

			<div class="nav-mobile">
				<a href="#" class="nav-toggle">
					<span></span>
				</a><!-- .nav-toggle -->
			</div><!-- .nav-mobile -->

			<?php $this->load->view('content/menuU') ?>

			<a href="submit_property.html" class="header__cta">&plus; Submit Property</a>
		</div><!-- .header__main -->
	</div><!-- .container -->
</header><!-- .header -->
<section class="submit-property">
    <div class="container">
        <ul class="ht-breadcrumbs ht-breadcrumbs--y-padding ht-breadcrumbs--b-border">
            <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Home</span></a></li>
            <li class="ht-breadcrumbs__item"><a href="#" class="ht-breadcrumbs__link"><span class="ht-breadcrumbs__title">Pages</span></a></li>
            <li class="ht-breadcrumbs__item"><span class="ht-breadcrumbs__page">Submit New Property</span></li>
        </ul><!-- .ht-breadcrumb -->

        <div class="submit-property__container">
            <div class="row">
                <?php $this->load->view('content/menu_admin')?><!-- .col -->
                <form method="post" action="<?php echo site_url('update_product/update');?>" enctype="multipart/form-data">
                    <div class="col-md-9">
                        <div class="submit-property__block">
                            <h3 class="submit-property__headline">Basic Information</h3>
							<?php if (!empty($product)){ foreach ($product as $products) { ?>							
							<div class="row">
                                <div class="col-md-4">
                                    <div class="submit-property__group">
                                        <label for="property-type" class="submit-property__label">Member Id</label>
                                        <input type="text" class="submit-property__field" id="Member_id" name="Member_id" placeholder="Title"
										value="<?php echo $login_data['id'] ?> " readonly>
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->

                                <div class="col-md-4">
                                    <div class="submit-property__group">
                                        <label for="property-offer" class="submit-property__label">Nama </label>
                                        <input type="text" class="submit-property__field" id="Member_Name" name="Member_Name" placeholder="Title"
										value="<?php echo $login_data['fullname'] ?> " readonly>
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->

                                <!-- .col -->
                            </div>
                    
                            <div class="submit-property__group">
                                <label for="property-title" class="submit-property__label">Judul </label>
                                <input type="text" name="title" class="submit-property__field" id="ads_title1" value="<?php echo set_value('title', $products->ads_title); ?> " placeholder="Title" required>
                            </div><!-- .submit-property__group -->

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="submit-property__group">
                                        <label for="property-type" class="submit-property__label">Category *</label>
                                        <select class="ht-field" id="ads_category" name="ads_category" required>
                                            <option value="<?php echo set_value('ads_category', $products->ads_category); ?> "><?php echo $products->ads_category_desc; ?></option>
											<option>All Category </option>
											<?php
												foreach ($category as $cat) {
												echo "<option value='$cat[ads_category]'>$cat[ads_category_desc]</option>";
												}
											?>
											
                                        </select>
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->

                                <div class="col-md-4">
                                    <div class="submit-property__group">
                                        <label for="property-offer" class="submit-property__label">Type *</label>
                                        <select class="ht-field" id="ads_type" name="ads_type" required>
                                          	<option value="<?php echo set_value('ads_type', $products->ads_listing_type); ?> "><?php echo $products->ads_listing_type_desc; ?></option>
											<option>All Type</option>
											
											<?php 
												foreach ($type as $row) {
												echo "<option value='$row[ads_listing_type_id]'>$row[ads_listing_type_desc]</option>";
												}
											?>
											
											
                                        </select>
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->

                                <div class="col-md-4">
                                    <div class="submit-property__group">
                                        <label for="property-rental-period" class="submit-property__label">Priode sewa *</label>
                                        <select class="ht-field" id="ads_period" name="ads_period" required>
                                            <option value="monthly">Monthly</option>
                                            <option value="yearly">Yearly</option>
                                        </select>
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->
                            </div><!-- .row -->

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="submit-property__group">
                                        <label for="property-price" class="submit-property__label">Harga *</label>
                                        <input type="text" class="submit-property__field" id="ads_price" name="ads_price" value="<?php echo set_value('ads_price', $products->ads_price); ?> " required>
                                        <span class="submit-property__unit">Rp</span>
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->

                                <div class="col-md-4">
                                    <div class="submit-property__group">
                                        <label for="property-area" class="submit-property__label">Area *</label>
                                        <select class="ht-field" id="ads_area" name="ads_area" required>
                                          	<option value="<?php echo set_value('ads_area', $products->ads_village); ?> "><?php echo $products->name; ?></option>
											<option>All </option>	
											<?php
												foreach ($district as $dist) {
												echo "<option value='$dist[id]'>$dist[name]</option>";
												}
											?>
											
											
                                        </select>
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->

                                <!-- .col -->
                            </div><!-- .row -->

                            <div class="submit-property__group">
                                <label for="submit-property-wysiwyg" class="submit-property__label">Description *</label>
                                <div id="submit-property-wysiwyg"></div>
                            </div><!-- .submit-property__group -->
                        </div><!-- .submit-property__block -->

                        <div class="submit-property__block">
                            <h3 class="submit-property__headline">Foto </h3>
                            
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="submit-property__group">
                                        <label for="property-featured-image" class="submit-property__label"></label>
                                        <div class="submit-property__upload">
                                            <input type="file" id="imgInp" name="img01" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            <div class="submit-property__upload-inner">
                                                <!--<span class="ion-ios-plus-outline submit-property__icon"></span>-->
												<img id="blah" src="#" alt="your image" class="submit-property__upload-desc"/>
                                                <!--<span class="submit-property__upload-desc">Upload Foto Tanah atau properti anda di sini </span>-->
                                            </div>
                                        </div><!-- .submit-proeprty__upload -->
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->

                                <div class="col-md-7">
                                    <div class="submit-property__group">
                                        <label for="property-featured-image" class="submit-property__label"></label>
                                        <div class="submit-property__upload">
                                            <input type="file" id="imgInp" name="img02" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                                            <div class="submit-property__upload-inner">
                                                <!--<span class="ion-ios-plus-outline submit-property__icon"></span>-->
												<img id="blah2" src="#" alt="your image" class="submit-property__upload-desc"/>
                                                <!--<span class="submit-property__upload-desc">Upload Foto Tanah atau properti anda di sini </span>-->
                                            </div>
                                        </div><!-- .submit-proeprty__upload -->
                                    </div><!-- .submit-property__group -->
                                </div>
								<div class="col-md-5">
                                    <div class="submit-property__group">
                                        <label for="property-featured-image" class="submit-property__label"></label>
                                        <div class="submit-property__upload">
                                            <input type="file" id="imgInp" name="img03" onchange="document.getElementById('blah3').src = window.URL.createObjectURL(this.files[0])">
                                            <div class="submit-property__upload-inner">
                                                <!--<span class="ion-ios-plus-outline submit-property__icon"></span>-->
												<img id="blah3" src="#" alt="your image" class="submit-property__upload-desc"/>
                                                <!--<span class="submit-property__upload-desc">Upload Foto Tanah atau properti anda di sini </span>-->
                                            </div>
                                        </div><!-- .submit-proeprty__upload -->
                                    </div><!-- .submit-property__group -->
                                </div>
								<div class="col-md-7">
                                    <div class="submit-property__group">
                                        <label for="property-featured-image" class="submit-property__label"></label>
                                        <div class="submit-property__upload">
                                            <input type="file" id="imgInp" name="img04" onchange="document.getElementById('blah4').src = window.URL.createObjectURL(this.files[0])">
                                            <div class="submit-property__upload-inner">
                                                <!--<span class="ion-ios-plus-outline submit-property__icon"></span>-->
												<img id="blah4" src="#" alt="your image" class="submit-property__upload-desc"/>
                                                <!--<span class="submit-property__upload-desc">Upload Foto Tanah atau properti anda di sini </span>-->
                                            </div>
                                        </div><!-- .submit-proeprty__upload -->
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .submit-property__block -->

                        <div class="submit-property__block">
                            <!--<h3 class="submit-property__headline">Location</h3>
                            <div class="submit-property__group">
                                <div id="submit-property-map"></div>
                            </div><!-- .submit-property__group -->

                            <div class="submit-property__group">
                                <label for="property-map-address" class="submit-property__label">Alamat *</label>
                                <input type="text" class="submit-property__field" id="ads_address" required>
                            </div><!-- .submit-property__group -->

                            <div class="row">
                                <!-- .col -->

                                <!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .submit-property__block -->

                        <div class="submit-property__block">
                            <h3 class="submit-property__headline">Detailed Information</h3>

                            <div class="row">
                               <!-- .col -->

                                <div class="col-md-4">
                                    <div class="submit-property__group">
                                        <label for="property-lot-size" class="submit-property__label">Luas Tanah *</label>
                                        <input type="text" class="submit-property__field" id="ads_lot_size" required>
                                        <span class="submit-property__unit">sq.ft</span>
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->

                                <div class="col-md-4">
                                    <div class="submit-property__group">
                                        <label for="property-parking" class="submit-property__label">Sertifikat</label>
                                        <input type="text" class="submit-property__field" id="ads_certficate">
                                    </div><!-- .submit-property__group -->
                                </div><!-- .col -->

                                <!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .submit-property__block -->

                        <!-- .submit-property__block -->

                        <!-- .submit-property__block -->

                        <button type="submit" class="submit-property__submit">Submit</button>
                    </div><!-- .col -->
                </form>
			<?php }} ?>
            </div><!-- .row -->
        </div><!-- .submit-property__container -->
    </div><!-- .container -->
</section><!-- .submit-property -->
<?php $this->load->view('content/news_latter'); ?>
<!-- .newsletter -->
<?php $this->load->view('content/footer'); ?><!-- .footer -->
<a href="#" class="back-to-top"><span class="ion-ios-arrow-up"></span></a>
<div id="submit-property-wysiwyg-icons">
    <svg xmlns="http://www.w3.org/2000/svg"><symbol id="trumbowyg-blockquote" viewBox="0 0 72 72"><path d="M21.3 31.9h-.6c.8-1.2 1.9-2.2 3.4-3.2 2.1-1.4 5-2.7 9.2-3.3l-1.4-8.9c-4.7.7-8.5 2.1-11.7 4-2.4 1.4-4.3 3.1-5.8 4.9-2.3 2.7-3.7 5.7-4.5 8.5-.8 2.8-1 5.4-1 7.5 0 2.3.3 4 .4 4.8 0 .1.1.3.1.4 1.2 5.4 6.1 9.5 11.9 9.5 6.7 0 12.2-5.4 12.2-12.2s-5.5-12-12.2-12zM49.5 31.9h-.6c.8-1.2 1.9-2.2 3.4-3.2 2.1-1.4 5-2.7 9.2-3.3l-1.4-8.9c-4.7.7-8.5 2.1-11.7 4-2.4 1.4-4.3 3.1-5.8 4.9-2.3 2.7-3.7 5.7-4.5 8.5-.8 2.8-1 5.4-1 7.5 0 2.3.3 4 .4 4.8 0 .1.1.3.1.4 1.2 5.4 6.1 9.5 11.9 9.5 6.7 0 12.2-5.4 12.2-12.2s-5.5-12-12.2-12z"/></symbol><symbol id="trumbowyg-bold" viewBox="0 0 72 72"><path d="M51.1 37.8c-1.1-1.4-2.5-2.5-4.2-3.3 1.2-.8 2.1-1.8 2.8-3 1-1.6 1.5-3.5 1.5-5.3 0-2-.6-4-1.7-5.8-1.1-1.8-2.8-3.2-4.8-4.1-2-.9-4.6-1.3-7.8-1.3h-16v42h16.3c2.6 0 4.8-.2 6.7-.7 1.9-.5 3.4-1.2 4.7-2.1 1.3-1 2.4-2.4 3.2-4.1.9-1.7 1.3-3.6 1.3-5.7.2-2.5-.5-4.7-2-6.6zM40.8 50.2c-.6.1-1.8.2-3.4.2h-9V38.5h8.3c2.5 0 4.4.2 5.6.6 1.2.4 2 1 2.7 2 .6.9 1 2 1 3.3 0 1.1-.2 2.1-.7 2.9-.5.9-1 1.5-1.7 1.9-.8.4-1.7.8-2.8 1zm2.6-20.4c-.5.7-1.3 1.3-2.5 1.6-.8.3-2.5.4-4.8.4h-7.7V21.6h7.1c1.4 0 2.6 0 3.6.1s1.7.2 2.2.4c1 .3 1.7.8 2.2 1.7.5.9.8 1.8.8 3-.1 1.3-.4 2.2-.9 3z"/></symbol><symbol id="trumbowyg-close" viewBox="0 0 72 72"><path d="M57 20.5l-5.4-5.4-15.5 15.5-15.6-15.5-5.4 5.4L30.7 36 15.1 51.5l5.4 5.4 15.6-15.5 15.5 15.5 5.4-5.4L41.5 36z"/></symbol><symbol id="trumbowyg-create-link" viewBox="0 0 72 72"><path d="M31.1 48.9l-6.7 6.7c-.8.8-1.6.9-2.1.9s-1.4-.1-2.1-.9L15 50.4c-1.1-1.1-1.1-3.1 0-4.2l6.1-6.1.2-.2 6.5-6.5c-1.2-.6-2.5-.9-3.8-.9-2.3 0-4.6.9-6.3 2.6L11 41.8c-3.5 3.5-3.5 9.2 0 12.7l5.2 5.2c1.7 1.7 4 2.6 6.3 2.6s4.6-.9 6.3-2.6l6.7-6.7c2.5-2.6 3.1-6.7 1.5-10l-5.9 5.9zM38.7 22.5l6.7-6.7c.8-.8 1.6-.9 2.1-.9s1.4.1 2.1.9l5.2 5.2c1.1 1.1 1.1 3.1 0 4.2l-6.1 6.1-.2.2L42 38c1.2.6 2.5.9 3.8.9 2.3 0 4.6-.9 6.3-2.6l6.7-6.7c3.5-3.5 3.5-9.2 0-12.7l-5.2-5.2c-1.7-1.7-4-2.6-6.3-2.6s-4.6.9-6.3 2.6l-6.7 6.7c-2.7 2.7-3.3 6.9-1.7 10.2l6.1-6.1c0 .1 0 .1 0 0z"/><path d="M44.2 30.5c.2-.2.4-.6.4-.9 0-.3-.1-.6-.4-.9l-2.3-2.3c-.3-.2-.6-.4-.9-.4-.3 0-.6.1-.9.4L25.9 40.6c-.2.2-.4.6-.4.9 0 .3.1.6.4.9l2.3 2.3c.2.2.6.4.9.4.3 0 .6-.1.9-.4l14.2-14.2zM49.9 55.4h-8.5v-5h8.5v-8.9h5.2v8.9h8.5v5h-8.5v8.9h-5.2v-8.9z"/></symbol><symbol id="trumbowyg-del" viewBox="0 0 72 72"><path d="M45.8 45c0 1-.3 1.9-.9 2.8-.6.9-1.6 1.6-3 2.1s-3.1.8-5 .8c-2.1 0-4-.4-5.7-1.1-1.7-.7-2.9-1.7-3.6-2.7-.8-1.1-1.3-2.6-1.5-4.5l-.1-.8-6.7.6v.9c.1 2.8.9 5.4 2.3 7.6 1.5 2.3 3.5 4 6.1 5.1 2.6 1.1 5.7 1.6 9.4 1.6 2.9 0 5.6-.5 8-1.6 2.4-1.1 4.3-2.7 5.6-4.7 1.3-2 2-4.2 2-6.5 0-1.6-.3-3.1-.9-4.5l-.2-.6H44c0 .1 1.8 2.3 1.8 5.5zM29 28.9c-.8-.8-1.2-1.7-1.2-2.9 0-.7.1-1.3.4-1.9.3-.6.7-1.1 1.4-1.6.6-.5 1.4-.9 2.5-1.1 1.1-.3 2.4-.4 3.9-.4 2.9 0 5 .6 6.3 1.7 1.3 1.1 2.1 2.7 2.4 5.1l.1.9 6.8-.5v-.9c-.1-2.5-.8-4.7-2.1-6.7s-3.2-3.5-5.6-4.5c-2.4-1-5.1-1.5-8.1-1.5-2.8 0-5.3.5-7.6 1.4-2.3 1-4.2 2.4-5.4 4.3-1.2 1.9-1.9 3.9-1.9 6.1 0 1.7.4 3.4 1.2 4.9l.3.5h11.8c-2.3-.9-3.9-1.7-5.2-2.9zm13.3-6.2zM22.7 20.3zM13 34.1h46.1v3.4H13z"/></symbol><symbol id="trumbowyg-em" viewBox="0 0 72 72"><path d="M26 57l10.1-42h7.2L33.2 57H26z"/></symbol><symbol id="trumbowyg-fullscreen" viewBox="0 0 72 72"><path d="M25.2 7.1H7.1v17.7l6.7-6.5 10.5 10.5 4.5-4.5-10.4-10.5zM47.2 7.1l6.5 6.7-10.5 10.5 4.5 4.5 10.5-10.4 6.7 6.8V7.1zM47.7 43.2l-4.5 4.5 10.4 10.5-6.8 6.7h18.1V47.2l-6.7 6.5zM24.3 43.2L13.8 53.6l-6.7-6.8v18.1h17.7l-6.5-6.7 10.5-10.5z"/><path fill="currentColor" d="M10.7 28.8h18.1V11.2l-6.6 6.4L11.6 7.1l-4.5 4.5 10.5 10.5zM60.8 28.8l-6.4-6.6 10.5-10.6-4.5-4.5-10.5 10.5-6.7-6.9v18.1zM60.4 64.9l4.5-4.5-10.5-10.5 6.9-6.7H43.2v17.6l6.6-6.4zM11.6 64.9l10.5-10.5 6.7 6.9V43.2H11.1l6.5 6.6L7.1 60.4z"/></symbol><symbol id="trumbowyg-h1" viewBox="0 0 72 72"><path d="M6.4 14.9h7.4v16.7h19.1V14.9h7.4V57h-7.4V38H13.8v19H6.4V14.9zM47.8 22.5c1.4 0 2.8-.1 4.1-.4 1.3-.2 2.5-.6 3.6-1.2 1.1-.5 2-1.3 2.8-2.1.8-.9 1.3-1.9 1.5-3.2h5.5v41.2h-7.4v-29H47.8v-5.3z"/></symbol><symbol id="trumbowyg-h2" viewBox="0 0 72 72"><path d="M1.5 14.9h7.4v16.7H28V14.9h7.4V57H28V38H8.8v19H1.5V14.9zM70.2 56.9H42c0-3.4.9-6.4 2.5-9s3.8-4.8 6.6-6.7c1.3-1 2.7-1.9 4.2-2.9 1.5-.9 2.8-1.9 4-3 1.2-1.1 2.2-2.2 3-3.4.8-1.2 1.2-2.7 1.2-4.3 0-.7-.1-1.5-.3-2.4s-.5-1.6-1-2.4c-.5-.7-1.2-1.3-2.1-1.8-.9-.5-2.1-.7-3.5-.7-1.3 0-2.4.3-3.3.8s-1.6 1.3-2.1 2.2-.9 2-1.2 3.3c-.3 1.3-.4 2.6-.4 4.1h-6.7c0-2.3.3-4.4.9-6.3.6-1.9 1.5-3.6 2.7-5 1.2-1.4 2.7-2.5 4.4-3.3 1.7-.8 3.8-1.2 6.1-1.2 2.5 0 4.6.4 6.3 1.2 1.7.8 3.1 1.9 4.1 3.1 1 1.3 1.8 2.6 2.2 4.1.4 1.5.6 2.9.6 4.2 0 1.6-.3 3.1-.8 4.5-.5 1.3-1.2 2.6-2.1 3.7-.9 1.1-1.8 2.2-2.9 3.1-1.1.9-2.2 1.8-3.4 2.7-1.2.8-2.4 1.6-3.5 2.4-1.2.7-2.3 1.5-3.3 2.2-1 .7-1.9 1.5-2.6 2.3-.7.8-1.3 1.7-1.5 2.6h20.1v5.9z"/></symbol><symbol id="trumbowyg-h3" viewBox="0 0 72 72"><path d="M1.4 14.5h7.4v16.7h19.1V14.5h7.4v42.1h-7.4v-19H8.8v19H1.4V14.5zM53.1 32.4c1.1 0 2.2 0 3.3-.2 1.1-.2 2.1-.5 2.9-1 .9-.5 1.6-1.2 2.1-2 .5-.9.8-1.9.8-3.2 0-1.8-.6-3.2-1.8-4.2-1.2-1.1-2.7-1.6-4.6-1.6-1.2 0-2.2.2-3.1.7-.9.5-1.6 1.1-2.2 1.9-.6.8-1 1.7-1.3 2.7-.3 1-.4 2-.4 3.1h-6.7c.1-2 .5-3.9 1.1-5.6.7-1.7 1.6-3.2 2.7-4.4s2.6-2.2 4.2-2.9c1.6-.7 3.5-1.1 5.6-1.1 1.6 0 3.2.2 4.7.7 1.6.5 2.9 1.2 4.2 2.1 1.2.9 2.2 2.1 3 3.4.7 1.4 1.1 3 1.1 4.8 0 2.1-.5 3.9-1.4 5.4-.9 1.6-2.4 2.7-4.4 3.4v.1c2.4.5 4.2 1.6 5.5 3.5 1.3 1.9 2 4.1 2 6.8 0 2-.4 3.7-1.2 5.3-.8 1.6-1.8 2.9-3.2 3.9-1.3 1.1-2.9 1.9-4.7 2.5-1.8.6-3.6.9-5.6.9-2.4 0-4.5-.3-6.3-1s-3.3-1.7-4.5-2.9c-1.2-1.3-2.1-2.8-2.7-4.5-.6-1.8-1-3.7-1-5.9h6.7c-.1 2.5.5 4.6 1.9 6.3 1.3 1.7 3.3 2.5 5.9 2.5 2.2 0 4.1-.6 5.6-1.9 1.5-1.3 2.3-3.1 2.3-5.4 0-1.6-.3-2.9-.9-3.8-.6-.9-1.5-1.7-2.5-2.2-1-.5-2.2-.8-3.4-.9-1.3-.1-2.6-.2-3.9-.1v-5.2z"/></symbol><symbol id="trumbowyg-h4" viewBox="0 0 72 72"><path d="M1.5 14.9h7.4v16.7H28V14.9h7.4V57H28V38H8.9v19H1.5V14.9zM70.5 47.2h-5.3V57h-6.4v-9.8H41.2v-6.7l17.7-24.8h6.4v26.2h5.3v5.3zm-24.2-5.3h12.5V23.7h-.1L46.3 41.9z"/></symbol><symbol id="trumbowyg-horizontal-rule" viewBox="0 0 72 72"><path d="M9.1 32h54v8h-54z"/></symbol><symbol id="trumbowyg-insert-image" viewBox="0 0 72 72"><path d="M64 17v38H8V17h56m8-8H0v54h72V9z"/><path d="M17.5 22C15 22 13 24 13 26.5s2 4.5 4.5 4.5 4.5-2 4.5-4.5-2-4.5-4.5-4.5zM16 50h27L29.5 32zM36 36.2l8.9-8.5L60.2 50H45.9S35.6 35.9 36 36.2z"/></symbol><symbol id="trumbowyg-italic" viewBox="0 0 72 72"><path d="M26 57l10.1-42h7.2L33.2 57H26z"/></symbol><symbol id="trumbowyg-justify-center" viewBox="0 0 72 72"><path d="M9 14h54v8H9zM9 50h54v8H9zM18 32h36v8H18z"/></symbol><symbol id="trumbowyg-justify-full" viewBox="0 0 72 72"><path d="M9 14h54v8H9zM9 50h54v8H9zM9 32h54v8H9z"/></symbol><symbol id="trumbowyg-justify-left" viewBox="0 0 72 72"><path d="M9 14h54v8H9zM9 50h54v8H9zM9 32h36v8H9z"/></symbol><symbol id="trumbowyg-justify-right" viewBox="0 0 72 72"><path d="M9 14h54v8H9zM9 50h54v8H9zM27 32h36v8H27z"/></symbol><symbol id="trumbowyg-link" viewBox="0 0 72 72"><path d="M30.9 49.1l-6.7 6.7c-.8.8-1.6.9-2.1.9s-1.4-.1-2.1-.9l-5.2-5.2c-1.1-1.1-1.1-3.1 0-4.2l6.1-6.1.2-.2 6.5-6.5c-1.2-.6-2.5-.9-3.8-.9-2.3 0-4.6.9-6.3 2.6L10.8 42c-3.5 3.5-3.5 9.2 0 12.7l5.2 5.2c1.7 1.7 4 2.6 6.3 2.6s4.6-.9 6.3-2.6l6.7-6.7C38 50.5 38.6 46.3 37 43l-6.1 6.1zM38.5 22.7l6.7-6.7c.8-.8 1.6-.9 2.1-.9s1.4.1 2.1.9l5.2 5.2c1.1 1.1 1.1 3.1 0 4.2l-6.1 6.1-.2.2-6.5 6.5c1.2.6 2.5.9 3.8.9 2.3 0 4.6-.9 6.3-2.6l6.7-6.7c3.5-3.5 3.5-9.2 0-12.7l-5.2-5.2c-1.7-1.7-4-2.6-6.3-2.6s-4.6.9-6.3 2.6l-6.7 6.7c-2.7 2.7-3.3 6.9-1.7 10.2l6.1-6.1z"/><path d="M44.1 30.7c.2-.2.4-.6.4-.9 0-.3-.1-.6-.4-.9l-2.3-2.3c-.2-.2-.6-.4-.9-.4-.3 0-.6.1-.9.4L25.8 40.8c-.2.2-.4.6-.4.9 0 .3.1.6.4.9l2.3 2.3c.2.2.6.4.9.4.3 0 .6-.1.9-.4l14.2-14.2z"/></symbol><symbol id="trumbowyg-ordered-list" viewBox="0 0 72 72"><path d="M27 14h36v8H27zM27 50h36v8H27zM27 32h36v8H27zM11.8 15.8V22h1.8v-7.8h-1.5l-2.1 1 .3 1.3zM12.1 38.5l.7-.6c1.1-1 2.1-2.1 2.1-3.4 0-1.4-1-2.4-2.7-2.4-1.1 0-2 .4-2.6.8l.5 1.3c.4-.3 1-.6 1.7-.6.9 0 1.3.5 1.3 1.1 0 .9-.9 1.8-2.6 3.3l-1 .9V40H15v-1.5h-2.9zM13.3 53.9c1-.4 1.4-1 1.4-1.8 0-1.1-.9-1.9-2.6-1.9-1 0-1.9.3-2.4.6l.4 1.3c.3-.2 1-.5 1.6-.5.8 0 1.2.3 1.2.8 0 .7-.8.9-1.4.9h-.7v1.3h.7c.8 0 1.6.3 1.6 1.1 0 .6-.5 1-1.4 1-.7 0-1.5-.3-1.8-.5l-.4 1.4c.5.3 1.3.6 2.3.6 2 0 3.2-1 3.2-2.4 0-1.1-.8-1.8-1.7-1.9z"/></symbol><symbol id="trumbowyg-p" viewBox="0 0 72 72"><path d="M47.8 15.1H30.1c-4.7 0-8.5 3.7-8.5 8.4s3.7 8.4 8.4 8.4v25h7V19.8h3v37.1h4.1V19.8h3.7v-4.7z"/></symbol><symbol id="trumbowyg-redo" viewBox="0 0 72 72"><path d="M10.8 51.2c0-5.1 2.1-9.7 5.4-13.1 3.3-3.3 8-5.4 13.1-5.4H46v-12L61.3 36 45.9 51.3V39.1H29.3c-3.3 0-6.4 1.3-8.5 3.5-2.2 2.2-3.5 5.2-3.5 8.5h-6.5z"/></symbol><symbol id="trumbowyg-removeformat" viewBox="0 0 72 72"><path d="M58.2 54.6L52 48.5l3.6-3.6 6.1 6.1 6.4-6.4 3.8 3.8-6.4 6.4 6.1 6.1-3.6 3.6-6.1-6.1-6.4 6.4-3.7-3.8 6.4-6.4zM21.7 52.1H50V57H21.7zM18.8 15.2h34.1v6.4H39.5v24.2h-7.4V21.5H18.8v-6.3z"/></symbol><symbol id="trumbowyg-strikethrough" viewBox="0 0 72 72"><path d="M45.8 45c0 1-.3 1.9-.9 2.8-.6.9-1.6 1.6-3 2.1s-3.1.8-5 .8c-2.1 0-4-.4-5.7-1.1-1.7-.7-2.9-1.7-3.6-2.7-.8-1.1-1.3-2.6-1.5-4.5l-.1-.8-6.7.6v.9c.1 2.8.9 5.4 2.3 7.6 1.5 2.3 3.5 4 6.1 5.1 2.6 1.1 5.7 1.6 9.4 1.6 2.9 0 5.6-.5 8-1.6 2.4-1.1 4.3-2.7 5.6-4.7 1.3-2 2-4.2 2-6.5 0-1.6-.3-3.1-.9-4.5l-.2-.6H44c0 .1 1.8 2.3 1.8 5.5zM29 28.9c-.8-.8-1.2-1.7-1.2-2.9 0-.7.1-1.3.4-1.9.3-.6.7-1.1 1.4-1.6.6-.5 1.4-.9 2.5-1.1 1.1-.3 2.4-.4 3.9-.4 2.9 0 5 .6 6.3 1.7 1.3 1.1 2.1 2.7 2.4 5.1l.1.9 6.8-.5v-.9c-.1-2.5-.8-4.7-2.1-6.7s-3.2-3.5-5.6-4.5c-2.4-1-5.1-1.5-8.1-1.5-2.8 0-5.3.5-7.6 1.4-2.3 1-4.2 2.4-5.4 4.3-1.2 1.9-1.9 3.9-1.9 6.1 0 1.7.4 3.4 1.2 4.9l.3.5h11.8c-2.3-.9-3.9-1.7-5.2-2.9zm13.3-6.2zM22.7 20.3zM13 34.1h46.1v3.4H13z"/></symbol><symbol id="trumbowyg-strong" viewBox="0 0 72 72"><path d="M51.1 37.8c-1.1-1.4-2.5-2.5-4.2-3.3 1.2-.8 2.1-1.8 2.8-3 1-1.6 1.5-3.5 1.5-5.3 0-2-.6-4-1.7-5.8-1.1-1.8-2.8-3.2-4.8-4.1-2-.9-4.6-1.3-7.8-1.3h-16v42h16.3c2.6 0 4.8-.2 6.7-.7 1.9-.5 3.4-1.2 4.7-2.1 1.3-1 2.4-2.4 3.2-4.1.9-1.7 1.3-3.6 1.3-5.7.2-2.5-.5-4.7-2-6.6zM40.8 50.2c-.6.1-1.8.2-3.4.2h-9V38.5h8.3c2.5 0 4.4.2 5.6.6 1.2.4 2 1 2.7 2 .6.9 1 2 1 3.3 0 1.1-.2 2.1-.7 2.9-.5.9-1 1.5-1.7 1.9-.8.4-1.7.8-2.8 1zm2.6-20.4c-.5.7-1.3 1.3-2.5 1.6-.8.3-2.5.4-4.8.4h-7.7V21.6h7.1c1.4 0 2.6 0 3.6.1s1.7.2 2.2.4c1 .3 1.7.8 2.2 1.7.5.9.8 1.8.8 3-.1 1.3-.4 2.2-.9 3z"/></symbol><symbol id="trumbowyg-subscript" viewBox="0 0 72 72"><path d="M32 15h7.8L56 57.1h-7.9L44.3 46H27.4l-4 11.1h-7.6L32 15zm-2.5 25.4h12.9L36 22.3h-.2l-6.3 18.1zM58.7 59.9c.6-1.4 2-2.8 4.1-4.4 1.9-1.3 3.1-2.3 3.7-2.9.8-.9 1.3-1.9 1.3-3 0-.9-.2-1.6-.7-2.2-.5-.6-1.2-.9-2.1-.9-1.2 0-2.1.5-2.5 1.4-.3.5-.4 1.4-.5 2.5h-4c.1-1.8.4-3.2 1-4.3 1.1-2.1 3-3.1 5.8-3.1 2.2 0 3.9.6 5.2 1.8 1.3 1.2 1.9 2.8 1.9 4.8 0 1.5-.5 2.9-1.4 4.1-.6.8-1.6 1.7-3 2.6L66 57.7c-1 .7-1.7 1.2-2.1 1.6-.4.3-.7.7-1 1.1H72V64H57.8c0-1.5.3-2.8.9-4.1z"/></symbol><symbol id="trumbowyg-superscript" viewBox="0 0 72 72"><path d="M32 15h7.8L56 57.1h-7.9l-4-11.1H27.4l-4 11.1h-7.6L32 15zm-2.5 25.4h12.9L36 22.3h-.2l-6.3 18.1zM49.6 28.8c.5-1.1 1.6-2.3 3.4-3.6 1.5-1.1 2.5-1.9 3-2.4.7-.7 1-1.6 1-2.4 0-.7-.2-1.3-.6-1.8-.4-.5-1-.7-1.7-.7-1 0-1.7.4-2.1 1.1-.2.4-.3 1.1-.4 2.1H49c.1-1.5.3-2.6.8-3.5.9-1.7 2.5-2.6 4.8-2.6 1.8 0 3.2.5 4.3 1.5 1.1 1 1.6 2.3 1.6 4 0 1.3-.4 2.4-1.1 3.4-.5.7-1.3 1.4-2.4 2.2l-1.3 1c-.8.6-1.4 1-1.7 1.3-.3.3-.6.6-.8.9h7.4v3H48.8c0-1.3.3-2.4.8-3.5z"/></symbol><symbol id="trumbowyg-table" viewBox="0 0 72 72"><path d="M25.686 51.38v-6.347q0-.462-.297-.76-.298-.297-.761-.297H14.04q-.463 0-.761.297-.298.298-.298.76v6.346q0 .463.298.76.298.298.76.298h10.589q.463 0 .76-.298.298-.297.298-.76zm0-12.692v-6.346q0-.463-.297-.76-.298-.298-.761-.298H14.04q-.463 0-.761.298-.298.297-.298.76v6.346q0 .462.298.76.298.297.76.297h10.589q.463 0 .76-.297.298-.298.298-.76zm16.94 12.691v-6.346q0-.462-.297-.76-.298-.297-.761-.297H30.98q-.463 0-.76.297-.299.298-.299.76v6.346q0 .463.298.76.298.298.761.298h10.588q.463 0 .76-.298.299-.297.299-.76zm-16.94-25.383v-6.345q0-.463-.297-.76-.298-.298-.761-.298H14.04q-.463 0-.761.297-.298.298-.298.76v6.346q0 .463.298.76.298.298.76.298h10.589q.463 0 .76-.298.298-.297.298-.76zm16.94 12.692v-6.346q0-.463-.297-.76-.298-.298-.761-.298H30.98q-.463 0-.76.298-.299.297-.299.76v6.346q0 .462.298.76.298.297.761.297h10.588q.463 0 .76-.297.299-.298.299-.76zm16.94 12.691v-6.346q0-.462-.297-.76-.298-.297-.76-.297H47.92q-.463 0-.76.297-.298.298-.298.76v6.346q0 .463.297.76.298.298.761.298h10.588q.463 0 .761-.298.298-.297.298-.76zm-16.94-25.383v-6.345q0-.463-.297-.76-.298-.298-.761-.298H30.98q-.463 0-.76.297-.299.298-.299.76v6.346q0 .463.298.76.298.298.761.298h10.588q.463 0 .76-.298.299-.297.299-.76zm16.94 12.692v-6.346q0-.463-.297-.76-.298-.298-.76-.298H47.92q-.463 0-.76.298-.298.297-.298.76v6.346q0 .462.297.76.298.297.761.297h10.588q.463 0 .761-.297.298-.298.298-.76zm0-12.692v-6.345q0-.463-.297-.76-.298-.298-.76-.298H47.92q-.463 0-.76.297-.298.298-.298.76v6.346q0 .463.297.76.298.298.761.298h10.588q.463 0 .761-.298.298-.297.298-.76zm4.236-10.576v35.96q0 2.18-1.555 3.734-1.555 1.553-3.739 1.553H14.04q-2.184 0-3.739-1.553-1.555-1.553-1.555-3.735V15.42q0-2.181 1.555-3.735 1.555-1.553 3.739-1.553h44.468q2.184 0 3.739 1.553 1.555 1.554 1.555 3.735z"/></symbol><symbol id="trumbowyg-underline" viewBox="0 0 72 72"><path d="M36 35zM15.2 55.9h41.6V59H15.2zM21.1 13.9h6.4v21.2c0 1.2.1 2.5.2 3.7.1 1.3.5 2.4 1 3.4.6 1 1.4 1.8 2.6 2.5 1.1.6 2.7 1 4.8 1 2.1 0 3.7-.3 4.8-1 1.1-.6 2-1.5 2.6-2.5.6-1 .9-2.1 1-3.4.1-1.3.2-2.5.2-3.7V13.9H51v23.3c0 2.3-.4 4.4-1.1 6.1-.7 1.7-1.7 3.2-3 4.4-1.3 1.2-2.9 2-4.7 2.6-1.8.6-3.9.9-6.1.9-2.2 0-4.3-.3-6.1-.9-1.8-.6-3.4-1.5-4.7-2.6-1.3-1.2-2.3-2.6-3-4.4-.7-1.7-1.1-3.8-1.1-6.1V13.9z"/></symbol><symbol id="trumbowyg-undo" viewBox="0 0 72 72"><path d="M61.2 51.2c0-5.1-2.1-9.7-5.4-13.1-3.3-3.3-8-5.4-13.1-5.4H26.1v-12L10.8 36l15.3 15.3V39.1h16.7c3.3 0 6.4 1.3 8.5 3.5 2.2 2.2 3.5 5.2 3.5 8.5h6.4z"/></symbol><symbol id="trumbowyg-unlink" viewBox="0 0 72 72"><path d="M30.9 49.1l-6.7 6.7c-.8.8-1.6.9-2.1.9s-1.4-.1-2.1-.9l-5.2-5.2c-1.1-1.1-1.1-3.1 0-4.2l6.1-6.1.2-.2 6.5-6.5c-1.2-.6-2.5-.9-3.8-.9-2.3 0-4.6.9-6.3 2.6L10.8 42c-3.5 3.5-3.5 9.2 0 12.7l5.2 5.2c1.7 1.7 4 2.6 6.3 2.6s4.6-.9 6.3-2.6l6.7-6.7C38 50.5 38.6 46.3 37 43l-6.1 6.1zM38.5 22.7l6.7-6.7c.8-.8 1.6-.9 2.1-.9s1.4.1 2.1.9l5.2 5.2c1.1 1.1 1.1 3.1 0 4.2l-6.1 6.1-.2.2-6.5 6.5c1.2.6 2.5.9 3.8.9 2.3 0 4.6-.9 6.3-2.6l6.7-6.7c3.5-3.5 3.5-9.2 0-12.7l-5.2-5.2c-1.7-1.7-4-2.6-6.3-2.6s-4.6.9-6.3 2.6l-6.7 6.7c-2.7 2.7-3.3 6.9-1.7 10.2l6.1-6.1z"/><path d="M44.1 30.7c.2-.2.4-.6.4-.9 0-.3-.1-.6-.4-.9l-2.3-2.3c-.2-.2-.6-.4-.9-.4-.3 0-.6.1-.9.4L25.8 40.8c-.2.2-.4.6-.4.9 0 .3.1.6.4.9l2.3 2.3c.2.2.6.4.9.4.3 0 .6-.1.9-.4l14.2-14.2zM41.3 55.8v-5h22.2v5H41.3z"/></symbol><symbol id="trumbowyg-unordered-list" viewBox="0 0 72 72"><path d="M27 14h36v8H27zM27 50h36v8H27zM9 50h9v8H9zM9 32h9v8H9zM9 14h9v8H9zM27 32h36v8H27z"/></symbol><symbol id="trumbowyg-view-html" viewBox="0 0 72 72"><path fill="none" stroke="currentColor" stroke-width="8" stroke-miterlimit="10" d="M26.9 17.9L9 36.2 26.9 54M45 54l17.9-18.3L45 17.9"/></symbol><symbol id="trumbowyg-base64" viewBox="0 0 72 72"><path d="M64 17v38H8V17h56m8-8H0v54h72V9z"/><path d="M29.9 28.9c-.5-.5-1.1-.8-1.8-.8s-1.4.2-1.9.7c-.5.4-.9 1-1.2 1.6-.3.6-.5 1.3-.6 2.1-.1.7-.2 1.4-.2 1.9l.1.1c.6-.8 1.2-1.4 2-1.8.8-.4 1.7-.5 2.7-.5.9 0 1.8.2 2.6.6.8.4 1.6.9 2.2 1.5.6.6 1 1.3 1.2 2.2.3.8.4 1.6.4 2.5 0 1.1-.2 2.1-.5 3-.3.9-.8 1.7-1.5 2.4-.6.7-1.4 1.2-2.3 1.6-.9.4-1.9.6-3 .6-1.6 0-2.8-.3-3.9-.9-1-.6-1.8-1.4-2.5-2.4-.6-1-1-2.1-1.3-3.4-.2-1.3-.4-2.6-.4-3.9 0-1.3.1-2.6.4-3.8.3-1.3.8-2.4 1.4-3.5.7-1 1.5-1.9 2.5-2.5 1-.6 2.3-1 3.8-1 .9 0 1.7.1 2.5.4.8.3 1.4.6 2 1.1.6.5 1.1 1.1 1.4 1.8.4.7.6 1.5.7 2.5h-4c0-1-.3-1.6-.8-2.1zm-3.5 6.8c-.4.2-.8.5-1 .8-.3.4-.5.8-.6 1.2-.1.5-.2 1-.2 1.5s.1.9.2 1.4c.1.5.4.9.6 1.2.3.4.6.7 1 .9.4.2.9.3 1.4.3.5 0 1-.1 1.3-.3.4-.2.7-.5 1-.9.3-.4.5-.8.6-1.2.1-.5.2-.9.2-1.4 0-.5-.1-1-.2-1.4-.1-.5-.3-.9-.6-1.2-.3-.4-.6-.7-1-.9-.4-.2-.9-.3-1.4-.3-.4 0-.9.1-1.3.3zM36.3 41.3v-3.8l9-12.1H49v12.4h2.7v3.5H49v4.8h-4v-4.8h-8.7zM45 30.7l-5.3 7.2h5.4l-.1-7.2z"/></symbol><symbol id="trumbowyg-back-color" viewBox="0 0 72 72"><path d="M36.5 22.3l-6.3 18.1H43l-6.3-18.1z"/><path d="M9 8.9v54.2h54.1V8.9H9zm39.9 48.2L45 46H28.2l-3.9 11.1h-7.6L32.8 15h7.8l16.2 42.1h-7.9z"/></symbol><symbol id="trumbowyg-fore-color" viewBox="0 0 72 72"><path d="M32 15h7.8L56 57.1h-7.9l-4-11.1H27.4l-4 11.1h-7.6L32 15zm-2.5 25.4h12.9L36 22.3h-.2l-6.3 18.1z"/></symbol><symbol id="trumbowyg-emoji" viewBox="0 0 72 72"><path d="M36.05 9C21.09 9 8.949 21.141 8.949 36.101c0 14.96 12.141 27.101 27.101 27.101 14.96 0 27.101-12.141 27.101-27.101S51.01 9 36.05 9zm9.757 15.095c2.651 0 4.418 1.767 4.418 4.418s-1.767 4.418-4.418 4.418-4.418-1.767-4.418-4.418 1.767-4.418 4.418-4.418zm-19.479 0c2.651 0 4.418 1.767 4.418 4.418s-1.767 4.418-4.418 4.418-4.418-1.767-4.418-4.418 1.767-4.418 4.418-4.418zm9.722 30.436c-14.093 0-16.261-13.009-16.261-13.009h32.522S50.143 54.531 36.05 54.531z"/></symbol><symbol id="trumbowyg-insert-audio" viewBox="0 0 8 8"><path d="M3.344 0L2 2H0v4h2l1.344 2H4V0h-.656zM5 1v1c.152 0 .313.026.469.063H5.5c.86.215 1.5.995 1.5 1.938a1.99 1.99 0 0 1-2 2.001v1a2.988 2.988 0 0 0 3-3 2.988 2.988 0 0 0-3-3zm0 2v2l.25-.031C5.683 4.851 6 4.462 6 4c0-.446-.325-.819-.75-.938v-.031h-.031L5 3z"/></symbol><symbol id="trumbowyg-noembed" viewBox="0 0 72 72"><path d="M31.5 33.6V25l11 11-11 11v-8.8z"/><path d="M64 17v38H8V17h56m8-8H0v54h72V9z"/></symbol><symbol id="trumbowyg-preformatted" viewBox="0 0 72 72"><path d="M10.3 33.5c.4 0 .9-.1 1.5-.2s1.2-.3 1.8-.7c.6-.3 1.1-.8 1.5-1.3.4-.5.6-1.3.6-2.1V17.1c0-1.4.3-2.6.8-3.6s1.2-1.9 2-2.5c.8-.7 1.6-1.2 2.5-1.5.9-.3 1.6-.5 2.2-.5h5.3v5.3h-3.2c-.7 0-1.3.1-1.8.4-.4.3-.8.6-1 1-.2.4-.4.9-.4 1.3-.1.5-.1.9-.1 1.4v11.4c0 1.2-.2 2.1-.7 2.9-.5.8-1 1.4-1.7 1.8-.6.4-1.3.8-2 1-.7.2-1.3.3-1.7.4v.1c.5 0 1 .1 1.7.3.7.2 1.3.5 2 .9.6.5 1.2 1.1 1.7 1.9.5.8.7 2 .7 3.4v11.1c0 .4 0 .9.1 1.4.1.5.2.9.4 1.3s.6.7 1 1c.4.3 1 .4 1.8.4h3.2V63h-5.3c-.6 0-1.4-.2-2.2-.5-.9-.3-1.7-.8-2.5-1.5s-1.4-1.5-2-2.5c-.5-1-.8-2.2-.8-3.6V43.5c0-.9-.2-1.7-.6-2.3-.4-.6-.9-1.1-1.5-1.5-.6-.4-1.2-.6-1.8-.7-.6-.1-1.1-.2-1.5-.2v-5.3zM61.8 38.7c-.4 0-1 .1-1.6.2-.6.1-1.2.4-1.8.7-.6.3-1.1.7-1.5 1.3-.4.5-.6 1.3-.6 2.1v12.1c0 1.4-.3 2.6-.8 3.6s-1.2 1.9-2 2.5c-.8.7-1.6 1.2-2.5 1.5-.9.3-1.6.5-2.2.5h-5.3v-5.3h3.2c.7 0 1.3-.1 1.8-.4.4-.3.8-.6 1-1 .2-.4.4-.9.4-1.3.1-.5.1-.9.1-1.4V42.3c0-1.2.2-2.1.7-2.9.5-.8 1-1.4 1.7-1.8.6-.4 1.3-.8 2-1 .7-.2 1.3-.3 1.7-.4v-.1c-.5 0-1-.1-1.7-.3-.7-.2-1.3-.5-2-.9-.6-.4-1.2-1.1-1.7-1.9-.5-.8-.7-2-.7-3.4V18.5c0-.4 0-.9-.1-1.4-.1-.5-.2-.9-.4-1.3s-.6-.7-1-1c-.4-.3-1-.4-1.8-.4h-3.2V9.1h5.3c.6 0 1.4.2 2.2.5.9.3 1.7.8 2.5 1.5s1.4 1.5 2 2.5c.5 1 .8 2.2.8 3.6v11.6c0 .9.2 1.7.6 2.3.4.6.9 1.1 1.5 1.5.6.4 1.2.6 1.8.7.6.1 1.2.2 1.6.2v5.2z"/></symbol><symbol id="trumbowyg-ruby" viewBox="0 0 72 72"><path d="M16.499 24.477h8.018L41.08 67.5H33l-4.04-11.361H11.804L7.764 67.5H0l16.499-43.023zm-2.65 25.907h13.127l-6.438-18.497h-.177l-6.512 18.497zM65.053 16.685c-6.316 1.178-12.025 1.98-17.126 2.408a362.385 362.385 0 0 0-.965 5.833c-.25 1.57-.679 3.907-1.286 7.013 3.033-1.963 5.852-3.266 8.458-3.907 2.639-.642 4.905-.891 6.797-.75 1.891.108 3.746.661 5.566 1.661 1.82.964 3.264 2.408 4.334 4.334 1.104 1.893 1.427 4.088.965 6.584-.466 2.461-1.554 4.494-3.265 6.101-1.679 1.605-3.658 2.783-5.941 3.532-2.283.785-4.853 1.251-7.707 1.391-2.819.144-5.906.161-9.259.056 0-1.642-.287-3.212-.857-4.71l.108-.59c2.711.5 5.246.768 7.601.802 2.39 0 4.529-.195 6.421-.589 1.927-.393 3.605-1.069 5.031-2.031 1.427-.965 2.319-2.319 2.676-4.067.394-1.75.269-3.229-.373-4.443-.644-1.249-1.446-2.213-2.408-2.891-.929-.68-2.161-1.034-3.693-1.071-1.536-.072-3.265.089-5.192.482-1.927.391-3.82 1.14-5.672 2.248a24.308 24.308 0 0 0-4.978 3.907l-4.872-1.981c1.463-5.031 2.355-8.597 2.677-10.703.321-2.105.642-4.067.963-5.887-3.961.25-7.154.411-9.58.481-.215-1.927-.52-3.534-.91-4.817l.32-.32c3.604.32 7.225.446 10.865.375.214-1.355.481-3.103.804-5.245.354-2.175.407-3.621.16-4.336.034-.784.374-1.017 1.017-.695l5.085.749c.428.251.444.573.055.964l-.857.91c-.537 2.89-.981 5.352-1.338 7.385 4.279-.427 9.312-1.393 15.092-2.89l1.284 4.707"/></symbol><symbol id="trumbowyg-upload" viewBox="0 0 72 72"><path d="M64 27v28H8V27H0v36h72V27h-8z"/><path d="M32.1 6.7h8v33.6h-8z"/><path d="M48 35.9L36 49.6 24 36h24z"/></symbol></svg>
</div>

<!--<div id="page-loader">
    <div class="page-loader__logo">
        <img src="images/uploads/logo_dark.png" alt="ReaLand Logo">
    </div><!-- .page-loader__logo -->
    
    <!--<div class="sk-folding-cube">
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
    </div><!-- .sk-folding-cube -->
<!--</div><!-- .page-loader -->

<!-- JS Files -->
<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/plugins.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDyCxHyc8z9gMA5IlipXpt0c33Ajzqix4"></script>
<script src="https://cdn.rawgit.com/googlemaps/v3-utility-library/master/infobox/src/infobox.js"></script>
<script src="js/custom.js"></script>
</body>
</html>