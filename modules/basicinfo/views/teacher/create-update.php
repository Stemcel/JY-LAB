<?php

use app\components\ActiveForm;
use app\models\Department;
use kartik\datetime\DateTimePicker;
use kartik\select2\Select2;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Teacher */

    $this->title = ($model->isNewRecord ? Yii::t('app', 'Create Teacher') : Yii::t('app', 'Update Teacher')) . '信息';
    $this->params['breadcrumbs'] = [
        [
            'label' => Yii::t('app', 'Teacher Manage'),
            'url' => ['index'],
        ],
        $this->title,
    ];

    $form = ActiveForm::begin([
        'renderWrap' => true,
        'title' => $this->title
    ]);

    $code = $form->field($model, 'code')->textInput(['maxlength' => true]);
    $sex = $form->field($model, 'sex')->dropDownList(['1' => '男','2' => '女','3' => '未知',],['prompt'=>' ']);
    $name = $form->field($model, 'name')->textInput(['maxlength' => true]);
    $departmentID = $form->field($model, 'departmentID')->widget(Select2::className(),[
        'data'=>Department::queryAllDepartment(),
        'options' => ['placeholder' => '请选择 ...'],
    ]);
    $title = $form->field($model, 'title')->textInput(['maxlength' => true]);
    $degree = $form->field($model, 'degree')->dropDownList(['1' => '博士','2' => '硕士','3' => '本科','4'=>'其他'],['prompt'=>' ']);
    $remark = $form->field($model, 'remark')->textarea(['rows'=>3]);
    $titleDate = $form->field($model, 'titleDate')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => '请选择职称时间'],
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'

        ]
    ]);
    $status = $form->field($model, 'status')->textInput(['maxlength' => true]);
    $background = $form->field($model, 'background')->textInput(['maxlength' => true]);
    $backgroundDate = $form->field($model, 'backgroundDate')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => '请选择毕业时间'],
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'

        ]
    ]);
    $backgroundSchool = $form->field($model, 'backgroundSchool')->textInput(['maxlength' => true]);
    $workDate = $form->field($model, 'workDate')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => '请选择工作时间'],
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    if($model->isNewRecord){
        $html = [
            $code,
            $name,
            $sex,
            $departmentID,
            $status,
            $title,
            $titleDate,
            $workDate,
            $backgroundSchool,
            $background,
            $degree,
            $backgroundDate,
            $remark,
        ];
    }else{
        $html = [
            $code,
            $name,
            $sex,
            $departmentID,
            $status,
            $title,
            $titleDate,
            $workDate,
            $backgroundSchool,
            $background,
            $degree,
            $backgroundDate,
            $remark,
        ];
    }
    $html = array_merge($html, [
        $form->renderFooterButtons(),
    ]);
    echo implode("\n",$html);
    $form->end();
