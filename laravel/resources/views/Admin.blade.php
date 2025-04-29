<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ورود مدیر</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #4f46e5, #9333ea);
        }

        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .input-style {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
        }

        .input-style::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .input-style:focus {
            background-color: rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center text-white">

    <div class="glass rounded-3xl shadow-2xl p-10 w-full max-w-md animate-fade-in">
        <h2 class="text-3xl font-bold text-center mb-6 tracking-wide">ورود مدیر</h2>

        <form method="POST" action="{{ route('admin.login') }}" class="space-y-6">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium mb-1">ایمیل</label>
                <input type="email" name="email" id="email" placeholder="admin@example.com"
                       class="input-style w-full px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-white"
                       required>
            </div>

            <div>
                <label for="password" class="block text-sm font-medium mb-1">رمز عبور</label>
                <input type="password" name="password" id="password" placeholder="••••••••"
                       class="input-style w-full px-4 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-white"
                       required>
            </div>

            <button type="submit"
                    class="w-full bg-white text-purple-700 font-bold py-2 rounded-xl shadow-lg hover:scale-105 transition transform">
                ورود
            </button>
        </form>
    </div>

    <script>
        // انیمیشن ساده fade-in
        document.querySelector('.animate-fade-in')?.classList.add('opacity-0');
        setTimeout(() => {
            document.querySelector('.animate-fade-in')?.classList.remove('opacity-0');
        }, 100);
    </script>

</body>
</html>
