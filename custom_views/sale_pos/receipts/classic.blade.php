<!-- business information here -->
<style type="text/css"0>

	@media print {
  
table.table-slim >thead >tr.border-top
{
	border-top: 1px dotted;
}

table.table-slim >thead >tr.border-bottom
{
	border-bottom: 1px dotted;
}

table.table-slim >thead >tr.border-top > th {
	border:none;
}

table.table-slim >thead >tr.border-bottom > th {
	border:none;
}

table.table-slim >tbody >tr > td {
	border:none;
}

table.table-slim >tbody >tr.border-top
{
	border-top: 1px dotted;
}

table.table-slim >tbody >tr.font-large
{
	font-weight: bold;
	font-size: large;
}

table.table-slim >tbody >tr.border-top-bottom
{
	border-top: 1px dotted;
	border-bottom: 1px dotted;
	margin-bottom:10px;
	font-weight: bold;
	font-size: large;

}

table.table-slim > tbody > tr.border-top > td > table >tbody >tr
{

	font-size: large;
	
}

table.table-slim > tbody > tr > td > table >tbody >tr >td.text-right
{

	text-align: right;
}

table.table-slim > tbody > tr > td > table >tbody >tr >td.text-center-top
{
	
	text-align: center;
	padding: 15px;
}

table.tax-table
{
	border-collapse: collapse;
}

table.tax-table td
{
	border:1px solid;
}

table.table-table-border > tbody > tr.border-top-bottom
{
	border-top: 1px dotted;
	border-bottom: 1px dotted;
	

}

table.table-table-border > tbody > tr.border-bottom
{
	
	border-bottom: 1px dotted;
	

}

/*table.table-table-border > tbody >tr.border-top-bottom >td
{
	width: 100%;

}*/

table.table-table-border
{
	margin-top: 10px;
}

table > tbody >tr.font-large
{
	font-size: large;
	font-weight: bold;

}

.col-xs-12
{
	width: 100%;
}


}


</style>


