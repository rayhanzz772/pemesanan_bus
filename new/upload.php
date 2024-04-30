<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $username = $_SESSION['username']; // Ambil username dari sesi pengguna

    $targetDir = "foto_profil/";
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Periksa apakah file benar-benar file gambar
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File bukan file gambar.";
        $uploadOk = 0;
    }

    // Periksa apakah file sudah ada
    // Periksa apakah file sudah ada
    if (file_exists($targetFile)) {
        $timestamp = time(); // Waktu saat ini sebagai string
        $filename = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_FILENAME);
        $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
        $targetFile = $targetDir . $filename . '_' . $timestamp . '.' . $imageFileType;
    }


    // Batasi jenis file yang diizinkan
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
        $uploadOk = 0;
    }

    // Check jika $uploadOk = 0, artinya ada kesalahan
    if ($uploadOk == 0) {
        echo "Maaf, file tidak diunggah.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            // Lakukan penyimpanan nama file ke database berdasarkan username
            $imageURL = $targetFile; // Gunakan $targetFile sebagai URL gambar yang sudah diperbarui
        
            // Simpan data gambar ke dalam tabel user berdasarkan username
            $koneksi = new mysqli("localhost", "root", "", "dt_bus");
            $sql = "UPDATE user SET image_url='$imageURL' WHERE username='$username'";
            $koneksi->query($sql);
            $koneksi->close();
        
            // Redirect ke halaman profil.php setelah berhasil menyimpan foto
            header("Location: profil.php");
            exit; // Pastikan kode setelah header("Location: ...") tidak dijalankan dengan memanggil exit atau die.
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
    
}
?>
