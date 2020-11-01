<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<!-- Include jQuery library -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/css/bootstrap.min.js'); ?>"></script>

<script>
// Update item quantity
function updateCartItem(obj, rowid){
    $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
        if(resp == 'ok'){
            alert('Update successfully!');
            location.reload();
            
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>

<h4>SHOPPING CART</h4>
<table class="table table-bordered">
<thead>
    <tr>
        <th width="10%"></th>
        <th width="30%" align="left">Product</th>
        <th width="15%" align="left">Price</th>
        <th width="13%" align="left">Quantity</th>
        <th width="20%" align="left">Subtotal</th>
        <th width="12%" align="left"></th>
    </tr>
</thead>
<tbody>
    <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
    <tr>
        <td width="10%">
            <?php $imageURL = !empty($item["image"])?base_url('assets/images/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
            <img src="<?php echo $imageURL; ?>" width="50"/>
        </td>
        <td width="30%"><?php echo $item["name"]; ?></td>
        <td width="15%"><?php echo 'Rs. '.$item["price"]; ?></td>
        <td width="13%"><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
        <td width="20%" class="text-right"><?php echo 'Rs. '.$item["subtotal"]; ?></td>
        <td width="12%" class="text-right"><button class="btn btn-sm btn-danger" title="remove" onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo base_url('cart/removeItem/'.$item["rowid"]); ?>':false;">x </button> </td>
    </tr>
    <?php } }else{ ?>
    <tr><td colspan="6"><p>Your cart is empty.....</p></td>
    <?php } ?>
    <?php if($this->cart->total_items() > 0){ ?>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><strong>Cart Total</strong></td>
        <td class="text-right"><strong><?php echo 'Rs. '.$this->cart->total(); ?></strong></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="6" align="right">
            <a href="<?php echo base_url('products/')?>" class="btn btn-sm btn-primary"> Add Product </a>
            <?php if(!empty($user)) { ?>
                <a href="<?php echo base_url('checkout/'); ?>" class="btn btn-sm btn-danger"> Checkout >> </a>
            <?php } else { ?>
                <a href="<?php echo base_url('users/login'); ?>" class="btn btn-sm btn-danger"> Login </a>
            <?php } ?>    
            
        </td>
    </tr>

    <?php } ?>
</tbody>
</table>