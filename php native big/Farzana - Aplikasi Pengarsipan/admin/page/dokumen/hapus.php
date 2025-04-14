<?php
    $id_dokumen = $_GET['id_dokumen'];
    $query  = mysqli_query($db, "DELETE from dokumen where id_dokumen='$id_dokumen'"); 
?>
<script type="text/javascript">
        alert ("Data Berhasil dihapus");
        window.location.href="?page=dokumen";
</script>