<?php include 'parts/header.php'; ?>

<div class="container">
    <div class="row-fluid">
        <div class="span6">

            <div id="legend">
                <legend class="">Регистрация</legend>
            </div>


            <?php if ($showError): ?>
                <?php foreach ($errors as $error) : ?>
                    <?php if (empty($error)) continue; ?>

                    <div class="alert alert-danger" role="alert">
                        <strong>Ошибка!</strong> <?php echo $error; ?>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>

            <?php if($userRegister) : ?>
                    <div class="alert alert-success" role="alert">
                        Пользователь <?php echo $email; ?> успешно зарегистрирован.
                    </div>
            <?php endif; ?>

            <form class="form-horizontal" action='/' method="POST">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="email">Ваша эл. почта</label>
                        <div class="controls">
                            <input type="text" id="email" name="email" placeholder="" class="input-xlarge" value="<?php echo (!$userRegister) ? $email : ""; ?>">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="password">Пароль</label>
                        <div class="controls">
                            <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label"  for="password_confirm">Повторите пароль</label>
                        <div class="controls">
                            <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-success" name="register">Зарегистрироватся</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="span6">

            <?php include 'parts/user_table.php'; ?>

        </div>
    </div>
</div>

<?php include 'parts/footer.php'; ?>