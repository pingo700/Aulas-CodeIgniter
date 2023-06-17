<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Abertura da ordem de serviço</h4>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" title="Fechar">
                <span aria-hidden="true" title='Fechar'>&times;</span>
            </button>
        </div>
        <div class="modal-body modal-loader">
            <div class="form-group row">
                <input type="hidden" name="id" value="<?= $dados['id'] ?>">
                <div class="form-group col-md-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="Nome" class="form-control uppercase" value="<?= $dados['nome'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="Email" class="form-control uppercase" value="<?= $dados['email'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="Senha" class="form-control uppercase" value="<?= $dados['senha'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label class="form-label"> Categoria </label>
                    <select class="form-select" name="Categoria">
                        <option value="4">Administrador</option>
                        <option value="3">Gerente de Vendas</option>
                        <option value="2">Supervisor de Estoque</option>
                        <option value="1">Vendedor</option>
                    </select>
                </div>
                &emsp;
            </div>
        </div>
        <div class="modal-footer">
            <div class="col text-right">
                <button type="submit" class="btn btn-success"> Salvar </button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>