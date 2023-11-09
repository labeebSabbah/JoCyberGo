<?php
if (!isset($_SESSION['user'])) {
    header('location:/');
}
?>
<a href="logout" class="btn bg-blue-400 p-2 border border-black">Logout</a>