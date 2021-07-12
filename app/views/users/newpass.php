<style>
    #pass:hover{
        color: yellow;
    }
</style>
<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="colorlib-main">
    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div class="container px-md-0">
            <div class="row d-flex no-gutters">
                <div class="col-lg-12 col-md-11 order-md-last d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                        <h3 class="mb-4 heading">Password Re-set</h3> 
                        <form method="POST" action="<?= URLROOT;?>/users/newpass" id="contactForm" name="contactForm" class="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="email">Email Address</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                        <span class="text-danger"><em><?=$data['email_err'];?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="token">Token</label>
                                        <input type="text" class="form-control" name="token" id="" placeholder="reset_token">
                                        <span class="text-danger"><em><?= $data['token_err']; ?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="password">New_Password</label>
                                        <input type="password" class="form-control" name="New_password" id="password" placeholder="*****">
                                        <span class="text-danger"><em><?= $data['New_password_err']; ?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="password">Confirm_Password</label>
                                        <input type="password" class="form-control" name="Confirm_password" id="password" placeholder="*****">
                                        <span class="text-danger"><em><?= $data['Confirm_password_err']; ?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <div class="form-group">
                                        <input type="submit" value="Change_Password" class="btn btn-primary">
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