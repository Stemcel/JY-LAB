<?php
/**
 * 统计一段时间内每天的正确率趋势图
 */
namespace app\widgets\charts;

use app\models\SummaryTestNumber;
use app\models\TestType;
use yii\base\Widget;
use daixianceng\echarts\ECharts;
use yii\helpers\ArrayHelper;
use Yii;

class SummaryTestRateChart extends Widget
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
                'type' => 'line',
                
                'data' => $this->chartData['seriesData'][$key]
            ]);
        }
        echo ECharts::widget([
            'options' => [
                'style' => 'height:' . $this->chartHeight . ';width:' . $this->chartWidth . ';',
            ],
            'pluginOptions' => [
                'option' => [
                    'title' => [
                        'text' => '各题型正确率趋势图',
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
                        'name' => '日期',
                        'data' => $this->chartData['xAxisData'],
                    ],
                    'yAxis' => [
                        'name' => '正确率(%)',
                        'min' => 0,
                        'max' => 100,
                    ],
                    'series' => $series
                ]
            ]
        ]);
    }

    protected function getData() {
        $dateArr = $this->getDateArr($this->beginDate, $this->endDate); // 时间数组
        $correctPercentArr = []; // 正确率数组，key为题型编号
        $typeNameArr = []; // 题型数组，key为题型编号
        $removeTypePrefix = $this->getRemoveTestTypePrefix(); // 不需要统计的题型的前缀
        // 获取类型名及各个类型一段时间内的题目数，正确题数，错误题数
        $testTypes = TestType::getAllUsedTestTypes();
        $models = SummaryTestNumber::find()
            ->where(['userID' => Yii::$app->user->id])
            ->andWhere(['between', 'summaryDate', $this->beginDate, $this->endDate])
            ->asArray()
            ->all();
        // 构造成新数组
        $newModels = ArrayHelper::index($models, 'summaryDate', 'testTypeID');
        // 获取类型名及其对应的id
        foreach ($testTypes as $testType) {
            foreach ($testType['items'] as $items) {
                // 跳过题型
                $testTypePrefix = substr($items['id'], 0, 2);
                if (in_array($testTypePrefix, $removeTypePrefix)) {
                    continue;
                }
                foreach ($dateArr as $date) {
                    if (isset($newModels[$items['id']][$date])) {
                        $model = $newModels[$items['id']][$date];
                        $correctPercent = round($model['correctCount'] / $model['totalCount'], 4) * 100;
                    } else {
                        $correctPercent = 0;
                    }
                    $correctPercentArr[$items['id']][$date] = $correctPercent;
                }
                $typeNameArr[$items['id']] = $items['name'];
            }
        }
        // 填充到图表需要的数据
        $this->chartData['xAxisData'] = $dateArr;
        foreach ($typeNameArr as $typeId => $typeName) {
            $this->chartData['legendData'][] = $typeName;
            $this->chartData['seriesData'][] = array_values($correctPercentArr[$typeId]);
        }

    }

    /**
     * 获取两个时间之间的所有日期
     * @param $start string Y-m-d
     * @param $end string Y-m-d
     * @return array
     */
    private function getDateArr($start, $end) {
        $dateArr = [];
        $startTime = strtotime($start);
        $endTime = strtotime($end);
        do {
            array_push($dateArr, date('Y-m-d', $startTime));
        } while (($startTime += 86400) <= $endTime);
        return $dateArr;
    }

    /**
     * 需要移除掉的测试类型的数据
     * @return array
     */
    protected function getRemoveTestTypePrefix() {
        $testTypePrefix = ['K3', 'K4'];
        return $testTypePrefix;
    }
}