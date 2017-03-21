
<?php
if(isset($_POST["submit"]) || isset($_SESSION['order']['number'])) {
	if(isset($_SESSION['order']['number'])) {//(3)session_order_number及session_order_phone俱已接值。
		echo '<table align="center">';
		echo '<tr>';
		echo"<td>點餐序號：".$_SESSION['order']['number']."&nbsp;&nbsp;</td>";
		echo'<td><form method="post" action="cart_session_unset_return.php">';
		echo '<input type="hidden" name="return_url" value="'.$current_url.'">';	
		echo '<h4><input type="submit" value="重抽號碼牌" name="submit"></h4>';	
		echo '</form></td>';
		echo '</tr>';
		echo '<tr>';
		echo"<td>手機號碼：".$_SESSION['order']['phone']."&nbsp;&nbsp;</td>";
		echo '</tr>';
		echo '</table>'; 
		} else{
//		echo $_POST['phone_number'];	
		$_SESSION['order']['phone']=$_POST['phone_number'];//(2)第一次由POST進來，session_order_phone接POST_phone值。
		require('./cart_counter_order.php');//session_order_number接值。
		echo '<table align="center">';
		echo '<tr>';
		echo"<td>點餐序號：".$_SESSION['order']['number']."&nbsp;&nbsp;</td>";
		echo'<td><form method="post" action="cart_session_unset_return.php">';
		echo '<input type="hidden" name="return_url" value="'.$current_url.'">';	
		echo '<h4><input type="submit" value="重抽號碼牌" name="submit"></h4>';	
		echo '</form></td>';
		echo '</tr>';
		echo '<tr>';
		echo"<td>手機號碼：".$_SESSION['order']['phone']."&nbsp;&nbsp;</td>";
		echo '</tr>';
		echo '</table>'; 
	}
} else{//(1)第一次執行cart_index.php時，從未POST即未設session_order_number時，輸出form。
	echo '<form method="post" action="">';
	echo '<table align="center">';
	echo '<tr>';
	echo '<td><h4>請輸入手機號碼:<input type="text" name="phone_number"></h4></td>';
	echo '<td><h4><input type="submit" value="傳送" name="submit"></h4></td>';	
	echo '</tr>';
	echo '</table>';
	echo '</form>';
}
?>