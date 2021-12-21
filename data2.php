<?php
	include 'pdo.php';
	if (isset($_POST['getData'])&&$_POST['start']>=0) {
		$sql="select * from comment where id_product=".$_POST['id']." LIMIT ".$_POST['start'].", ".$_POST['limit'];
		$cm=pdo_query($sql);
		$cm=array_reverse($cm);
		$i=1;
		if (count($cm) > 0){
			$response = "";
			foreach($cm as $t)
			{
			extract($t);
			$d=strlen($content);
        	echo '<div class="comment" style="height:115px" id="cm'.$i.'">
                    <div style="width:100px; height:100px; margin-left:20px; margin-top:6px; float:left">
						<img src="photo/programmer.png" style="width:100px; height:100px"  />
					</div>
                    <div style="width:460px; float:left; margin-left:20px">
                        <div style="font-size:20px"><b>'.$name.'</b></div>
                        <div style="margin-top:5px; font-size:17px; color:#808080"><i>'.$date.'</i></div>
                        <div style="margin-top:5px; width:100%;word-wrap:break-word" class="text'.$i.'"><i>'.$content.'</i></div>
						<script>
							$(function() {
							  var val = $(".text'.$i.'").css("height");
							  if(val!="24px") {
								  var t=val.slice(0,val.length-2);
								  var h=parseInt(t);
								  h+=70;
								  $("#cm'.$i.'").css("height",h+"px");
								  }
							});
						</script>
								</div>
						</div>';
			$i++;
			}
			if($_POST['start']!=0) {
				echo '<h6 id="see_comment" onclick="see_comment()">Xem thêm...</h6>';
			}
			exit($response);
		} 
		}else {
			$sql="select * from comment where id_product=".$_POST['id'];
			$cm=pdo_query($sql);
			$cm=array_reverse($cm);
			$i=1;
			if (count($cm) > 0){
			$response = "";
			foreach($cm as $t)
			{
			extract($t);
			$d=strlen($content);
        	echo '<div class="comment" style="height:115px" id="cm'.$i.'">
                    <div style="width:100px; height:100px; margin-left:20px; margin-top:6px; float:left">
						<img src="photo/programmer.png" style="width:100px; height:100px"  />
					</div>
                    <div style="width:460px; float:left; margin-left:20px">
                        <div style="font-size:20px"><b>'.$name.'</b></div>
                        <div style="margin-top:5px; font-size:17px; color:#808080"><i>'.$date.'</i></div>
                        <div style="margin-top:5px; width:100%;word-wrap:break-word" class="text'.$i.'"><i>'.$content.'</i></div>
						<script>
							$(function() {
							  var val = $(".text'.$i.'").css("height");
							  if(val!="24px") {
								  var t=val.slice(0,val.length-2);
								  var h=parseInt(t);
								  h+=70;
								  $("#cm'.$i.'").css("height",h+"px");
								  }
							});
						</script>
								</div>
						</div>';
			$i++;
			}
		}
	}
?>