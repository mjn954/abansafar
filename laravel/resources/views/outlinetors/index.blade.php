@extends('layouts.admin')

@section('title', 'تورهای خارجی')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-purple-800">✈️ تورهای خارجی</h1>
        <a href="{{ route('Outlinetors.create') }}"
           class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-6 py-2 rounded-xl shadow hover:shadow-xl transition transform hover:scale-105">
            ➕ افزودن تور جدید
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-xl shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-2xl shadow-xl p-6">
        <table class="min-w-full text-right border-separate text-sm">
            <thead class="bg-purple-100 text-purple-800 font-bold">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">عنوان تور</th>
                    <th class="p-3">مبدأ</th>
                    <th class="p-3">مقصد</th>
                    <th class="p-3">نوع</th>
                    <th class="p-3">مدت اقامت</th>
                    <th class="p-3">قیمت (تومان)</th>
                    <th class="p-3">وضعیت</th>
                    <th class="p-3">برنامه سفر</th>
                    <th class="p-3">ویژگی‌های هتل</th>
                    <th class="p-3">تصویر</th>
                    <th class="p-3">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($outlines as $index => $item)
                    <tr class="bg-white text-gray-700 rounded-lg shadow hover:bg-purple-50 transition">
                        <td class="p-3 font-bold">{{ $index + 1 }}</td>
                        <td class="p-3">{{ $item->title }}</td>
                        <td class="p-3">{{ $item->startpoint }}</td>
                        <td class="p-3">{{ $item->target }}</td>
                        <td class="p-3">{{ $item->type }}</td>
                        <td class="p-3">{{ $item->duration }}</td>
                        <td class="p-3">{{ number_format($item->price) }}</td>
                        <td class="p-3">
                            <span class="px-3 py-1 rounded-full text-xs text-white {{ $item->status == 'فعال' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="p-3 max-w-xs truncate">{{ $item->plan }}</td>
                        <td class="p-3 max-w-xs truncate">{{ $item->hotel_features }}</td>
                        <td class="p-3">
                            @if($item->image)
                                <img src="{{ asset($item->image) }}" alt="تصویر تور" class="w-16 h-16 object-cover rounded-lg">
                            @else
                                <span class="text-gray-400 text-xs">بدون تصویر</span>
                            @endif
                        </td>
                        <td class="p-3 space-x-2 space-x-reverse">
                            <a href="{{ route('Outlinetors.edit', $item->id) }}"
                               class="px-4 py-1 bg-yellow-400 text-white rounded-lg hover:bg-yellow-500">
                                ویرایش
                            </a>
                            <form action="{{ route('Outlinetors.destroy', ['outline' => $item->id]) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('آیا از حذف این تور مطمئن هستید؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                    حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center py-6 text-gray-400">هیچ توری ثبت نشده است.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
