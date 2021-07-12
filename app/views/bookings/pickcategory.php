<style>
    #select {
        background-color: #343a40;
        border: none !important;
        border: inherit !important;
    }
</style>
<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-md-0">
            <div class="row d-flex no-gutters">
                <div class="col-lg-12 col-md-10 order-md-last d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                        <h4 class="mb-4 heading" style="color:#ffc107;">Book a make up session with <?= LOGO; ?></h4>
                        <div id="err"><em><?= flash2('error');?></em></div>
                        <form method="POST" action="<?= URLROOT; ?>/bookings/pickcategory" id="contactForm" name="contactForm" class="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="category">Select make up Category</label>
                                        <select name="category" class="form-control">
                                            <?php foreach ($data['categories'] as $category) : ?>
                                                <option id="select" value="<?= $category->category ?>"><?= $category->category ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Proceed" class="btn btn-primary">
                                        <div class="submitting"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>

            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->

<?php require APPROOT . '/views/inc/footer.php'; ?>