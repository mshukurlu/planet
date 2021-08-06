<?php
if(\App\Parts\Response\Errors::has()) {
    foreach (\App\Parts\Response\Errors::get() as $error) {
        echo $error['error'] . '<br/>';
    }
}
?>
