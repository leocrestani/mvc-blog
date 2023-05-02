<div class="container py-5">
    <?= Session::message('post') ?>
    <div class="card">
        <div class="card-header">
            <div>
                Quadro de Postagens
                <a href="<?= URL ?>/posts/cadastrar" class="btn btn-outline-primary float-end">Escrever</a>
            </div>
        </div>
        <div class="card-body">
            <?php foreach ($data['posts'] as $post) { ?>
                <div class="card my-4">
                    <div class="card-header">
                        <?= $post->titulo ?>
                    </div>
                    <div class="card-body">
                        <p class="card-text">
                            <?= $post->conteudo ?>
                        </p>
                    </div>
                    <div class="card-footer text-muted">
                        Escrito por:
                        <?= $post->nome ?> em
                        <?= Validation::formatDate($post->postData) ?>
                        <a href="<?= URL . '/posts/show/' . $post->postId ?>"
                            class="btn btn-sm btn-outline-secondary float-end">Ler mais</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>