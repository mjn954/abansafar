@extends('layouts.admin')

@section('title', 'داشبورد')

@section('content')
    <div class="flex items-center justify-between mb-10">
        <h1 class="text-3xl font-bold text-purple-800">👋 خوش آمدید مدیر عزیز</h1>
        <button class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white px-6 py-2 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition">
            ➕ افزودن تور جدید
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-3xl shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 border-t-4 border-blue-400">
            <h3 class="text-lg font-bold mb-2 text-gray-700">تعداد کل تورها</h3>
            <p class="text-3xl font-extrabold text-blue-600">24</p>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 border-t-4 border-green-400">
            <h3 class="text-lg font-bold mb-2 text-gray-700">تورهای فعال</h3>
            <p class="text-3xl font-extrabold text-green-600">18</p>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 border-t-4 border-yellow-400">
            <h3 class="text-lg font-bold mb-2 text-gray-700">در انتظار تأیید</h3>
            <p class="text-3xl font-extrabold text-yellow-500">6</p>
        </div>
    </div>
@endsection
