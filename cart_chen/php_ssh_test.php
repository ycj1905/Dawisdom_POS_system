<?php

// ssh protocols
// note: once openShell method is used, cmdExec does not work

class ssh2 {

  private $host = 'host';
  private $user = 'user';
  private $port = '22';
  private $password = 'password';
  private $con = null;
  private $shell_type = 'xterm';
  private $shell = null;
  private $log = '';

  function __construct($host='', $port=''  ) {

     if( $host!='' ) $this->host  = $host;
     if( $port!='' ) $this->port  = $port;

     $this->con  = ssh2_connect($this->host, $this->port);
     if( !$this->con ) {
       $this->log .= "Connection failed !"; 
     }

  }

  function authPassword( $user = '', $password = '' ) {

     if( $user!='' ) $this->user  = $user;
     if( $password!='' ) $this->password  = $password;

     if( !ssh2_auth_password( $this->con, $this->user, $this->password ) ) {
       $this->log .= "Authorization failed !"; 
     }

  }

  function openShell( $shell_type = '' ) {
      
    if ( $shell_type != '' ) $this->shell_type = $shell_type;
    $this->shell = ssh2_shell( $this->con,  $this->shell_type );
    if( !$this->shell ) $this->log .= " Shell connection failed !";
    stream_set_blocking( $this->shell, true );
    
  }

  function writeShell( $command = '' ) {

    fwrite($this->shell, $command."\n");
        
  }

  function cmdExec( ) {

        $argc = func_num_args();
        $argv = func_get_args();

    $cmd = '';
    for( $i=0; $i<$argc ; $i++) {
        if( $i != ($argc-1) ) {
          $cmd .= $argv[$i]." && ";
        }else{
          $cmd .= $argv[$i];
        }
    }
    echo $cmd;

    $stream = ssh2_exec( $this->con, $cmd );
    stream_set_blocking( $stream, true );
       return stream_get_contents($stream);

  }

  function getLog() {
     return $this->log; 

  }

    function getResult(){
        $contents='';
    while (!feof($this->shell)) {
        $contents.=fgets($this->shell);
    }
    return $contents;
    }
}


//使用ssh2_exec()連線
//include_once("ssh2.php");
//初始化class
$shell = new ssh2("設備IP");
$shell->authPassword("帳號","密碼");
//執行指令
$result=$shell->cmdExec("指令");
//印出指令執行結果
echo $result;
//


//使用ssh2_shell()連線

//include_once("ssh2.php");
//初始化class
$shell = new ssh2("設備IP");
$shell->authPassword("帳號","密碼");
//設定Terminal Type，預設就是xterm
$shell->openShell("xterm");
//執行指令
$shell->writeShell("指令1");
$shell->writeShell("指令2");
//登出logout指令(譬如在linux就是exit)
$shell->writeShell("logout");
//得到執行結果
$result=$shell->getResult();
//印出指令執行結果
echo $result;


/****************************************************************
         如Alvin所問的連續登入，只需要按照一般登入登出動作依序執行即可，如下面範例， 批次大量的執行可以考慮寫成function再加上multi-process來做:
*****************************************************************/


//將上面的class檔include進來
//include_once("ssh2.php");

/**************************
         登入第一台設備
***************************/
//初始化class
$shell = new ssh2("設備IP");
$shell->authPassword("帳號","密碼");
//設定Terminal Type，預設就是xterm
$shell->openShell("xterm");
//執行指令
$shell->writeShell("指令1");
$shell->writeShell("指令2");
//登出logout指令(譬如在linux就是exit)
$shell->writeShell("exit");
//得到執行結果
$result=$shell->getResult();
//印出指令執行結果
echo $result;


/**************************
         登入第二台設備
***************************/
//初始化class
$shell = new ssh2("設備IP");
$shell->authPassword("帳號","密碼");
//設定Terminal Type，預設就是xterm
$shell->openShell("xterm");
//執行指令
$shell->writeShell("指令1");
$shell->writeShell("指令2");
//登出logout指令(譬如在linux就是exit)
$shell->writeShell("exit");
//得到執行結果
$result=$shell->getResult();
//印出指令執行結果
echo $result;



?>
