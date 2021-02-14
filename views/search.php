<div class="container-fluid pt-4">
    <div class="container">
        <div class="card">
            <div class="card-header bg-info text-center text-white">Recherche</div>
            <div class="card-body">
                <div class="row">
                        <div class="col-md-4">
                            <form  method="POST">
                            <label for="">code departement</label>
                            <select name="codedepartement" required>
                                <?php foreach ($codedeps as $code) {
                                    echo '<option value="'.$code->codedepartement.'">'.$code->codedepartement.'</option>';
                                } ?>
                            </select>
                            <button type="submit" name="searchdepart" class="btn btn-sm btn-info">Rechercher</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <form method="POST">
                            <label for="">code culture</label>
                            <select name="codeculture" required>
                            <?php foreach ($codecultures as $culture) {
                                    echo '<option value="'.$culture->codeculture.'">'.$culture->codeculture.'</option>';
                                } ?>
                            </select>
                            <button type="submit" name="searchculture" class="btn btn-sm btn-info">Rechercher</button>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <form method="POST">
                            <label for="">code type culture</label>
                            <select name="codetypeculture">
                            <?php foreach ($codetc as $culture) {
                                    echo '<option value="'.$culture->codetypeculture.'">'.$culture->codetypeculture.'</option>';
                                } ?>
                            </select>
                            <button type="submit" name="searchtype" class="btn btn-sm btn-info">Rechercher</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-8">
                            <form method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">De</label>
                                    <input type="number" name="datedepart" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="">à</label>
                                    <input type="number" name="datefin" required>
                                </div>
                            </div>
                            <button type="submit" name="dateBetween" class="btn btn-sm btn-info mt-2">Rechercher</button>
                        </form>
                        </div>
                    </div>
            </div>
        </div>
        <?php if(isset($_POST['searchdepart']) || isset($_POST['searchculture']) || isset($_POST['dateBetween']) | isset($_POST['searchtype'])): ?>
            <div class="card mt-3">
                <div class="card-header">
                    Résultats de la recherche
                </div>
                <div class="card-body">
                    <?php 
                        if (isset($_POST['searchdepart'])) {
                            foreach ($codedeps as $dep) {
                                if ($dep->codedepartement == $_POST['codedepartement']) {
                                    echo 'Le code du département '.$dep->codedepartement." correspond => ".$dep->departement;
                                    break;
                                }
                            }

                            unset($_POST['searchdepart']);
                        }else if (isset($_POST['searchculture'])) {
                            foreach ($codecultures as $cul) {
                                if ($cul->codeculture == $_POST['codeculture']) {
                                    echo 'Le code de la culture '.$cul->codeculture."  correspond => ".$cul->culture;
                                    break;
                                }
                            }

                            unset($_POST['searchculture']);
                        }else if(isset($_POST['dateBetween'])){
                            $results = $db->getProductsByDateBetween($_POST['datedepart'], $_POST['datefin']);
                           
                            if($results){
                                echo '<span class="text-bold">De'.$_POST['datedepart'].' à'.$_POST['datefin'].'</span><br>';

                                echo '<table class="table table-striped table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>Année</th>
                                        <th>Culture</th>
                                        <th>Code culture</th>
                                        <th>Département</th>
                                        <th>Code Département</th>
                                        <th>Type</th>
                                        <th>Rendement</th>
                                        <th>Production</th>
                                        <th>Superficie</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                    foreach($results as $product){
                                    echo '<tr>
                                        <td>'.$product->annee .'</td>
                                        <td>'.$product->culture .'</td>
                                        <td>'.$product->codeculture.'</td>
                                        <td>'.$product->departement.'</td>
                                        <td>'.$product->codedepartement.'</td>
                                        <td>'.$product->type.'</td>
                                        <td>'.$product->rendement.'</td>
                                        <td>'.$product->production.'</td>
                                        <td>'.$product->superficie.'</td>
                                    </tr>';
                                }
                                echo '</tbody>
                            </table>';
                            }else{
                                echo 'Aucun résultat';
                            }
                            unset($_POST['searchBetween']);
                        }else if(isset($_POST['searchtype'])){
                            foreach ($codetc as $dep) {
                                if ($dep->codetypeculture == $_POST['codetypeculture']) {
                                    echo 'Le code du type de culture '.$dep->codetypeculture." correspond => ".$dep->type;
                                    break;
                                }
                            }

                            unset($_POST['searchtype']);
                        }
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>