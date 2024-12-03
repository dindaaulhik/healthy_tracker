<?php
include 'config.php';

session_start();

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika tidak, redirect ke halaman login atau tampilkan pesan error
    header("Location: /healthy_tracker/DAFTAR NYOBA/login.php");
    exit;
}


// Dapatkan user_id dari session (sesuaikan dengan sistem login Anda)
$userId = $_SESSION['user_id'];

// Memastikan folder 'uploads' ada
$uploadDir = 'uploads';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true); // Membuat folder jika belum ada
}


// Memastikan folder 'uploads' ada
// if (!file_exists('uploads')) {
//     mkdir('uploads', 0777, true); // Membuat folder jika belum ada
// }

// Proses upload gambar profil jika ada
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == UPLOAD_ERR_OK) {
    // Ambil informasi file
    $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
    $fileName = $_FILES['profile_picture']['name'];
    $fileSize = $_FILES['profile_picture']['size'];
    $fileType = $_FILES['profile_picture']['type'];

    // Tentukan folder penyimpanan dan nama file baru
    $uploadDir = 'uploads';
    $filePath = $uploadDir . basename($fileName);
    
    // Pastikan folder 'profile_picture' ada
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Pindahkan file dari folder sementara ke folder yang dituju
    if (move_uploaded_file($fileTmpPath, $filePath)) {
        // Ambil user_id yang sedang login
        $userId = $_SESSION['user_id']; // Ganti dengan ID pengguna yang sedang login

        // Update path gambar di database
        $query = "UPDATE users SET profile_picture = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $filePath, $userId);
        $stmt->execute();
    }
}


// Memeriksa apakah ada data yang dikirimkan dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data yang dikirimkan
    $nama = $_POST['nama'];
    $berat_badan = $_POST['berat_badan'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $email = $_POST['email'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_telepon = $_POST['no_telepon'];
    $alamat = $_POST['alamat'];
    
    

    // Update data pengguna di database
    $sql = "UPDATE users SET 
                nama = '$nama',
                berat_badan = '$berat_badan',
                tinggi_badan = '$tinggi_badan',
                email = '$email',
                tanggal_lahir = '$tanggal_lahir',
                jenis_kelamin = '$jenis_kelamin',
                no_telepon = '$no_telepon',
                alamat = '$alamat',
                profile_picture = '$profile_picture'
            WHERE id = '$userId'"; // Ganti dengan ID pengguna yang sesuai

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert ('Profil berhasil diperbarui!');
                window.location.href = 'index.php';
             </script>!";
    } else {
        echo "<script>
                alert ('Gagal memperbarui profil.');
                window.history.back();
             </script>!" . $conn->error;
    }
}


// Menutup koneksi database
$conn->close();
?>
