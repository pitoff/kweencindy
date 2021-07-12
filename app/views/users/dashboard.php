<style>
    #category {
        color: white;
    }

    .categoryHead {
        color: #ffc107 !important;
    }
</style>
<?php require APPROOT . '/views/inc/header.php'; ?>

<?php if ($_SESSION['role'] == 2) : ?>
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container px-md-0">
                <div class="row d-flex no-gutters">
                    <div class="col-lg-12 col-md-11 order-md-last d-flex align-items-stretch">
                        <div class="contact-wrap w-100 p-md-5 p-4">
                            <div class="table-responsive">
                                <h3 class="mb-4 heading categoryHead pb-1">Already booked: </h3>
                                <div class="paid mb-2"><em><?= flash('paid'); ?></em></div>
                                <table class="table table-hover" id="category">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category</th>
                                            <th>Booked_Date</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($data['allbookings'] as $booking) : ?>
                                            <?php if ($booking->status === 'received') : ?>
                                                <tr>
                                                    <td></td>
                                                    <td><?= $booking->category ?></td>
                                                    <td><?= $booking->book_date ?></td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="<?= URLROOT ?>/bookings/pickcategory"><button class="btn btn-primary">Book Session</button></a>
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

<?php elseif ($_SESSION['role'] == 1) : ?>
    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container px-md-0">
                <div class="row d-flex no-gutters">
                    <div class="col-lg-12 col-md-11 order-md-last d-flex align-items-stretch">
                        <div class="contact-wrap w-100 p-md-5 p-4">
                            <div class="table-responsive">
                                <h3 class="mb-4 heading categoryHead pb-1">Already booked: </h3>
                                <div class="paid mb-2"><em><?= flash('paid'); ?></em></div>
                                <table class="table table-hover" id="category">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Booked_Date</th>
                                            <th>Accept_Date</th>
                                            <th>Decline_date</th>
                                            <th>Confirm_payment</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($data['allbookings'] as $booking) : ?>
                                            <?php if (!empty($booking->book_date)) : ?>
                                                <tr>
                                                    <td><?= $booking->name ?></td>

                                                    <td><?= $booking->category ?></td>
                                                    <td><?= $booking->book_date ?></td>

                                                    <?php if ($booking->date_status === 'accepted') : ?>
                                                        <td><em class="text-success"><?= $booking->date_status ?></em></td>
                                                    <?php else : ?>
                                                        <form action="<?= URLROOT ?>/users/updateDate/<?= $booking->id ?>" method="POST">
                                                            <td>
                                                                <input type="hidden" name="status" value="accepted">
                                                                <button type="submit" data-toggle="tooltip" title="Confirm payment" class="btn btn-success">
                                                                    Accept
                                                                </button>
                                                            </td>
                                                        </form>
                                                    <?php endif; ?>

                                                    <?php if ($booking->date_status === 'declined') : ?>
                                                        <td><em class="text-danger"><?= $booking->date_status ?></em></td>
                                                    <?php else : ?>
                                                        <form action="<?= URLROOT ?>/users/updateDate/<?= $booking->id ?>" method="POST">
                                                            <td>
                                                                <input type="hidden" name="status" value="declined">
                                                                <button type="submit" data-toggle="tooltip" title="Confirm payment" class="btn btn-danger">
                                                                    Decline
                                                                </button>
                                                            </td>
                                                        </form>
                                                    <?php endif; ?>

                                                    <?php if ($booking->status === 'received') : ?>
                                                        <td><?= $booking->status ?></td>
                                                    <?php else : ?>
                                                        <form action="<?= URLROOT ?>/users/updatePay/<?= $booking->id ?>" method="POST">
                                                            <td>
                                                                <input type="hidden" name="status" value="received">
                                                                <button type="submit" data-toggle="tooltip" title="Confirm payment" class="btn btn-secondary">
                                                                    Confirm
                                                                </button>
                                                            </td>
                                                        </form>
                                                    <?php endif; ?>

                                                    <td><a href="<?= URLROOT ?>/bookings/viewsingle/<?= $booking->id ?>"><button type="button" data-toggle="tooltip" title="View booking" class="btn btn-primary"><span class="fa fa-eye"></span></button></a>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>