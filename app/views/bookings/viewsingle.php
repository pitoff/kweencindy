<style>
    #category {
        color: white;
    }

    .categoryHead {
        color: #ffc107 !important;
    }
</style>
<?php require APPROOT . '/views/inc/header.php'; ?>

<?php if($_SESSION['role'] == 2):?>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-md-0">
            <div class="row d-flex no-gutters">
                <div class="col-lg-12 col-md-10 order-md-last d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                        <h3 class="mb-4 heading categoryHead pb-1">Booked: </h3>

                        <div class="row">
                            <div class="col-md-6">
                                <p>Name: <?= $data['singleBooking']->name ?></p>
                            </div>
                            <div class="col-md-6">
                                <p>Email: <?= $data['singleBooking']->email ?></p>
                            </div>
                            <div class="col-md-6">
                                <p>Phone Number: <?= $data['singleBooking']->phone ?></p>
                            </div>
                            <div class="col-md-6">
                                <p>Category: <?= $data['singleBooking']->category ?></p>
                            </div>
                            <div class="col-md-6">
                                <p>Price: #<?= number_format($data['singleBooking']->price, 2) ?></p>
                            </div>
                            <div class="col-md-6">
                                <p>Location: <?= $data['singleBooking']->location ?></p>
                            </div>

                            <?php if ($data['singleBooking']->location === 'self_location') : ?>

                                <div class="col-md-6">
                                    <p>State: <?= $data['singleBooking']->state ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p>Town: <?= $data['singleBooking']->town ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p>Address: <?= $data['singleBooking']->address ?></p>
                                </div>

                            <?php else : ?>
                                <div> </div>
                            <?php endif; ?>

                            <div class="col-md-6">
                                <p>Status: <?= $data['singleBooking']->status ?></p>
                            </div>
                            <div class="col-md-6">
                                <p>Booked for: <?= $data['singleBooking']->book_date ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <div class="form-group">
                                    <a href="<?= URLROOT ?>/bookings/mybookings/<?= $data['singleBooking']->user_id ?>"><button class="btn btn-primary">Back to my bookings</button></a>
                                    <div class="submitting"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php elseif($_SESSION['role'] == 1):?>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-md-0">
            <div class="row d-flex no-gutters">
                <div class="col-lg-12 col-md-10 order-md-last d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                        <h3 class="mb-4 heading categoryHead pb-1">Booked: </h3>

                        <div class="row">
                            <div class="col-md-6">
                                <p>Name: <?= $data['singleBooking']->name ?></p>
                            </div>
                            <div class="col-md-6">
                                <p>Email: <?= $data['singleBooking']->email ?></p>
                            </div>
                            <div class="col-md-6">
                                <p>Phone Number: <?= $data['singleBooking']->phone ?></p>
                            </div>
                            <div class="col-md-6">
                                <p>Category: <?= $data['singleBooking']->category ?></p>
                            </div>
                            <div class="col-md-6">
                                <p>Price: #<?= number_format($data['singleBooking']->price, 2) ?></p>
                            </div>
                            <div class="col-md-6">
                                <p>Location: <?= $data['singleBooking']->location ?></p>
                            </div>

                            <?php if ($data['singleBooking']->location === 'self_location') : ?>

                                <div class="col-md-6">
                                    <p>State: <?= $data['singleBooking']->state ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p>Town: <?= $data['singleBooking']->town ?></p>
                                </div>
                                <div class="col-md-6">
                                    <p>Address: <?= $data['singleBooking']->address ?></p>
                                </div>

                            <?php else : ?>
                                <div> </div>
                            <?php endif; ?>

                            <div class="col-md-6">
                                <p>Status: <?= $data['singleBooking']->status ?></p>
                            </div>
                            <div class="col-md-6">
                                <p>Booked for: <?= $data['singleBooking']->book_date ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mt-4">
                                <div class="form-group">
                                    <a href="<?= URLROOT ?>/users/dashboard"><button class="btn btn-primary">Back to bookings</button></a>
                                    <div class="submitting"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php endif;?>

<?php require APPROOT . '/views/inc/footer.php'; ?>