<div>

    <ul>
        @foreach($industry->commodities as $commodity)
           <li>
               {{$commodity->name}}
           </li>
        @endforeach
    </ul>
</div>
