<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>آّبان سفر  </title>
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</head>
<body>
  <!-- Navbar -->
  @include('layouts.Navbar')
  <!-- Carousel -->
  @include("layouts.slider")
  <!-- Search Box -->
 @include('layouts.searchbox')

  <!--  -->
  @include("layouts.HeroSection")
  <!-- Services -->
  <section id="services" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">خدمات ما</h2>

      <div class="row" id="tourCards">
        <div class="col-md-6 col-lg-3 mb-4" data-destination="داخلی">
          <div class="card">
            <img src="{{ asset("slider/havefuninline.jpg") }}" class="card-img-top" alt="داخلی">
            <div class="card-body text-center">
              <h5 class="card-title">تور داخلی</h5>
              <p class="card-text">سفر به جاذبه‌های زیبای کشور با خدمات حرفه‌ای.</p>
              <a href="{{ route("DomesticTours.index") }}" class="btn btn-primary">مشاهده تورها</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 col-lg-3 mb-4" data-destination="خارجی">
          <div class="card">
            <img src="{{ asset("slider/outline.jpg") }}" class="card-img-top" alt="خارجی">
            <div class="card-body text-center">
              <h5 class="card-title">تور خارجی</h5>
              <p class="card-text">ماجراجویی در کشورهای زیبا و دیدنی با امکانات کامل.</p>
              <a href="{{ route("InternationalTour.index") }}" class="btn btn-primary">مشاهده تورها</a>
            </div>
          </div>

        </div>
        <div class="col-md-6 col-lg-3 mb-4" data-destination="زیارتی داخلی">
          <div class="card">
            <img src="{{ asset("slider/rezza.jpg") }}" class="card-img-top" alt="زیارتی داخلی">
            <div class="card-body text-center">
              <h5 class="card-title">تور زیارتی داخلی</h5>
              <p class="card-text">زیارت اماکن مقدس با هزینه مناسب و برنامه‌ریزی دقیق.</p>
              <a href="{{ route("Domesticpilgrimagetour.index") }}" class="btn btn-primary">مشاهده تورها</a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-4" data-destination="زیارتی خارجی">
          <div class="card">
            <img src="{{ asset("slider/karbala.jpg") }}" class="card-img-top" alt="زیارتی خارجی">
            <div class="card-body text-center">
              <h5 class="card-title">تور زیارتی خارجی</h5>
              <p class="card-text">سفرهای زیارتی بین‌المللی با پشتیبانی حرفه‌ای.</p>
              <a  href="{{ route("InternationalPilgrimageTour.index") }}" class="btn btn-primary">مشاهده تورها</a>
            </div>
          </div>
        </div>
    </div>
    </div>
  </section>

  <!-- About -->
 @include("layouts.AboutUS")

  <!-- Contact -->
  @include("layouts.ContactUS")

  <!-- Footer -->
  @include("layouts.Footer")

  <script src="{{ asset('js/styles.js') }}"></script>


</body>
</html>
