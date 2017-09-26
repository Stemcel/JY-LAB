<?php

namespace app\modules\right\models;

use moonland\phpexcel\Excel;
use yii\base\Model;
use moonland\phpexcel;

class UploadExcelForm extends Model
{
    /**
     * @var $excel \yii\web\UploadedFile
     */
    public $excel;

    //所有会被存储的列，确保一定存在，修改此处将涉及到修改ImportController
    private $_cols = [
         '用户名', '密码', '用户编号','备注', '模块' ];

    public function rules() {
        return [
            [['excel'], 'required'],
            [['excel'], 'file', 'skipOnEmpty' => false],
            // [['excel'], 'file', 'skipOnEmpty' => false, 'extensions' => ['xls', 'xlsx']], extensions 扩展在wps下有问题
        ];
    }

    public function attributeLabels() {
        return [
            'excel' => 'excel表'
        ];
    }

    /**
     * @return bool|string|array 返回string为错误信息，返回true为验证出错，返回array为获取到的数据
     */
    public function upload() {
        if ($this->validate()) {

            $filename = '../uploads/excel/' . date('YmdHis') . '_students_' . rand(10000, 99999) . '.' . $this->excel->extension;
            $this->excel->saveAs($filename);
            $data = Excel::widget([
                'mode' => 'import',
                'fileName' => $filename,
                'setFirstRecordAsKeys' => true, //第一行为键
            ]);
            if (isset($data[0])) {
                foreach ($this->_cols as $col) {
                    if (!array_key_exists($col, $data[0])) {
                        return "不存在'" . $col . "'列";
                        break;
                    }
                }
            } else {
                return "数据为空";
            }
            return $data;
        } else {
            return true;
        }
    }
}