<?php
class Pages extends Controller
{
public function index()
    {
        $viewPath = VIEWS_PATH . 'pages/Index.php';
        require_once $viewPath;
        $indexView = new Index($this->getModel(), $this);
        $indexView->output();
    }
public function viewItem()
    {
        $viewPath = VIEWS_PATH . 'pages/viewItem.php';
        require_once $viewPath;
        $indexView = new viewItem($this->getModel(), $this);
        $indexView->output();
    }
public function viewRent()
    {
        $viewPath = VIEWS_PATH . 'pages/viewRent.php';
        require_once $viewPath;
        $indexView = new viewRent($this->getModel(), $this);
        $indexView->output();
    }
public function viewDescription()
    {
        $viewPath = VIEWS_PATH . 'pages/viewDescription.php';
        require_once $viewPath;
        $indexView = new viewDescription($this->getModel(), $this);
        $indexView->output();
    }    

    public function WishList()
    {
        $viewPath = VIEWS_PATH . 'pages/wishlist.php';
        require_once $viewPath;
        $WishListView = new WishList($this->getModel(), $this);
        $WishListView->output();
    }
    
    public function about()
    {
        $viewPath = VIEWS_PATH . 'pages/about.php';
        require_once $viewPath;
        $WishListView = new About($this->getModel(), $this);
        $WishListView->output();
    }    
    public function DashBoard()
    {
        $viewPath = VIEWS_PATH . 'pages/DashBoard.php';
        require_once $viewPath;
        $WishListView = new DashBoard($this->getModel(), $this);
        $WishListView->output();
    } 
    public function Profile()
    {
        $viewPath = VIEWS_PATH . 'pages/Profile.php';
        require_once $viewPath;
        $WishListView = new Profile($this->getModel(), $this);
        $WishListView->output();
    }   
}
