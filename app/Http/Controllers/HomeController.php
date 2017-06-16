<?php namespace App\Http\Controllers;

use View;

class HomeController extends Controller {

public function index() {
     $db = \DB::table('table1')->orderBy('field1', 'ASC')->orderBy('field2', 'ASC')->orderBy('field3', 'ASC')->get();
     $store = null;
     $f = null;

     $ItemArray1 = collect($store);
     $ItemArray2 = collect($f);
     $ItemArray3 = collect(null);
     
     /*for($i = 0; $i <= count($db) - 1; $i++){
        $store = $db[$i]->field1;
        $f = $db[$i]->field2;
        
        if($store == null) { 
            $ItemArray2->push($store);
        }
        else if($ItemArray2->contains($store)) {         
        }
        else {
             $ItemArray2->push($store);
        }
     }
     $ItemArray2->all();
     */
    /* $j = 0;
    $ch = 0;
    $temp = $db[0]->field1; //Albert Albert Albert Mark
    $temp2 = $db[0]->field2;
    for($i = 0; $i < count($db); $i++) { 
        if($db[$i]->field1 != $temp){ //Albert Albert Albert Mark 
           $temp = $db[$j]->field1;
           $ItemArray1[] = "f1";
           $ItemArray1[] = $temp;
           $ItemArray2[] = $temp;
           $ItemArray1[] = "f2";
           $ItemArray1[] = $db[$i]->field2;
           $ItemArray1[] = $db[$i]->field3;
          
        }
        else {
            if(!$ItemArray1->contains($temp)){
                $ItemArray1[] = "f1";
                $ItemArray1[] = $temp; //Albert Albert Albert
                $ItemArray1[] = "f2";
            }
                $ItemArray1[] = $db[$i]->field2;
                $ItemArray1[] = $db[$i]->field3; 
        }
        $j++; */
        /*if($db[$i]->field1 == $temp){
            if($ItemArray2 == null){
                $ItemArray2 = "f2";
            }
            else if(!$ItemArray2==contains($temp2)){
                $ItemArray2 = $temp2;
            }
            $j++;
        }
        else {
            $ItemArray1[] = "f1";
            $ItemArray1[] = $temp;
            $merge = $ItemArray1->merge($ItemArray2);
            $merge->all();
            $temp = $db[$j]->field1;
            $ItemArray2 = null;

        }*/
     /*}
     foreach($ItemArray1 as $i){
        if(!$ItemArray2==contains($i)){
            if($i != "f1" || $i != "f2") {
                $ItemArray2 = $i;
            }
            else {
                $merge = $ItemArray3->merge($ItemArray2)->all();
                $ItemArray2 = null;
            }
        }

     }*/


     //Start
     $parent = array();
     $child1 = array();
     for($i = 0; $i < count($db); $i++) { 
        if($parent == null) {
            $parent = array($db[$i]->field1);
            $child1 = array_fill_keys($parent, $db[$i]->field2);
        }
        else {
            if(array_key_exists($db[$i]->field1, $parent)){
                $child1[$db[$i]->field1] = $db[$i]->field2;
            }
        }
     }
     
     $newArray = array(
                   'Albert' => array(
                        'Food' => array('Meat', 'Fruits')),
                   'Mark' => array(
                        'Dessert' => array('Ice Cream'), 
                        'Drinks' => array(), 'Food'),
                   'Ron' => array('Drinks', 'Food'),
                   );

     $childArray = array(
                    'Food' => array('Meat', 'Fruits'),
                    'Dessert' => array('Ice Cream'),
                    'Drinks' => array('Coffee', 'Soft Drinks')
     );





     $newArray1 = array(
                   'Albert' => array(1),
                   'Mark' => array(2, 3, 4),
                   'Ron' => array(5, 6)
                   );

     $childArray1 = array(
                    1 => array('Food'),
                    2 => array('Dessert'),
                    3 => array('Drinks'),
                    4 => array('Food'), 
                    5 => array('Drinks'),
                    6 => array('Food'));

     $valueArray1 = array(
                    1 => array('Meat', 'Fruits'),
                    2 => array('Ice Cream'),
                    3 => array('Coffee', 'Soft Drinks'),
                    4 => array('Fruits'),
                    5 => array('Coffee'),
                    6 => array('Fruits'));

     $cnt = count($db);

     $newArrayTest = array();
     $childArrayTest = array();
     $test = null;
     $i = 0;
     $j = 0;
     $k = 0;

     $test = $db[0]->field1;
     $temp = $db[0]->field2;
     $newArrayTest[$db[0]->field1][] = null;
     foreach($db as $item){
        $i++;
        $childArrayTest[$i++] = $item->field1;
        $childArrayTest[$i++] = $item->field2;
        $childArrayTest[$i++] = $item->field3;
        if($test == $item->field1){
            if(in_array($item->field2, $newArrayTest[$item->field1])){

            }
            else {
               $newArrayTest[$item->field1][] = $item->field2;
            }
            
        }
        else{
            $test = $item->field1;
            $newArrayTest[$item->field1][] = $item->field2; 
        }
        
        
        
        /*if($test == $item->field1){
           $k++;
           if($temp == $item->field2){
                $childArrayTest[$i][] = $item->field2;
                $j++;
           }
           else {
            $j++;
                $temp = $db[$j]->field2;
           }
             
        } 
        else {
            $k++;
            $test = $db[$k]->field1;
        }*/
        
        
     }
     

     return view ('home')->with(array('db' => $db, 'ItemArray' => $ItemArray1, 'newArray' => $newArray1, 'childArray' => $childArray1, 'valueArray' => $valueArray1, 'newArrayTest' => $newArrayTest, 'test' => $childArrayTest, 'cnt' => $cnt));
        
    }
}
?>