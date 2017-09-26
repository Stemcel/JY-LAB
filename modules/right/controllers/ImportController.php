<?php

namespace app\modules\right\controllers;

use app\controllers\AbstractController;
use app\models\User;
use app\modules\right\models\UploadExcelForm;
use Yii;
use yii\web\UploadedFile;
use yii\db\Exception;
use app\functions\CommonFunctions;


class ImportController extends AbstractController
{
    // 上传主页
    public function actionIndex()
    {
        $model = new UploadExcelForm();
        if (Yii::$app->request->isPost) {
            $model->excel = UploadedFile::getInstance($model, 'excel');
            $dataOrMsg = $model->upload();
            if (is_array($dataOrMsg)) {
                return $this->import($dataOrMsg);
            } elseif (is_string($dataOrMsg)) {
                Yii::$app->session->setFlash('warning', $dataOrMsg);
            }
        }
        return $this->render('index', [
            'model' => $model
        ]);
    }

    // 下载模板
    public function actionDownload()
    {
        $fileName = "import_users_muban.xlsx";
        if (file_exists('../uploads/excel/' . $fileName)) {
            return Yii::$app->response->sendFile('../uploads/excel/' . $fileName);
        } else {
            return "<h1>文件不存在</h1>";
        }
    }

    // 导入数据库
    private function import($data)
    {
        /*$count = 0;
        $errors = [
            '身份不存在' => [],
            '必填字段为空' => [],
            '其他原因' => [],
        ];
        $errorsCount = 0;
        //$usedLevels = array_flip(Level::getUsedLevels());
//        $type = [
//            User::TYPE_STUDENT => '用户',
//        ];
//        $usedTypes = array_flip($type);
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();  //开启事务

        $sum = count($data);
        //var_dump($data);die;


            foreach ($data as $d) {

                $lib = new User();
//                try {
                    $lib->name = trim($d['用户名']);
                    $lib->password = trim($d['密码']);
                    $lib->userCode = trim($d['用户编号']) ?: '';
                    $lib->remark = trim($d['备注']) ?: '';
                    $lib->currentModule = trim($d['模块']) ?: '';
                    if (!$lib->save()) {
                        $errorMsg = [];
                        foreach ($lib->errors as $error) {
                            array_push($errorMsg, implode(',', $error));
                        }
                        array_push($errors['其他原因'], $d['序号'] . ':' . implode(';', $errorMsg));
//                        $errorsCount++;
                        throw new Exception($d['序号'] . ':' . '其他原因');
                    } else {
                        $count++;
                    }
                    $transaction->commit();
//                } catch (\Exception $e) {
//                    $transaction->rollBack();
                    //throw $e;
//                }
            }

            $msg = '成功导入' . $count . '条记录';
            if ($errorsCount > 0) {
                $errorMsg = [];
                foreach ($errors as $type => $errorArr) {
                    if (count($errorArr) <= 0) {
                        continue;
                    }
                    array_push($errorMsg, $type);
                    array_push($errorMsg, implode('、', $errorArr));
                }
                $msg .= '<br>未成功导入' . $errorsCount . '条数据，未导入的序号及原因是为：<br>' . implode('<br>', $errorMsg);
                Yii::$app->session->setFlash('warning', $msg);
            } else {
                Yii::$app->session->setFlash('success', $msg);
            }
            return $this->redirect(['/right/user/index']);*/
    }
}