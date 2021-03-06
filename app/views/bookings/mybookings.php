<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-md-0">
            <div class="row d-flex no-gutters">
                <div class="col-lg-12 col-md-10 order-md-last d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">

                        <h3 class="mb-4 heading pb-1" style="color:#ffc107;">My bookings: </h3>
                        <div class="paid mb-2"><em><?= flash('paid'); ?></em></div>
                        <div class="mb-2"><em><?= flash('paystack_paid'); ?></em></div>
                        <div class="not_accept mb-2"><em><?= flash2('not_accepted'); ?></em></div>
                        <div class="table-responsive">
                            <table class="table table-hover" style="color:white;">
                                <thead>
                                    <tr>
                                        <!-- <th>Name</th> -->
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Paid ?</th>
                                        <th>Payment status</th>
                                        <th>Date</th>
                                        <th>Make payment</th>
                                        <th>View</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($data['mybookings'] as $booking) : ?>
                                        <?php if (!empty($booking->book_date)) : ?>
                                            <tr>
                                                <!-- <td><?= $booking->name ?></td> -->
                                                <td><?= $booking->category ?></td>
                                                <td>#<?= number_format($booking->price, 2) ?></td>

                                                <?php if ($booking->status === 'paid' || $booking->status === 'received') : ?>
                                                    <td></td>
                                                <?php elseif ($booking->date_status === 'accepted') : ?>
                                                    <form action="<?= URLROOT ?>/bookings/mybookings/<?= $booking->id ?>" method="POST">
                                                        <td>
                                                            <input type="hidden" name="status" value="paid">
                                                            <button type="submit" data-toggle="tooltip" title="Comfirm payment" class="btn btn-primary">
                                                                Paid
                                                            </button>
                                                        </td>
                                                    </form>
                                                <?php else : ?>
                                                    <td></td>
                                                <?php endif; ?>

                                                <td><?= $booking->status ?></td>

                                                <?php if ($booking->date_status === 'declined') : ?>
                                                    <td class="text-danger"><?= $booking->date_status ?></td>
                                                <?php else : ?>
                                                    <td class="text-success"><?= $booking->date_status ?></td>
                                                <?php endif; ?>

                                                <?php if ($booking->status === 'paid' || $booking->status === 'received') : ?>
                                                    <td></td>
                                                <?php else:?>
                                                    <td><a href="<?= URLROOT ?>/bookings/payment/<?= $booking->id ?>"><button type="button" data-toggle="tooltip" title="View booking" class="btn btn-primary"><span class="fa fa-money"></span></button></a></td>
                                                <?php endif;?>

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
<script>
    function paid() {
        setTimeout(() => document.querySelector('.paid').remove(), 5000);
    }
    paid();

    function notAccept(){
        setTimeout(() => document.querySelector(".not_accept").remove(), 5000);
    }
    notAccept();
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>