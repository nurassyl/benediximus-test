<?php

namespace app\controllers;

use Yii;
use app\models\Group;
use app\models\GroupSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\StudentSearch;
use app\models\Student;
use app\models\GroupStudent;
use app\models\SubjectSearch;
use app\models\Subject;
use app\models\GroupSubject;

/**
 * GroupsController implements the CRUD actions for Group model.
 */
class GroupsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Group models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GroupSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Group model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Group model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Group();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Group model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Group model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Group model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Group the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Group::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Lists all Students of Group.
     * @return mixed
     */
    public function actionStudents()
    {
		$request = Yii::$app->request;

		$group = Group::findOne($request->get('id'));
		if(!$group) {
			throw new \yii\web\NotFoundHttpException();
		}
        $searchModel = new StudentSearch($request->get('id'));
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('students', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'group' => $group,
        ]);
    }

    /**
     * Creates a new Student for Group.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddStudent()
    {
		$request = Yii::$app->request;

		$group = Group::findOne($request->get('id'));
		if(!$group) {
			throw new \yii\web\NotFoundHttpException();
		}
        $model = new GroupStudent();
		$model->load(Yii::$app->request->post());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('/groups/'.$group->id.'/students');
        }

		$students = [];

		foreach(Student::find()->all() as $student) {
			$students[strval($student->id)] = $student->name;
		}

        return $this->render('add-student', [
            'model' => $model,
			'group' => $group,
			'students' => $students,
        ]);
    }

    /**
     * Lists all Subjects of Group.
     * @return mixed
     */
    public function actionSubjects()
    {
		$request = Yii::$app->request;

		$group = Group::findOne($request->get('id'));
		if(!$group) {
			throw new \yii\web\NotFoundHttpException();
		}
        $searchModel = new SubjectSearch($request->get('id'));
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('subjects', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'group' => $group,
        ]);
    }

    /**
     * Creates a new Subject for Group.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionAddSubject()
    {
		$request = Yii::$app->request;

		$group = Group::findOne($request->get('id'));
		if(!$group) {
			throw new \yii\web\NotFoundHttpException();
		}
        $model = new GroupSubject();
		$model->load(Yii::$app->request->post());

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('/groups/'.$group->id.'/subjects');
        }

		$subjects = [];

		foreach(Subject::find()->all() as $subject) {
			$subjects[strval($subject->id)] = $subject->name;
		}

        return $this->render('add-subject', [
            'model' => $model,
			'group' => $group,
			'subjects' => $subjects,
        ]);
    }
}
