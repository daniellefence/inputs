@props(['variant' => 'text', 'name' => null, 'options' => [], 'label' => null])

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

    <div class="border rounded-md shadow-sm">
        <input id="{{ $name }}" type="hidden" name="{{ $name }}" value="{{ is_array(old($name)) ? '' : old($name) }}" {{ $attributes }}>
        <trix-editor input="{{ $name }}" class="min-h-[150px] bg-white border-none focus:outline-none focus:ring-0"></trix-editor>
    </div>
@elseif ($variant === 'textarea')
    <textarea name="{{ $name }}" {{ $attributes->merge(['class' => 'block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:outline-2 sm:text-sm/6']) }}></textarea>
@elseif ($variant === 'select')
    <select name="{{ $name }}" {{ $attributes->merge(['class' => 'form-select']) }}>
        @foreach ($options as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>
@else
    <input type="{{ $variant }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-input']) }}>
@endif