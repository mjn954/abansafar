@extends('layouts.admin')

@section('title', 'تورهای داخلی')

@section('content')
    @if(session('success'))
        <div
            x-data="{ show: true }"
            x-init="setTimeout(() => show = false, 5000)"
            x-show="show"
            x-transition
            class="mb-6 bg-green-100 border border-green-300 text-green-800 px-6 py-3 rounded-xl shadow-lg"
        >
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-purple-800">🏕️ لیست تورهای داخلی</h1>
        <a href="{{ route('create.insidetors') }}"
           class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-6 py-2 rounded-xl shadow hover:shadow-xl transition transform hover:scale-105">
            ➕ افزودن تور جدید
        </a>
    </div>

    <div class="overflow-x-auto bg-white rounded-2xl shadow-xl p-6">
        <table class="min-w-full text-right border-separate space-y-4 text-sm">
            <thead class="bg-purple-100 text-purple-800 font-bold">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">عنوان تور</th>
                    <th class="p-3">مقصد</th>
                    <th class="p-3">مبدا</th>
                    <th class="p-3">قیمت (تومان)</th>
                    <th class="p-3">وضعیت</th>
                    <th class="p-3">نوع</th>
                    <th class="p-3">مدت اقامت</th>
                    <th class="p-3">برنامه سفر</th>
                    <th class="p-3">ویژگی‌های هتل</th>
                    <th class="p-3">تصویر</th>
                    <th class="p-3">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($insidetors as $insidetor)
                    <tr class="bg-white text-gray-700 rounded-lg shadow hover:bg-purple-50 transition duration-200">
                        <td class="p-3 font-bold">{{ $loop->iteration }}</td>
                        <td class="p-3">{{ $insidetor->title }}</td>
                        <td class="p-3">{{ $insidetor->target }}</td>
                        <td class="p-3">{{ $insidetor->startpoint }}</td>
                        <td class="p-3">{{ number_format($insidetor->price) }}</td>
                        <td class="p-3">
                            <span class="px-3 py-1 rounded-full text-xs text-white {{ $insidetor->status === 'فعال' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ $insidetor->status }}
                            </span>
                        </td>
                        <td class="p-3">{{ $insidetor->type }}</td>
                        <td class="p-3">{{ $insidetor->duration }}</td>
                        <td class="p-3 text-xs text-gray-600 max-w-xs">{{ Str::limit($insidetor->plan, 60) }}</td>
                        <td class="p-3 text-xs text-gray-600 max-w-xs">{{ Str::limit($insidetor->hotel_features, 60) }}</td>
                        <td class="p-3">
                            @if($insidetor->image)
                                <img src="{{ asset($insidetor->image) }}" alt="تصویر تور" class="w-14 h-10 object-cover rounded-md shadow">
                            @else
                                <span class="text-gray-400 italic">ندارد</span>
                            @endif
                        </td>
                        <td class="p-3 space-x-2 space-x-reverse">
                            <a href="{{ route('edit.insidetors', $insidetor->id) }}"
                               class="px-4 py-1 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500 transition">
                                ویرایش
                            </a>
                            <form action="{{ route('delete.insidetors', $insidetor->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('آیا از حذف این تور مطمئن هستید؟')"
                                        class="px-4 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                                    حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
