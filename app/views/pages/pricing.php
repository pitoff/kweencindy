<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-md-0">
            <div class="row d-flex no-gutters">
                <?php foreach($data['pricing'] as $pricing):?>
                <div class="col-md-4 pricing">
                    <div class="row no-gutters align-items-center">
                        <div href="#" class="img w-100 js-fullheight d-flex align-items-center" style="background-image: url(../images/work-2.jpg);">
                            <div class="text p-4 ftco-animate">
                                <h3 style="color:#ffc107;"><?= $pricing->category ?></h3>
                                <ul>
                                    <li><span>Description</span><?= $pricing->description?></li>
                                    <li><span>Time</span>4 hours</li>
                                </ul>
                                <span class="price">#<?= number_format($pricing->price, 2)?></span>
                                <p><a href="#" class="btn-custom">Book Me</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>