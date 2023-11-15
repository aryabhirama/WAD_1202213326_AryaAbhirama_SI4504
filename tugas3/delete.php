<?php
require 'function.php';

if (isset($_GET["no"])) {
    $no = $_GET["no"];

    if (hapus($no) > 0) {
        $message = 'Data berhasil dihapus!';
    } else {
        $message = 'Data Gagal Dihapus!';
    }
} else {
    $message = 'Invalid request: Missing "no" parameter';
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Result</title>
</head>
<body>
    <script>
        alert('<?php echo $message; ?>');
        window.location.href = 'index.php';
    </script>
</body>
</html>
