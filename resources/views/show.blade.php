<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8" />
    <title>{{ $ticket->title }} — Коментарі</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

<main class="container mx-auto max-w-3xl p-6">

    <h1 class="text-3xl font-bold mb-8 text-center text-blue-700">{{ $ticket->title }}</h1>

    <section class="mb-10">
        <h2 class="text-2xl font-semibold mb-4 border-b border-blue-300 pb-2">Мої коментарі</h2>

        @forelse($comments as $comment)
            <article class="bg-white p-4 rounded shadow mb-4">
                <p class="text-gray-900">{{ $comment->message }}</p>
                <footer class="text-sm text-gray-500 mt-2">Автор: {{ $comment->user->name }}</footer>
            </article>
        @empty
            <p class="italic text-gray-500">У вас ще немає коментарів до цієї заявки.</p>
        @endforelse
    </section>

    <section>
        <h2 class="text-2xl font-semibold mb-4 border-b border-green-300 pb-2">Коментарі інших</h2>

        @forelse($itsNotMyComments as $comment)
            <article class="bg-white p-4 rounded shadow mb-4">
                <p class="text-gray-900">{{ $comment->message }}</p>
                <footer class="text-sm text-gray-500 mt-2">Автор: {{ $comment->user->name }}</footer>
            </article>
        @empty
            <p class="italic text-gray-500">Інші користувачі ще не залишили коментарів.</p>
        @endforelse
    </section>

</main>

</body>
</html>


