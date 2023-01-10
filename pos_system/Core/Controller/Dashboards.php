<?php

namespace Core\Controller;
use Core\Base\Controller;
use Core\Base\View;
use Core\Model\Item;
use Core\Model\User;
use Core\Model\Transaction;
 
 

class Dashboards extends  Controller  
{


    public function render()
    {
            if (!empty($this->view))
                    $this->view();
    }

    function __construct()
    {
            $this->auth();
            $this->admin_view(true);
    }

    
     public function Dashboard()
           
     {
        $this->view = 'dashboard';
        $item = new Item(); // new model item.
        $this->data['items'] = $item->get_all();
        $this->data['items_count'] = count($item->get_all());
        $this->data['top_items'] = $item->top5();
    
        $user = new User(); // new model user.
        $this->data['users'] = $user->get_all();
        $this->data['users_count'] = count($user->get_all());
    
        $transaction = new Transaction(); // new model transaction.    
        $this->data['transactions_count'] = count($transaction->get_all());
        $this->data['total_sell'] = $transaction->total_selling();
 
     }
    
}

   
