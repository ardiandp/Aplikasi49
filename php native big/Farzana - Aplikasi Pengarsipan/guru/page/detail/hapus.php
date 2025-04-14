<?php
    $id_detail_laporan = $_GET['id_detail_laporan'];
    $query  = mysqli_query($db, "DELETE from detail where id_detail_laporan='$id_detail_laporan'"); 
?>
<script type="text/javascript">
        alert ("Data Berhasil dihapus");
        window.location.href="?page=detail";
</script>