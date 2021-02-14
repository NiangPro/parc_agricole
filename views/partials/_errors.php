<?php

if(isset($_SESSION['errors'])){
    echo '<div class="alert alert-'.$_SESSION['errors']['type'].'">';
    
    foreach ($_SESSION['errors']['message'] as $message) {
        echo '<span>'.$message.'</span><br>';
    }
    echo '</div>';

    unset($_SESSION['errors']);
}
