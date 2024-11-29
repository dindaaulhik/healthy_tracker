<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy Tracker - Daftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
</head>
<body class="font-inter bg-white text-black min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row">
            <!-- Left Section  -->
            <div class="w-full md:w-1/2 p-6 md:p-10 flex flex-col justify-center items-center bg-gray-50">
                <h1 class="text-2xl md:text-3xl font-bold mb-4 text-center">Selamat Datang di Healthy Tracker!</h1>
                <p class="text-base mb-4 text-center">Waktunya untuk memulai hidup sehat.</p>
                <img 
                    src="Health technology and digital health solutions.png" 
                    alt="Health technology and digital health solutions" 
                    class="max-w-[75%] md:max-w-[75%] h-auto mb-4"
                />
            </div>

            <!-- Right Section -->
            <div class="w-full md:w-1/2 p-6 md:p-10 flex flex-col justify-center items-center">
                <h2 class="text-2xl font-bold mb-6 text-center">Daftar</h2>
                <form action="function.php" method="post" class="w-full max-w-md">
                    <div class="mb-4">
                        <input 
                            type="text"
                            id="username" 
                            name="username" 
                            placeholder="Username" 
                            class="w-full p-3 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-700"
                        />
                    </div>
                    <div class="mb-4">
                        <input 
                            type="email" 
                            id="email"
                            name="email" 
                            placeholder="Alamat Email" 
                            class="w-full p-3 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-700"
                        />
                    </div>
                    <div class="mb-4 relative">
                        <input 
                            type="password" 
                            name="pass" 
                            id="pass" 
                            placeholder="Buat Password" 
                            class="w-full p-3 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-700"
                        />
                        <span 
                            class="absolute top-1/2 right-2 transform -translate-y-1/2 cursor-pointer text-gray-500 hover:text-gray-700"
                            onclick="togglePasswordVisibility('password', 'eyeIcon')"
                        >
                            <i id="eyeIcon" class="fas fa-eye"></i>
                        </span>
                    </div>
                    <div class="mb-4 relative">
                        <input 
                            type="password" 
                            name="pass2" 
                            id="pass2" 
                            placeholder="Konfirmasi Password" 
                            class="w-full p-3 rounded-lg bg-gray-100 focus:outline-none focus:ring-2 focus:ring-green-700"
                        />
                        <span 
                            class="absolute top-1/2 right-2 transform -translate-y-1/2 cursor-pointer text-gray-500 hover:text-gray-700"
                            onclick="togglePasswordVisibility('password2', 'eyeIcon2')"
                        >
                            <i id="eyeIcon2" class="fas fa-eye"></i>
                        </span>
                    </div>

                    <div class="flex items-center mb-4">
                        <input 
                            type="checkbox" 
                            checked 
                            class="mr-2 text-green-600 focus:ring-green-500"
                        />
                        <span class="text-sm text-gray-500">Saya setuju dengan syarat dan kebijakan privasi</span>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="w-full p-3 bg-[#578a6d] text-white font-bold rounded-lg hover:bg-green-800 transition duration-300"
                    >
                        Register
                    </button>
                </form>

                <div class="text-center mt-6 w-full">
                    <p class="text-sm">Sudah menjadi anggota? <a href="login.php" class="text-green-700 hover:underline">Login</a></p>
                    
                    <div class="flex items-center my-6">
                        <span class="flex-grow h-px bg-gray-600"></span>
                        <p class="mx-3 text-sm text-gray-600">Atau lanjutkan dengan</p>
                        <span class="flex-grow h-px bg-gray-600"></span>
                    </div>

                    <div class="social-login">
                        <img src="google-logo.jpg" alt="Google Logo" class="max-w-[40px] h-auto mx-auto" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(iconId);

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }
    </script>
</body>
</html>