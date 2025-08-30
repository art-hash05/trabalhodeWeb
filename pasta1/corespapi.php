<?php

$cor = isset($_POST['cor']) ? $_POST['cor'] : '';

echo "<style>
body{
    background-color: $cor
}
    
</style>";