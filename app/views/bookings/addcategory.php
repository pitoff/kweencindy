<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-md-0">
            <div class="row d-flex no-gutters">
                <div class="col-lg-12 col-md-11 order-md-last d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                        <h3 class="mb-4 heading">Add new category</h3> 
                        <form method="POST" action="<?= URLROOT;?>/bookings/addcategory" id="contactForm" name="contactForm" class="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="category">Category</label>
                                        <input type="text" class="form-control" name="category" id="cat" placeholder="category of makeup">
                                        <span class="text-danger"><em><?=$data['category_err'];?></em></span>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="price">Price</label>
                                        <input type="text" class="form-control" name="price" id="" placeholder="#350000">
                                        <span class="text-danger"><em><?=$data['price_err'];?></em></span>
                                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="desc">Description</label>
                                        <textarea class="form-control" name="description" id="" cols="10" rows="3"></textarea>
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