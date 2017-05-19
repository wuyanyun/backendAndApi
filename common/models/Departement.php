<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "departement".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $department
 * @property integer $department_manager
 * @property integer $create_time
 * @property integer $update_time
 */
class Departement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departement';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'department_manager', 'create_time', 'update_time'], 'integer'],
            [['department'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => '父级id',
            'department' => '部门',
            'department_manager' => '部门主管',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
