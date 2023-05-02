<div class="col-12 col-sm-8 mx-auto p-5">
    <div class="card">
        <div class="card-body">
            <h2>Editar Post</h2>
            <form class="my-3 needs-validation" name="cadastrarPost" method="POST"
                action="<?= URL.'/posts/editar/'.$data['id'] ?>">
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" value="<?= $data['titulo'] ?>" name="titulo" class="form-control"
                        <?= isset($data['titulo_error']) ? ' is-invalid ' : '' ?> id="titulo" required>
                    <div class="invalid-feedback">
                        <?= isset($data['titulo_error']) ? $data['titulo_error'] : '' ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="texto" class="form-label">Texto:</label>
                    <textarea rows="10" name="texto" class="form-control"
                        <?= isset($data['texto_error']) ? ' is-invalid ' : '' ?> id="texto"
                        required><?= $data['texto'] ?></textarea>
                    <div class="invalid-feedback">
                        <?= isset($data['texto_error']) ? $data['texto_error'] : '' ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a class="btn btn-outline-secondary btn-block"
                            href="<?= URL.'/posts/show/'.$data['id'] ?>">Voltar</a>
                    </div>
                    <div class="col d-grid gap-2">
                        <input class="btn btn-success btn-block" type="submit" value="Atualizar">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>