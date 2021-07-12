<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-md-0">
            <div class="row d-flex no-gutters">
                <div class="col-lg-12 col-md-11 order-md-last d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                        <h3 class="mb-4 heading">Add new post</h3>
                        <div id="" class="text-center"><em><?= flash2('upload_failed'); ?></em></div>
                        <form method="POST" action="<?= URLROOT;?>/posts/addpost" id="contactForm" name="contactForm" class="contactForm" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="category">Category</label>
                                        <input type="text" class="form-control" name="category" id="cat" placeholder="category of makeup" value="<?= $data['category'];?>">
                                        <span class="text-danger"><em><?=$data['category_err'];?></em></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="price">Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <span class="text-danger"><em><?=$data['image_err'];?></em></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="desc">Description</label>
                                        <textarea class="form-control" name="description" id="" cols="10" rows="3"><?= $data['description'];?></textarea>
                                        <span class="text-danger"><em><?=$data['description_err'];?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" class="btn btn-primary">
                                        <div class="submitting"></div>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
                
                </div>
            </div>
            
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
<?php require APPROOT . '/views/inc/footer.php'; ?>