<?php
$script = base64_encode(hash('sha512', 'script', true));
$css = base64_encode(hash('sha512', 'css', true));
$src = base64_encode(hash('sha512', 'src', true));
?>