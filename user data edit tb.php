<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) { //
        $id = $_REQUEST['id']; //
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $nama = $_POST['nama']; //
		$id = $_POST['id']; //
		$nomor = $_POST['nomor']; //
        $gender = $_POST['gender']; //
        $kelas = $_POST['kelas']; //
         
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE tabel_rfid_mysql  set nama = ?, nomor =?, gender =?, kelas =? WHERE id = ?"; //
		$q = $pdo->prepare($sql);
		$q->execute(array($nama,$nomor,$gender,$kelas,$id));
		Database::disconnect();
		header("Location: user data.php");
    }
?>