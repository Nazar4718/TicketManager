<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@foreach($tickets as $item)
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

</body>
</html>




