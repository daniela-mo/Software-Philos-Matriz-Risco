<?php
$oldmask = umask(0);
mkdir("wwvini", 0777,true);
umask($oldmask);

?>