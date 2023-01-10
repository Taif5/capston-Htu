<?php
namespace Core\Controller;
use Core\Base\Controller;
use Core\Base\View;
use Core\Model\Item;
use Core\Model\User;
use Core\Model\Transaction;
 
 

class  Sellings extends Controller
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
   
    
    public function index()
    {
        $this->view = 'selling';

        $item = new Item(); // new model item.
        $this->data['items'] = $item->get_all_items();
        $this->data['items_count'] = count($item->get_all());
    
        $transaction = new Transaction(); // new model transaction.
        $this->data['transactions_count'] = count($transaction->get_admin_transaction());

    }

 
 
    }
 
   
 