<style>
    #pass:hover {
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
                        <h3 class="mb-4 heading">Log in</h3>
                        <div id="success" class="text-center"><em><?= flash('signupSuccess'); ?></em></div>
                        <div id="reset_success" class="text-center"><em><?= flash('password_reset'); ?></em></div>
                        <div id="loginFailed" class="text-center"><em><?= flash2('failed'); ?></em></div>
                        <form method="POST" action="<?= URLROOT; ?>/users/login" id="contactForm" name="contactForm" class="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="email">Email Address</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                        <span class="text-danger"><em><?= $data['email_err']; ?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="*****">
                                        <span class="text-danger"><em><?= $data['password_err']; ?></em></span>
                                        <span class="fa fa-eye mt-2" id="pass" onclick="showPass(this)"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="submit" value="Login" class="btn btn-primary">
                                        <div class="submitting"></div>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <div class="form-group">
                            <a href="<?= URLROOT; ?>/users/forgotpass"><button class="btn btn-primary">Forgot Password?</button></a>
                            <div class="submitting"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div><!-- END COLORLIB-MAIN -->
<script>
    function signup() {
        setTimeout(() => document.querySelector('#success').remove(), 4000);
    }
    signup();

    function login() {
        setTimeout(() => document.querySelector('#loginFailed').remove(), 4000);
    }
    login();

    function showPass(el) {
        const pass = document.querySelector('#password');
        if (pass.type === 'password') {
            pass.type = 'text';
            el.className = 'fa fa-eye-slash mt-2';
        } else {
            pass.type = 'password';
            el.className = 'fa fa-eye mt-2';
        }
    }
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>