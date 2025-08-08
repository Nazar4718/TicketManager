<div class="max-w-5xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-8">Tickets by Priority</h1>

    @if(count($tickets) > 0)
        <div class="space-y-6">
            @foreach($tickets as $ticket)
                <div class="bg-white shadow rounded-lg p-6 border">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-xl font-semibold">{{ $ticket->title }}</h2>
                            <p class="text-sm text-gray-600">Created by: {{ $ticket->user->name ?? 'Unknown' }}</p>
                            <p class="text-sm text-gray-600">Priority: <span class="font-bold text-red-500">{{ $ticket->priority }}</span></p>
                        </div>
                        <div>
                            <span class="text-xs text-gray-500">{{ $ticket->created_at->format('Y-m-d H:i') }}</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <p class="text-gray-800">{{ $ticket->message }}</p>
                    </div>

                    {{-- Comments --}}
                    @php $comments = $commentsByTicket[$ticket->id] ?? [] @endphp

                    <div class="mt-6">
                        <h3 class="text-md font-medium mb-2">Comments ({{ count($comments) }})</h3>
                        @if(count($comments) > 0)
                            <ul class="space-y-2">
                                @foreach($comments as $comment)
                                    <li class="bg-gray-100 rounded p-3 text-sm">
                                        <div class="flex justify-between">
                                            <span class="font-semibold">{{ $comment->user->name ?? 'Anonymous' }}</span>
                                            <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p class="mt-1">{{ $comment->content }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500 text-sm">No comments yet.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-600 text-center">No tickets found for this priority.</p>
    @endif
</div>
