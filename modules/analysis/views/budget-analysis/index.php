<?php

use Hisune\EchartsPHP\ECharts;
use kartik\widgets\Select2;

?>
<div id="aa">
    <?php

        echo Select2::widget([
            'name' => 'kv-state',
            'data' => $data,
            'size' => Select2::SMALL,
            'options' => ['placeholder' => '请选择年份'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>
</div>

<div>
    <?php
    $js = <<<JS

$(document.getElementById ('aa')).on('change',function(){
		var number = $("#w0 option:selected").text();
	   // var url = '../budget-analysis/index';
	    var url =['index'];
		$.ajax({
		    async:false,
			type : 'post',
			cache:false,
            url:url,
			data:{year:number},
			success : function(data){
		      $('#chart').html(data);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
          alert(XMLHttpRequest.status);
          alert(XMLHttpRequest.readyState);
          alert(textStatus);
},
		});
	});
JS;
    $this->registerJs($js);
 ?></div>

<div id="chart">

<?php

    $chart = new ECharts();
    $chart->tooltip->show = true;
    $chart->legend->data[] = '审批金额';
    $chart->legend->data[] = '使用金额';
    $chart->xAxis[] = array(
        'type' => 'category',
        'data' => $name
    );
    $chart->yAxis[] = array(
        'type' => 'value'
    );
    $chart->series[] = array(
        'name' => '审批金额',
        'type' => 'bar',
        'data' => $approveAmount

    );
    $chart->series[] = array(
        'name' => '使用金额',
        'type' => 'bar',
        'data' => $useAmount

    );
    echo $chart->render('simple-custom');

?>
</div>
