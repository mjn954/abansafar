<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ route('home.page') }}">آبان سفر</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('home.page') }}">خانه</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#services">خدمات</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#about">درباره ما</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#contact">تماس با ما</a></li>

                {{-- Social Icons --}}
                <li class="nav-item ms-3">
                    <a href="{{ route('telegram.link') }}" target="_blank"
                       class="d-inline-block p-1 bg-white rounded-circle">
                        <img src="{{ asset('icons/telegram.jpg') }}"
                             alt="Telegram"
                             class="d-block" style="width:1.5rem; height:1.5rem;">
                    </a>
                </li>
                <li class="nav-item ms-3">
                    <a href="{{ route('whatsapp.link') }}" target="_blank"
                       class="d-inline-block p-1 bg-white rounded-circle">
                        <img src="{{ asset('icons/whatapp.png') }}"
                             alt="WhatsApp"
                             class="d-block" style="width:1.5rem; height:1.5rem;">
                    </a>
                </li>
                <li class="nav-item ms-3">
                    <a href="{{ route('instagram.link') }}" target="_blank"
                       class="d-inline-block p-1 bg-white rounded-circle">
                        <img src="{{ asset('icons/instagram.jpg') }}"
                             alt="Instagram"
                             class="d-block" style="width:1.5rem; height:1.5rem;">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
