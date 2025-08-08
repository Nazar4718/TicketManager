<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Логін</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">

<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">

        <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">🔐 Вхід у систему</h2>

        <form action="{{ route('login.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block mb-1 font-medium">Імʼя</label>
                <input type="text" id="name" name="name" placeholder="Введіть імʼя"
                       class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="password" class="block mb-1 font-medium">Пароль</label>
                <input type="password" id="password" name="password" placeholder="Введіть пароль"
                       class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="text-right">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Увійти
                </button>
            </div>
        </form>

        <p class="mt-6 text-sm text-center text-gray-600">
            Не маєте акаунту?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Зареєструватися</a>
        </p>

    </div>
</div>

</body>
</html>

