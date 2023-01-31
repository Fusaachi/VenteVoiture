<?php
if (isset($_SESSION["errorMessage"])) {
    echo "<div class ='alert alert-danger mt-5' role='alert'>" . $_SESSION["errorMessage"] . "</div>";
    unset($_SESSION["errorMessage"]);
}
?>