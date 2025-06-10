@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 bg-green-50 px-4 py-3 rounded-md mb-4']) }}>
        {{ $status }}
    </div>
@endif
