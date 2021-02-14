<div class="container-fluid pt-5">
    <div class="container">
    <?php  require_once('views/partials/_errors.php'); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info text-center text-white">Infos utilisateur</div>
                    <div class="card-body">
                        <label>Pseudo: </label> <span style="font-weight: bold;"><?= $_SESSION['user']->pseudo ?></span> <br>
                        <hr>
                        <label>Email: </label>  <span style="font-weight: bold;"><?= $_SESSION['user']->email ?></span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header  bg-info text-center text-white">Changer Mot de passe</div>
                    <div class="card-body">
                        <form action="?page=changePassword" method="POST">
                            <div class="form-group">
                                <lapel>Mot de passe actuel</lapel>
                                <input class="form-control" type="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <lapel>Nouveau mot de passe</lapel>
                                <input class="form-control" type="password" name="new_password" required>
                            </div>
                            <div class="form-group">
                                <lapel>Confirmation mot de passe</lapel>
                                <input class="form-control" type="password" name="password_confirm" required>
                            </div>
                            <button type="submit" class="btn btn-info btn-sm" name="change">Changer</button>
                            <button class="btn btn-warning btn-sm float-right text-white" type="reset">Annuler</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>