@props(['variant' => 'text', 'name' => null, 'options' => [], 'label' => null, 'size' => null])

@php
    $sizeClass = match ($size) {
        'xs' => 'input-xs',
        'sm' => 'input-sm',
        'md' => 'input-md',
        'lg' => 'input-lg',
        'xl' => 'input-xl',
        default => '',
    };
@endphp

@if ($label)
    <label for="{{ $name }}" class="block mb-1 font-medium text-sm text-gray-700">{{ $label }}</label>
@endif

@if ($variant === 'fulltext')
    @once
    @push('styles')
        <link rel="stylesheet" href="{{ url('/df-inputs/css') }}">
        <style>
            .trix-button--icon-strike,
            .trix-button--icon-link,
            .trix-button--icon-quote,
            .trix-button--icon-code,
            .trix-button--icon-attach,
            .trix-button-group--file-tools{
                display: none !important;
            }

        </style>
    @endpush

    @push('scripts')
        <script src="{{ url('/df-inputs/js') }}"></script>
        <script>
            document.addEventListener("trix-change", function(event) {
                const input = event.target.input;
                const model = input?.getAttribute('wire:model');
                if (model && window.livewire) {
                    const componentId = input.closest('[wire\\:id]')?.getAttribute('wire:id');
                    window.livewire.find(componentId)?.set(model, input.value);
                }
            });
        </script>
    @endpush
    @endonce

    <div class=" {{ $sizeClass }} p-0">
        <input id="{{ $name }}" type="hidden" name="{{ $name }}" value="{{ is_array(old($name)) ? '' : old($name) }}" {{ $attributes }}>
        <trix-editor input="{{ $name }}" class="trix-content w-full {{ $sizeClass }} min-h-[150px] bg-white border-none focus:outline-none focus:ring-0"></trix-editor>
    </div>
@elseif ($variant === 'textarea')
    <textarea name="{{ $name }}" {{ $attributes->merge(['class' => "textarea textarea-bordered w-full $sizeClass"]) }}></textarea>
@elseif ($variant === 'select')
    <select name="{{ $name }}" {{ $attributes->merge(['class' => "select select-bordered w-full $sizeClass"]) }}>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>
@elseif ($variant === 'date')
    <input type="date" name="{{ $name }}" {{ $attributes->merge(['class' => "input input-bordered w-full $sizeClass"]) }}>
@elseif ($variant === 'time')
    <input type="time" name="{{ $name }}" {{ $attributes->merge(['class' => "input input-bordered w-full $sizeClass"]) }}>
@elseif ($variant === 'number')
    <input type="number" name="{{ $name }}" {{ $attributes->merge(['class' => "input input-bordered w-full $sizeClass"]) }}>
@elseif ($variant === 'tel')
    <input type="tel" name="{{ $name }}" {{ $attributes->merge(['class' => "input input-bordered w-full $sizeClass"]) }}>
@elseif ($variant === 'url')
    <input type="url" name="{{ $name }}" {{ $attributes->merge(['class' => "input input-bordered w-full $sizeClass"]) }}>
@else
    <input type="{{ $variant }}" name="{{ $name }}" {{ $attributes->merge(['class' => "input input-bordered w-full $sizeClass"]) }}>
@endif