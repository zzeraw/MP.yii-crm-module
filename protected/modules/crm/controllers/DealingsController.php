<?php

class DealingsController extends BaseCrmController
{
    public function actionIndex()
    {

    }

    public function actionView($id)
    {

    }

    public function actionCreate()
    {
        // Определение
        $dealing_model = new CrmDealing;

        // Внесение и обработка данных


        // Генерация вида
        $this->render('create',
            array(
                'dealing_model' => $dealing_model,
            )
        );
    }

    public function actionUpdate($id)
    {

    }

    public function actionDelete($id)
    {

    }
}