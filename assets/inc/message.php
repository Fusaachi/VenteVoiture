<?php
if (isset($_SESSION["message"])) {
    echo "<div class ='alert alert-sucess mt-5' role='alert'>" . $_SESSION["message"] . "</div>";
    unset($_SESSION["message"]);
}
?>