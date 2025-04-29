@php
    use App\Models\inssideholytors;
    $tours = inssideholytors::all();
@endphp

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تورهای داخلی | آبان سفر</title>
    <STyle> .btn-back {
        background-color: #e4e5e7;
        color: #343a40;
        border-radius: 50px;
        padding: 12px 30px;
        font-size: 18px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-back:hover {
        background-color: #d0d1d3;
    }
</STyle>
    <!-- CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        /* Additional custom styles */
    </style>
</head>
<body>
    <div class="container py-5">
        <a href="{{ route('home.page') }}" class="btn-back mb-4">← بازگشت به خانه</a>

        <h2 class="text-center mb-5">تورهای زیارتی داخلی</h2>

        <div class="row">
            @forelse($tours as $tour)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ asset('inssideholytors_images/' . $tour->image) }}"
                             class="card-img-top"
                             alt="{{ $tour->title }}">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $tour->title }}</h5>
                            <p class="card-text text-start">
                                <strong>مقصد:</strong> {{ $tour->target }}<br>
                                <strong>مبدأ:</strong> {{ $tour->startpoint }}<br>
                                <strong>قیمت:</strong> {{ number_format($tour->price) }} تومان<br>
                                <strong>مدت زمان:</strong> {{ $tour->duration }}<br>
                            </p>
                            <a href="{{ route('Domesticpilgrimagetour.show', $tour) }}" class="btn btn-outline-success mt-2">جزئیات بیشتر</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">هیچ تور داخلی‌ای برای نمایش وجود ندارد.</p>
                </div>
            @endforelse
        </div>
    </div>

    <footer class="text-center py-4 bg-dark text-white mt-5">
        <p class="mb-0">تمامی حقوق متعلق به آژانس گردشگری <strong>آبان سفر</strong> می‌باشد.</p>
    </footer>

    <!-- JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/style.js') }}"></script>
</body>
</html>
