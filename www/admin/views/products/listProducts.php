<div class="col-12 col-sm-12">
    <h2>Lista de Produtos</h2>
    <table class="table table-striped">
        <tr>
            <th>ID Produto</th>
            <th>ID Categoria</th>
            <th>descrição</th>
            <th>nome</th>
            <th>preço</th>
        </tr>
        <?php
        foreach ($arrayProducts as $products) {
        ?>
            <tr>
                <td>
                    <?= $products['idProduct'] ?>
                </td>
                <td>
                    <?= $products['idCategory'] ?>
                </td>
                <td>
                    <?= $products['description'] ?>
                </td>
                <td>
                    <?= $products['name'] ?>
                </td>
                <td>
                    <?= $products['price'] ?>
                </td>
                <td>
                    <a class="btn btn-sm btn-primary me-2" href='?controller=products&action=consultProduct&id=<?= $products['idProduct'] ?>'><i class="bi bi-pencil"></i></a>
                    <a class="btn btn-sm btn-danger me-2" href='?controller=products&action=deleteProduct&id=<?= $products['idProduct'] ?>'  ><i class="bi bi-trash"></i></a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>