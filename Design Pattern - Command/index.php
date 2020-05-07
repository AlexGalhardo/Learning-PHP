<?php

require 'classes.php';

$luz = new Luz();

$c = new LuzOffCommand($luz);
callCommand($c);

echo "LUZ: " . $luz->getStatus();