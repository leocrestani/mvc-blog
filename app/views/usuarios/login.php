<div class="col-12 col-lg-4 mx-auto p-5">
    <div class="card">
        <div class="card-body">
            <?= Session::message('usuario') ?>
            <h2>Login</h2>
            <small>Informe seus dados para login:</small>
            <form class="my-3 needs-validation" name="login" method="POST" action="<?= URL ?>/usuarios/login">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="<?= $data['email'] ?>" name="email" class="form-control"
                        <?= isset($data['email_error']) ? ' is-invalid ' : '' ?> id="email" required>
                    <div class="invalid-feedback">
                        <?= isset($data['email_error']) ? $data['email_error'] : '' ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" value="<?= $data['password'] ?>" class="form-control"
                        <?= isset($data['password_error']) ? ' is-invalid ' : '' ?> id="password" minlength="6" required>
                    <div class="invalid-feedback">
                        <?= isset($data['password_error']) ? $data['password_error'] : '' ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="<?= URL ?>/usuarios/cadastrar">Não possui uma conta? Cadastre-se.</a>
                    </div>
                    <div class="col d-grid gap-2">
                        <input class="btn btn-success btn-block" type="submit" value="Entrar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>