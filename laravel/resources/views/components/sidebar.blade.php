<aside class="w-64 bg-white shadow-2xl p-6 flex flex-col space-y-8 rounded-tr-3xl rounded-br-3xl">
    <h2 class="text-2xl font-extrabold text-purple-700">پنل مدیریت</h2>
    <nav class="flex flex-col space-y-3">
        <a href="{{ route('home') }}" class="flex items-center gap-2 text-gray-700 hover:text-white hover:bg-purple-500 rounded-xl px-4 py-2 transition-all">📊 <span>داشبورد</span></a>
        <a href="{{ route('index.insidetors') }}" class="flex items-center gap-2 text-gray-700 hover:text-white hover:bg-purple-500 rounded-xl px-4 py-2 transition-all">🏕️ <span>تورهای داخلی</span></a>
        <a href="{{ route('Outlinetors.index') }}" class="flex items-center gap-2 text-gray-700 hover:text-white hover:bg-purple-500 rounded-xl px-4 py-2 transition-all">✈️ <span>تورهای خارجی</span></a>
        <a href="{{ route("index.inssideholytors") }}" class="flex items-center gap-2 text-gray-700 hover:text-white hover:bg-purple-500 rounded-xl px-4 py-2 transition-all">🕌 <span>زیارتی داخلی</span></a>
        <a href="{{ route("outsideholytors.index") }}" class="flex items-center gap-2 text-gray-700 hover:text-white hover:bg-purple-500 rounded-xl px-4 py-2 transition-all">🕋 <span>زیارتی خارجی</span></a>
        <a href="{{ route("callus.index") }}" class="flex items-center gap-2 text-gray-700 hover:text-white hover:bg-purple-500 rounded-xl px-4 py-2 transition-all">📞 <span>تماس با ما </span></a>
    </nav>
</aside>
