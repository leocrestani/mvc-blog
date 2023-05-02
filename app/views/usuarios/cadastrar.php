<div class="col-12 col-lg-4 mx-auto p-5">
    <div class="card">
        <div class="card-body">
            <h2>Cadastre-se</h2>
            <small>Preencha o formulário abaixo para fazer seu cadastro:</small>
            <form class="my-3 needs-validation" name="cadastrar" method="POST" action="<?= URL ?>/usuarios/cadastrar">
                <div class=" mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" value="<?= $data['name'] ?>" name="name" class="form-control"
                        <?= isset($data['name_error']) ? ' is-invalid ' : '' ?> id="name" required>
                    <div class="invalid-feedback">
                        <?= isset($data['name_error']) ? $data['name_error'] : '' ?>
                    </div>
                </div>
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
                <div class="mb-3">
                    <label for="password_conf" class="form-label">Confirme a Senha</label>
                    <input type="password" name="password_conf" value="<?= $data['password_conf'] ?>"
                        class="form-control" <?= isset($data['password_conf_error']) ? ' is-invalid ' : '' ?>
                        id="password_conf" minlength="6" required>
                    <div class="invalid-feedback">
                        <?= isset($data['password_conf_error']) ? $data['password_conf_error'] : '' ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="<?= URL ?>/usuarios/login">Possui uma conta? Faça login.</a>
                    </div>
                    <div class="col d-grid gap-2">
                        <input class="btn btn-success btn-block" type="submit" value="Cadastrar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>