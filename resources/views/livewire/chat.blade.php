<div>
    <div>
        @foreach($messages as $message)
            <p><strong>{{ $message->user->name }}: </strong>{{ $message->message }}</p>
        @endforeach
    </div>

    <form wire:submit.prevent="sendMessage">
        <input type="text" wire:model='newMessage' placeholder="Mau chat apa?">
        @error('message') <span class="error">{{ $message }}</span> @enderror
        <button type="submit">Send</button>
    </form>
</div>