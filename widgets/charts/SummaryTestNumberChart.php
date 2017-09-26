<?php
/**
 * 统计各题型题数柱状图
 * ECharts 更新请看 https://github.com/daixianceng/yii2-echarts
 */

namespace app\widgets\charts;

use app\models\SummaryTestNumber;
use app\models\TestType;
use daixianceng\echarts\ECharts;
use yii\base\Widget;
use Yii;
use yii\helpers\ArrayHelper;

class SummaryTestNumberChart extends Widget
{
    /**
     * 开始日期
     * @var string Y-m-d
     */
    public $beginDate;

    /**
     * 结束日期
     * @var string Y-m-d
     */
    public $endDate;

    /**
     * @var string
     */
    public $chartWidth = '100%';

    /**
     * @var string
     */
    public $chartHeight = '400px';

    private $chartData = [];

    public function init() {
        $this->getData();
    }

    public function run() {
        $series = [];
        foreach ($this->chartData['legendData'] as $key => $legend) {
            array_push($series, [
                'name' => $legend,
                'type' => 'bar',
                'data' => $this->chartData['seriesData'][$key]
            ]);
        }
        echo ECharts::widget([
            'options' => [
                'style' => 'height:' . $this->chartHeight . ';width:' . $this->chartWidth . ';',
            ],
            'pluginOptions' => [
                'option' => [
                    // 颜色：蓝、绿、红
                    'color' => ['#357ca5','#00a65a','#d33724'],
                    'title' => [
                        'text' => '各题型题数统计图',
                        'left' => 'center',
                    ],
                    'tooltip' => [
                        'trigger' => 'axis'
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
    }

    protected function getData() {
        // 以下数组中的值需要一一对应
        $typeIdArr = [];                 // 题型编号
        $typeNameArr = [];               // 类型名
        $typeTotalCountArr = [];         // 各种类型总题数
        $typeTotalCorrectCountArr = [];  // 各种类型正确题数
        $typeTotalWrongCountArr = [];    // 各种类型错误题数数
        $testTypes = TestType::getAllUsedTestTypes();
        $models = SummaryTestNumber::find()
            ->where(['userID' => Yii::$app->user->id])
            ->andWhere(['between', 'summaryDate', $this->beginDate, $this->endDate])
            ->asArray()
            ->all();
        // 重新构造数组
        $newModels = ArrayHelper::index($models, 'summaryDate', 'testTypeID');
        // 获取类型名及各个类型一段时间内的题目数，正确题数，错误题数
        foreach ($testTypes as $testType) {
            foreach ($testType['items'] as $items) {
                $typeIdArr[] = $items['id'];
                $typeNameArr[] = $items['name'];
                $totalCount = 0;
                $correctCount = 0;
                $wrongCount = 0;
                if (isset($newModels[$items['id']])) {
                    foreach ($newModels[$items['id']] as $model) {
                        $totalCount += $model['totalCount'];
                        $correctCount += $model['correctCount'];
                        $wrongCount += $model['wrongCount'];
                    }
                }
                $typeTotalCountArr[] = $totalCount;
                $typeTotalCorrectCountArr[] = $correctCount;
                $typeTotalWrongCountArr[] = $wrongCount;
            }
        }
        // 构造数组用于合并数据
        $data = [
            'id' => $typeIdArr,
            'name' => $typeNameArr,
            'total' => $typeTotalCountArr,
            'correct' => $typeTotalCorrectCountArr,
            'wrong' => $typeTotalWrongCountArr
        ];
        $data = $this->combineData($data);
        $this->chartData['legendData'] = ['总题数', '正确题数', '错误题数'];
        $this->chartData['seriesData'] = [$data['total'], $data['correct'], $data['wrong']];
        $this->chartData['xAxisData'] = $data['name'];
    }

    /**
     * 合并一些题型
     * @param $data
     * @return array
     */
    protected function combineData($data) {
        // 需要合并的题型，key为题型前缀
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
        $newData = [];
        foreach ($data['id'] as $key => $idItem) {
            // 获取题型 id 的前缀 比如：K4 表示作文
            $testTypePrefix = substr($idItem, 0, 2);
            // 如果需要合并
            if (isset($combineType[$testTypePrefix])) {
                // 如果新数组中不存在该题型
                if (!in_array($testTypePrefix, $newData['id'])) {
                    // 给新数组中追加数据
                    $newData['id'][] = $testTypePrefix;
                    $newData['name'][] = $combineType[$testTypePrefix]['name'];
                    $newData['total'][] = $data['total'][$key];
                    // 是否只统计总题数
                    if ($combineType[$testTypePrefix]['onlyTotal']) {
                        $newData['correct'][] = 0;
                        $newData['wrong'][] = 0;
                    } else {
                        $newData['correct'][] = $data['correct'][$key];
                        $newData['wrong'][] = $data['wrong'][$key];
                    }
                } else {
                    // 给新数组的对应合并的数据累加上去
                    $itemKey = array_keys($newData['id'], $testTypePrefix)[0];
                    $newData['total'][$itemKey] += $data['total'][$key];
                    if (!$combineType[$testTypePrefix]['onlyTotal']) {
                        $newData['correct'][$itemKey] += $data['correct'][$key];
                        $newData['wrong'][$itemKey] += $data['wrong'][$key];
                    }
                }
            } else {
                // 不需要合并的直接赋值
                $newData['id'][] = $idItem;
                $newData['name'][] = $data['name'][$key];
                $newData['total'][] = $data['total'][$key];
                $newData['correct'][] = $data['correct'][$key];
                $newData['wrong'][] = $data['wrong'][$key];
            }
        }
        return $newData;
    }
}