<?php

require 'functions.php';

session_destroy();
unset($_SESSION['PROFILE']);

redirect("halamanawal.php");