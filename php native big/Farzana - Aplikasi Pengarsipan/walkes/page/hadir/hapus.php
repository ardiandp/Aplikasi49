<?php
    $id_hadir = $_GET['id_hadir'];
    $query  = mysqli_query($db, "DELETE from ketidakhadiran where id_hadir='$id_hadir'"); 
?>
<script type="text/javascript">
        alert ("Data Berhasil dihapus");
        window.location.href="?page=hadir";
</script>