<div class="container-fluid pt-4" id="home">
    <div class="container">
    <?php  require_once('views/partials/_errors.php'); ?>
        <div class="card">
            <div class="card-header bg-info text-white">
                <div class="row">
                    <div class="col-md-6">
                        Liste des produits agricoles
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="?page=addProduct" class="btn btn-warning btn-rounded btn-sm">Ajouter</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped  text-white table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Année</th>
                            <th>Culture</th>
                            <th>Code Culture</th>
                            <th>Département</th>
                            <th>Code Département</th>
                            <th>Type</th>
                            <th>Rendement</th>
                            <th>Production</th>
                            <th>Superficie</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $product): ?>
                        <tr>
                            <td><?= $product->annee ?></td>
                            <td><?= $product->culture ?></td>
                            <td><?= $product->codeculture ?></td>
                            <td><?= $product->departement ?></td>
                            <td><?= $product->codedepartement ?></td>
                            <td><?= $product->type ?></td>
                            <td><?= $product->rendement ?></td>
                            <td><?= $product->production ?></td>
                            <td><?= $product->superficie ?></td>
                            <td>
                                <a href="?page=editProduct&id=<?= $product->id ?>" class="btn btn-info btn-rounded btn-sm">Modifier</a>
                                <a href="?page=deleteProduct&id=<?= $product->id ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer')" class="btn btn-danger btn-rounded btn-sm">Supprimer</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>