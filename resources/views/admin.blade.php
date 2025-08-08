<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel – Заявки</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900 font-sans">

<div class="container mx-auto py-10 px-4 max-w-4xl">
    <h1 class="text-4xl font-bold text-center text-red-700 mb-10">🛠️ Admin Panel</h1>

    @foreach($ticket as $item)
        <div class="bg-white p-6 rounded-lg shadow-md mb-6 border-l-4
                @if($item->priority === 'high') border-red-500
                @elseif($item->priority === 'medium') border-yellow-500
                @else border-green-500 @endif">

            <h2 class="text-2xl font-semibold text-blue-700 mb-2">{{ $item->title }}</h2>

            <p><span class="font-medium">Опис:</span> {{ $item->description }}</p>

            <p><span class="font-medium">Пріоритет:</span>
                <span class="uppercase">{{ $item->priority }}</span>
            </p>

            <p><span class="font-medium">Статус:</span> {{ $item->status }}</p>

            <p><span class="font-medium">Автор:</span> {{ $item->user->name }} {{ $item->user->last_name }}</p>

            <p class="text-sm text-gray-500"><em>Створено:</em> {{ $item->created_at }}</p>

            <div class="mt-4">
                <a href="{{ route('comment.index', ['ticket_id' => $item->id]) }}"
                   class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    ➕ Додати коментар
                </a>
            </div>
            <div class="mt-4">
                <form action="{{ route('admin.destroy', ['ticket_id' => $item->id]) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                        🗑️ Delete Ticket
                    </button>
                </form>
            </div>
        </div>
    @endforeach

    @if($ticket->isEmpty())
        <p class="text-center text-gray-500 text-lg">Заявок поки що немає.</p>
    @endif
</div>
</div>
</body>
</html>

