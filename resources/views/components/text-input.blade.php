@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 text-[#4b2e2b] placeholder:text-gray-400 bg-white focus:border-[#c06c52] focus:ring-[#c06c52] rounded-md shadow-sm']) }}>
