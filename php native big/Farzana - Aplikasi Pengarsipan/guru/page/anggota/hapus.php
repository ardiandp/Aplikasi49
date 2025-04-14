<?php
    $id_anggota = $_GET['id_anggota'];
    $query  = mysqli_query($db, "DELETE from anggota where id_anggota='$id_anggota'"); 
?>
<script type="text/javascript">
        alert ("Data Berhasil dihapus");
        window.location.href="?page=anggota";
</script>