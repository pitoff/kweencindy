<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-md-0">
            <div class="row d-flex no-gutters">
                <div class="col-lg-12 col-md-10 order-md-last d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                        <h4 class="mb-4 heading" style="color:#ffc107;">Payment options</h4>
                        <div class="row">
                            <div class="col-md-6 text-success" style="text-transform: uppercase;">

                                <div class="mb-2"><span class="fa fa-bank"></span> Payment By bank transfer</div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name" value="UBA" readonly>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name" value="beats by kweencindy" readonly>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="acc" value="2021347843" readonly>
                                    <button class="btn btn-primary mt-1 pull-right" id="btn"><span class="fa fa-copy"></span></button>
                                </div>
                                <em style="color: white; text-transform: lowercase;">copy account details, make payment and complete your booking.</em>

                                    <div class="form-group mt-2">
                                        <input type="hidden" name="status" value="paid">
                                        <!-- <p style="color: white; text-transform: lowercase;">Click on <button type="submit" class="btn btn-primary">Paid</button> to confirm payment.</p> -->
                                        <p style="color: white; text-transform: lowercase;">Make sure your date status has been accepted <a href="<?=URLROOT;?>/bookings/mybookings/<?= $_SESSION['user_id'];?>"><button class="btn btn-primary"> here</button></a> before making payment.</p>
                                        <div class="submitting"></div>
                                    </div>

                            </div>

                            <div class="col-md-6 text-success" style="text-transform: uppercase;">

                                <div class="mb-4"><span class="fa fa-credit-card"></span> Payment By card </div>


                                <div class="form-group">
                                    <a href=""><button class="btn btn-primary">Proceed to pay by card</button></a>
                                    <em style="text-transform:lowercase; color:white;">currently unavailable!</em>
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
<script type="text/javascript">
    const acc = document.getElementById('acc');
    const btn = document.getElementById('btn');
    btn.onclick = function() {
        acc.select();
        document.execCommand('Copy');
        alert('Bank account number has been copied');
    };
</script>

<?php require APPROOT . '/views/inc/footer.php'; ?>