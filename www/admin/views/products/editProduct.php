<div class="col-12 col-sm-12">
    <h2>Editar Produto</h2>
    <form class="row g-3" method="POST" action="?controller=products&action=editProduct">
    <?php
        foreach ($arrayProducts as $product) {
    ?>
        <div class="col-md-12">
            <label for="validationDefault01" class="form-label" value>Nome do Produto</label>
            <input type="text" class="form-control" name="name" id="validationDefault01" value="<?= $product['name'] ?>" required>
        </div>
        <div class="col-md-12">
            <label for="validationDefault02" class="form-label">Preço do produto</label>
            <input type="text" class="form-control" name="price" id="validationDefault02" value="<?= $product['price'] ?>" required>
        </div>
        <div class="col-md-6">
            <select class="form-select" id="validationDefault04" name="category" required>
                <option selected disabled >Categoria</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>
        <div class="col-md-12">
            <label for="validationTextarea" class="form-label">Textarea</label>
            <textarea class="form-control" id="validationTextarea"  name="description" placeholder="<?= $product['description'] ?>" required></textarea>
            <input type="text" name="idProduct" value="<?= $product['idProduct'] ?>">
        </div>
        <div class="col-12">
            <button class="btn btn-primary" name="update" type="submit">Submit form</button>
        </div>
        <?php
        }
        ?>
    </form>
</div>
</div>
</div>
</div>
</section>