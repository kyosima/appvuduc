@if (count($child_category->categories) > 0)
    <option value="{{$child_category->id}}">{{$subMask}}{{$child_category->name}}</option>
    @foreach ($child_category->categories as $childCategory)
        @include('admin.productCategory.option_child_category', ['child_category' => $childCategory, 'subMask' => $subMask . '--'])
    @endforeach
@else
    <option value="{{$child_category->id}}">{{$subMask}}{{$child_category->name}}</option>
@endif
