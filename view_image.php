<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Images</title>
      <?php
        mysql_connect("localhost","root","");   
        mysql_select_db("ngoding");
        ?>
    <?php
    switch($_GET["act"]){
        case "del";
    $id=$_GET['id'];
    $qr=mysql_query("select * FROM tb_images WHERE id='$id'");
    $r=mysql_fetch_array($qr);
    $tempat_foto = 'img/'.$r['image'];
    unlink("$tempat_foto");

    $hapus=mysql_query("DELETE FROM tb_images WHERE id ='$id'") or die ('query gagal'.mysql_error());
    if ($hapus){
            ?><script language="javascript">alert('Data Anda Berhasil Dihapus')</script><?php
            ?><script>document.location.href="view_image.php";</script><?php
        }
        break;
    }
    ?>
    </head>

    <body>
    <p></p>
    <center><a href="input_image.php"> Input Images </a></center>
    <br />
    <table width="349" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="32">No</td>
        <td width="166"><div align="center">Gambar</div></td>
        <td colspan="2"><div align="center">Aksi</div></td>
      </tr>

        <?php
        $sql = mysql_query("SELECT * FROM tb_images ORDER BY id ASC")or die ("Error!".mysql_error());;
    while($hs = mysql_fetch_array($sql)){
            $no++;
            $id=$hs['id'];
            $img=$hs['image'];
    ?>
      <tr>
        <td><? echo "$no"; ?></td>
        <td><center><img src='img/<? echo "$img";?>' title='Edit' width="150" height="120"/></center></td>
        <td width="70"><div align="center"><a href="edit_image.php?id=<? echo "$id"; ?>">Edit</div></td>
        <td width="71"><div align="center"><a href="view_image.php?act=del&id=<? echo "$id"; ?>">Hapus</div></td>
      </tr>
    <?php
    }
    ?>
    </table>

    </body>
    </html>