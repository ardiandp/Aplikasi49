<?php
    $id_ekstra = $_GET['id_ekstra'];
    $query  = mysqli_query($db, "DELETE from ekstra where id_ekstra='$id_ekstra'"); 
?>
<script type="text/javascript">
        alert ("Data Berhasil dihapus");
        window.location.href="?page=ekstra";
</script>