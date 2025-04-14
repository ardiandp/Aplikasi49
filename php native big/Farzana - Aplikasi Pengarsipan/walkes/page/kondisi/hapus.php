<?php
    $id_sehat = $_GET['id_sehat'];
    $query  = mysqli_query($db, "DELETE from kondisi_sehta where id_sehat='$id_sehat'"); 
?>
<script type="text/javascript">
        alert ("Data Berhasil dihapus");
        window.location.href="?page=kondisi";
</script>