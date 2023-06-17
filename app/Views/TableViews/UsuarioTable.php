<div class="table-responsive">
    <table id="Tabela" class="table table-striped table-bordered" style="width: 100%">
        <thead>
            <tr>
                <th style="width:1%" class="text-center"></th>
                <th style="width:1%" class="text-center">Nome</th>
                <th style="width:1%" class="text-center">Categoria</th>
                <th style="width:1%" class="text-center">Email</th>
                <th style="width:1%" class="text-center">Senha</th>
                <th style="width:1%" class="text-center"></th>
                <th style="width:1%" class="text-center"></th>
            </tr>
        </thead>
        <tbody id="Tabela">
            <?php foreach ($dados as $row) { ?>
            <tr>
                <td class="text-center"><?=$row['id'] ?></td>
                <td class="text-center"><?=$row['nome'] ?></td>
                <td class="text-center"><b><?= ($row['categoria'] == 1 ? "Vendedor" : ($row['categoria'] == 2 ? "Supervisor de Estoque" : (($row['categoria'] == 3 ? "Gerente de Vendas" : (($row['categoria'] == 4 ? "Administrador" : "Não definido")))) ) ) ?></b></td>
                <td class="text-center"><?=$row['email'] ?></td>
                <td class="text-center"><?=$row['senha'] ?></td>
                <td class="text-center" width="1%"><button validation="0" name="ModalUsuario" data-ref="<?=$row['id'] ?>" title="De" class="btn btn-primary mb-2 btn-block">Editar</button></td>
                <td class="text-center" width="1%"><button validation="1" name="DeletarUsuario" title="Deseja excluir esse usuário ?" data-ref="<?=$row['id'] ?>" class="btn btn-danger mb-2 btn-block">Excluir</button></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>