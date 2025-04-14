<?php
    $id_prestasi = $_GET['id_prestasi'];
    $query  = mysqli_query($db, "DELETE from prestasi where id_prestasi='$id_prestasi'"); 
?>
<script type="text/javascript">
        alert ("Data Berhasil dihapus");
        window.location.href="?page=prestasi";
</script>