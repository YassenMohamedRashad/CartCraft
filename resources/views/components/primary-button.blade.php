<button type="submit" class="text-white bg-[{{$dark_color}}] w-full px-10 hover:border hover:border-[{{$dark_color}}] hover:bg-transparent hover:text-[{{$dark_color}}] transition p-2 rounded-lg" {{$attributes->merge([])}}>
    {{$slot}}
</button>
