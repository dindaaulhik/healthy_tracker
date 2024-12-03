<?php
include 'config.php';

// Ambil data profil pengguna dari database (misalnya user_id = 1)
$sql = "SELECT * FROM users WHERE id = 4"; // Ganti dengan ID pengguna yang sesuai
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Pengguna tidak ditemukan.";
}

// Menutup koneksi database
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Overlay untuk mobile -->
    <div class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40 hidden" id="overlay"></div>

    <!-- Button toggle untuk mobile -->
    <button id="toggleButton" class="lg:hidden absolute top-4 left-4 z-50 p-2 text-black">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed -left-64 lg:left-0 transition-all duration-300 w-64 min-h-screen bg-[#598066] text-white px-5 py-4 flex flex-col z-50">
        <!-- Logo Section -->
        <div class="mb-8">
            <div class="flex items-center gap-2">
                <img src="logo_proyek(1).png" alt="logo" class="w-49 h-6">
                <h1 class="text-xl font-semibold">Healthy Tracker</h1>
            </div>
            <p class="text-sm text-gray-200 mt-1">Untuk kesehatan tubuh anda</p>
        </div>

        <!-- Main Menu -->
        <nav class="flex-1 lg:space-y-3 md:space-y-8 -mt-4">
            <!-- Dashboard -->
            <a href="#" class="flex items-center gap-6 px-2 py-3 rounded-lg hover:bg-[#4a6c54] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-3" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M3 12a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1zm0 8a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-8a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1zm1-17a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1z"/>
                </svg>
                <span class="font-semibold text-yellow-400">Dashboard</span>
            </a>
            
            <!-- Kesehatan -->
            <a href="#" class="flex items-center gap-6 px-2 py-3 rounded-lg hover:bg-[#4a6c54] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-3" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M7.5 4A5.5 5.5 0 0 0 2 9.5c0 .5.09 1 .22 1.5H6.3l1.27-3.37c.3-.8 1.48-.88 1.86 0L11.5 13l.59-1.42c.13-.33.48-.58.91-.58h8.78c.13-.5.22-1 .22-1.5A5.5 5.5 0 0 0 16.5 4c-1.86 0-3.5.93-4.5 2.34C11 4.93 9.36 4 7.5 4M3 12.5a1 1 0 0 0-1 1a1 1 0 0 0 1 1h2.44L11 20c1 .9 1 .9 2 0l5.56-5.5H21a1 1 0 0 0 1-1a1 1 0 0 0-1-1h-7.6l-.93 2.3c-.4 1.01-1.55.87-1.92.03L8.5 9.5l-.96 2.33c-.15.38-.49.67-.94.67z"/>
                </svg>
                <span>Kesehatan</span>
            </a>

            <!-- Olahraga -->
            <a href="#" class="flex items-center gap-6 px-2 py-3 rounded-lg hover:bg-[#4a6c54] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-3" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2 12h1m3-4H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h2m0-9v10a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1m3 5h6m0-5v10a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1a1 1 0 0 0-1 1m3 1h2a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-2m4-4h-1"/>
                </svg>
                <span>Olahraga</span>
            </a>

            <!-- Tantangan -->
            <a href="/healthy_tracker/TANTANGAN/index.html" class="flex items-center gap-6 px-2 py-3 rounded-lg hover:bg-[#4a6c54] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-3" width="1.5em" height="1.5em" viewBox="0 0 48 48">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M30.507 36.163h-13.01m0-4.025h13.006m10.054 4.649h.835c.613 0 1.108-.491 1.108-1.104v-3.152c0-.61-.494-1.104-1.104-1.104h-.835m-3.893 8.58h2.786a1.1 1.1 0 0 0 1.103-1.103v-9.59a1.104 1.104 0 0 0-1.1-1.107h-2.785m-1.104-2.355H31.61c-.61 0-1.104.494-1.104 1.104v14.302a1.1 1.1 0 0 0 1.104 1.104h3.957a1.1 1.1 0 0 0 1.104-1.104V26.96a1.104 1.104 0 0 0-1.1-1.108zM7.439 36.791h-.831a1.104 1.104 0 0 1-1.108-1.1v-3.16c0-.612.491-1.104 1.108-1.104h.831m3.893 8.58h-2.79a1.103 1.103 0 0 1-1.103-1.103v-9.59c0-.612.491-1.107 1.104-1.107h2.782m1.107-2.355h3.954c.616 0 1.107.491 1.107 1.108v14.298a1.1 1.1 0 0 1-1.107 1.104h-3.95c-.61 0-1.104-.494-1.104-1.104V26.96c0-.613.492-1.108 1.104-1.108zm8.701 2.82h9.37m-13.01-1.078l1.531-1.538m2.11-4.94h13.25m-20.625-.159l1.41 1.414l3.855-3.874m2.11-4.94h13.25m-20.625-.16l1.41 1.414l3.855-3.87m11.48 28.5H17.496M9.374 28.206V7.849c0-1.225.98-2.211 2.193-2.211h24.87c1.217 0 2.196.983 2.196 2.211v20.358"/>
                </svg>
                <span>Tantangan</span>
            </a>

            <!-- Hadiah -->
            <a href="/healthy_tracker/Hadiah/klaim_tukar.html" class="flex items-center gap-6 px-2 py-3 rounded-lg hover:bg-[#4a6c54] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-3" width="1.5em" height="1.5em" viewBox="0 0 50 50">
                    <g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="3">
                        <path stroke="currentColor" d="m29.27 35.625l4.063 8.125l4.125-4.23l6.292.063l-5.854-11.625v-.02M20.73 35.625l-4.063 8.125l-4.125-4.23l-6.292.063l5.854-11.625v-.02"/>
                        <path stroke="currentColor" d="M40.167 20.833c0 1.584-1.396 2.917-1.855 4.334c-.458 1.416-.145 3.354-1.041 4.583s-2.813 1.5-3.938 2.417s-2.083 2.625-3.541 3.104c-1.459.479-3.105-.438-4.688-.438s-3.27.896-4.687.438c-1.417-.459-2.313-2.23-3.542-3.104c-1.23-.875-3.146-1.188-4.042-2.417c-.896-1.23-.562-3.125-1.041-4.583c-.48-1.459-1.959-2.75-1.959-4.334s1.396-2.916 1.854-4.333s.146-3.354 1.042-4.583s2.813-1.5 4.042-2.417s1.979-2.625 3.541-3.104c1.563-.48 3.105.437 4.688.437s3.27-.896 4.688-.437C31.104 6.854 32 8.625 33.333 9.5s3.146 1.187 4.042 2.417s.563 3.125 1.042 4.583s1.75 2.75 1.75 4.333M25 14.583a6.25 6.25 0 1 0 0 12.501a6.25 6.25 0 0 0 0-12.5"/>
                    </g>
                </svg>
                <span>Hadiah</span>
            </a>

            <!-- Aktivitas -->
            <a href="/healthy_tracker/AKTIVITAS/index.html" class="flex items-center gap-6 px-2 py-3 rounded-lg hover:bg-[#4a6c54] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-4" width="1.5em" height="1.5em" viewBox="0 0 32 32">
                    <path fill="currentColor" stroke-width="6" d="M25 23h-.021a1 1 0 0 1-.94-.726L20.87 11.19l-1.935 5.16A1 1 0 0 1 18 17h-4v-2h3.307l2.757-7.351a1 1 0 0 1 1.898.076l3.111 10.892l1.979-5.933A1 1 0 0 1 28 12h4v2h-3.28l-2.772 8.316A1 1 0 0 1 25 23m-10 7h-2v-7a3.003 3.003 0 0 0-3-3H6a3.003 3.003 0 0 0-3 3v7H1v-7a5.006 5.006 0 0 1 5-5h4a5.006 5.006 0 0 1 5 5zM8 8a3 3 0 1 1-3 3a3 3 0 0 1 3-3m0-2a5 5 0 1 0 5 5a5 5 0 0 0-5-5"/>
                </svg>
                <span>Aktivitas</span>
            </a>

            <!-- Bantuan -->
            <a href="/healthy_tracker/Bantuan/bantuan.html" class="flex items-center gap-6 px-2 py-3 rounded-lg hover:bg-[#4a6c54] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-4" width="1.4em" height="1.4em" viewBox="0 0 36 36">
                    <path fill="currentColor" d="M18 2a16 16 0 1 0 16 16A16 16 0 0 0 18 2m-.22 25.85a1.65 1.65 0 1 1 1.65-1.65a1.65 1.65 0 0 1-1.65 1.65m1.37-8.06v1.72a1.37 1.37 0 0 1-1.3 1.36h-.11a1.34 1.34 0 0 1-1.39-1.3v-2.76a1.19 1.19 0 0 1 1.12-1.31c1.57-.12 4.18-.7 4.18-3.25c0-1.83-1.41-3.07-3.43-3.07a5.31 5.31 0 0 0-4 1.92a1.36 1.36 0 0 1-2.35-.9a1.43 1.43 0 0 1 .43-1a7.77 7.77 0 0 1 6-2.69c3.7 0 6.28 2.3 6.28 5.6c0 3.05-1.97 5.09-5.43 5.68" class="clr-i-solid clr-i-solid-path-1"/><path fill="none" d="M0 0h36v36H0z"/>
                </svg>
                <span>Bantuan</span>
            </a>
            </div>    
        </nav>
    </div>

        <!-- Main Content -->
        <div id="mainContent" class="relative flex-1 lg:ml-64 transition-all duration-300 p-6 bg-gray-100 top-0 bottom-0 border-l-8 border-[#ddd] lg:border-l-8 max-lg:border-l-0">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 -mt-2 hidden md:block">Profile</h1>
                </div>
                <div class="flex items-center gap-4">
                    <!-- Coin Score -->
                    <div class="flex items-center gap-2 bg-white rounded-full px-4 py-2 shadow-sm">
                        <span class="font-semibold">🪙 20</span>
                    </div>
                    <!-- Notification -->
                    <div class="relative">
                        <button id="notificationBtn" class="p-2 bg-[#578669] rounded-full shadow-sm">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                        </button>
                    
                        <!-- Notification Popout -->
                        <div id="notificationPopout" class="hidden absolute right-0 top-full mt-2 w-64 bg-white rounded-lg shadow-lg border border-gray-200 z-10">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold mb-2">Notifikasi</h3>
                                <div class="space-y-2">
                                    <div class="bg-gray-100 p-2 rounded">
                                        <p class="text-sm">Selesai Melakukan Yoga</p>
                                        <span class="text-xs text-gray-500">2 minutes ago</span>
                                    </div>
                                    <div class="bg-gray-100 p-2 rounded">
                                        <p class="text-sm">Mendapatkan Poin dari Workout</p>
                                        <span class="text-xs text-gray-500">9 hour ago</span>
                                    </div>
                                    <div class="bg-gray-100 p-2 rounded">
                                        <p class="text-sm">Berhasil Klaim Poin</p>
                                        <span class="text-xs text-gray-500">3 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                   
                    <!-- Settings Button -->
                    <div class="relative">
                        <button id="settingsBtn" class="p-2 bg-[#578669] rounded-full shadow-sm">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                        <!-- Profile Popout -->
                        <div id="profilePopout" class="hidden absolute right-0 top-full mt-2 w-60 bg-white rounded-lg shadow-lg border border-gray-200 z-10">
                            <div class="p-5 space-y-3">
                                <h3 class="text-xl font-bold mb-2">Setting</h3>
                                
                                <!-- Profile Button -->
                                <button id="profileBtn" class="w-full bg-gray-100 text-black py-2 rounded-lg hover:bg-gray-300 transition duration-300">
                                    Profile
                                </button>

                                <!-- Logout Button -->
                                <button id="logoutBtn" class="w-full bg-gray-100 text-red-500 py-2 rounded-lg hover:bg-gray-300 transition duration-300">
                                    Keluar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!-- Profile Section -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <form action="save_profile.php" method="POST" enctype="multipart/form-data">
                    <div class="flex flex-col items-center mb-6">
                        <div class="relative">
                            <img src="/PROFILE/uploads/<?php echo $row['profile_picture']; ?>" class="w-32 h-32 rounded-full object-cover border-4 border-[#598066] mb-4" alt="Profile Picture">
                            <input type="file" name="profile_picture" id="profilePicture" class="hidden" accept=".jpg, .jpeg, .png" value="">
                            <button type="button" id="editPictureBtn" onclick="document.getElementById('profilePicture').click();" class="absolute bottom-0 right-0 bg-[#598066] text-white p-2 rounded-full hover:bg-[#4a6c54] hidden">✎</button>
                        </div>
                        <input type="text" name="nama" class="w-full py-1 bg-transparent text-center text-2xl font-bold text-[#598066] editable" value="<?php echo $row['nama']; ?>" readonly disabled>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-gray-100 p-4 rounded-lg text-center">
                            <label class="block font-semibold text-[#598066] mb-1">Berat Badan</label>
                            <input type="text" name="berat_badan" class="w-full py-1 bg-transparent lg:text-xl font-bold md:text-sm text-center editable" value="<?php echo $row['berat_badan']; ?>" readonly disabled>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-lg text-center">
                            <label class="block font-semibold text-[#598066] mb-1">Tinggi Badan</label>
                            <input type="text" name="tinggi_badan" class="w-full py-1 bg-transparent lg:text-xl font-bold md:text-sm text-center editable" value="<?php echo $row['tinggi_badan']; ?>" readonly disabled>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="border-b pb-2">
                            <h4 class="font-semibold text-[#598066]">Informasi Personal</h4>
                        </div>
                        <div class="grid lg:grid-cols-2 gap-4 md:grid-cols-1">
                            <div>
                                <label class="block text-sm text-gray-600 mb-1">Email</label>
                                <input type="email" name="email" class="w-full py-1 font-medium bg-transparent editable" value="<?php echo $row['email']; ?>" readonly disabled>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 mb-1">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="w-full py-1 font-medium bg-transparent editable" value="<?php echo $row['tanggal_lahir']; ?>" readonly disabled>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 mb-1">Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" class="w-full py-1 font-medium bg-transparent editable" value="<?php echo $row['jenis_kelamin']; ?>" readonly disabled>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 mb-1">No. Telepon</label>
                                <input type="tel" name="no_telepon" class="w-full py-1 font-medium bg-transparent editable" value="<?php echo $row['no_telepon']; ?>" readonly disabled>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-600 mb-1">Alamat</label>
                                <input type="text" name="alamat" class="w-full py-1 font-medium bg-transparent editable" value="<?php echo $row['alamat']; ?>" readonly disabled>
                            </div>     
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <!-- Tombol Edit Profile -->
                        <button type="button" id="editProfileBtn" onclick="enableEdit()" class="bg-[#598066] text-white px-6 py-2 rounded-lg hover:bg-[#4a6c54] transition-colors">Edit Profile</button>
                        
                        <!-- Tombol Save dan Cancel Edit -->
                        <div id="editControls" class="hidden mt-4 space-x-2">
                            <button type="submit" id="saveProfileBtn" class="bg-[#578669] text-white px-6 py-2 rounded-lg hover:bg-[#598066] transition-colors">
                                Selesai
                            </button>
                            <button type="button" id="cancelEditBtn" onclick="cancelEdit()" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                                Batal
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>  
    <!-- Footer -->  
    <footer class="bg-gray-100 lg:ml-64">
        <div class="container mx-auto px-8 lg:px-7 md:px-0 pt-4 border-t border-gray-300 text-gray-600 md:text-sm text-center lg:text-left">
        <p class=" mb-5">&copy; 2024 Healthy Tracker. All Rights Reserved.</p>
        </div>
    </footer>              
        
<!-- Java Script -->
<script>
    //edit  profile
    function enableEdit() {
            // Enable all input fields
            document.querySelectorAll('.editable').forEach(function(input) {
                input.removeAttribute('readonly');
                input.removeAttribute('disabled');
            });
            document.getElementById('editProfileBtn').classList.add('hidden');
            document.getElementById('saveProfileBtn').classList.remove('hidden');
            document.getElementById('cancelEditBtn').classList.remove('hidden');
            document.getElementById('editPictureBtn').classList.remove('hidden');
        }

        function cancelEdit() {
            // Disable all input fields
            document.querySelectorAll('.editable').forEach(function(input) {
                input.setAttribute('readonly', true);
                input.setAttribute('disabled', true);
            });
            document.getElementById('editProfileBtn').classList.remove('hidden');
            document.getElementById('saveProfileBtn').classList.add('hidden');
            document.getElementById('cancelEditBtn').classList.add('hidden');
            document.getElementById('editPictureBtn').classList.add('hidden');
        }

    //edit profile2
    const editButton = document.getElementById('editProfileBtn');
    const saveButton = document.getElementById('saveProfileBtn');
    const cancelButton = document.getElementById('cancelEditBtn');
    const editControls = document.getElementById('editControls');
    const profilePicture = document.getElementById('profilePicture');
    const profilePictureUpload = document.getElementById('profilePictureUpload');
    // const editPictureButton = document.getElementById('editPicture');
    const inputs = document.querySelectorAll('input');

    // Enable editing
    editButton.addEventListener('click', () => {
        inputs.forEach(input => {
            input.removeAttribute('readonly');
            input.removeAttribute('disabled');
        });
        editButton.classList.add('hidden');
        editControls.classList.remove('hidden');
    });

    // Save changes
    saveButton.addEventListener('click', () => {
        inputs.forEach(input => {
            input.setAttribute('readonly', true);
        });
        editButton.classList.remove('hidden');
        editControls.classList.add('hidden');
        // alert('Perubahan berhasil disimpan!');
    });

    // Cancel editing
    cancelButton.addEventListener('click', () => {
        inputs.forEach(input => {
            input.setAttribute('readonly', true);
        });
        editButton.classList.remove('hidden');
        editControls.classList.add('hidden');
    });
    

    
    // Sidebar Toggle
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('toggleButton');
        const overlay = document.getElementById('overlay');
        const mainContent = document.getElementById('mainContent');
        let isSidebarOpen = false;

        function toggleSidebar() {
            isSidebarOpen = !isSidebarOpen;
            if (isSidebarOpen) {
                sidebar.classList.remove('-left-64');
                sidebar.classList.add('left-0');
                overlay.classList.remove('hidden');
                mainContent.classList.add('blur-sm');
            } else {
                sidebar.classList.add('-left-64');
                sidebar.classList.remove('left-0');
                overlay.classList.add('hidden');
                mainContent.classList.remove('blur-sm');
            }
        }

        toggleButton.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', toggleSidebar);

        // Close sidebar when window is resized to desktop view
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024 && isSidebarOpen) {
                toggleSidebar();
            }
        });
    });

    // Notification Popout Toggle
    const notificationBtn = document.getElementById('notificationBtn');
    const notificationPopout = document.getElementById('notificationPopout');

    notificationBtn.addEventListener('click', () => {
        notificationPopout.classList.toggle('hidden');
        settingsPopout.classList.add('hidden'); // Close settings popout
    });

    const settingsBtn = document.getElementById('settingsBtn');
    const profilePopout = document.getElementById('profilePopout');
    const logoutBtn = document.getElementById('logoutBtn');

    // Toggle Profile Popout
    settingsBtn.addEventListener('click', () => {
        profilePopout.classList.toggle('hidden');
    });

    // Profile Button Handler
    profileBtn.addEventListener('click', () => {
        // Logika untuk menampilkan halaman profile
        // Misalnya: 
        // window.location.href = '/profile';
        alert('Menampilkan Profile');
        profilePopout.classList.add('hidden');
    });

    // Logout Button
    logoutBtn.addEventListener('click', () => {
        // Implement logout logic
        alert('Anda yakin ingin keluar dari website?');
        window.location.href = '/healthy_tracker/DAFTAR NYOBA/login.php';
    });

    // Close popout when clicking outside
    document.addEventListener('click', (event) => {
        if (!settingsBtn.contains(event.target) && !profilePopout.contains(event.target)) {
            profilePopout.classList.add('hidden');
        }
    });

    

    // Function to handle file input visibility (triggered by profile picture edit button)
    // document.getElementById('editPictureBtn').addEventListener('click', function() {
        // Open the file input when the edit button is clicked
    //     document.getElementById('profilePicture').click();
    // });

    // File upload validation (optional)
    // document.getElementById('profilePicture').addEventListener('change', function(event) {
    //     const file = event.target.files[0];
    //     if (file) {
    //         // Check if the file is an image
    //         const reader = new FileReader();
    //         reader.onload = function(e) {
    //             // Preview the uploaded image
    //             document.querySelector('img').src = e.target.result;
    //         };
    //         reader.readAsDataURL(file);
    //     }
    // });

     // Menambahkan event listener untuk tombol Edit Profile
     document.getElementById('editProfileBtn').addEventListener('click', function() {
    //     // Menampilkan ikon pensil dan membuka file input
        document.getElementById('editPicture').classList.remove('hidden'); // Menampilkan ikon pensil
        document.getElementById('profilePicture').classList.add('opacity-70'); // Menambahkan efek transparansi pada gambar profil
        document.getElementById('profilePicture').removeAttribute('readonly'); // Menghilangkan readonly agar gambar bisa diganti
    });

    // Menambahkan event listener pada ikon pensil untuk membuka input file
    document.getElementById('editPicture').addEventListener('click', function() {
        document.getElementById('profilePictureUpload').click(); // Memicu file input untuk memilih gambar
    });

    // Event listener untuk mengubah foto profil setelah memilih gambar
    document.getElementById('profilePictureUpload').addEventListener('change', function(event) {
        const file = event.target.files[0]; // Mendapatkan file gambar yang diupload
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePicture').src = e.target.result; // Mengubah foto profil dengan gambar yang dipilih
                // Menyembunyikan ikon pensil setelah foto berhasil diupload
                document.getElementById('editPicture').classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
</script>    
</body>
</html>
