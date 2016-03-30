<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/kunnoi2/system/libraries/phamlp/haml/HamlHelpers.php';
?><div class="container-fluid"><div class="row"><div class="col-sm-9 col-md-9" id="table-area"><div class="panel panel-default"><div class="panel-heading"> <strong><?php echo $zone[0]->e_full_name; ?></strong> <input id="zone_id" type="hidden" value="<?php echo !empty($zone_id) ? $zone_id : ""; ?>" /><input id="order_id" type="hidden" value="<?php echo !empty($zone_id) ? $order_id : ""; ?>" /></div><div class="panel-body" id="js-table-area"><?php for ($i=1; $i < $zone[0]->value1; $i++): { ?><div class="col-md-2"><?php if(empty($table_order[$i])): { ?><button class="btn btn-info table-area js-table-btn" data-table="<?php echo $i; ?>" data-zone="<?php echo $zone[0]->e_abb_name; ?>"><?php echo $i; ?></button><?php } elseif($table_order[$i] == 'existed'): { ?><button class="btn btn-default table-area js-table-btn" data-table="<?php echo $i; ?>" data-zone="<?php echo $zone[0]->e_abb_name; ?>"><?php echo $i; ?></button><?php } elseif($table_order[$i] == 'booked'): { ?><button class="btn btn-warning disabled table-area" data-table="<?php echo $i; ?>" data-zone="<?php echo $zone[0]->e_abb_name; ?>"><?php echo $i; ?></button><?php } ?><?php endif; ?></div><?php } ?><?php endfor; ?></div></div></div><div class="col-md-3" id="pos-list"><div class="row"><div class="panel panel-default"><div class="panel-heading"><div class="row"> <span class="label-table col-md-2">โต๊ะ</span> <div class="col-md-10" id="js-table-list"><?php for ($i=1; $i < $zone[0]->value1; $i++): { ?><?php if(empty($table_order[$i])): { ?> <span class="label label-default js-table-number hide" data-table="<?php echo $i; ?>"><?php echo $i; ?></span> <?php } elseif($table_order[$i] == 'existed'): { ?> <span class="label label-default js-table-number" data-table="<?php echo $i; ?>"><?php echo $i; ?></span> <?php } ?><?php endif; ?><?php } ?><?php endfor; ?></div></div><div class="row"><div class="product-selection col-md-12"><button class="btn btn-primary js-product-selection col-md-12" data-target="#myModal" data-toggle="modal">เลือกสินค้า</button></div></div></div><table class="table"><tr><th class="col-md-1">#</th><th class="col-md-6">รายการสั่งซื้อ</th><th class="col-md-3">จำนวน</th><th class="col-md-2">รวม</th></tr></table><div class="panel-body" id="order-list"><div class="row"><table class="table table-striped"><?php for ($i=1; $i < 60;): { ?><tr><td><?php echo $i; ?></td><td class="col-md-6">Soup</td><td class="col-md-3"><input class="col-md-12" type="number" /></td><td class="col-md-2">1000</td></tr><?php $i++; ?><?php } ?><?php endfor; ?></table></div></div><div class="panel-footer"> <span class="col-md-4">Total</span> <div class="input-group col-md-8"> <span class="input-group-addon">฿</span> <input class="form-control" type="" /> <span class="input-group-addon">.00</span> </div></div></div><div id="pos-btn-panel"><button class="btn btn-success col-md-5"> <i class="fa fa-money"></i>  <span>รับเงิน</span> </button><button class="btn btn-info col-md-5 col-md-offset-2"> <i class="fa fa-print"></i>  <span>Print</span> </button> <a href="/pos"><button class="btn btn-default col-md-5"> <i class="fa fa-reply"></i>  <span>Back</span> </button></a> <button class="btn btn-danger col-md-5 col-md-offset-2"> <i class="fa fa-trash"></i>  <span>ลบ</span> </button></div></div></div></div></div><?php echo $product_modal; ?><script type="text/javascript">
  //<![CDATA[
var fullScreenPanel = $(window).height() - 100;
var fullScreenOrderList = $(window).height() - 360;

$('#js-table-area').height(fullScreenPanel).css('overflow' , 'auto');
$('#order-list').height(fullScreenOrderList).css('overflow' , 'auto');

$('.js-table-btn').click(function(){
  var tableNumber = $(this).data('table');
  var tableZone = $(this).data('zone');
  var order = $('#order_id').val();
  var base = this;

  if($(this).hasClass('btn-info')){  
    $.ajax({
      method: "POST",
      url: "/pos/add_table",
      data: { table: tableNumber,
        zone:  tableZone,
        order: order},
      datatype: "json",
      success: function(data){
        obj = JSON.parse(data);

        if(obj.order_id != order){
          $('#order_id').val(obj.order);
        }

        $(base).removeClass('btn-info');
        $(base).addClass('btn-default');
        addTableLabel(tableNumber);
      }
    });
  }else if($(this).hasClass('btn-default')){
    $.ajax({
      method: "POST",
      url: "/pos/remove_table",
      data: { table: tableNumber,
        zone:  tableZone,
        order: order},
      datatype: "json",
      success: function(){
        $(base).addClass('btn-info');
        $(base).removeClass('btn-default');
        removeTableLabel(tableNumber);
      }
    });

  }
});

function addTableLabel(number) {
  $('.js-table-number').each(function(){
    if($(this).data('table') == number){
      $(this).removeClass('hide');
    }
  });    
}

function removeTableLabel(number) {
  $('.js-table-number').each(function(){
    if($(this).data('table') == number){
      $(this).addClass('hide');
    }
  });    
}

  //]]>
</script>