<div class="row" style="color: #000000 !important;">
	@if(empty($receipt_details->letter_head))
		<!-- Logo -->
		@if(!empty($receipt_details->logo))
			<img style="max-height: 120px; width: auto;" src="{{$receipt_details->logo}}" class="img img-responsive center-block">
		@endif

		<!-- Header text -->
		@if(!empty($receipt_details->header_text))
			<div class="col-xs-12">
				{!! $receipt_details->header_text !!}
			</div>
		@endif

		<!-- business information here -->
		
	@else
		<div class="col-xs-12 text-center">
			<img style="width: 100%;margin-bottom: 10px;" src="{{$receipt_details->letter_head}}">
		</div>
	@endif
	<div class="col-xs-12 text-center">
		<h3 style="text-decoration:underline;display:inline-block;text-align: center;">Tax Invoice</h3>
		<!-- Invoice  number, Date  -->
		<p style="width: 100% !important" class="word-wrap">
			<span class="pull-left text-left word-wrap">
				@if(!empty($receipt_details->invoice_no_prefix))
					<b>{!! $receipt_details->invoice_no_prefix !!}</b>
				@endif
				{{$receipt_details->invoice_no}}

				@if(!empty($receipt_details->types_of_service))
					<br/>
					<span class="pull-left text-left">
						<strong>{!! $receipt_details->types_of_service_label !!}:</strong>
						{{$receipt_details->types_of_service}}
						<!-- Waiter info -->
						@if(!empty($receipt_details->types_of_service_custom_fields))
							@foreach($receipt_details->types_of_service_custom_fields as $key => $value)
								<br><strong>{{$key}}: </strong> {{$value}}
							@endforeach
						@endif
					</span>
				@endif

				<!-- Table information-->
		        @if(!empty($receipt_details->table_label) || !empty($receipt_details->table))
		        	<br/>
					<span class="pull-left text-left">
						@if(!empty($receipt_details->table_label))
							<b>{!! $receipt_details->table_label !!}</b>
						@endif
						{{$receipt_details->table}}

						<!-- Waiter info -->
					</span>
		        @endif

				<!-- customer info -->
				@if(!empty($receipt_details->customer_info))
					<br/>
					<b>{{ $receipt_details->customer_label }}</b> <br> {!! $receipt_details->customer_info !!} <br>
				@endif
				@if(!empty($receipt_details->client_id_label))
					<br/>
					<b>{{ $receipt_details->client_id_label }}</b> {{ $receipt_details->client_id }}
				@endif
				@if(!empty($receipt_details->customer_tax_label))
					<br/>
					<b>{{ $receipt_details->customer_tax_label }}</b> {{ $receipt_details->customer_tax_number }}
				@endif
				@if(!empty($receipt_details->customer_custom_fields))
					<br/>{!! $receipt_details->customer_custom_fields !!}
				@endif
				@if(!empty($receipt_details->sales_person_label))
					<br/>
					<b>{{ $receipt_details->sales_person_label }}</b> {{ $receipt_details->sales_person }}
				@endif
				@if(!empty($receipt_details->commission_agent_label))
					<br/>
					<strong>{{ $receipt_details->commission_agent_label }}</strong> {{ $receipt_details->commission_agent }}
				@endif
				@if(!empty($receipt_details->customer_rp_label))
					<br/>
					<strong>{{ $receipt_details->customer_rp_label }}</strong> {{ $receipt_details->customer_total_rp }}
				@endif
			</span>

			<span class="pull-right text-left">
				<b>{{$receipt_details->date_label}}</b> {{$receipt_details->invoice_date}}

				@if(!empty($receipt_details->due_date_label))
				<br><b>{{$receipt_details->due_date_label}}</b> {{$receipt_details->due_date ?? ''}}
				@endif

				@if(!empty($receipt_details->brand_label) || !empty($receipt_details->repair_brand))
					<br>
					@if(!empty($receipt_details->brand_label))
						<b>{!! $receipt_details->brand_label !!}</b>
					@endif
					{{$receipt_details->repair_brand}}
		        @endif


		        @if(!empty($receipt_details->device_label) || !empty($receipt_details->repair_device))
					<br>
					@if(!empty($receipt_details->device_label))
						<b>{!! $receipt_details->device_label !!}</b>
					@endif
					{{$receipt_details->repair_device}}
		        @endif

				@if(!empty($receipt_details->model_no_label) || !empty($receipt_details->repair_model_no))
					<br>
					@if(!empty($receipt_details->model_no_label))
						<b>{!! $receipt_details->model_no_label !!}</b>
					@endif
					{{$receipt_details->repair_model_no}}
		        @endif

				@if(!empty($receipt_details->serial_no_label) || !empty($receipt_details->repair_serial_no))
					<br>
					@if(!empty($receipt_details->serial_no_label))
						<b>{!! $receipt_details->serial_no_label !!}</b>
					@endif
					{{$receipt_details->repair_serial_no}}<br>
		        @endif
				@if(!empty($receipt_details->repair_status_label) || !empty($receipt_details->repair_status))
					@if(!empty($receipt_details->repair_status_label))
						<b>{!! $receipt_details->repair_status_label !!}</b>
					@endif
					{{$receipt_details->repair_status}}<br>
		        @endif
		        
		        @if(!empty($receipt_details->repair_warranty_label) || !empty($receipt_details->repair_warranty))
					@if(!empty($receipt_details->repair_warranty_label))
						<b>{!! $receipt_details->repair_warranty_label !!}</b>
					@endif
					{{$receipt_details->repair_warranty}}
					<br>
		        @endif
		        
				<!-- Waiter info -->
				@if(!empty($receipt_details->service_staff_label) || !empty($receipt_details->service_staff))
		        	<br/>
					@if(!empty($receipt_details->service_staff_label))
						<b>{!! $receipt_details->service_staff_label !!}</b>
					@endif
					{{$receipt_details->service_staff}}
		        @endif
		        @if(!empty($receipt_details->shipping_custom_field_1_label))
					<br><strong>{!!$receipt_details->shipping_custom_field_1_label!!} :</strong> {!!$receipt_details->shipping_custom_field_1_value ?? ''!!}
				@endif

				@if(!empty($receipt_details->shipping_custom_field_2_label))
					<br><strong>{!!$receipt_details->shipping_custom_field_2_label!!}:</strong> {!!$receipt_details->shipping_custom_field_2_value ?? ''!!}
				@endif

				@if(!empty($receipt_details->shipping_custom_field_3_label))
					<br><strong>{!!$receipt_details->shipping_custom_field_3_label!!}:</strong> {!!$receipt_details->shipping_custom_field_3_value ?? ''!!}
				@endif

				@if(!empty($receipt_details->shipping_custom_field_4_label))
					<br><strong>{!!$receipt_details->shipping_custom_field_4_label!!}:</strong> {!!$receipt_details->shipping_custom_field_4_value ?? ''!!}
				@endif

				@if(!empty($receipt_details->shipping_custom_field_5_label))
					<br><strong>{!!$receipt_details->shipping_custom_field_2_label!!}:</strong> {!!$receipt_details->shipping_custom_field_5_value ?? ''!!}
				@endif
				{{-- sale order --}}
				@if(!empty($receipt_details->sale_orders_invoice_no))
					<br>
					<strong>@lang('restaurant.order_no'):</strong> {!!$receipt_details->sale_orders_invoice_no ?? ''!!}
				@endif

				@if(!empty($receipt_details->sale_orders_invoice_date))
					<br>
					<strong>@lang('lang_v1.order_dates'):</strong> {!!$receipt_details->sale_orders_invoice_date ?? ''!!}
				@endif
			</span>
		</p>
	</div>
