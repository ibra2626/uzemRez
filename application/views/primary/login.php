<div class="login-box">
                <div class="login-logo">
                    <a href="#"><b>UZEM REZERVASYON</b> GİRİŞ</a>
                </div>
                <!-- /.login-logo -->
                <div class="card">
                    <div class="card-body login-card-body">
                        <p class="login-box-msg text-primary"><u class="text-danger">@bilecik.edu.tr</u> uzantılı mail adresinizi kullanınız.</p>
                        <?php if(!empty($valid_error) OR !empty($wrong_login)){ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php ;
                            if (empty($valid_error))
                                echo @$wrong_login;
                            else
                                echo @$valid_error;?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php }?>
                        <?php if(isset($this->session->kayitTamamlandi)) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Kayit Tamamlandi
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        <?php }?>
                        <form action=<?php echo base_url()."Login/loginControl"; ?> method="post">
                            <div class="input-group mb-3">
                                <input type="email" name="username" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Şifre">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="hatirla">
                                        <label for="hatirla">
                                            Beni Hatırla
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block" name="login" >Giriş Yap</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                        <div class="social-auth-links text-center mb-3">
                            <p>- HESABINIZ YOKSA -</p>
                            <a href="<?php echo base_url('register')?>" class="btn btn-block btn-primary">
                                <i class="fas fa-registered mr-2"></i> KAYIT OL
                            </a>
                        </div>
                        <!-- /.social-auth-links -->

                        <p class="mb-1">
                            <a href="#">Şifremi Unuttum</a>
                        </p>
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
