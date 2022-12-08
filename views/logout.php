<?php

session_unset();
session_destroy();
echo("<script>window.location = window.location.href.split('?')[0];;</script>");

?>