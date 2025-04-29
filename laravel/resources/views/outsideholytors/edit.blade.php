@extends('layouts.admin')

@section('title', 'ویرایش تور زیارتی خارجی')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-3xl shadow-2xl">
        <h1 class="text-2xl font-bold text-purple-700 mb-6">✏️ ویرایش تور زیارتی خارجی</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                <ul class="list-disc pl-5 text-sm">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('outsideholytors.update', $outsideholytor->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- عنوان تور --}}
            <div>
                <label for="title" class="block mb-1 font-bold text-gray-700">عنوان تور</label>
                <input type="text" name="title" id="title" value="{{ old('title', $outsideholytor->title) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400" required>
            </div>

            {{-- مقصد --}}
            <div>
                <label for="target" class="block mb-1 font-bold text-gray-700">مقصد</label>
                <input type="text" name="target" id="target" value="{{ old('target', $outsideholytor->target) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400" required>
            </div>

            {{-- مبدأ حرکت --}}
            <div>
                <label for="startpoint" class="block mb-1 font-bold text-gray-700">مبدأ حرکت</label>
                <input type="text" name="startpoint" id="startpoint" value="{{ old('startpoint', $outsideholytor->startpoint) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400" required>
            </div>

            {{-- قیمت --}}
            <div>
                <label for="price" class="block mb-1 font-bold text-gray-700">قیمت (تومان)</label>
                <input type="number" name="price" id="price" value="{{ old('price', $outsideholytor->price) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400" required>
            </div>

            {{-- وضعیت --}}
            <div>
                <label for="status" class="block mb-1 font-bold text-gray-700">وضعیت</label>
                <select name="status" id="status"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400" required>
                    <option value="فعال" {{ old('status', $outsideholytor->status) == 'فعال' ? 'selected' : '' }}>فعال</option>
                    <option value="غیرفعال" {{ old('status', $outsideholytor->status) == 'غیرفعال' ? 'selected' : '' }}>غیرفعال</option>
                </select>
            </div>

            {{-- نوع تور --}}
            <div>
                <label for="type" class="block mb-1 font-bold text-gray-700">نوع تور</label>
                <input type="text" name="type" id="type" value="{{ old('type', $outsideholytor->type) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400" required>
            </div>

            {{-- مدت زمان --}}
            <div>
                <label for="duration" class="block mb-1 font-bold text-gray-700">مدت زمان</label>
                <input type="text" name="duration" id="duration" value="{{ old('duration', $outsideholytor->duration) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400" required>
            </div>

            {{-- پلن سفر --}}
            <div>
                <label for="plan" class="block mb-1 font-bold text-gray-700">پلن سفر</label>
                <textarea name="plan" id="plan" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400"
                          required>{{ old('plan', $outsideholytor->plan) }}</textarea>
            </div>

            {{-- ویژگی‌های هتل --}}
            <div>
                <label for="hotel_features" class="block mb-1 font-bold text-gray-700">ویژگی‌های هتل</label>
                <textarea name="hotel_features" id="hotel_features" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-400"
                          required>{{ old('hotel_features', $outsideholytor->hotel_features) }}</textarea>
            </div>

            {{-- تصویر فعلی --}}
            <div>
                <label class="block mb-1 font-bold text-gray-700">تصویر فعلی</label>
                <img src="{{ asset($outsideholytor->image) }}" alt="تصویر تور" class="w-32 rounded-lg shadow mb-2">
            </div>

            {{-- تصویر جدید --}}
            <div>
                <label for="image" class="block mb-1 font-bold text-gray-700">تصویر جدید (در صورت نیاز)</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 file:bg-purple-500 file:text-white file:px-4 file:py-1 file:rounded file:border-0">
            </div>

            {{-- دکمه ذخیره --}}
            <div>
                <button type="submit"
                        class="w-full bg-gradient-to-r from-purple-500 to-indigo-500 text-white font-bold py-3 rounded-xl shadow-lg hover:shadow-xl transition-all hover:scale-105">
                    💾 ذخیره تغییرات
                </button>
            </div>
        </form>
    </div>
@endsection
