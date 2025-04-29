@extends('layouts.admin')

@section('title', 'مشاهده پیام')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-3xl shadow-2xl">
    <h1 class="text-2xl font-bold text-purple-700 mb-6 text-center">📩 مشاهده پیام</h1>

    <div class="space-y-6">
        <!-- نام -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">نام</label>
            <div class="border border-gray-300 rounded-lg px-4 py-2 bg-gray-50">{{ $message->name }}</div>
        </div>

        <!-- شماره تماس -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">شماره تماس</label>
            <div class="border border-gray-300 rounded-lg px-4 py-2 bg-gray-50">{{ $message->phonenumber }}</div>
        </div>

        <!-- متن پیام -->
        <div>
            <label class="block mb-1 font-semibold text-gray-700">متن پیام</label>
            <div class="border border-gray-300 rounded-lg px-4 py-4 bg-gray-50 leading-relaxed">
                {{ $message->body }}
            </div>
        </div>

        <!-- دکمه بازگشت -->
        <div class="text-center pt-4">
            <a href="{{ route('callus.index') }}" class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-bold py-3 px-8 rounded-xl shadow-lg hover:shadow-xl transition-all hover:scale-105">
                بازگشت
            </a>
        </div>
    </div>
</div>
@endsection
