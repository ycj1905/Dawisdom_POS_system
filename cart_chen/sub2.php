<?php
//session_set_cookie_params(1800 , '/', '.mydomain.com'); 
session_set_cookie_params(3600*24 , '/', '.192.168.1.22'); 
session_start(); 
$_SESSION['sub2'] = 'sub2'; 
print_r($_SESSION);
echo '<br>';



class HelloOOP{

  //php4的宣告成員屬性
  var $memberA;
  //php5的宣告成員屬性
  public $memberB;

  //建構子 For PHP5
  function __construct($inputA,$inputB){
      $this->memberA=$inputA;
      $this->memberB=$inputB;
  }

  //定義解建構子
  function __destruct(){
      echo "這個類別被解開了！";
  }

  //宣告成員方法
  public function callShowMessage(){

      //呼叫成員方法來使用。
     $this->showMessage(); 

  }

   //宣告成員方法，不加上關鍵字都視為public
   function showMessage(){

        //呼叫成員屬性來使用。
        echo $this->memberA;

   }

}

$A=new HelloOOP("HELLO","你好");


//建立出實體之後運用裡面的方法。 會顯示 HELLO 
$A->callShowMessage();

//建立出實體之後運用裡面的屬性。會顯示 "你好"
echo $A->memberB;
?>