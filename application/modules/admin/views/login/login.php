<div class="auth-form-transparent text-left p-3">
    <div class="brand-logo">
        <a href="/"><img src="<?= TEMPLATE_DIR ?>/main_v1/img/logo_black.png" alt="logo"></a>
    </div>
    <h4>Authorization</h4>
    
    <?php if($error): ?>
        <div class="alert alert-danger"><?=$error?></div>
    <?php endif; ?>
    
    <form action="" method="POST" class="pt-2" id="auth--login-form">
        <input type="hidden" name="remember" value="0">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                    </span>
                </div>
                <input type="text" class="form-control form-control-lg border-left-0" name="email" value="<?=$email?>" placeholder="E-mail">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                    <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                    </span>
                </div>
                <input type="password" class="form-control form-control-lg border-left-0" name="password" value="" placeholder="Password">
            </div>
        </div>
        <div class="my-3">
            <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Log in</button>
        </div>
    </form>
</div>