<?php
declare(strict_types=1);

class ArticleController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->articles = Article::find();
    }

    public function createAction()
    {

    }

    public function storeAction()
    {
        if ($this->request->isPost()) {
            $data = $this->request->getPost();

            $article = new Article();
            $article->flag = (int)$data['flag'];
            $article->title = $data['title'];
            $article->description = $data['description'];
            $article->content = $data['content'];
            $article->count = (int)$data['count'];
            $article->status = (int)$data['status'];
            $article->save();
        }

        return $this->response->redirect('/demo/article');
    }

    public function showAction($id)
    {
        $this->view->article = Article::findFirstById($id);
    }

    public function editAction($id)
    {
        $this->view->article = Article::findFirstById($id);
    }

    public function updateAction($id)
    {
        if ($this->request->isPost()) {
             $article = Article::findFirstById($id);
            $updateData = $this->request->getPost();

            $article->id = $id;
            $article->flag = (int)$updateData['flag'];
            $article->title = $updateData['title'];
            $article->description = $updateData['description'];
            $article->content = $updateData['content'];
            $article->count = (int)$updateData['count'];
            $article->status = (int)$updateData['status'];

            if (!$article->save()) {
                return $this->response->redirect('/demo/article/edit'.$id);
            }
        }

        return $this->response->redirect('/demo/article');
    }

    public function destroyAction($id)
    {
        if ($this->request->isPost()) {
            if(Article::findFirstById($id)->delete()){
                echo "delete successfully";
                exit();
            }
            else {
                echo "failed to delete";
                exit();
            }
        }
        return $this->response->redirect('/demo/article');
    }
}

