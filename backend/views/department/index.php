<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departements';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .tab tr th{
        align: center;
    }
     table.tab tr th{
        text-align:  center;
    }
     table.tab tr td{
        text-align:  center;
    }
      table.tab thead tr {
        height: 45px;
        line-height: 45px;
        background: #bebec5;
        
    }
    
      table.tab tbody tr td:nth-child(1){
        text-align:  left;
    }
    
    
</style>
<div class="departement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Departement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
     <table class="tab"  border="1" style="width:75%;">
        <thead>
             <tr>
            <th>部门层级</th>
        </tr> 
        </thead>
        <tbody>
            <?php function add($data,$i){ ?>
            <?php foreach ($data as $k => $v) {?>
            <tr>
                 <?php if($v['parent_id']==0) {?>
            <td style="font-weight:900;"><?=$v['department']?></td>
                 <?php } else {?>
                <td>
                <?php
            for($j=1;$j<$i;$j++){
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            } ?>&nbsp;&nbsp;<?=$v['department']?>
                </td>
                 <?php }?>
            </tr>
            <?php
            if(!empty($v['child'])){
                add($v['child'],$i+1);
            }
            } }?>
        </tbody>
         <?php
         add($data,1);
          ?>
    </table>
</div>
