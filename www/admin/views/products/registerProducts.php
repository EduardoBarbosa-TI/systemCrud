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
            <select class="form-select" id="validationDefault04" name="category" required>
                <option selected disabled value="1">Categoria</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
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
</div>
</div>
</div>
</section>