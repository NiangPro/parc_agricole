<div class="container-fluid" id="ajout">
    <div class="container col-md-6 pt-4">
        <div class="card">
            <div class="card-header bg-info text-center text-white">Ajout de produits</div>
                <div class="card-body">
                    <form action="?page=updateProduct" method="POST">
                        <input type="hidden" value="<?= $product->id ?>" name="id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <lable class="control-label">Culture</lable>
                                    <input type="text" name="culture" value="<?= $product->culture ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <lable class="control-label">code Culture</lable>
                                    <input type="text" name="codeculture" value="<?= $product->codeculture ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <lable class="control-label">Département</lable>
                                    <input type="text" name="departement" value="<?= $product->departement ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <lable class="control-label">Code Département</lable>
                                    <input type="number" name="codedepartement" value="<?= $product->codedepartement ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <lable class="control-label">Type</lable>
                                    <input type="text" name="type" value="<?= $product->type ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <lable class="control-label">Production</lable>
                                    <input type="number" name="production" value="<?= $product->production ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <lable class="control-label">Rendement</lable>
                                    <input type="number" name="rendement" value="<?= $product->rendement ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <lable class="control-label">Superficie</lable>
                                    <input type="number" name="superficie" value="<?= $product->superficie ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 text-center">
                                <div class="form-group">
                                    <lable class="control-label">Année</lable>
                                    <input type="number" name="date" value="<?= $product->annee ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <button class="btn btn-info" type="submit" name="modifier">Modifier</button>
                        <button class="btn btn-warning float-right" type="reset" >Annuler</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>