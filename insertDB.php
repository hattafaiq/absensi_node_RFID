<?php
     
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track post values
        $nama = $_POST['nama']; //variabel nama
		$id = $_POST['id']; // variabel id RFID
		$nomor = $_POST['nomor']; // variabel nomor absen
        $gender = $_POST['gender']; //variabel gender
        $kelas = $_POST['kelas']; //variabel kelas
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO tabel_rfid_mysql (nama,id,nomor,gender,kelas) values(?, ?, ?, ?, ?)"; //nama tabel database dan variabel
		$q = $pdo->prepare($sql);
		$q->execute(array($nama,$id,$nomor,$gender,$kelas)); //variabel database
		Database::disconnect();
		header("Location: user data.php");
    }
?>