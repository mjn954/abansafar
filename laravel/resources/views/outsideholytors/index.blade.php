@extends('layouts.admin')

@section('title', 'تورهای زیارتی خارجی')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-purple-700">🌍 تورهای زیارتی خارجی</h1>
        <a href="{{ route('outsideholytors.create') }}"
           class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-5 py-2 rounded-xl shadow-md hover:shadow-lg transition-transform hover:scale-105">
            ➕ افزودن تور جدید
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-lg shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-6 rounded-2xl shadow-xl overflow-x-auto">
        <table class="min-w-full border-separate border-spacing-y-4 text-sm text-right">
            <thead class="bg-purple-100 text-purple-800 font-semibold">
                <tr>
                    <th class="px-3 py-2">#</th>
                    <th class="px-3 py-2">تصویر</th>
                    <th class="px-3 py-2">عنوان</th>
                    <th class="px-3 py-2">مقصد</th>
                    <th class="px-3 py-2">مبدأ</th>
                    <th class="px-3 py-2">قیمت (تومان)</th>
                    <th class="px-3 py-2">مدت زمان</th>
                    <th class="px-3 py-2">نوع</th>
                    <th class="px-3 py-2">وضعیت</th>
                    <th class="px-3 py-2">برنامه سفر</th>
                    <th class="px-3 py-2">امکانات هتل</th>
                    <th class="px-3 py-2">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($outsideholytors as $index => $tor)
                    <tr class="bg-gray-50 hover:bg-purple-50 rounded-lg transition-shadow shadow-sm">
                        <td class="px-3 py-2 font-bold">{{ $index + 1 }}</td>
                        <td class="px-3 py-2">
                            <img src="{{ asset($tor->image) }}"
                                 alt="تصویر تور"
                                 class="w-16 h-16 rounded object-cover">
                        </td>
                        <td class="px-3 py-2">{{ $tor->title }}</td>
                        <td class="px-3 py-2">{{ $tor->target }}</td>
                        <td class="px-3 py-2">{{ $tor->startpoint }}</td>
                        <td class="px-3 py-2">{{ number_format($tor->price) }}</td>
                        <td class="px-3 py-2">{{ $tor->duration }}</td>
                        <td class="px-3 py-2">{{ $tor->type }}</td>
                        <td class="px-3 py-2">
                            <span class="inline-block px-3 py-1 text-xs rounded-full text-white {{ $tor->status === 'فعال' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ $tor->status }}
                            </span>
                        </td>
                        <td class="px-3 py-2 max-w-xs whitespace-pre-line">{{ Str::limit($tor->plan, 50) }}</td>
                        <td class="px-3 py-2 max-w-xs whitespace-pre-line">{{ Str::limit($tor->hotel_features, 50) }}</td>
                        <td class="px-3 py-2 flex gap-2">
                            <a href="{{ route('outsideholytors.edit', $tor->id) }}"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded shadow">
                                ویرایش
                            </a>

                            <form action="{{ route('outsideholytors.destroy', $tor->id) }}" method="POST"
                                  onsubmit="return confirm('آیا از حذف این تور مطمئن هستید؟')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow">
                                    حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center text-gray-500 py-6">هیچ توری ثبت نشده است.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
