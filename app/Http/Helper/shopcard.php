<?php

namespace App\Http\Helper;
class shopcard{

    public $items=[];
    public $quantity=0;
    public $price=0;
    public function __construct()
    {
        $this->items=session('card')?session('card'):[];
        $this->quantity=$this->get_quantity();
        $this->price=$this->get_price();

    }
    public function add($sanpham,$quantity=1){
        $item=[
            'id'=>$sanpham->id,
            'tensp'=>$sanpham->tensp,
            'price'=>$sanpham->giaxuat,
            'anh'=>$sanpham->anh,
            'quantity'=>$quantity,  
        ];
        if(isset($this->items[$sanpham->id])){
            $this->items[$sanpham->id]['quantity']+=$quantity;
        }
        else{
            $this->items[$sanpham->id]=$item;
        }
        
        session(['card'=>$this->items]);

    }
    public function delete($id){
        if(isset($this->items[$id])){
           unset($this->items[$id]);
        }
        session(['card'=>$this->items]);


    }
    public function up($id){
     
        if($this->items[$id]){
            $this->items[$id]['quantity']+=1;
        }
        session(['card'=>$this->items]);

    }
    public function down($id){
     
        if($this->items[$id]){
            $this->items[$id]['quantity']-=1;
        }
        session(['card'=>$this->items]);

    }
   
    public function capnhat_pricem($id){
     
        if($this->items[$id]){
            $this->items[$id]['quantity']-=1;
            if($this->items[$id]['quantity']==0){
                unset($this->items[$id]);
            }
        }
       
        session(['card'=>$this->items]);

    }
    public function delete_all(){

        session()->forget('card');

    }
    private function get_price(){
        $t=0;
        foreach($this->items as $it){
            $t+=$it['price']*$it['quantity'];
        }
        return $t;
    }
    private function get_quantity(){
        $t=0;
        foreach($this->items as $it){
            $t+=$it['quantity'];
        }
        return $t;
       
    }














}








?>