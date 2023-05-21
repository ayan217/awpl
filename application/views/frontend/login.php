<!--log In section-->
<div class="log-in-section section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-all-cstm">
                    <div class="all-use-txt text-center txt-cr-chng">
                        <h2>LogiN</h2>
                        <p>Don't have an account? <a href="#">Sign Up</a></p>
                    </div>
                    <form class="cstm-log-from" method="post" action="<?= base_url('login') ?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="Text" name="username" class="form-control inpt-fild" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input name="password" type="password" class="form-control inpt-fild" id="exampleInputPassword1" required>
                        </div>
                        <div class="mb-3 form-check d-flex justify-content-between">
                            <div>
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label check-label" for="exampleCheck1">Keep me logged in</label>
                            </div>
                            <p class="forget-password"><a href="#"><i>Forgot password?</i></a></p>
                        </div>
                        <p class="text-danger"><?= $this->session->flashdata('log_err') ?></p>
                        <button class="btn btn-same-all sbmit-btn login-btn" type='submit'>Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--log In section-->