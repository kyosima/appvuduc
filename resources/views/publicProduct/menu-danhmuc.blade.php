<ul class="dropdown-menu">
    @foreach ($child_categories as $item)
        @if (count($item->categories) > 0)
            <li class="dropdown">
                <a class="nav-item" href="{{route('product.indexCategory', $item->slug)}}">{{$item->name}}</a>
                @include('publicProduct.menu-danhmuc', ['child_categories' => $item->childrenCategories])
            </li>
        @else 
            <li>
                <a class="nav-item" href="{{route('product.indexCategory', $item->slug)}}">{{$item->name}}</a>
            </li>
        @endif
    @endforeach
</ul>