</div>

<div class="row" style="color: #000000 !important;">
	@includeIf('sale_pos.receipts.partial.common_repair_invoice')
</div>

<div class="row" style="color: #000000 !important;">
	<div class="col-xs-12">
		<br/>
		@php
			$p_width = 45;
		@endphp
		@if(!empty($receipt_details->item_discount_label))
			@php
				$p_width -= 10;
			@endphp
		@endif
		@if(!empty($receipt_details->discounted_unit_price_label))
			@php
				$p_width -= 10;
			@endphp
		@endif
		<table class="table table-responsive table-slim ">
			<thead>
				<tr class="border-top">
					<th  rowspan="">Sr. {{$receipt_details->table_product_label}}</th>
					<!-- <th width="{{$p_width}}%"></th> -->
					<th class="text-right" width="15%">MRP</th>
					
					
						<th class="text-right" width="10%">Disc</th>
					
					<th class="text-right">Rate</th>
					<th class="text-right" width="15%">{{$receipt_details->table_subtotal_label}}</th>
				</tr>
				<tr class="border-bottom">
					<th></th>
					<th class="text-right" width="15%">Qty</th>
					<th class="text-right" width="15%">{{'HSN'}}</th>
					<th class="text-right">GST</th>
					<th></th>

					
				</tr>
			</thead>
			<tbody>
				@php 

				 $totalTaxesGroup=[];
				     $totalQuantity=0;


				@endphp

				@forelse($receipt_details->lines as $lindex => $line)

				@php                     

                    $totalQuantity+=$line['quantity'];

                     if(isset($totalTaxesGroup[$line['tax_percent']])):

                     $totalTaxesGroup[$line['tax_percent']]+=$line['tax']??0;

                     else:

                     $totalTaxesGroup[$line['tax_percent']]=$line['tax']??0;


                     endif;

				@endphp
				
					<tr>

						<td>{{$lindex+1}}</td>
						
					
						<td class="text-right">{{$line['mrp_inc_tax']}}</td>
						
						@if(!empty($receipt_details->item_discount_label))
							<td class="text-right">
								{{$line['total_line_discount'] ?? '0.00'}}

								@if(!empty($line['line_discount_percent']))
								 	({{$line['line_discount_percent']}}%)
								@endif
							</td>
						@endif

						<td class="text-right">{{$line['unit_price_before_discount']}}</td>

						<td class="text-right">{{$line['line_total']}}</td>


					</tr>

						<tr>
								<td>
							
                            {{$line['name']}} 
                         
                        </td>

                        	<td class="text-right">
							{{$line['quantity']}} {{$line['units']}} 

							@if($receipt_details->show_base_unit_details && $line['quantity'] && $line['base_unit_multiplier'] !== 1)
                            <br><small>
                            	{{$line['quantity']}} x {{$line['base_unit_multiplier']}} = {{$line['orig_quantity']}} {{$line['base_unit_name']}}
                            </small>
                            @endif
						</td>

						<td class="text-right">{{$line['hsn']}}</td>
						<td class="text-right">{{$line['tax_percent']?$line['tax_percent'].'%':''}}</td>
						<td class="text-right"></td>


							</tr>
					@if(!empty($line['modifiers']))
						@foreach($line['modifiers'] as $modifier)
							<tr>
								<td>
		                            {{$modifier['name']}} {{$modifier['variation']}} 
		                            @if(!empty($modifier['sub_sku'])), {{$modifier['sub_sku']}} @endif @if(!empty($modifier['cat_code'])), {{$modifier['cat_code']}}@endif
		                            @if(!empty($modifier['sell_line_note']))({!!$modifier['sell_line_note']!!}) @endif 
		                        </td>
								<td class="text-right">{{$modifier['quantity']}} {{$modifier['units']}} </td>
								<td class="text-right">{{$modifier['unit_price_inc_tax']}}</td>
								@if(!empty($receipt_details->discounted_unit_price_label))
									<td class="text-right">{{$modifier['unit_price_exc_tax']}}</td>
								@endif
								@if(!empty($receipt_details->item_discount_label))
									<td class="text-right">0.00</td>
								@endif
								<td class="text-right">{{$modifier['line_total']}}</td>
							</tr>

						
						@endforeach
					@endif
				@empty
					<tr>
						<td colspan="4">&nbsp;</td>
						@if(!empty($receipt_details->discounted_unit_price_label))
    					<td></td>
    					@endif
    					@if(!empty($receipt_details->item_discount_label))
    					<td></td>
    					@endif
					</tr>
				@endforelse

				<tr class="border-top">
					<td colspan="2"><table class="">

			<tr><td width="100%" class="text-center-top">{{$receipt_details->total_paid}}</td></tr>

		</table></td>

		<td colspan="3"><table class="">

			<tr>
				<td colspan="">Amount:</td>

				
				
				<td width="80%" class="text-right">{{$receipt_details->subtotal}}</td>

			</tr>

			<tr>
				<td colspan="">Discount:</td>

				
			
				<td class="text-right">{{$receipt_details->total_line_discount}}</td>

			</tr>



		</table></td>
				</tr>


				

				<tr class="border-top-bottom">

					<td>1</td>
					<td>{{$totalQuantity}}</td>
					<td colspan="">Total:</td>
					<td colspan="2" class="text-right">{{$receipt_details->total_paid}}</td>


				</tr>

				<tr class="font-large">

					<td colspan="5">CASH={{$receipt_details->total_paid}}</td>
					
					


				</tr>
			</tbody>
		</table>

		<!--tax table -->
		<table class="tax-table" width="100%">
			<tbody>
				@if(count($totalTaxesGroup))

				<tr>
					@php $cgst=$taxable='';@endphp
					<td><b>GST Rate</b></td>

					@foreach($totalTaxesGroup as $tax_perc => $tax_val)

					<td colspan="2">{{$tax_perc.'%'}}</td>

					@php 

					$taxable.='<td colspan="2">'.$tax_val.'</td>';

					$cgst.='<td>'.($tax_perc/2).'%</td>';
					$cgst.='<td>'.($tax_val/100*($tax_perc/2)).'</td>';


					@endphp

					@endforeach

				</tr><td><b>Taxable</b></td>{!!$taxable!!}
				<tr>
					<td><b>CGST</b></td>{!!$cgst!!}
				</tr>
				<tr>
					<td><b>UGST</b></td>{!!$cgst!!}
				</tr>
				@endif
			</tbody>
			
		</table>

		<table class="table-table-border" width="100%">

			<tbody>

				<tr class="border-bottom">

					<td>&nbsp;</td>
				</tr>

			</tbody>

		</table>

		<table class="table-table-border" width="100%">

			<tbody>

				<tr class="border-top-bottom font-large">

					<td><table><tr><td>Rec Amount:</td><td>{{$receipt_details->total_paid}}</td></tr></table></td>
					
					<td><table><tr><td>Pay Back:</td><td>0</td></tr></table></td>
				</tr>

			</tbody>

		</table>

		<table width="100%">
			<tbody>
				<tr>
					<td>Subject to Mumbai Jurisdiction</td><td class="text-right">E.& O.E.</td>
				</tr>
				<tr><td>GSTIN NO:</td> <td> 27AACFJ5990Q1ZJ</td></tr>
				<tr><td>STATE:</td> <td> MAHARASHTRA(27)
F</td></tr>
<tr><td>Inclusive In GST</td><td class="text-right">For ROYAL JYOTI</td></tr>

			</tbody>
		</table>
	</div>
</div>




