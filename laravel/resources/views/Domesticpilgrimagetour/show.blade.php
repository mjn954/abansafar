<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ e($Domesticpilgrimagetour->title) }} | گیتی گشت آبان</title>

    <!-- CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            background: #222;
            font-family: "Vazirmatn", sans-serif;
            margin: 0;
            padding: 0;
            color: #fff;
        }

        .ticket {
            max-width: 700px;
            margin: 30px auto;
            background: #333;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .ticket:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }

        .ticket-header {
            background: linear-gradient(135deg, #f1a745, #ff7f50);
            padding: 30px;
            text-align: center;
            color: white;
            position: relative;
            border-bottom: 3px solid #f1a745;
        }

        .ticket-header h3 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #fff;
            border-bottom: 2px solid #fff;
            padding-bottom: 8px;
        }

        .ticket-header small {
            font-size: 16px;
            color: #fff;
            opacity: 0.8;
        }

        .ticket-image img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .ticket-image img:hover {
            transform: scale(1.05);
        }

        .ticket-body {
            padding: 30px;
            background: #444;
            border-top: 2px solid #f1a745;
            font-size: 16px;
            color: #ccc;
            position: relative;
        }

        .ticket-body .row > div {
            margin-bottom: 15px;
        }

        .ticket-body .row > div strong {
            color: #f1a745;
            font-weight: 700;
        }

        .ticket-footer {
            background: #222;
            padding: 20px;
            text-align: center;
            color: white;
            border-radius: 0 0 15px 15px;
            position: relative;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.1);
        }

        .ticket-footer button {
            background-color: #f1a745;
            color: white;
            border-radius: 50px;
            padding: 12px 30px;
            font-size: 18px;
            font-weight: 600;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            display: block;
            margin: 0 auto;
        }

        .ticket-footer button:hover {
            background-color: #ff7f50;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

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

        .gradient-border {
            background: linear-gradient(45deg, #f1a745, #ff7f50);
            -webkit-background-clip: text;
            color: transparent;
            font-weight: 700;
        }

        .container {
            padding: 0 15px;
        }

        .ticket-body .row {
            display: flex;
            flex-wrap: wrap;
        }

        .ticket-body .row > div {
            width: 50%;
            padding: 10px;
            box-sizing: border-box;
        }

        .ticket-body .row > div:nth-child(even) {
            background: #555;
            border-radius: 10px;
            margin-top: 15px;
        }

        .reservation-message {
            font-size: 18px;
            font-weight: bold;
            color: #f1a745;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <a href="{{ route('Domesticpilgrimagetour.index') }}" class="btn-back mb-4">← بازگشت به لیست تورها</a>

    <div class="ticket">
        <div class="ticket-header">
            <h3 class="gradient-border">{{ e($Domesticpilgrimagetour->title) }}</h3>
            <small>آژانس گردشگری گیتی گشت آبان</small>
        </div>

        <div class="ticket-image">
            <img src="{{ asset('inssideholytors_images/' . $Domesticpilgrimagetour->image) }}" alt="{{ e($Domesticpilgrimagetour->title) }}">
        </div>

        <div class="ticket-body">
            <div class="row">
                <div><strong>مقصد:</strong> {{ e($Domesticpilgrimagetour->target) }}</div>
                <div><strong>مبدأ:</strong> {{ e($Domesticpilgrimagetour->startpoint) }}</div>

                <div><strong>قیمت:</strong> {{ number_format($Domesticpilgrimagetour->price) }} تومان</div>
                <div><strong>مدت زمان:</strong> {{ e($Domesticpilgrimagetour->duration) }}</div>

                <div><strong>بر:</strong> {{ e($Domesticpilgrimagetour->plan) }}</div>
                <div><strong>نوع تور:</strong> {{ e($Domesticpilgrimagetour->type) }}</div>

                <div><strong>هتل:</strong> {{ e($Domesticpilgrimagetour->hotel_features) }}</div>
            </div>
        </div>

        <div class="ticket-footer">
            <button class="btn btn-reserve" onclick="showReservationMessage()">رزرو این تور</button>
            <div id="reservation-message" class="reservation-message" style="display: none;">
                برای رزرو تور با شماره 09232291210 تماس بگیرید.
            </div>
        </div>
    </div>
</div>

<!-- JS -->
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script>
    function showReservationMessage() {
        document.querySelector('.btn-reserve').style.display = 'none';
        document.getElementById('reservation-message').style.display = 'block';
    }
</script>
</body>
</html>
