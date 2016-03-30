<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/kunnoi2/system/libraries/phamlp/haml/HamlHelpers.php';
?><div class="container-fluid"><div class="row"><div class="col-sm-9 col-md-9" id="zone-area"><div class="panel panel-default"><div class="panel-body"><div class="row" id="zone-selection"><div class="col-md-8" id="js-zone-selection"><div class="row" style="padding-left: 20px; padding-right: 20px;"> <span class="col-md-offset-2 col-md-8 label label-info stand">เวที</span> </div><div class="row"><?php foreach ($zone as $item): { ?> <a class="btn btn-primary col-md-12 js-btn-zone" href="pos/order/?zone=<?php echo $item->id; ?>"><?php echo $item->e_full_name; ?></a> <?php } ?><?php endforeach; ?></div></div><div class="col-md-4"><div class="row" style="padding: 0 20px;"> <span class="col-md-12 label label-success kitchen">ครัว</span>  <span class="col-md-7 label label-success bar">Bar 1</span>  <span class="col-md-10 label label-success bar">Bar 2</span> </div></div></div></div></div></div><div class="row"><div class="user-panel col-sm-3 col-md-3"><div class="user-detail pull-left"> <strong>พนักงาน</strong>  <span class="label label-default">อั๋น</span> </div><button class="btn btn-danger pull-right">Sign Out</button><button class="btn btn-success pull-right">Admin</button></div><div class="col-sm-3 col-md-3" id="js-grid"><div id="jsGrid"></div></div></div></div></div><script type="text/javascript">
  //<![CDATA[
var fullScreenPanel = $(window).height() - 100;
var fullScreenGrid = $(window).height() - 100;
var standHeight = $('.stand').height();

var numZoneBtn = $('.js-btn-zone').length;

var btnHeight = ( (fullScreenPanel - standHeight) - (35 * numZoneBtn) ) / numZoneBtn;

$('#js-zone-selection').height(fullScreenPanel);
$('#js-grid').height(fullScreenGrid);
$('.js-btn-zone').height(btnHeight).css('padding-top', btnHeight/2 -20);

$.ajax({
  method: "POST",
  url: "/pos/load",
  datatype: "json",
  success: function(data){
    obj = JSON.parse(data);

      $("#jsGrid").jsGrid({
        height: "100%",
        width: "99%",
        filtering: false,
        editing: false,
        inserting: false,
        sorting: true,
        paging: false,
        autoload: true,
        pageSize: 15,
        pageButtonCount: 5,
        deleteConfirm: "Do you really want to delete the client?",
        data: obj,
        rowClick: function(data) { 
          //console.log(data.item.order);
          window.location.replace('/pos/order/?zone='+data.item.zone+'&order='+data.item.order);
        },
        fields: [
          { name: "#", type: "number", width: 10 },
          { name: "Time", type: "text", width: 50 },
          { name: "Table", type: "text", width: 80 },
          { name: "Qty", type: "number", width: 30 },
          { name: "Subtotal", type: "number", width: 60 },
        ]
    });
  }
});

  //]]>
</script>
