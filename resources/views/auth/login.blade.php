@extends('layout.master')

@section('content')
    <section class="flex items-center justify-center min-h-screen bg-[#FFF9F6] px-4">
        <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">

            <h2 class="text-2xl font-bold text-gray-700 mb-6 text-center">
                Login
            </h2>

            @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('auth.login') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" name="email" required
                        class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" required
                        class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Login
                </button>

            </form>

            <p class="text-center mt-4 text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-blue-600 font-semibold">Register</a>
            </p>

        </div>
    </section>
@endsection
