<tr class="checkout-shipping-method">
    <th>
        <div class="form-check ml-2">
            <label class="form-check-label">
                <input type="radio" checked id="shipping-ems" data-method="EMS" class="form-check-input" name="in_shipping" value="{{$EMS}}">Chuyển phát nhanh
            </label>
        </div>
        
    </th>
    <td><span class="amount">{{number_format($EMS)}}₫</span></td>
</tr>
<tr class="checkout-shipping-method ">
    <th>
        <div class="form-check ml-2">
            <label class="form-check-label">
                <input type="radio" id="shipping-bk" data-method="BK" class="form-check-input" name="in_shipping" value="{{$BK}}">Chuyển phát thường
            </label>
        </div>
        
    </th>
    <td><span class="amount">{{number_format($BK)}}₫</span></td>
</tr>