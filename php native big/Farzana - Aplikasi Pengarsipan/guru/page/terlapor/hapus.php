<?php
    $id_terlapor = $_GET['id_terlapor'];
    $query  = mysqli_query($db, "DELETE from terlapor where id_terlapor='$id_terlapor'"); 
?>
<script type="text/javascript">
        alert ("Data Berhasil dihapus");
        window.location.href="?page=terlapor";
</script>