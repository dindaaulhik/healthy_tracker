<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Healthy Tracker Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet" />
</head>
<body class="font-inter bg-white text-gray-800 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row">
            <!-- Left Section -->
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
                <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

                <!-- PHP Error Message -->
                <div id="error-message" class="text-red-500 mb-4 text-center">
                    <?php 
                    if (isset($_GET['error'])) {
                        echo htmlspecialchars($_GET['error']);
                    }
                    ?>
                </div>

                <form method="POST" action="functionLogin.php" class="w-full max-w-md">
                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                        <input 
                            type="text" 
                            id="username" 
                            name="username" 
                            required 
                            class="w-full p-2 rounded-lg bg-gray-100 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-700"
                        />
                    </div>

                    <div class="mb-4 relative">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input 
                            type="" 
                            id="pass" 
                            name="pass" 
                            required 
                            class="w-full p-2 rounded-lg bg-gray-100 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-700"
                        />
                        <span 
                            class="absolute top-12 right-2 transform -translate-y-1/2 cursor-pointer text-gray-500 hover:text-gray-700"
                            onclick="togglePasswordVisibility()"
                        >
                            <i id="eyeIcon" class="fas fa-eye"></i>
                        </span>
                    </div>

                    <button 
                        type="submit" 
                        class="w-full p-3 bg-[#578a6d] text-white font-bold rounded-lg hover:bg-green-800 transition duration-300">Login
                    </button>
                </form>

                <div class="text-center mt-6 w-full">
                    <p class="text-sm">
                        Belum punya akun? 
                        <a href="register.php" class="text-green-700 hover:underline">Daftar</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("pass");
            const eyeIcon = document.getElementById("eyeIcon");

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
