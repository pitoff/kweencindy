<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-md-0">
            <div class="row d-flex no-gutters">
                <div class="col-lg-12 col-md-10 order-md-last d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                        <h4 class="mb-4 heading" style="color:#ffc107;">Book a make up session with <?= LOGO; ?></h4>
                        <div id="err"><em><?= flash2('error');?></em></div>
                        <div id="err"><em><?= flash2('errorDate');?></em></div>
                        <form method="POST" action="<?= URLROOT; ?>/bookings/booksession/<?= $data['id'];?>" id="contactForm" name="contactForm" class="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="name">Full Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?= $data['name']; ?>" readonly>
                                        <span class="text-danger"><em><?= $data['name_err']; ?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="email">Email Address</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?= $data['email']; ?>" readonly>
                                        <span class="text-danger"><em><?= $data['email_err']; ?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="phone">Phonenumber</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?= $data['phone']; ?>" readonly>
                                        <span class="text-danger"><em><?= $data['phone_err']; ?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="price">Price</label>
                                        <input type="text" class="form-control" name="price" id="" value="#<?= number_format($data['price'], 2);?>" readonly>
                                        <span class="text-danger"><em><?= $data['phone_err']; ?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="date">Date</label>
                                        <input type="date" class="form-control" name="date" id="" value="">
                                        <span class="text-danger"><em><?= $data['date_err']; ?></em></span>
                                    </div>
                                </div>

                                <input type="hidden" value="<?= $data['id'];?>">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Book my date" class="btn btn-primary">
                                        <div class="submitting"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">Booking for self location ?
                                    <a href="<?= URLROOT; ?>/bookings/bookself"><button class="btn btn-primary ml-2">Click here</button></a>
                                    <div class="submitting"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
<script>
    function rmvErr(){
        setTimeout(()=> document.querySelector('#err').remove(), 5000);
    }
    rmvErr();
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>