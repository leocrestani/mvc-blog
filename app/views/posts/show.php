<div class=" my-5">
    <div class="card">
        <div class="card-body">
            <div class="card my-3">
                <div class="card-header">
                    <?php if (($data['post']->usuarioId == $_SESSION['user_id']) || $_SESSION['permissao'] === 1) { ?>
                        <form action="<?= URL . '/posts/deletar/' . $data['post']->postId ?>" method="POST">
                            <?= $data['post']->titulo ?>
                            <input type="submit" class="float-end btn btn-sm btn-danger" value="Deletar">
                        </form>
                    <?php } else { ?>
                        <?= $data['post']->titulo ?>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <?= $data['post']->conteudo ?>
                    </p>
                </div>
                <div class="card-footer text-muted">
                    Escrito por:
                    <?= $data['post']->nome ?> em
                    <?= Validation::formatDate($data['post']->postData) ?>
                    <div class="float-end">
                        <a class="btn btn-outline-secondary btn-sm" href="<?= URL ?>/posts">Voltar</a>
                        <?php if (($data['post']->usuarioId == $_SESSION['user_id']) || $_SESSION['permissao'] === 1) { ?>
                            <a href="<?= URL . '/posts/editar/' . $data['post']->postId ?>"
                                class="ms-3 btn btn-sm btn-primary">Editar</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>