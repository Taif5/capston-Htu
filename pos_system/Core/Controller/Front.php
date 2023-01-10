<?php
 

namespace Core\Controller;
use Core\Base\Controller;
use Core\Model\Item;
use Core\Model\User;
use DateTime;

class Front extends Controller
{
    public function render()
    {
        if (!empty($this->view))
            $this->view();
    }

    function __construct()
    {
        $this->admin_view(false);
    }

    /**
     * List all news
     *
     * @return void
     */
    public function index()
    {
        $this->view = 'home';
        $item = new User();
        $this->data['user'] = $item->get_all();
    }

    public function single()
    {
        $user = new User(); // get the user model to get the author info
        $author = $user->get_by_id($selected_item->user_id); // get the author by using the user_id in the $selected_item
        $selected_item->author = !empty($author) ? $author->display_name : null; // check if we got a user withe the provided user_id
        $date = new \DateTime($selected_item->created_at);
        $selected_item->created_at = $date->format('d/m/Y');
 
       
    
    }

 

}

 
//     /**
//      * List all 
//      *
//      * @return void
//      */

//       public function index()
//     {
//         $this->permissions(['user:read']);
//         $this->view = 'users.index';
//         $user = new User; // new model user.
//         $this->data['users'] = $user->get_all();
//         $this->data['users_count'] = count($user->get_all());
// }

// public function single()
// {
//         $this->permissions(['user:read']);
//         $this->view = 'users.single';
//         $user = new User();
//         $this->data['user'] = $user->get_by_id($_GET['id']);
 

 
//         $this->data['item'] = $selected_item;
//     }

  