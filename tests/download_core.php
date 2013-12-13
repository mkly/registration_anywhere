<?php
$dir = dirname(__FILE__);
chdir($dir.'/core');
exec('git clone https://github.com/concrete5/concrete5.git');
exec("$dir/install-concrete5.php --config='.$dir/test-config.php");
