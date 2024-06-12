<x-layout>
    <h1 class="title">Register a new account</h1>

    <div class="mx-auto max-w-screen-sm card">
        <form action="{{ route('register') }}" method="post">
            @csrf
            {{-- username --}}
            <div class="mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" class="input @error('username') ring-red-500 @enderror" value="{{ old('username')}}">
                @error('username')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Email --}}
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" class="input @error('email') ring-red-500 @enderror" value="{{ old('email')}}">
                @error('email')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            
            {{-- Password --}}
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="input @error('password') ring-red-500 @enderror">
                @error('password')
                    <p class="error">{{$message}}</p>
                @enderror
            </div>
            
            {{-- Confirm Password --}}
            <div class="mb-4">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" class="input @error('password') ring-red-500 @enderror">
                
            </div>
            
            {{-- Submit Button --}}
            <button class="btn">Register</button>

        </form>
    </div>
</x-layout>