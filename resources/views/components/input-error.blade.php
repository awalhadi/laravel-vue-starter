@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'list-group']) }}>
        @foreach ((array) $messages as $message)
            <li class="list-group-item list-group-item-danger">{{ $message }}</li>
        @endforeach
    </ul>
@endif
