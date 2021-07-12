<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-md-0">
            <div class="row d-flex no-gutters">
                <div class="col-lg-12 col-md-10 order-md-last d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                        <h4 class="mb-4 heading" style="color:#ffc107;">Book a make up session with <?= LOGO; ?></h4>
                        <form method="POST" action="<?= URLROOT; ?>/bookings/bookself/<?= $data['id'];?>" id="contactForm" name="contactForm" class="contactForm">
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
                                        <span class="text-danger"><em><?= $data['price_err']; ?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="date">Date</label>
                                        <input type="date" class="form-control" name="date" id="" value="">
                                        <span class="text-danger"><em><?= $data['date_err']; ?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="state">State</label>
                                        <input type="text" class="form-control" name="state" id="" value="<?= $data['state']; ?>" placeholder="current_state">
                                        <span class="text-danger"><em><?= $data['state_err']; ?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="town">Town</label>
                                        <input type="text" class="form-control" name="town" id="" value="<?= $data['town']; ?>" placeholder="current_town">
                                        <span class="text-danger"><em><?= $data['town_err']; ?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="name">Address</label>
                                        <input type="text" class="form-control" name="addr" id="" value="<?= $data['addr']; ?>" placeholder="location address">
                                        <span class="text-danger"><em><?= $data['addr_err']; ?></em></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Book self location" class="btn btn-primary">
                                        <div class="submitting"></div>
                                    </div>
                                </div>


                            </div>
                        </form>
                        <!-- <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href=""><button class="btn btn-primary">See already booked?</button></a>
                                    <div class="submitting"></div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>

            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->

<?php require APPROOT . '/views/inc/footer.php'; ?>