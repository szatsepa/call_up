<?php

if ($user["role"] == 3 or $user["role"] == 1) otchet("supplier");
if ($user["role"] == 2 or $user["role"] == 1) otchet("customer");

?>