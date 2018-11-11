<?php
require_once'functions.php';
$demo = false;

/** LOGIN */ 
if ($mod=='login'){
    $user = esc_field($_POST[user]);
    $pass = esc_field($_POST[pass]);
    
    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$user' AND pass='$pass'");
    if($row){
        $_SESSION[login] = $row->user;
        redirect_js("index.php");
    } else {
        ?>
        <script type="text/javascript">
            alert("Kombinasi username dan password salah");
        </script>
        <?php
    }          
}else if ($mod=='password'){
    $pass1 = $_POST[pass1];
    $pass2 = $_POST[pass2];
    $pass3 = $_POST[pass3];
    
    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$_SESSION[login]' AND pass='$pass1'");        
    
    if($pass1=='' || $pass2=='' || $pass3=='')
        print_msg('Field bertanda * harus diisi.');
    elseif(!$row)
        print_msg('Password lama salah.');
    elseif( $pass2 != $pass3 )
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else{        
        $db->query("UPDATE tb_user SET pass='$pass2' WHERE user='$_SESSION[login]'");                    
        print_msg('Password berhasil diubah.', 'success');
    }
} elseif($act=='logout'){
    unset($_SESSION[login]);
    header("location:index.php");
}

/** DIAGNOSA */
elseif($mod=='diagnosa_tambah'){
    /* $carikode = mysql_query("select max(kode_diagnosa) from tb_diagnosa") or die (mysql_error());
        $datakode = mysql_fetch_array($carikode);
        if ($datakode) {
            $nilaikode = substr($datakode[0], 1);
            $kode = (int) $nilaikode;
            $kode = $kode + 1;
            $hasilkode = "P".str_pad($kodebaru, 2, "0", STR_PAD_LEFT);
        } else {
          $hasilkode = "P01";
        }
        */ 
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    $pengendalian = $_POST['pengendalian'];

    $sumber = $_FILES ['gambar']['tmp_name'];
    $target = 'assets/images/diagnosa/';
    $nama_gambar = $_FILES ['gambar']['name'];

    if($kode=='' || $nama==''){
        ?>
        <script type="text/javascript">
            alert("Field yang bertanda * tidak boleh kosong!");
        </script>
        <?php
    } else if($db->get_results("SELECT * FROM tb_diagnosa WHERE kode_diagnosa='$kode'")){
        ?>
        <script type="text/javascript">
            alert("Kode Sudah Ada");
        </script>
        <?php
        redirect_js("index.php?m=diagnosa");
    } else {
        move_uploaded_file($sumber, $target.$nama_gambar);
        $db->query("INSERT INTO tb_diagnosa (kode_diagnosa, nama_diagnosa, keterangan, pengendalian, gambar) VALUES ('$kode', '$nama', '$keterangan', '$pengendalian', '$nama_gambar' )");                        
        redirect_js("index.php?m=diagnosa");   
    } 
} else if($mod=='diagnosa_ubah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $keterangan = $_POST['keterangan'];
    $pengendalian = $_POST['pengendalian'];

    $sumber = $_FILES ['gambar']['tmp_name'];
    $target = 'assets/images/diagnosa/';
    $nama_gambar = $_FILES ['gambar']['name'];

    if($nama=='')
        print_msg("Field yang bertanda * tidak boleh kosong!");
    else {
        if ($nama_gambar=='') {
            
            $db->query("UPDATE tb_diagnosa SET nama_diagnosa='$nama', keterangan='$keterangan', pengendalian='$pengendalian' WHERE kode_diagnosa='$_GET[ID]'");
            redirect_js("index.php?m=diagnosa");
        } else {
                move_uploaded_file($sumber, $target.$nama_gambar);
                $db->query("UPDATE tb_diagnosa SET nama_diagnosa='$nama', keterangan='$keterangan', pengendalian='$pengendalian', gambar='$nama_gambar' WHERE kode_diagnosa='$_GET[ID]'");
                redirect_js("index.php?m=diagnosa");
            }
    }
} else if ($act=='diagnosa_hapus'){
    $db->query("DELETE FROM tb_diagnosa WHERE kode_diagnosa='$_GET[ID]'");
    $db->query("DELETE FROM tb_relasi WHERE kode_diagnosa='$_GET[ID]'");
    header("location:index.php?m=diagnosa");
} 

/** GEJALA */    
if($mod=='gejala_tambah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $bobot = $_POST['bobot'];
    
    if(!$kode || !$nama || !$bobot)
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($db->get_results("SELECT * FROM tb_gejala WHERE kode_gejala='$kode'")){
        ?>
        <script type="text/javascript">
            alert("Kode Sudah Ada");
        </script>
        <?php
        redirect_js("index.php?m=gejala");
    }
    else{
        $db->query("INSERT INTO tb_gejala (kode_gejala, nama_gejala, bobot) VALUES ('$kode', '$nama', '$bobot')");
        redirect_js("index.php?m=gejala");            
    }                    
} else if($mod=='gejala_ubah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $bobot = $_POST['bobot'];
    
    if(!$kode || !$nama || !$bobot)
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_gejala SET nama_gejala='$nama', bobot='$bobot' WHERE kode_gejala='$_GET[ID]'");
        redirect_js("index.php?m=gejala");
    }    
} else if ($act=='gejala_hapus'){
    $db->query("DELETE FROM tb_gejala WHERE kode_gejala='$_GET[ID]'");
    $db->query("DELETE FROM tb_relasi WHERE kode_gejala='$_GET[ID]'");
    header("location:index.php?m=gejala");
} 
    
/** RELASI TAMBAH */ 
else if ($mod=='relasi_tambah'){
    $kode_diagnosa = $_POST[kode_diagnosa];
    $kode_gejala = $_POST[kode_gejala];
    
    $kombinasi_ada = $db->get_row("SELECT * FROM tb_relasi WHERE kode_diagnosa='$kode_diagnosa' AND kode_gejala='$kode_gejala'");
    
    if($kode_diagnosa=='' || $kode_gejala=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($kombinasi_ada)
        print_msg("Kombinasi diagnosa dan gejala sudah ada!");
    else{
        $db->query("INSERT INTO tb_relasi (kode_diagnosa, kode_gejala) VALUES ('$kode_diagnosa', '$kode_gejala')");
        redirect_js("index.php?m=relasi");
    }   
}else if ($mod=='relasi_ubah'){
    $kode_diagnosa = $_POST[kode_diagnosa];
    $kode_gejala = $_POST[kode_gejala];
    
    $kombinasi_ada = $db->get_row("SELECT * FROM tb_relasi WHERE kode_diagnosa='$kode_diagnosa' AND kode_gejala='$kode_gejala' AND ID<>'$_GET[ID]'");
    
    if($kode_diagnosa=='' || $kode_gejala=='')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif($kombinasi_ada)
        print_msg("Kombinasi diagnosa dan gejala sudah ada!");
    else{
        $db->query("UPDATE tb_relasi SET kode_diagnosa='$kode_diagnosa', kode_gejala='$kode_gejala' WHERE ID='$_GET[ID]'");
        redirect_js("index.php?m=relasi");
    }  
    header("location:index.php?m=relasi");
} else if ($act=='relasi_hapus'){
    $db->query("DELETE FROM tb_relasi WHERE ID='$_GET[ID]'");
    header("location:index.php?m=gejala");
}     
?>
