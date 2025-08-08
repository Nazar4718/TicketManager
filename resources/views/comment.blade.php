<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Додати коментар</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans text-gray-900">

<div class="container mx-auto max-w-xl py-10 px-4">
    <h2 class="text-3xl font-bold text-center text-blue-700 mb-8">📝 Коментар до заявки</h2>

    <div class="bg-white p-6 rounded shadow-md">
        <h3 class="text-xl font-semibold mb-4 text-gray-800">Заявка: "{{ $ticket->title }}"</h3>

        <form action="{{ route('comment.store', ['ticket_id' => $ticket->id]) }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="message" class="block font-medium mb-1">Ваш коментар:</label>
                <input type="text" name="message" id="message" placeholder="Введіть повідомлення..."
                       class="w-full border border-gray-300 p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="text-right">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    💬 Надіслати
                </button>
            </div>
        </form>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('main.index') }}" class="text-blue-600 hover:underline">&larr; Назад до заявок</a>
    </div>
</div>

</body>
</html>


