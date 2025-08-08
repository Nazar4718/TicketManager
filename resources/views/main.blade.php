<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Мої заявки</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">
    <h1>Sorted by priority</h1>
    <a href="{{route('admin.show', ['priority' => 'high'])}}">High</a>
    <a href="{{route('admin.show', ['priority' => 'medium'])}}">Medium</a>
    <a href="{{route('admin.show', ['priority' => 'low'])}}">Low</a>
<div class="container mx-auto py-10 px-4 max-w-3xl">
    <h1 class="text-3xl font-bold mb-6 text-center text-blue-700">Створити заявку</h1>

    <form action="{{ route('main.store') }}" method="POST" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf
        <div>
            <label class="block mb-1 font-medium">Заголовок</label>
            <input type="text" name="title" placeholder="title.." class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div>
            <label class="block mb-1 font-medium">Опис</label>
            <input type="text" name="description" placeholder="description.." class="w-full border border-gray-300 p-2 rounded">
        </div>

        <div>
            <label class="block mb-1 font-medium">Пріоритет</label>
            <select name="priority" id="priority" class="w-full border border-gray-300 p-2 rounded">
                <option value="low">Низький</option>
                <option value="medium">Середній</option>
                <option value="high">Високий</option>
            </select>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Надіслати</button>
        </div>
    </form>

    <h2 class="text-2xl font-bold mt-10 mb-4 text-center text-green-700">Ваші заявки</h2>

    @foreach($ticket as $item)
        <a href="{{route('comment.show', ['ticket_id' => $item->id])}}">
        <div class="bg-white p-5 rounded shadow-md mb-6 border-l-4
                        @if($item->priority === 'high') border-red-500
                        @elseif($item->priority === 'medium') border-yellow-500
                        @else border-green-500 @endif">

            <h3 class="text-xl font-semibold text-blue-800 mb-2">{{ $item->title }}</h3>

            <p><strong>Опис:</strong> {{ $item->description }}</p>
            <p><strong>Пріоритет:</strong> {{ $item->priority }}</p>
            <p><strong>Статус:</strong> {{ $item->status }}</p>
            <p><strong>Автор:</strong> {{ $item->user->name }} {{ $item->user->last_name }}</p>
            <p><em>Створено:</em> {{ $item->created_at }}</p>

            <div class="mt-4 pl-3 border-l-2 border-gray-300">
                <p class="font-semibold mb-2 text-gray-700">Коментарі:</p>

                @forelse($commentsByTicket[$item->id] as $key => $comment)
                    <div class="mb-2">
                        <p class="text-sm text-gray-800">💬 {{ $comment->message }}</p>
                        <p class="text-xs text-gray-500">— {{ $comment->user->name }}</p>
                    </div>
                @empty
                    <p class="text-sm italic text-gray-500">Коментарів ще немає</p>
                @endforelse
            </div>
            <div class="mt-4">
                <a href="{{ route('comment.index', ['ticket_id' => $item->id]) }}"
                   class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    ➕ Додати коментар
                </a>
            </div>
        </div>
        </a>
    @endforeach
</div>

</body>
</html>

