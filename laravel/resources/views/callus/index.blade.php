@extends('layouts.admin')

@section('title', 'مدیریت پیام‌ها')

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
        <h1 class="text-2xl font-bold text-purple-800">📬 مدیریت پیام‌های تماس با ما</h1>
    </div>

    <div class="overflow-x-auto bg-white rounded-2xl shadow-xl p-6">
        <table class="min-w-full text-right border-separate space-y-4 text-sm">
            <thead class="bg-purple-100 text-purple-800 font-bold">
                <tr>
                    <th class="p-3">#</th>
                    <th class="p-3">👤 نام</th>
                    <th class="p-3">📞 شماره تماس</th>
                    <th class="p-3">📝 متن پیام</th>
                    <th class="p-3">📅 تاریخ ارسال</th>
                    <th class="p-3">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $index => $message)
                    <tr class="bg-white text-gray-700 rounded-lg shadow hover:bg-purple-50 transition duration-200">
                        <td class="p-3 font-bold">
                            {{ $index + 1 + (($messages->currentPage()-1) * $messages->perPage()) }}
                        </td>
                        <td class="p-3">{{ $message->name }}</td>
                        <td class="p-3">{{ $message->phonenumber }}</td>
                        <td class="p-3 text-xs text-gray-600 max-w-xs">
                            {{ Str::limit($message->body, 60) }}
                        </td>
                        <td class="p-3">
                            <span class="px-3 py-1 rounded-full text-xs text-white bg-purple-500">
                                {{ (new \Hekmatinasser\Verta\Verta($message->created_at))
                                     ->format('Y/m/d - H:i') }}
                            </span>
                        </td>
                        <td class="p-3 space-x-2 space-x-reverse flex items-center">
                            {{-- دکمه مشاهده --}}
                            <a href="{{ route('callus.show', $message->id) }}"
                               class="px-4 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                                مشاهده
                            </a>

                            {{-- دکمه حذف --}}
                            <form action="{{ route('callus.destroy', $message->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('آیا از حذف این پیام اطمینان دارید؟');"
                                  class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
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

    <div class="mt-4">
        {{ $messages->links() }}
    </div>
@endsection
