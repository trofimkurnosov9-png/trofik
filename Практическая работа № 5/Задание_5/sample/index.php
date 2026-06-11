<?php
if (isset($_GET['search'])) {
    $parts = explode('::', $_GET['search']);
    if (count($parts) == 2) {
        $entity = $parts[0];
        $id = $parts[1];
        
        $file = "$entity.php";
        if (file_exists($file)) {
            include $file;
            foreach ($content as $item) {
                if ($item['id'] == $id) {
                    echo "<pre>" . print_r($item, true) . "</pre>";
                    break;
                }
            }
        }
    }
}
?>