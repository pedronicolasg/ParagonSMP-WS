<?php
http_response_code(200);
if ($_SERVER['REQUEST_METHOD'] === 'HEAD') {
    http_response_code(200);
}
echo http_response_code(200);
