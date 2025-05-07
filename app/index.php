<?php
ini_set("SMTP", "mailhog:1025");
ini_set("sendmail_from", "YOURMAIL@gmail.com");

phpinfo();

mail('a@b.c', 'joli mail', 'Joli message');