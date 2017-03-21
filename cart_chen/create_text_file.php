
<!DOCTYPE html>
<html>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
&nbsp
<?php

$user='aaaa';
$x = <<<EOF
*Single quotes are used when the string is a constant like 'no variables here'<br>
*Double quotes when I can put the string on a single line and require variable<br> *interpolation or an embedded single quote "Today is ${user}'s birthday"<br>
*Here documents for multi-line strings that require formatting and variable interpolation.<br>
EOF;

echo $x;

$something='aaa';
$whatever='bbb';
$testing123='ccc';
$html = <<<zzz
  <div class='something'>
    <ul class='mylist'>
      <li>something: &nbsp &nbsp &nbsp &nbsp$something</li>
      <li>whatever: $whatever</li>
      <li>testing123: $testing123</li>
    </ul>
  </div>
zzz;

// sometime later
echo $html;echo"<br>";

?>

</html>