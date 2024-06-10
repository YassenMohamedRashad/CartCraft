@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(["class" => "p-2 bg-white border border-gray-500 rounded-lg shadow-lg focus:shadow-2xl focus:scale-105  transition-all"]) }}>
