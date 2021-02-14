<div class="container-fluid pt-5" id="login">
    <div class="container col-md-4">
        <?php  require_once('views/partials/_errors.php'); ?>
            <div class="card">
                <div class="card-header bg-info text-center text-whites">Connexion</div>
                <div class="card-body">
                    <form action="?page=loginController" method="POST">
                        <div class="form-group">
                            <label for="">Pseudo</label>
                            <input type="text" class="form-control" name="pseudo">
                        </div>
                        <div class="form-group">
                            <label for="">Mot de passe</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-info" name="connexion">Connecter</button>
                    </form>
                </div>
            </div>
    </div>
</div>