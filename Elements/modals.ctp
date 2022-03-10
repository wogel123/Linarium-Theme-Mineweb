<!-- Login Modal -->
<div class="modal fade" id="login" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= $Lang->get('USER__LOGIN') ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="login-before-two-factor-auth" method="POST" data-ajax="true" action="<?= $this->Html->url(array('plugin' => false, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_login')) ?>" data-callback-function="afterLogin">
                <div class="modal-body">
                    <div class="ajax-msg col-sm-11 mx-auto mb-4"></div>
                    <div class="row mb-3 mt-3">
                        <label class="col-1 col-form-label ms-auto"><i class="fas fa-user"></i></label>
                        <div class="col-10 col-sm-9 me-auto">
                            <input type="text" name="pseudo" class="form-control" placeholder="<?= $Lang->get('USER__USERNAME_LABEL') ?>">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label class="col-1 col-form-label ms-auto"><i class="fas fa-key"></i></label>
                        <div class="col-10 col-sm-9 me-auto">
                            <input type="password" name="password" class="form-control" placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>">
                        </div>
                    </div>
                    <div class="row mb-3 mt-4">
                        <div class="col-sm-8 offset-sm-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me">
                                <label class="form-check-label" for="remember_me">
                                    <?= $Lang->get('USER__REMEMBER_ME') ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5>
                            <a href="#lostpasswd" data-bs-toggle="modal" data-bs-dismiss="modal">
                                Mot de passe oublié
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-block m-auto w-75"><?= $Lang->get('USER__LOGIN') ?></button>
                </div>
            </form>
            <form id="login-two-factor-auth" style="display:none;" method="POST" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'Authentification', 'action' => 'validLogin')) ?>" data-redirect-url="?">
                <div class="modal-body">
                    <div class="ajax-msg"></div>
                    <input type="checkbox" style="display: none;" name="remember_me">
                    <div class="form-group">
                        <h5><?= $Lang->get('USER__LOGIN_CODE') ?></h5>
                        <input type="text" class="form-control" name="code" placeholder="<?= $Lang->get('USER__LOGIN_CODE') ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block"><?= $Lang->get('USER__LOGIN') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Register Modal -->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= $Lang->get('USER__REGISTER') ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_register')) ?>" data-redirect-url="?">
                <div class="modal-body">
                    <div class="ajax-msg col-sm-11 mx-auto mb-4"></div>
                    <div class="row mb-3 mt-3">
                        <label class="col-1 col-form-label ms-auto d-flex"><i class="fas fa-user"></i></label>
                        <div class="col-10 col-sm-9 me-auto">
                            <input type="text" name="pseudo" class="form-control" placeholder="<?= $Lang->get('USER__USERNAME_LABEL') ?>">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label class="col-1 col-form-label ms-auto d-flex"><i class="fas fa-envelope"></i></label>
                        <div class="col-10 col-sm-9 me-auto">
                            <input type="email" name="email" class="form-control" placeholder="<?= $Lang->get('USER__EMAIL_LABEL') ?>">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label class="col-1 col-form-label ms-auto d-flex"><i class="fas fa-key"></i></label>
                        <div class="col-10 col-sm-9 me-auto">
                            <input type="password" name="password" class="form-control" placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>">
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label class="col-1 col-form-label ms-auto d-flex"><i class="fas fa-check"></i></label>
                        <div class="col-10 col-sm-9 me-auto">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="<?= $Lang->get('USER__PASSWORD_CONFIRM_LABEL') ?>">
                        </div>
                    </div>


                    <?php if($reCaptcha['type'] == "google") { ?>
                        <script src='https://www.google.com/recaptcha/api.js'></script>
                        <div class="row mb-3 mt-3">
                            <label class="col-1 col-form-label ms-auto d-flex"><i class="fas fa-shield-alt"></i></label>
                            <div class="col-10 col-sm-9 me-auto">
                                <div class="g-recaptcha" data-sitekey="<?= $reCaptcha['siteKey'] ?>">

                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="form-group">
                            <h5><?= $Lang->get('FORM__CAPTCHA') ?></h5>
                            <?php
                            echo $this->Html->image(array('controller' => 'user', 'action' => 'get_captcha', 'plugin' => false, 'admin' => false), array('plugin' => false, 'admin' => false, 'id' => 'captcha_image'));
                            echo $this->Html->link($Lang->get('FORM__RELOAD_CAPTCHA'), 'javascript:void(0);',array('id' => 'reload'));
                            ?>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="captcha" id="inputPassword3" placeholder="<?= $Lang->get('FORM__CAPTCHA_LABEL') ?>">
                        </div>
                    <?php } ?>

                    <?php if (!empty($condition)) { ?>
                        <div class="row mb-3 mt-4">
                            <div class="col-10 col-sm-8 offset-2 offset-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="condition" id="condition">
                                    <label class="form-check-label" for="condition">
                                        J'ai lu et j'accepte les <a href="<?= $condition ?>" style="color: #ff5757">conditions d'utilisation du site</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-block m-auto w-75"><?= $Lang->get('USER__REGISTER') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Notification Modal -->
<?php if(isset($isConnected) && $isConnected) { ?>
    <div class="modal fade" id="notifications_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= $Lang->get('NOTIFICATIONS__LIST') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="notifications-list"></div>

                </div>
                <div class="modal-footer d-md-flex">
                    <button type="button" class="btn btn-light" onclick="notification.markAllAsSeen()" data-dismiss="modal">Marquer tout comme lu</button>
                    <button type="submit" class="btn btn-danger ms-auto" onclick="notification.clearAll()" data-dismiss="modal">Tout supprimer</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- LostPassword Modal-->
<div class="modal fade" id="lostpasswd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= $Lang->get('USER__PASSWORD_FORGOT_LABEL') ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_lostpasswd')) ?>">
                <div class="modal-body">
                    <div class="ajax-msg col-sm-11 mx-auto mb-4"></div>
                    <div class="row mb-3 mt-3">
                        <label class="col-1 col-form-label ms-auto d-flex"><i class="fas fa-unlock"></i></label>
                        <div class="col-10 col-sm-9 me-auto">
                            <input type="email" name="email" class="form-control" placeholder="<?= $Lang->get('USER__EMAIL_LABEL') ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn-block m-auto w-75"><?= $Lang->get('USER__PASSWORD_FORGOT_SEND_MAIL') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--ResetPassword Modal -->
<?php if(!empty($resetpsswd)) { ?>
    <div class="modal fade" id="lostpasswd2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= $Lang->get('USER__PASSWORD_FORGOT_LABEL') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_resetpasswd')) ?>" data-redirect-url="?">
                    <div class="modal-body">
                        <div class="ajax-msg col-sm-11 mx-auto mb-4"></div>
                        <input type="hidden" name="key" value="<?= $resetpsswd['key'] ?>">
                        <input type="hidden" name="email" value="<?= $resetpsswd['email'] ?>">
                        <div class="row mb-3 mt-3">
                            <label class="col-1 col-form-label ms-auto d-flex"><i class="fas fa-key"></i></label>
                            <div class="col-10 col-sm-9 me-auto">
                                <input type="password" name="password" class="form-control" placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>">
                            </div>
                        </div>
                        <div class="row mb-3 mt-3">
                            <label class="col-1 col-form-label ms-auto d-flex"><i class="fas fa-check"></i></label>
                            <div class="col-10 col-sm-9 me-auto">
                                <input type="password" name="password2" class="form-control" placeholder="<?= $Lang->get('USER__PASSWORD_CONFIRM_LABEL') ?>">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-block m-auto w-75"><?= $Lang->get('GLOBAL__SAVE') ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>



<script type="text/javascript">
    $(document).ready(function(){
        <?php if(!empty($resetpsswd)) { ?>
        $('#lostpasswd2').modal('show');
        <?php } ?>
    });
</script>
<script type="text/javascript">
    function afterLogin(req, res) {
        if (res['two-factor-auth'] === undefined)
            return window.location = '?t_' + Date.now()
        $('#login-two-factor-auth input[name="remember_me"]').attr('checked', $('#login-before-two-factor-auth input[name="remember_me"]').is(':checked'))
        $('#login-before-two-factor-auth').slideUp(150)
        $('#login-two-factor-auth').slideDown(150)
    }
</script>
