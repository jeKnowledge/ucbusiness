<?php

if (isset($_POST["hide"]) && $_POST["hide"]) {
    $_SESSION["cookie_banner"] = false;
}