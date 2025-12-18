<?php
if (isset($_GET['page_layout'])) {
    switch ($_GET['page_layout']) {
        case 'thuy':
            include "thuy.php";
            break;
        case 'themthuy':
            include "themthuy.php";
            break;
        case 'xoa':
            include "xoa.php";
            break;
    }
}
