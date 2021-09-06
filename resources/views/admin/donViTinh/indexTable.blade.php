@foreach ($calculationUnit as $item)
    <tr>
        <td>{{ $index }} </td>
        <td><a style="text-decoration: none; cursor: pointer;" data-route="{{route('don-vi-tinh.modalEdit')}}" data-unitid="{{$item->id}}" class="modal-edit-unit">{{ $item->code }} </a></td>
        <td><a style="text-decoration: none; cursor: pointer;" data-route="{{route('don-vi-tinh.modalEdit')}}" data-unitid="{{$item->id}}" class="modal-edit-unit">{{ $item->name }}</a></td>
        <td></td>
        <td>
            <div class="input-group" style="min-width: 107px;">
                @if ($item->status == 1)
                    <span style=" max-width: 82px;min-width: 82px;" type="text"
                        class="form-control form-control-sm font-size-s text-white active text-center"
                        aria-label="Text input with dropdown button">Hoạt động</span>
                    <button class="btn bg-status-drop border-0 text-white py-0 px-2" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-down"
                            aria-hidden="true"></i></button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        {{-- <li><a class="dropdown-item item-inactive" href="#">Ngừng</a></li> --}}
                        <li>
                            <form action="{{ route('don-vi-tinh.updateStatus', $item->id) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="unitStatus" value="0">
                                <button type="submit" class="dropdown-item">Ngừng</button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ route('don-vi-tinh.delete', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="dropdown-item"
                                    onclick="confirm('Bạn có chắc muốn xóa');">Xoá</button>
                            </form>
                        </li>
                    </ul>
                @else
                    <span style=" max-width: 82px;min-width: 82px;" type="text"
                        class="form-control form-control-sm font-size-s text-white stop text-center"
                        aria-label="Text input with dropdown button">Ngừng</span>
                    <button class="btn bg-status-drop border-0 text-white py-0 px-2" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-down"
                            aria-hidden="true"></i></button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        {{-- <li><a class="dropdown-item item-active" href="#">Hoạt động</a></li> --}}
                        <li>
                            <form action="{{ route('don-vi-tinh.updateStatus', $item->id) }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" name="unitStatus" value="1">
                                <button type="submit" class="dropdown-item">Hoạt động</button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ route('don-vi-tinh.delete', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="dropdown-item"
                                    onclick="confirm('Bạn có chắc muốn xóa');">Xoá</button>
                            </form>
                        </li>
                        {{-- <li><a class="dropdown-item item-delete" href="#" onclick="confirm('Bạn có chắc muốn xóa');">Xoá</a></li> --}}
                    </ul>

                @endif

            </div>
        </td>
    </tr>

    @php
        $index++;
    @endphp

@endforeach
