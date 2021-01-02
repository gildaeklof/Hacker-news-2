<?php
require('../functions.php');
session_destroy();
logMessage('You have been logged out');
redirect('/views/index.php');
