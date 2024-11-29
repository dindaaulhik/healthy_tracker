<?php

include "config.php";

// Proses pendaftaran
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan input dari form
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["pass"];
    $password2 = $_POST["pass2"];

    // Validasi input
    if (empty($username) || empty($email) || empty($password) || empty($password2)) {
        echo "<script>
                alert('Semua field harus diisi!');
                window.history.back();
            </script>";
        exit;
    }

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
    $stmt = $conn->prepare("INSERT INTO users (username, email, pass) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    if ($stmt->execute()) {
        echo "<script>
                alert('Pendaftaran berhasil! Silakan login.');
                window.location.href = 'login.php'; // Ganti dengan URL halaman login Anda
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
