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
                <div class="col-lg-12 col-md-10 order-md-last d-flex align-items-stretch">
                    <div class="contact-wrap w-100 p-md-5 p-4">
                        <h3 class="mb-4 heading">Sign up</h3>
                        <form method="POST" action="<?= URLROOT;?>/users/signup" id="contactForm" name="contactForm" class="contactForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="name">Full Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?= $data['name'];?>" placeholder="Name">
                                        <span class="text-danger"><em><?=$data['name_err'];?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="email">Email Address</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?= $data['email'];?>" placeholder="Email">
                                        <span class="text-danger"><em><?=$data['email_err'];?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="phone">Phonenumber</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?= $data['phone'];?>" placeholder="Phone">
                                        <span class="text-danger"><em><?=$data['phone_err'];?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="*****">
                                        <span class="text-danger"><em><?=$data['password_err'];?></em></span>
                                        <span class="fa fa-eye mt-2" id = 'pass' onclick="showPass(this)"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label" for="password">Confirm password</label>
                                        <input type="password" class="form-control" name="Cpass" id="Cpass" placeholder="*****">
                                        <span class="text-danger"><em><?=$data['Cpass_err'];?></em></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" value="Sign up" class="btn btn-primary">
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
<script>
    function showPass(el){
        const pass = document.querySelector('#password');
        if(pass.type === 'password'){
            pass.type = 'text';
            el.className = 'fa fa-eye-slash mt-2';
        }else{
            pass.type = 'password';
            el.className = 'fa fa-eye mt-2';
        }
    }
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>