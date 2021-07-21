<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<h1 id="colorlib-logo" class="mb-4 mb-md-5"><a href="<?=URLROOT;?>" style="background-image: url(../images/bg_1.jpg);"><?=LOGO;?></a></h1>
			
			<?php if(isLoggedIn() && $_SESSION['role'] == 1): ?>
				<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li><a href="<?= URLROOT;?>/users/dashboard">Bookings</a></li>
					<li><a href="<?= URLROOT;?>/bookings/category">Category</a></li>
					<li><a href="<?= URLROOT;?>/posts/all">Gallery</a></li>
					<li><a href="<?= URLROOT;?>/posts/addpost">Add Post</a></li>
					<li><a href="<?= URLROOT;?>/users/logout">Log Out</a></li>
				</ul>
				</nav>
			<?php elseif(isLoggedIn() && $_SESSION['role'] == 2): ?>
				<nav id="colorlib-main-menu" role="navigation">
					<ul>
						<li><a href="<?= URLROOT;?>/users/dashboard">All Bookings</a></li>
						<li><a href="<?= URLROOT;?>/bookings/pickcategory">Book a session</a></li>
						<li><a href="<?= URLROOT;?>/bookings/mybookings/<?= $_SESSION['user_id'];?>">My Bookings</a></li>
						<li><a href="<?= URLROOT;?>/users/logout">Log Out</a></li>
					</ul>
				</nav>
			<?php else:?>
				<nav id="colorlib-main-menu" role="navigation">
					<ul>
						<li class="colorlib"><a href="<?= URLROOT;?>">Home</a></li>
						<li class=""><a href="<?= URLROOT;?>/pages/about">About</a></li>
						<li><a href="<?= URLROOT;?>/pages/pricing">Pricing</a></li>
						<li><a href="<?= URLROOT;?>/posts/all">Gallery</a></li>
						<li><a href="<?= URLROOT;?>/users/signup">Sign-up</a></li>
						<li><a href="<?= URLROOT;?>/users/login">Log-in</a></li>
						<li><a href="<?= URLROOT;?>/pages/contact">Contact</a></li>
					</ul>
				</nav>
			<?php endif;?>

			<div class="colorlib-footer">
				<div class="mb-4">
					<h3>Subscribe for newsletter</h3>
					<form action="#" class="colorlib-subscribe-form">
						<div class="form-group d-flex">
							<div class="icon"><span class="icon-paper-plane"></span></div>
							<input type="text" class="form-control" placeholder="Enter Email Address">
						</div>
					</form>
				</div>
				<p class="pfooter"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				</div>
			</aside> <!-- END COLORLIB-ASIDE -->