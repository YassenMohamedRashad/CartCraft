@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(["class" => "p-2 bg-white outline-none rounded-lg focus:border-sky-900 focus:shadow-2xl focus:border-2 focus:border-[#426C8C] transition-all"]) }}>
