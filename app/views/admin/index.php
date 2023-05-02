<div class="container my-5">
    <?= Session::message('admin') ?>
    <a class="btn btn-sm btn-warning my-5" href="<?= URL ?>/admin/dbdump">Backup da base</a>
    <?php if (isset($data['dbpath'])) { ?>
        <a class="btn btn-sm btn-success my-5" href="<?= URL . '/public/' . $data['dbpath'] ?>">Download Backup</a>
    <?php } ?>
    <h2>Gerenciamento de Usuários</h2>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Permissão</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['usuarios'] as $user) { ?>
                <tr>
                    <td>
                        <?= $user->id ?>
                    </td>
                    <td>
                        <?= $user->nome ?>
                    </td>
                    <td>
                        <?= $user->email ?>
                    </td>
                    <td>
                        <?= $user->permissao === 0 ? 'Visitante' : 'Administrador' ?>
                    </td>
                    <td>
                        <?= Validation::formatDate($user->created_at) ?>
                    </td>
                    <td>
                        <form action="<?= URL . '/admin/deletar/' . $user->id ?>" method="POST"><input type="submit"
                                class="btn btn-sm btn-danger" value="Deletar"></form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>