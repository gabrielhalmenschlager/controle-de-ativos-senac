
<div class="modal fade" id="modalInfos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header" style="background-color: #054F77; color: white;">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Informações Ativo</h1>
                <button type="button" onclick="fechar_modal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="descricaoInfos" class="col-form-label">Descrição do Ativo</label>
                    <input type="text" class="form-control shadow-sm border-light" id="descricaoInfos" readonly>
                </div>
                <div class="mb-3">
                    <label for="quantidadeInfos" class="col-form-label">Quantidade</label>
                    <input type="number" class="form-control shadow-sm border-light" id="quantidadeInfos" readonly>
                </div>

                <div class="mb-3">
                    <label for="quantidadeMinInfos" class="col-form-label">Quantidade Minima</label>
                    <input type="number" class="form-control shadow-sm border-light" id="quantidadeMinInfos" readonly>
                </div>

                <div class="mb-3">
                    <label for="tipoInfos" class="col-form-label">Tipo</label>
                    <input type="text" class="form-control shadow-sm border-light" id="tipoInfos" readonly>
                </div>

                <div class="mb-3">
                    <label for="marcaInfos" class="col-form-label">Marca</label>
                    <input type="text" class="form-control shadow-sm border-light" id="marcaInfos" readonly>
                </div>

                <div class="mb-3">
                    <label for="observacaoInfos" class="col-form-label">Observação Ativo</label>
                    <input type="text" class="form-control shadow-sm border-light" id="observacaoInfos" readonly>
                </div>

                <div class="mb-3">
                    <label for="dataInfos" class="col-form-label">Data Cadastro</label>
                    <input type="datetime" class="form-control shadow-sm border-light" id="dataInfos" readonly>
                </div>

                <div class="mb-3">
                    <label for="usuarioInfos" class="col-form-label">Usuario</label>
                    <input type="text" class="form-control shadow-sm border-light" id="usuarioInfos" readonly>
                </div>

                <div class="mb-3 div_previer">
                    <label for="formFile" class="form-label">Preview imagem</label>
                    <img alt="" id="previewImagemInfos" class="img-fluid" style="width: 300px; height: 300px; display: block; margin: 0 auto;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" onclick="fechar_modal()"><i class="bi bi-x-circle"></i> Fechar</button>
            </div>
        </div>
    </div>
</div>
