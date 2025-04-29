@php
    use App\Models\Outline;
    $tours = Outline::all();
@endphp

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>تورهای خارجی | آبان سفر</title>

    <!-- CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        .btn-back {
            background-color: #e4e5e7;
            color: #343a40;
            border-radius: 50px;
            padding: 12px 30px;
            font-size: 18px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        .btn-back:hover {
            background-color: #d0d1d3;
        }
    </style>
</head>
<body>

    <div class="container py-5">

        <!-- دکمه بازگشت -->
        <a href="{{ route('home.page') }}" class="btn-back mb-4">← بازگشت به خانه</a>

        <!-- عنوان صفحه -->
        <h2 class="text-center mb-5">تورهای خارجی</h2>

        <!-- لیست تورها -->
        <div class="row">
            @forelse($tours as $tour)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow border-0">
                        <img src="{{ asset($tour->image) }}" class="card-img-top" alt="{{ e($tour->title) }}">
                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title mb-3">{{ e($tour->title) }}</h5>
                            <p class="card-text text-muted small mb-4 text-start">
                                <strong>مقصد:</strong> {{ e($tour->target) }}<br>
                                <strong>مبدأ:</strong> {{ e($tour->startpoint) }}
                            </p>
                            <a href="{{ route('InternationalTour.show', $tour->id) }}" class="btn btn-primary mt-auto rounded-pill">
                                مشاهده جزئیات
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">هیچ توری برای نمایش وجود ندارد.</p>
                </div>
            @endforelse
        </div>

    </div>

    <!-- فوتر -->
    <footer class="text-center py-4 bg-dark text-white mt-5">
        <p class="mb-0">&copy; 2025 تمامی حقوق متعلق به آژانس گردشگری <strong>آبان سفر</strong> می‌باشد.</p>
    </footer>

    <!-- JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/style.js') }}"></script>

</body>
</html>
