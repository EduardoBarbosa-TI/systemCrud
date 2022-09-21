<div class="col-12 col-sm-12">
    <h2>Lista de Clientes</h2>
    <table class="table table-striped">
        <tr>
            <th>ID Cliente</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Endereço</th>
        </tr>
        <?php
        foreach ($arrayClients as $client) {
        ?>
            <tr>
                <td>
                    <?= $client['idClient'] ?>
                </td>
                <td>
                    <?= $client['name'] ?>
                </td>
                <td>
                    <?= $client['email'] ?>
                </td>
                <td>
                    <?= $client['phone'] ?>
                </td>
                <td>
                    <?= $client['address'] ?>
                </td>
                <td>
                    <a class="btn btn-sm btn-primary me-2" href='?controller=client&action=editClient&id=<?= $client['idClient'] ?>'><i class="bi bi-pencil"></i></a>
                    <a class="btn btn-sm btn-danger me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="bi bi-trash"></i></a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">delete item</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Você realmente deseja excluir <?= $client['name']?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <a type="button" class="btn btn-primary" href='?controller=client&action=deleteClient&id=<?= $client['idClient'] ?>'>Excluir</a>
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
</div>
</div>
</div>
</section>