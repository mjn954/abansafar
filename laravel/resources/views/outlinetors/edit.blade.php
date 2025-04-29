@extends('layouts.admin')

@section('title', 'ویرایش تور')

@section('content')
    <h1 class="text-2xl font-bold text-purple-800 mb-6">ویرایش تور: {{ $outline->title }}</h1>

    <form action="{{ route('Outlinetors.update', $outline->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-y-4">
            <!-- عنوان تور -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">عنوان تور</label>
                <input type="text" name="title" id="title" value="{{ old('title', $outline->title) }}" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md" required>
            </div>

            <!-- مقصد -->
            <div>
                <label for="target" class="block text-sm font-medium text-gray-700">مقصد</label>
                <input type="text" name="target" id="target" value="{{ old('target', $outline->target) }}" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md" required>
            </div>

            <!-- مبدأ -->
            <div>
                <label for="startpoint" class="block text-sm font-medium text-gray-700">مبدأ</label>
                <input type="text" name="startpoint" id="startpoint" value="{{ old('startpoint', $outline->startpoint) }}" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md" required>
            </div>

            <!-- قیمت -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">قیمت (تومان)</label>
                <input type="number" name="price" id="price" value="{{ old('price', $outline->price) }}" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md" required>
            </div>

            <!-- وضعیت -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">وضعیت</label>
                <select name="status" id="status" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md" required>
                    <option value="فعال" {{ $outline->status == 'فعال' ? 'selected' : '' }}>فعال</option>
                    <option value="غیرفعال" {{ $outline->status == 'غیرفعال' ? 'selected' : '' }}>غیرفعال</option>
                </select>
            </div>

            <!-- نوع تور -->
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700">نوع تور</label>
                <input type="text" name="type" id="type" value="{{ old('type', $outline->type) }}" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md" required>
            </div>

            <!-- مدت اقامت -->
            <div>
                <label for="duration" class="block text-sm font-medium text-gray-700">مدت اقامت</label>
                <input type="text" name="duration" id="duration" value="{{ old('duration', $outline->duration) }}" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md" required>
            </div>

            <!-- پلن تور -->
            <div>
                <label for="plan" class="block text-sm font-medium text-gray-700">پلن تور</label>
                <textarea name="plan" id="plan" rows="4" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md">{{ old('plan', $outline->plan) }}</textarea>
            </div>

            <!-- ویژگی‌های هتل -->
            <div>
                <label for="hotel_features" class="block text-sm font-medium text-gray-700">ویژگی‌های هتل</label>
                <textarea name="hotel_features" id="hotel_features" rows="4" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md">{{ old('hotel_features', $outline->hotel_features) }}</textarea>
            </div>

            <!-- تصویر -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">تصویر</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md">
                @if($outline->image)
                    <img src="{{ asset($outline->image) }}" alt="Image" class="mt-2 w-16 h-16 object-cover rounded-lg">
                @endif
            </div>

            <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded-lg">ویرایش تور</button>
        </div>
    </form>
@endsection
