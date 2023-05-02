<div class="container">
    <header class="blog-header lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-8 text-start">
                <a class="blog-header-logo text-body-emphasis" href="<?= URL ?>">MVC Blog</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <div class="me-2">Bem vindo,
                        <?= $_SESSION['user_name'] ?>
                    </div>
                    <?php if ($_SESSION['permissao'] === 1) { ?>
                        <a class="btn btn-sm btn-outline-warning me-2" href="<?= URL ?>/admin">Admin</a>
                    <?php } ?>
                    <a class="btn btn-sm btn-outline-primary me-2" href="<?= URL ?>/posts">Posts</a>
                    <a class="btn btn-sm btn-outline-danger" href="<?= URL ?>/usuarios/sair">Sair</a>
                <?php } else { ?>
                    <a class="btn btn-sm btn-outline-secondary me-2" href="<?= URL ?>/usuarios/cadastrar">Cadastre-se</a>
                    <a class="btn btn-sm btn-outline-primary" href="<?= URL ?>/usuarios/login">Entrar</a>
                <?php } ?>
            </div>
        </div>
    </header>
</div>