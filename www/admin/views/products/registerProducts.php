<div class="col-12 col-sm-12">
    <h2>Cadastro de Produtos</h2>
    <form class="row g-3" method="POST" action="?controller=products&action=registerProducts">
        <div class="col-md-12">
            <label for="validationDefault01" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" name="name" id="validationDefault01" required>
        </div>
        <div class="col-md-12">
            <label for="validationDefault02" class="form-label">Preço do produto</label>
            <input type="text" class="form-control" name="price" id="validationDefault02" required>
        </div>
        <div class="col-md-6">
            <label for="validationDefault02" class="form-label">Categoria</label>
            <input type="text" class="form-control" name="category" id="validationDefault02" required>
        </div>
        <div class="col-md-12">
            <label for="validationTextarea" class="form-label">Textarea</label>
            <textarea class="form-control" id="validationTextarea" placeholder="Required example textarea" name="description" required></textarea>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" name="update" type="submit">Submit form</button>
        </div>
    </form>
</div>
<?php if (isset($_POST['update'])) { ?>
        <div class="container-fluid messageInvalid fixed-bottom ">
            <div class="row">
                <div class="col-12 col-sm-12 alert alert-success fade show text-center p-4" tabindex="-10" role="alert">
                    <strong>Produto Cadastrado com sucesso</strong>
                    <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    <?php  } ?>
</div>
</div>
</div>
</section>