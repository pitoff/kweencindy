<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="colorlib-main">
				<section class="ftco-section ftco-no-pt ftco-no-pb">
					<div class="container px-md-0">
						<div class="row d-flex no-gutters">
                        <?php foreach($data['posts'] as $post):?>
							<div class="col-md-4 portfolio-wrap-2">
								<div class="row no-gutters align-items-center">
									<div href="#" class="img w-100 js-fullheight d-flex align-items-center" style="background-image: url(<?= URLROOT?>/images/<?= $post->image?>);">
                                        <div class="text p-4 p-md-5 ftco-animate">
											<div class="desc">
												<div class="top">
													<span class="subheading"><?= $post->category;?></span>
													<h2 class="mb-4"><a href="single.html"><?= $post->description?></a></h2>
													<p><a href="<?= URLROOT?>/posts/viewpost/<?= $post->id;?>" class="custom-btn">View Photo</a></p>
                                                    
                                                    <?php if(isLoggedIn() && $_SESSION['role'] == 1): ?>
                                                        <p><a href="<?= URLROOT?>/posts/updatepost/<?= $post->id;?>" class="custom-btn">Update</a></p>
                                                        <p>
                                                        <form method="POST" action="<?= URLROOT?>/posts/removepost/<?= $post->id;?>">
                                                            <button class="custom-btn pl-0" style="background-color: transparent;">Remove</button>
                                                        </form>
                                                        </p>
                                                    <?php endif;?>
												</div>
											</div>
										</div>   
									</div>    
								</div>
							</div>
                        <?php endforeach;?>
						</div>
						<div class="row d-flex">
							<div class="col-md-12">
								<a href="#" class="btn-custom-load d-block w-100 text-center py-4">Load more <span class="fa fa-refresh"></span></a>
							</div>
						</div>
					</div>
				</section>
			</div><!-- END COLORLIB-MAIN -->

<?php require APPROOT . '/views/inc/footer.php'; ?>