<main class="container">
    <div id="create-container" class="col-md-6 offset-md-3">
        <h2 class="mb-3">Cadastro de Encomendas</h2>
        <form action="?i=dashboard/encomendas" method="POST" class="needs-validation" novalidate>

            <div class="form-group mb-3">
                <label for="rastreador" class="form-label">Rastreador</label>
                <input type="text" name="rastreador" id="rastreador" class="form-control" placeholder="Insira o rastreador..." required>
                <div class="invalid-feedback">
                    Este campo é de preenchimento obrigatório
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" name="cep" id="cep" placeholder="Insira o CEP..." required>
                <div class="invalid-feedback">
                    Este campo é de preenchimento obrigatório
                </div>
            </div>

            <div class="mb-3 text-center">
                <input type="submit" class="btn btn-outline-primary mt-2" value="Criar">
            </div>
        </form>
    </div>
</main>