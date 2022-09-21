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
                    <a class="btn btn-sm btn-danger me-2" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash"></i></a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">delete item</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Você realmente deseja excluir <?= $products['idProduct'] ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a type="button" class="btn btn-primary" href='?controller=products&action=deleteProduct&id=<?= $products['idProduct'] ?>'>Excluir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>