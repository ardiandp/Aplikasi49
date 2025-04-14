<?php
    $kdmapel = $_GET['kdmapel'];
    $query  = mysqli_query($db, "DELETE from matapelajaran where kdmapel='$kdmapel'"); 
?>
<script type="text/javascript">
        alert ("Data Berhasil dihapus");
        window.location.href="?page=Matapelajaran";
</script>