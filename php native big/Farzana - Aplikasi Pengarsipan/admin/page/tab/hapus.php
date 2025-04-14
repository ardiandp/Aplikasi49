<?php
    $id_laporan = $_GET['id_laporan'];
    $query  = mysqli_query($db, "DELETE from laporan where id_laporan='$id_laporan'"); 
?>
<script type="text/javascript">
        alert ("Data Berhasil dihapus");
        window.location.href="?page=tab";
</script>