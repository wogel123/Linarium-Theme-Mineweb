<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header with-border">
                    <h3 class="card-title"><?= $Lang->get('MAINTENANCE__TITLE') ?></h3>
                </div>
                <div class="card-body">

                    <form action="" method="post">

                        <div class="ajax-msg"></div>

                        <div class="form-group">
                            <div class="radio">
                                <input type="radio" id="activate" class="enabledStatus" name="state"
                                       value="enabled"<?= ($Configuration->getKey('maintenance') != '0') ? ' checked=""' : '' ?>>
                                <label for="activate">
                                    <?= $Lang->get('GLOBAL__ENABLED') ?>
                                </label>
                            </div>
                            <div class="radio">
                                <input type="radio" id="disable" class="disabledStatus" name="state"
                                       value="disabled"<?= ($Configuration->getKey('maintenance') == '0') ? ' checked=""' : '' ?>>
                                <label for="disable">
                                    <?= $Lang->get('GLOBAL__DISABLED') ?>
                                </label>
                            </div>
                        </div>

                        <input type="hidden" name="data[_Token][key]" value="<?= $csrfToken ?>">

                        <div class="float-right">
                            <a href="<?= $this->Html->url(['controller' => 'news', 'action' => 'admin_index', 'admin' => true]) ?>"
                               class="btn btn-default"><?= $Lang->get('GLOBAL__CANCEL') ?></a>
                            <button class="btn btn-primary" type="submit"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(".enabledStatus").change(function () {
        if ($(".enabledStatus").is(':checked')) {
            $(".reason").removeClass('d-none');
        } else {
            $(".reason").addClass('d-none').slideDown(500);
        }
    });
    $(".disabledStatus").change(function () {
        if ($(".disabledStatus").is(':checked')) {
            $(".reason").addClass('d-none').slideDown(500);
        } else {
            $(".reason").removeClass('d-none');
        }
    });
</script>
