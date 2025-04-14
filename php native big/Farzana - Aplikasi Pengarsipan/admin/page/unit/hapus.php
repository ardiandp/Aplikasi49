<?php
    $id_unit = $_GET['id_unit'];
    $query  = mysqli_query($db, "DELETE from unit where id_unit ='$id_unit'"); 
?>
<script type="text/javascript">
        alert ("Data Berhasil dihapus");
        window.location.href="?page=unit";
</script>