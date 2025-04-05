<div class="modal fade" id="modalInfosMovimentacoes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header" style="background-color: #054F77; color: white;">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Informações Movimentações</h1>
                <button type="button" onclick="fechar_modal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="descricaoAtivoInfos" class="col-form-label">Descrição do Ativo</label>
                    <input type="text" class="form-control shadow-sm border-light" id="descricaoAtivoInfos" readonly>
                </div>
                <div class="mb-3">
                    <label for="tipoMovimentacaoInfos" class="col-form-label">Tipo Movimentação</label>
                    <input type="text" class="form-control shadow-sm border-light" id="tipoMovimentacaoInfos" readonly>
                </div>

                <div class="mb-3">
                    <label for="quantidadeUsoInfos" class="col-form-label">Quantidade Uso</label>
                    <input type="number" class="form-control shadow-sm border-light" id="quantidadeUsoInfos" readonly>
                </div>

                <div class="mb-3">
                    <label for="quantidadeUltimaMovInfos" class="col-form-label">Quantidade Última Mov</label>
                    <input type="number" class="form-control shadow-sm border-light" id="quantidadeUltimaMovInfos" readonly>
                </div>

                <div class="mb-3">
                    <label for="quantidadeTotalInfos" class="col-form-label">Quantidade Total</label>
                    <input type="number" class="form-control shadow-sm border-light" id="quantidadeTotalInfos" readonly>
                </div>

                <div class="mb-3">
                    <label for="localOrigemInfos" class="col-form-label">Local Origem</label>
                    <input type="text" class="form-control shadow-sm border-light" id="localOrigemInfos" readonly>
                </div>

                <div class="mb-3">
                    <label for="localDestinoInfos" class="col-form-label">Local Destino</label>
                    <input type="text" class="form-control shadow-sm border-light" id="localDestinoInfos" readonly>
                </div>

                <div class="mb-3">
                    <label for="descricaoMovimentacaoInfos" class="col-form-label">Descrição Movimentação</label>
                    <input type="text" class="form-control shadow-sm border-light" id="descricaoMovimentacaoInfos" readonly>
                </div>

                <div class="mb-3">
                    <label for="dataMovimentacaoInfos" class="col-form-label">Data</label>
                    <input type="text" class="form-control shadow-sm border-light" id="dataMovimentacaoInfos" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" onclick="fechar_modal()"><i class="bi bi-x-circle"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>
