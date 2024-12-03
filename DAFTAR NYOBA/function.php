<?php
include "config.php";

// Proses pendaftaran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan input dari form
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["pass"];
    $password2 = $_POST["pass2"];
    
    // Tentukan role berdasarkan email
    $role = (strpos($email, 'admin') !== false) ? 'admin' : 'user'; // Jika email mengandung 'admin', maka peran 'admin'

    // Validasi input
    if (empty($username) || empty($email) || empty($password) || empty($password2)) {
        echo "<script>
                alert('Semua field harus diisi!');
                window.history.back();
            </script>";
        exit;
    }

    // Validasi format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
                alert('Format email tidak valid!');
                window.history.back();
            </script>";
        exit;
    }

    // Validasi panjang password
    // if (strlen($password) < 6) {
    //     echo "<script>
    //             alert('Password harus memiliki minimal 6 karakter!');
    //             window.history.back();
    //         </script>";
    //     exit;
    // }

    // Cek apakah password konfirmasi sesuai
    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
                window.history.back();
            </script>";
        exit;
    }

    // Periksa apakah email sudah terdaftar
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
                alert('Email sudah terdaftar!');
                window.history.back();
            </script>";
        exit;
    }

    // Enkripsi password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Masukkan data ke database
    $stmt = $conn->prepare("INSERT INTO users (username, email, pass, roles) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        echo "<script>
                alert('Pendaftaran berhasil! Silakan login.');
                window.location.href = '/healthy_tracker/DAFTAR NYOBA/login.php'; // Ganti dengan URL halaman login Anda
            </script>";
    } else {
        echo "<script>
                alert('Terjadi kesalahan. Coba lagi!');
                window.history.back();
            </script>";
    }

    $stmt->close();
}

$conn->close();
?>
