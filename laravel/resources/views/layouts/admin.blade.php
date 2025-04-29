<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'پنل ادمین | تور مسافرتی')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-purple-100 min-h-screen">
    <div class="min-h-screen flex">
        @include('components.sidebar')

        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
