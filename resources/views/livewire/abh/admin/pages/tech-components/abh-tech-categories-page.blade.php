<div>
    <ul>
        @foreach($industry->categories as $category)
            <li>
                {{$category->name}}
            </li>
        @endforeach
    </ul>
</div>
