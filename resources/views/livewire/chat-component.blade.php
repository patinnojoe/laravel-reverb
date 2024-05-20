<div>

    @foreach ($convo as $item)
        <h6 style="color: green">{{ $item['username'] }}</h6>: <span>{{ $item['message'] }}</span>
    @endforeach
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <form wire:submit.prevent="submitMessage">
        {{-- <x-text-input type='text' wire:modal="message" /> --}}
        <input type="text" wire:model="message" style="color:black" />
        <button type="submit">Send</button>
    </form>
</div>
