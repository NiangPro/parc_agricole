<div class="container-fluid pt-5" id="register">
    <div class="container col-md-4">
            <?php  require_once('views/partials/_errors.php'); ?>
            <div class="card">
                <div class="card-header bg-info text-center text-whites">Inscription</div>
                <div class="card-body">
                    <form action="?page=addUser" method="POST">
                        <div class="form-group">
                            <label for="">Pseudo</label>
                            <input type="text" name="pseudo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Mot de passe</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Mot de passe de confirmation</label>
                            <input type="password" name="password_confirm" class="form-control" required>
                        </div>
                        
                        <button type="submit" class="btn btn-info" name="inscription">S'inscrire</button>
                        <button type="reset" class="btn btn-warning float-right" >Annuler</button>
                    </form>
                </div>
            </div>
    </div>   
</div>