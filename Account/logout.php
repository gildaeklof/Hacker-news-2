<?php
session_destroy();
require('../functions.php');
logMessage('You have been logged out');
redirect('/views/index.php');
