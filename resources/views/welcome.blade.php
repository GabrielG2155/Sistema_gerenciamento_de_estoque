<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - {{ config('app.name', 'Sistema de Estoque') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-200 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-8">
        
        
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Acessar o Sistema</h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Gestão de Estoque</p>
        </div>

        @auth
            
            <div class="text-center space-y-4">
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Você já está conectado como <strong class="text-gray-900 dark:text-white">{{ Auth::user()->name }}</strong>.
                </p>
                <a href="{{ url('/dashboard') }}" class="w-full inline-flex justify-center items-center px-4 py-2.5 rounded-lg bg-indigo-600 text-white font-medium hover:bg-indigo-500 transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Ir para o Dashboard
                </a>
            </div>
        @else
            
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                
                <div>
                    <label for="email" class="block text-sm font-medium mb-1">E-mail</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full px-3.5 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition text-sm">
                    @error('email')
                        <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <label for="password" class="block text-sm font-medium">Senha</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs text-indigo-600 dark:text-indigo-400 hover:underline">
                                Esqueceu a senha?
                            </a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password" required
                        class="w-full px-3.5 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition text-sm">
                    @error('password')
                        <span class="text-xs text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600 dark:text-gray-400">Lembrar de mim</label>
                </div>

                <!-- Botão de Entrar -->
                <button type="submit" class="w-full py-2.5 px-4 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white font-medium text-sm transition focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Entrar
                </button>
            </form>

            
            @if (Route::has('register'))
                <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700 text-center text-sm">
                    <span class="text-gray-500 dark:text-gray-400">Ainda não tem uma conta?</span>
                    <a href="{{ route('register') }}" class="ml-1 text-indigo-600 dark:text-indigo-400 font-semibold hover:underline">
                        Cadastre-se
                    </a>
                </div>
            @endif
        @endauth

    </div>

</body>
</html>