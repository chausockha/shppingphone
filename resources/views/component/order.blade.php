
@if($orders)	
<div class="table-responsive">			
	<table class="table table-hover">
		    <thead>
		      <tr>
		        <th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Hình ảnh</th>
				<th>Gía</th>
				<th>Số lượng</th>
				<th>Thành tiền</th>
				
		      </tr>
		    </thead>
		    <tbody>
		    	<?php $i=1 ?>
				@foreach($orders as $key => $value)
				<tr>
					<td>{{$i}}</td>
					<td> <a href="{{route('chitiet',[str_slug($value->product->pro_name ),$value->or_product_id])}}" target="_blank">{{ isset($value->product->pro_name) ? $value->product->pro_name : ''}}</a></td>
					 <td>
		        	<img src="\shopping_phone\public\img\{{$value->product->pro_avatar}}" class="img img-responsive" style="width: 80px; height: 80px">
		        </td>
					<td>{{number_format($value->or_price,0,',','.',)}} đ</td>
					<td>{{$value->or_qty}}</td>
					<td>{{number_format($value->or_qty * $value->or_price,0,',','.',)}} đ</td>
					
		   </tr>
		    
		    <?php $i++ ?>
		    @endforeach
		</tbody>
		  </table>
		</div>
@endif