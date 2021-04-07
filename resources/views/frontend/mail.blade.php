<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style type="text/css" rel="stylesheet" media="all">
/* Media Queries */
@media only screen and (max-width: 500px) {
.button {
width: 100% !important;
}
}
</style>
</head>
<?php
$style = [
/* Layout ------------------------------ */
'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;',
'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',
/* Masthead ----------------------- */
'email-masthead' => 'padding: 25px 0; text-align: center;',
'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',
'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
'email-body_cell' => 'padding: 35px;',
'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',
/* Body ------------------------------ */
'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',
/* Type ------------------------------ */
'anchor' => 'color: #3869D4;',
'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
'paragraph-center' => 'text-align: center;',
/* Buttons ------------------------------ */
'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',
'button--green' => 'background-color: #22BC66;',
'button--red' => 'background-color: #dc4d2f;',
'button--blue' => 'background-color: #3869D4;',
];
?>
<?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>
<body style="{{ $style['body'] }}">
<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
				
					<tbody>
					<?php $totalall= 0; ?>
					@foreach($content as $key=>$value)
					<?php 
						$totalall= $totalall+ $value->price*$value->qty;
						$img = json_decode($value->image);
                    ?>
					<tr role="row" id="tr{{$value->id}}">
						<td class="cart_product">
								<a href=""><img src="{{asset('/upload/product/'.$img['0'])}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$value->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$value->price}}$</p>
							</td>
							
							
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<button data-id="{{$value->id}}" data-price="{{$value->price}}" type="submit" class="cart_quantity_up"> + </button>
									<input class="cart_quantity_input" id="qty{{$value->id}}"  type="text" name="quantity"type="text" name="quantity" value="{{$value->qty}}" autocomplete="off" size="2">
									<button data-id="{{$value->id}}" data-price="{{$value->price}}" type="submit"class="cart_quantity_down" > - </button>
								</div>
							</td>
							
							<td class="cart_total">
								<p class="cart_total_price" id="total{{$value->id}}"> <?php echo $value->price*$value->qty."$" ; ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" data-id="{{$value->id}}"data-price="{{$value->price}}"  ><i class="fa fa-times"></i></a>
							</td>	
						</tr>
						@endforeach
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td><span id="totalAll"><?php  echo $totalall."$";?></td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>$2</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span></span></td>
									</tr>
								</table>
								
							</td>
						</tr>
					</tbody>
					
				</table>
</body>
</html>