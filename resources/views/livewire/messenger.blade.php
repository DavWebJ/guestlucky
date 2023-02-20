<div class="list-group font-size-sm">
        @if ($messages ?? 'aucun message')
        @foreach ($messages as $message)
    <a class="list-group-item list-group-item-action" href="{{ route('messages.show',$message->id) }}">
        @if( $message->read == 0)
        <span class="badge badge-pill badge-dark m-1 float-right">unread</span>
        @else
        <span class="badge badge-pill badge-success m-1 float-right">read</span>
        @endif
        <p class="font-size-h6 font-w700 mb-0">
            Message from 
        </p>
        <p class="text-muted mb-2">
            {{ Str::limit($message->message,$limit = 100, $end = '...')}}
        </p>
        <p class="font-size-sm text-muted mb-0">
            <strong>{{ $message->booking->firstname ?? '' }}</strong> <strong>{{ $message->booking->lastname ?? '' }}</strong>, {{ \Carbon\Carbon::parse($message->time)->diffForHumans() }}
        </p>
    </a>
    @endforeach
    @endif
</div>
