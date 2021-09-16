<x-header_admin />
	<link rel="stylesheet" href="{{asset('/resources/css/khuyenmai.css')}}">
	
  	<section class="home-section">
		<div class="header bg-white shadow-sm header_mobile">
			<div class="text">Dashboard</div>
			<div class="icon_menu-mobile">
				<i class="fa fa-bars" data-bs-toggle="collapse" href="#menu-main" role="button" aria-expanded="false" aria-controls="menu-main"></i>
			</div>
		</div>
		  <ul class="sub-menu collapse sidebar-mobile list-group list-group-flush" id="menu-main">
			  <li class="list-group-item p-0 list-group-item-action">
				  <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Dashboard</a>
			  </li>
			  <li class="list-group-item p-0 list-group-item-action">
				  <span class="list-group-item-link p-3" data-bs-toggle="collapse" href="#menu-mobile-doitac" role="button" aria-expanded="false" aria-controls="menu-mobile-doitac"><i class="fa fa-bar-chart-o"></i> Quản lý đối tác <i class="fa fa-angle-down fs-4 float-end"></i></span>
				  <ul class="p-0 menu-child collapse" id="menu-mobile-doitac">
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="doinhom.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Đội nhóm</a>
					  </li>
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="canhan.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Cá nhân</a>
					  </li>
					  <li class="list-group-item p-0 list-group-item-action">
						  <a href="thontinbanhang.html" class="list-group-item-link list-item-custom px-5"><i class="fa fa-bar-chart-o"></i> Thông tin bán hàng</a>
					  </li>
				  </ul>
			  </li>
			  <li class="list-group-item p-0 list-group-item-action">
				  <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Quản lý nhân viên</a>
			  </li>
			  <li class="list-group-item p-0 list-group-item-action">
				  <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Quản lý sản phẩm</a>
			  </li>
			  <li class="list-group-item p-0 list-group-item-action">
				  <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Bán hàng</a>
			  </li>
			  <li class="list-group-item p-0 list-group-item-action">
				  <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Tồn kho</a>
			  </li>
			  <li class="list-group-item p-0 list-group-item-action">
				  <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Dữ liệu Master</a>
			  </li>
			  <li class="list-group-item p-0 list-group-item-action">
				  <a href="#" class="list-group-item-link p-3"><i class="fa fa-bar-chart-o"></i> Setting</a>
			  </li>
		  </ul>
		</div>


    <!-- Modal -->
    <div class="modal fade" id="warehouse_create" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fas fa-anchor"></i> Thông tin chi nhánh NPP </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="formCreateUnit" action="{{ route('warehouse.store') }}"
                        role="form" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Mã chi nhánh:<span class="required"
                                        aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="warehouseCode" class="form-control" required
                                        value="{{ old('warehouseCode') }}">
                                </div>
                            </div>
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Tên chi nhánh NPP:<span class="required"
                                        aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="warehouseName" class="form-control" required
                                        value="{{ old('warehouseName') }}">
                                </div>
                            </div>
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Địa chỉ kho:<span class="required"
                                    aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="warehouseAddress" class="form-control" required
                                        value="{{ old('warehouseAddress') }}">
                                </div>
                            </div>
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Thành phố:<span class="required"
                                    aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <select class="js-location" id="selectCity" name="id_province" data-type="city">
                                        <option value="-1">Chọn thành phố</option>
                                        @foreach ($cities as $city)
                                            <option value="{{$city->matinhthanh}}">{{$city->matinhthanh}} - {{$city->tentinhthanh}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Quận/ huyện:<span class="required"
                                aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <select class="js-location" id="selectDistrict" name="id_district" data-type="district">
                                        <option value="-1">Chọn quận/huyện</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Phường/ Xã:<span class="required"
                                    aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <select id="selectWard" name="id_ward" data-type="ward">
                                        <option value="-1">Chọn phường/xã</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Sản phẩm<span class="required"
                                        aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <select name="product" class="form-control productId">
                                        <option value="-1" selected>Chọn sản phẩm</option>
                                        @foreach ($products as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group d-flex mb-2">
                                <label class="col-md-3 control-label">Số lượng:<span class="required"
                                        aria-required="true">(*)</span></label>
                                <div class="col-md-9">
                                    <input type="number" name="productQuantity" class="form-control" required
                                        value="{{ old('productQuantity', 1) }}" min="1">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="btn btn-info btn-submit-unit">Lưu</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- END MODAL -->

		<div class="m-3">
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
                            @if ($errors->any())
                                <div class="bg-danger p-2 mb-2">
                                    <p class="text-light m-0">{{$errors->first()}}</p>
                                </div>
                            @elseif(session('success'))    
                                <div class="bg-success p-2 mb-2">
                                    <p class="text-light m-0">{{session('success')}}</p>
                                </div>
                            @endif
							<ul class="list-group list-group-flush">
									<div class="d-flex justify-content-between align-items-center">
										<p>
											<span class="caption-subject"><i class="far fa-hourglass"></i> DANH SÁCH TỒN KHO</span>
											<a href="#warehouse_create" data-toggle="modal" class="btn btn_success"><i
                                                class="fa fa-plus"></i> Thêm mới kho hàng</a>
											{{-- <button class="btn btn_success"><i class="fas fa-plus"></i> Import</button> --}}
										</p>
	
										<span>
											<span data-bs-toggle="collapse" href="#collapseExample" role="button"
												aria-expanded="false" aria-controls="collapseExample">
												<i class="fas fa-chevron-down"></i>
											</span>&nbsp;
											<span style="cursor: pointer;" onclick="window.location.reload();"><i class="fas fa-sync-alt"></i></span>
										</span>
									</div>
							</ul>
                            <div class="collapse show" id="collapseExample">

                                {{-- <div class="row g-2">
                                    <div class="col-sm-1">
                                        <select class="form-select" name="" id="">
                                            <option value="">10</option>
                                            <option value="">20</option>
                                            <option value="">30</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="dropdown">
                                            <button class="form-select" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Chi nhánh NPP
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <input type="text" class="form-control" name=""
                                                            id="">
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Perfectone Ha Noi(VINMART_MB)</a></li>


                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 mb-3">
                                        <div class="dropdown">
                                            <button class="form-select" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Kho
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <input type="text" class="form-control" name=""
                                                            id="">
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Product</a></li>
                                                <li><a class="dropdown-item" href="#">Exhibit</a></li>
                                                <li><a class="dropdown-item" href="#">Promotion</a></li>
                                                <li><a class="dropdown-item" href="#">POSM</a></li>


                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="dropdown">
                                            <button class="form-select" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Sản phẩm
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <input type="text" class="form-control" name=""
                                                            id="">
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>


                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="dropdown">
                                            <button class="form-select" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Ngành hàng
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">
                                                        <input type="text" class="form-control" name=""
                                                            id="">
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>
                                                <li><a class="dropdown-item" href="#">Đèn sưởi nhà tắm (2 bóng) model KG256(KG256)</a></li>


                                            </ul>
                                        </div>
                                    </div>

                                </div> --}}

                                <div class="row">
                                    <div class="col-sm-12" style="overflow-x: auto;">
                                        <table id="warehouse_table" class="table table-hover align-middle">
                                            <thead>
                                                <tr>
                                                    <th class="title">STT</th>
                                                    <th class="title">Mã chi nhánh NPP</th>
                                                    <th class="title">Tên chi nhánh NPP</th>
                                                    <th class="title">Loại kho</th>
                                                    <th class="title">Model</th>
                                                    <th class="title">Tên sản phẩm</th>
                                                    <th class="title">Đơn vị tính</th>
                                                    <th class="title">Nhóm sản phẩm</th>
                                                    <th class="title">Ngành hàng</th>
                                                    <th class="title">Số lượng tồn kho</th>
                                                    <th class="title">Thời gian</th>
                                                    <th class="title">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: #748092; font-size: 14px;">
                                                @foreach ($warehouses as $item)
                                                    @foreach ($item->products as $product)
                                                    <tr>
                                                        <td>{{$index}}</td>
                                                        <td>{{$item->code}}</td>
                                                        <td>{{$item->name}}</td>
                                                        <td>Promotion</td>
                                                        <td>PerfectCream01</td>
                                                        <td>{{$product->name}}</td>
                                                        <td>{{$product->productCalculationUnit->name}}</td>
                                                        @if ($product->productCategory->typeof_category == 2)
                                                            <td>{{$product->productCategory->parentCategories->name}}</td>
                                                            <td>{{$product->productCategory->parentCategories->megaParentCategories->name}}</td>
                                                        @else
                                                            <td>{{$product->productCategory->name}}</td>
                                                            <td>{{$product->productCategory->parentCategories->name}}</td>
                                                        @endif
                                                        <td>{{$product->getOriginal('pivot_quantity')}}</td>
                                                        <td>{{$product->getOriginal('pivot_created_at')}}</td>
                                                        <td>
                                                            <button class="btn modal-edit-unit" data-route="{{route('warehouse.modalEdit')}}"
                                                            data-productid="{{$product->id}}"
                                                            data-warehouseid="{{$item->id}}">
                                                                <i class="fas fa-pen"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <?php $index++; ?>
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<script>
    $('#warehouse_table').DataTable({
        ordering: false,
        columnDefs: [
            { "type": "string", "targets": [10] },
            { "type": "html", "targets": [1, 2, 5, 7, 8] },
            { "orderable": true, "targets": 10 },
        ],
		searchBuilder: {
			conditions: {
				num: {
					'!between': null,
					'between': null,
					'!=': null,
					'<': null,
					'>': null,
					'<=': null,
					'>=': null,
                    'null': null,
                    '!null': null,
				},
				string: {
					'!=': null,
					'=': null,
                    'null': null,
                    '!null': null,
				},
                html: {
                    '!=': null,
                    'null': null,
                    '!null': null,
                    'contains': null,
                },
			}
		},
		language: {
            searchBuilder: {
                add: 'Tạo bộ lọc',
                condition: 'Điều kiện',
                clearAll: 'Reset',
                deleteTitle: 'Delete',
                data: 'Cột',
                leftTitle: 'Left',
                logicAnd: 'VÀ',
                logicOr: 'HOẶC',
                rightTitle: 'Right',
                title: {
                    0: '',
                    _: 'Kết quả lọc (%d)'
                },
                value: 'Giá trị',
                valueJoiner: 'et',
                conditions :{
                        number: {
                            equals: '=',
                        },
                        string: {
                            contains: '=',
                            startsWith: 'Bắt đầu bằng ký tự',
                            endsWith: 'Kết thúc bằng ký tự',
                        },
                        html: {
                            equals: '=',
                            startsWith: '',
                            endsWith: '',
                        },
                    },
            },
			search: "Tìm kiếm:",
			lengthMenu: "Hiển thị _MENU_ kết quả",
			info: "Hiển thị _START_ đến _END_ trong _TOTAL_ kết quả",
			infoEmpty: "Hiển thị 0 trên 0 trong 0 kết quả",
			zeroRecords: "Không tìm thấy",
			emptyTable: "Hiện tại chưa có dữ liệu",
			paginate: {
				first: ">>",
				last: "<<",
				next: ">",
				previous: "<"
			},
        },
        dom: '<Q><"wrapper d-flex justify-content-between mb-3"lf>tip',
    });

    $(document).ready(function () {
        $("form").validate({
            rules: {
                warehouseCode: {
                    required: true,
                },
                warehouseName: {
                    required: true,
                },
                warehouseAddress: {
                    required: true,
                },
                product: {
                    required: true,
                },
                productQuantity: {
                    required: true,
                    min: 1,
                },
            },
            messages: {
                warehouseCode: "Không được để trống",
                warehouseName: "Không được để trống",
                warehouseAddress: "Không được để trống",
                product: "Không được để trống",
                productQuantity: "Không được để trống",
            }
        });

        $('#warehouse_create select').select2({
            width: '100%',
            dropdownParent: $('#warehouse_create')
        })

        $('.js-location').change(function(e) {
            e.preventDefault();
            let route = '{{route('warehouse.getLocation')}}';
            let type = $(this).attr('data-type');
            let parentId = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: route,
                data: {
                    type: type,
                    parent: parentId
                },
                success: function(response) {
                    if(response.data){
                        let html = '';
                        let element = '';
                        if(type == 'city'){
                            html = "<option>Mời bạn chọn Quận/Huyện</option>";
                            element = '#selectDistrict';
                            $.each(response.data, function(idx, val){
                                html += "<option value='"+val.maquanhuyen+"'>"+val.maquanhuyen+" - "+val.tenquanhuyen+"</option>"; 
                            });
                            $(element).html('').append(html);
                        }
                        else {
                            html = "<option>Mời bạn chọn Phường/Xã</option>";
                            element = '#selectWard';
                            $.each(response.data, function(idx, val){
                                html += "<option value='"+val.maphuongxa+"'>"+val.maphuongxa+" - "+val.tenphuongxa+"</option>"; 
                            });
                            $(element).html('').append(html);
                        }
                        
                    }
                }
            });
        });

        $(document).on('change', '.js-edit-location', function(e){
            e.preventDefault();
            let route = '{{route('warehouse.getLocation')}}';
            let type = $(this).attr('data-type');
            let parentId = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "GET",
                url: route,
                data: {
                    type: type,
                    parent: parentId
                },
                success: function(response) {
                    if(response.data){
                        let html = '';
                        let element = '';
                        if(type == 'city'){
                            html = "<option>Mời bạn chọn Quận/Huyện</option>";
                            element = '#select-editDistrict';
                            $.each(response.data, function(idx, val){
                                html += "<option value='"+val.maquanhuyen+"'>"+val.maquanhuyen+" - "+val.tenquanhuyen+"</option>"; 
                            });
                            $(element).html('').append(html);
                            $('#select-editWard').html('');
                        }
                        else {
                            html = "<option>Mời bạn chọn Phường/Xã</option>";
                            element = '#select-editWard';
                            $.each(response.data, function(idx, val){
                                html += "<option value='"+val.maphuongxa+"'>"+val.maphuongxa+" - "+val.tenphuongxa+"</option>"; 
                            });
                            $(element).html('').append(html);
                        }
                        
                    }
                }
            });
        })

        // SHOW MODAL WHEN CLICK ELEMENT TO UPDATE
        $(document).on('click', '.modal-edit-unit', function () {
            $.ajax({
                type: "GET",
                url: $(this).data('route'),
                data: {
                    warehouse_id: $(this).data('warehouseid'),
                    product_id: $(this).data('productid'),
                },
                success: function (response) {
                    $('#warehouse_create').after(response.html)
                    $('#calculation_unit_update').modal('show')
                    $('#calculation_unit_update select').select2({
                        width: '100%',
                        dropdownParent: $('#calculation_unit_update')
                    })
                }
            });
        })

        $('body').click(function (e) {
            if (!$('#calculation_unit_update').hasClass('show')) {
                $('#calculation_unit_update').remove();
            }
        });
    });

    function destroyModal() {
        $('#calculation_unit_update').remove();
    }

</script>

<x-footer_admin />