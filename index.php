<!DOCTYPE HTML>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<style>
	button{
		width:50px;
		height:50px;
		display: inline-block;
		margin-right: -4px;
        margin-top: -1px;
        background-color:#000000;
	}
</style>
<body >
<?php
header("Content-Type:text/html; charset=utf-8");
$maxBomb = 20;
$length = 10;
$width = 10;

for($x=0; $x<$length; $x++){
    for($y=0; $y<$width; $y++){
        $arr[$x][$y]='0';
    }
}

for($setBomb = 0; $setBomb < $maxBomb; $setBomb++) {
    while(true) {
        // 隨機產生一個炸彈
        $row = rand(0, 9);
        $column = rand(0, 9);
        if ($arr[$row][$column] != 'M') {
            $arr[$row][$column] = 'M';
            break;
        }
    }
}

for($x = 0; $x < 10; $x++){
    for($y = 0; $y < 10; $y++){
        if($arr[$x][$y]!= 'M'){
            if ($arr[$x+1][$y] == 'M') {
                $arr[$x][$y]++;
            }
            if ($arr[$x-1][$y] == 'M') {
                $arr[$x][$y]++;
            }
            if ($arr[$x][$y+1] == 'M') {
                $arr[$x][$y]++;
            }
            if ($arr[$x][$y-1] == 'M') {
                $arr[$x][$y]++;
            }
            if ($arr[$x+1][$y+1] == 'M') {
                $arr[$x][$y]++;
            }
            if ($arr[$x-1][$y-1] == 'M') {
                $arr[$x][$y]++;
            }
            if ($arr[$x-1][$y+1] == 'M') {
                $arr[$x][$y]++;
            }
            if ($arr[$x+1][$y-1] == 'M') {
                $arr[$x][$y]++;
            }
        }
    }
}
$x=0;
$y=0;
foreach($arr as $value) {
    // $x = 0 ;
    $y=0;
    foreach ($value as $val) {
        // $y = 0;
        echo "<button id='".($x*10+$y)."' value=".$val.">-</button>";
        $y++;
    }
    echo "<br>";
    $x++;
}

foreach($arr as $value) {
    // $x = 0 ;
    $y=0;
    foreach ($value as $val) {
        // $y = 0;
        echo "<button id='".($x*10+$y)."' value=".$val." style='background-color:#FFFFFF'>$val</button>";
        $y++;
    }
    echo "<br>";
    $x++;
}

 ?>
</body>
<script>

    $(function(){
        $(document).bind("contextmenu",function(event){
            return false;
        });

        $("button").mousedown(function(){
            if (event.button == 0) {
                $(this).text($(this).val());
                $(this).css("background-color","#FFFFFF");
                    if ($(this).val() == "M") {
                        alert("bomb!");
                    }
                    if ($(this).val() == "0") {
                        // int $zero = $(this).attr('id');
                        var $x = Number($(this).attr('id'));
                        run($x);


                    }
                }
            if(event.button == 2){
                if($(this).val() != "M") {
                    alert("false");
                } else {
                    $(this).text("!");
                    $(this).css("background-color","#FF0000");
                }
            }
            // if(event.button == 1){
            //     $(this).css("background-color","#FFFF1C");
            // }
        });
        function run($x){
            if($x%10 == 0){
                            var $z2 = $x-10;//上
                            var $z1 = $x+10;//下
                            var $z3 = $x+1;//右
                            var $z5 = $x-9;//右上
                            var $z4 = $x+11;//右下
                            openb($z1);
                            openb($z2);
                            openb($z3);
                            openb($z4);
                            openb($z5);

                        }else if($x%10 == 9){
                            var $z1 = $x+10;//下
                            var $z2 = $x-10;//上
                            var $z3 = $x-1;//左
                            var $z5 = $x+9;//左下
                            var $z7 = $x-11;//左上
                            openb($z1);
                            openb($z2);
                            openb($z3);
                            openb($z5);
                            openb($z7);
                        }else{
                            var $z1 = $x+10;
                            var $z2 = $x-10;
                            var $z3 = $x-1;
                            var $z4 = $x+1;
                            var $z5 = $x-9;
                            var $z6 = $x+9;
                            var $z7 = $x-11;
                            var $z8 = $x+11;
                            openb($z1);
                            openb($z2);
                            openb($z3);
                            openb($z4);
                            openb($z5);
                            openb($z6);
                            openb($z7);
                            openb($z8);
                        }
        }

        function openb($z){
            // alert("#"+$z);
            // alert($("#"+$z).val);
            $("#"+$z).text($("#"+$z).val());
            $("#"+$z).css("background-color","#FFFFFF");
            // if($("#"+$z).val()=="0"&&$("#"+$z).attr("background-color")){
                alert($("#"+$z).attr("background-color"));
                // $i = Number($("#"+$z).id());
                // run($i);
            // }
        }
    });
</script>
</html>