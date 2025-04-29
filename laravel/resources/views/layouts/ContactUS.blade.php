<section id="contact" class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">تماس با ما</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('callus.link') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">نام</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phonenumber" class="form-label">شماره تماس</label>
                <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{ old('phonenumber') }}">
                @error('phonenumber')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">پیام</label>
                <textarea class="form-control" id="body" name="body" rows="4">{{ old('body') }}</textarea>
                @error('body')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">ارسال پیام</button>
        </form>
    </div>
</section>
