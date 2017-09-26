<?php
namespace app\widgets\charts;

use app\functions\CommonFunctions;
use app\models\TestType;
use kartik\helpers\Html;
use yii\base\Widget;
use daixianceng\echarts\ECharts;
use yii\web\ForbiddenHttpException;

class SingleClassStatisticChart extends Widget{

    /**
     * 查询条件下的结果集
     * @var array
     */
    public $result;

    /**
     * @var string
     */
    public $chartWidth = '1100px';

    /**
     * @var string
     */
    public $chartHeight = '400px';

    /**
     * 图表数据
     * @var array
     */
    private $chartData = [];


    public function init()
    {
        if(!isset($this->result)){
            throw new ForbiddenHttpException('必须配置图表数据!');
        }
        $this->getData();
    }

    public function run()
    {
        $series = [];
        foreach ($this->chartData['legendData'] as $key => $legend) {
            array_push($series, [
                'name' => $legend,
                'type' => 'bar',
                'data' => $this->chartData['seriesData'][$key]
            ]);
        }
        echo Html::beginTag('div',['id' => 'single-class']);
        echo ECharts::widget([
            'options' => [
                'style' => 'height:' . $this->chartHeight . ';width:' . $this->chartWidth . ';',
            ],
            'pluginOptions' => [
                'option' => [
                    // 颜色：蓝、绿、红
                    'color' => ['#357ca5','#00a65a','#d33724'],
                    'title' => [
                        'text' => '班级情况分析统计图',
                        'left' => 'center',
                    ],
                    'tooltip' => [
                        'trigger' => 'axis',
                        'axisPointer' => [
                            'type' => 'shadow'
                        ]
                    ],
                    'legend' => [
                        'data' => $this->chartData['legendData'],
                        'bottom' => 0
                    ],
                    'xAxis' => [
                        'name' => '题型',
                        'data' => $this->chartData['xAxisData'],
                    ],
                    'yAxis' => [
                        'name' => '题数',
                    ],
                    'series' => $series
                ]
            ]
        ]);
        echo Html::endTag('div');
    }

    // 获取图表需要的数据
    protected function getData(){
        // 以下数组中的值需要一一对应
        $typeIdArr = [];                 // 题型编号
        $typeNameArr = [];               // 类型名
        $data = [];                      // 统计用的大数组

        $newTestIDArr = []; // 合并类型后新testID数组名称
        $newTestNameArr = [];

        $combineType = [
            'K3' => [
                'name' => '翻译', // 最终显示的名称
                'onlyTotal' => true, // 只统计总题数
            ],
            'K4' => [
                'name' => '作文',
                'onlyTotal' => true,
            ],
        ];

        $testTypeModels = TestType::getAllUsedTestTypes();
        foreach($testTypeModels as $testTypeModel){
            foreach($testTypeModel['items'] as $item){
                $typeIdArr[] = $item['id'];
                $typeNameArr[] = $item['name'];
            }
        }
        // 构造新的名称及testTypeID
        foreach($typeIdArr as $key => $testType){
            $testTypePrefix = substr($testType, 0, 2);
            if(in_array($testTypePrefix,array_keys($combineType))){
                $newTestIDArr[] = $testTypePrefix;
                $newTestNameArr[] = $combineType[$testTypePrefix]['name'];
            }else{
                $newTestIDArr[] = $testType;
                $newTestNameArr[] = $typeNameArr[$key];
            }
        }
        $newTestIDArr = array_unique($newTestIDArr); // 去除数据重复值,用于类型合并
        $newTestNameArr = array_unique($newTestNameArr);
        unset($typeIdArr); // 释放数组占用内存
        unset($typeNameArr);

        if($this->result){
            foreach($this->result as $model){
                $modelArr = CommonFunctions::arrayMulti2single($model); // 判断是否查找到记录
                if($modelArr[0]){
                    array_shift($model); //去除数组首元素,此处去除总计时多余的userID字段
                    foreach($newTestIDArr as $key => $type){
                        $testTypePrefix = substr($type, 0, 2);
                        if(in_array($testTypePrefix,array_keys($combineType))){
                            $data['total'][] = $model[$testTypePrefix];
                            $data['correct'][] = 0;
                            $data['wrong'][] = 0;
                        }else{
                            $typeArr = explode('/',$model[$type]);
                            $data['total'][] = $typeArr[0];
                            $data['correct'][] = $typeArr[1];
                            $data['wrong'][] = $typeArr[2];
                        }

                    }
                }else{
                    for($i = 0; $i < 7;$i++){
                        $data['total'][] = 0;
                        $data['correct'][] = 0;
                        $data['wrong'][] = 0;
                    }
                }
            }
        }else{
            for($i = 0; $i < 7;$i++){
                $data['total'][] = 0;
                $data['correct'][] = 0;
                $data['wrong'][] = 0;
            }
        }


        $this->chartData['legendData'] = ['总题数','正确数','错误数'];
        $this->chartData['xAxisData'] = $newTestNameArr;
        $this->chartData['seriesData'] = [
            $data['total'], // 各种类型总题数
            $data['correct'], // 各种类型正确题数
            $data['wrong'] // 各种类型错误题数
        ];
    }

}