

<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>UZEM REZERVASYON</b> KAYIT</a>
    </div>

    <div class="card" >
        <div class="card-body register-card-body">
            <?php if (isset($this->session->captcha_control) OR isset($this->session->val_errors) OR isset($this->session->emailUyumlulugu) ){ ?>
            <p class="login-box-msg"></p>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php if(isset($this->session->val_errors)){echo $this->session->val_errors;} ?>
                <?php if (isset($this->session->captcha_control)){echo "Doğrulama kodunu yanlış girdiniz.";} ?>
                <?php if(isset($this->session->emailUyumlulugu)){echo $this->session->emailUyumlulugu;} ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php }?>
            <form action="Register/register" method="post">
                <div class="input-group mb-3">
                    <input type="text" name='ad' class="form-control" placeholder="İsim">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name='soyad' class="form-control" placeholder="Soyisim">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="sifre" class="form-control" placeholder="Şifre">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="pass_conf" class="form-control" placeholder="Şifre Tekrar">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                            <select name="birim" class="form-control select2" id="birim" style="width: 100%;">
                                <option value="seciniz" disabled selected hidden>Lütfen Seçim Yapınız</option>
                                <?php
                                foreach ($dropdown_birim->icerik as $data) {
                                    echo '<option value="'.$data->birim_id.'">'.$data->birim_ad.'</option>';
                                }
                                ?>
                            </select>
                </div>
                <div class="form-group">
                    <select name="unvan" class="form-control select2" style="width: 100%;">
                        <option value="seciniz" disabled selected hidden>Lütfen Seçim Yapınız</option>
                        <?php
                        foreach ($dropdown_unvan->icerik as $data) {
                            echo '<option value="'.$data->unvan_id.'">'.$data->unvan_ad.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="row justify-content-around">
                    <div class="col-md-3">
                        <?php print_r($captcha->data['image']);?>
                    </div>
                    <div class="col-md-6">
                        <input type="text" tabindex="9" class="form-control mb-3  " name ="captcha" placeholder="Doğrulama">
                    </div>
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block float-right mb-3">Kayıt Ol</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="login" class="text-center">Zaten kaydım var!</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
