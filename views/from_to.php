<?php
$script = <<< JS
    $(function() {

        $('#button-get').click(function(e){
             var from = parseInt($('#from').val());
             var to = parseInt($('#to').val());
             var i;
             var data = {};
             for (i = from; i <= to; i++){
                data['id'] = i;
                setAjaxq(data);
             }
        });

 });
JS;

$this->registerJs($script);

?>

<div class="row col-md-12">
    <div class="form-group col-md-6">
        <label for="from">From</label>
        <input type="text" class="form-control" id="from" placeholder="Enter from id" value="1">
    </div>
    <div class="form-group col-md-6">
        <label for="to">To</label>
        <input type="text" class="form-control" id="to" placeholder="Enter to id" value="2">
    </div>

    <button type="submit" id="button-get" class="btn btn-primary">Submit</button>
</div>

<div class="row col-md-12">
    <div class="res"></div>
</div>