@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 hover:shadow-inner focus:border-[#3674B5] focus:ring-[#3674B5] rounded-md shadow-sm']) }}>
