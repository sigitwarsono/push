<?php
        mysql_connect("localhost","root","");   
        mysql_select_db("ngoding");
    
        ?>

<?
if($_POST['simpan']){

 $lokasi_file    = $_FILES['gambar']['tmp_name'];
        $nama_file   = $_FILES['gambar']['name'];
        $acak        = rand(1,99);
        $nama_file_unik = $acak.$nama_file;
        $vdir_upload = "img/images/";
        $vfile_upload = $vdir_upload . $nama_file_unik;
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $vfile_upload);
        mysql_query("INSERT INTO tb_images VALUES ('','$nama_file_unik','')")or die (Error.mysql_error());

  ?>
    <SCRIPT language="JavaScript">
        window.location="input_image.php";
    </SCRIPT>
  <?
  exit;

if($_POST['cancel']){?>	
  <SCRIPT language="JavaScript">
    window.location="admin.php?act=product";
  </SCRIPT>	
<? }
}
else
{

}
?>

    <title>Input Images</title>
    <form method="post" enctype="multipart/form-data" name="form" target="_self" id="form">
    <table width="63%" border="0" align="center" cellpadding="1" cellspacing="1">
    <tr>
        <td>Gambar</td>
        <td>:</td>
        <td colspan="3"><input name="gambar" type="file" id="gambar" size="30" maxlength="30" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td colspan="3"><input type="submit" name="simpan" id="simpan" value="Simpan" class="button"/></td>
      </tr>
    </table>
    </form>
