<a {{$attributes->merge([
"class" => "text-black hover:border hover:border-[".$dark_color."] transition p-2 rounded-lg"
])}}>
    {{$slot}}
</a>
