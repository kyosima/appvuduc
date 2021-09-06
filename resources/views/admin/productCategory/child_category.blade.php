@if (count($child_category->categories) > 0)
    <tr class="child-category has-child" data-categoryid="{{$child_category->id}}" data-parentcat="{{$child_category->category_parent}}">
        <td><i class="fa fa-plus click-cell" aria-hidden="true"></td>
        <td>{{ $child_category->code }}</td>
        <td><a style="text-decoration: none;" href="">{{ $child_category->name }}</a></td>
        <td><button class="btn btn-circle">{{ count($child_category->categories) }}</button></td>
        <td>
            <div class="input-group" style="min-width: 108px;">
                <span style=" max-width: 82px;min-width: 82px;" type="text"
                    class="form-control form-control-sm font-size-s text-white active text-center"
                    aria-label="Text input with dropdown button">Hoạt động</span>
                <button class="btn bg-status-drop border-0 text-white py-0 px-2" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Ngừng</a></li>
                    <li><a class="dropdown-item" href="#">Xoá</a></li>
                </ul>
            </div>
        </td>
    </tr>
    @foreach ($child_category->categories as $childCategory)
        @include('admin.productCategory.child_category', ['child_category' => $childCategory])
    @endforeach
@else
    <tr class="child-category" data-parentcat="{{$child_category->category_parent}}">
        <td></td>
        <td>{{ $child_category->code }}</td>
        <td><a style="text-decoration: none;" href="">{{ $child_category->name }}</a></td>
        <td><button class="btn btn-circle">0</button></td>
        <td>
            <div class="input-group" style="min-width: 108px;">
                <span style=" max-width: 82px;min-width: 82px;" type="text"
                    class="form-control form-control-sm font-size-s text-white active text-center"
                    aria-label="Text input with dropdown button">Hoạt động</span>
                <button class="btn bg-status-drop border-0 text-white py-0 px-2" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Ngừng</a></li>
                    <li><a class="dropdown-item" href="#">Xoá</a></li>
                </ul>
            </div>
        </td>
    </tr>
@endif
