<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-md-0">
            <div class="row d-flex no-gutters">
                <div class="col-lg-12 pb-5 single">
                    <div class="row">
                        <div class="img img-single w-100" style="background-image: url(<?= URLROOT ?>/images/<?= $data['viewPost']->image; ?>);"></div>
                        <div class="px-5 mt-4">
                            <h1 class="mb-3"><?= $data['viewPost']->category; ?></h1>
                            <p><?= $data['viewPost']->description; ?></p>
                            <div class="tag-widget post-tag-container mb-5 mt-5">
                                <div class="tagcloud">
                                    <a href="<?= URLROOT?>/posts/all" class="tag-cloud-link">Back to gallery</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- END-->
                </div>
            </div>
        </div>
    </section>
</div><!-- END COLORLIB-MAIN -->
<?php require APPROOT . '/views/inc/footer.php'; ?>