<?php
$q = $_REQUEST["q"];
$from = $_REQUEST["pricefrom"];
$to = $_REQUEST["priceto"];
include "pdo.php";
class productObj {
	public $id;
	public $name;
	public $image;
	public $status;
    public $price;

    public function __construct( $id, $name, $image, $status, $price ){
        $this->id = $id;
        $this->name = $name;
		$this->image= $image;
		$this->status= $status;
		$this->price= $price;
    }

    public function getId()
    {
        return $this->id;
    }
	public function getName()
    {
        return $this->name;
    }
	public function getImage()
    {
        return $this->image;
    }
	public function getStatus()
    {
        return $this->status;
    }
	public function getPrice()
    {
        return $this->price;
    }
}
if($from!=''&&$to=='') {
	$sql="select * from product where price>=".$from." AND id_category=1 AND del!='del'";
	$sp=pdo_query($sql);
}
if($from==''&&$to!='') {
	$sql="select * from product where price<=".$to." AND id_category=1 AND del!='del'";
	$sp=pdo_query($sql);
}
if($from!=''&&$to!='') {
	$sql="select * from product where price>=".$from." AND price<=".$to." AND id_category=1 AND del!='del'";
	$sp=pdo_query($sql);
}
	$count=0;
	$arrayProduct=array();
	echo '<div style="width:100%; margin:auto; height:530px">';
	$numItems = count($sp);
	$start=($q-1)*12;
	$end=$start+12;
	if($end>$numItems) {$end=$numItems;}
    	for($i=$start;$i<$end;$i++)
   		{
		   extract($sp[$i]);
		  $Obj=new productObj($id,$name,$image,$status,$price);
		  $arrayProduct[]=$Obj;
		  $count++;
		  if($count==3) {
		  	if($arrayProduct[0]->getStatus()=='none') {$stt1='none';}
			else {$t1=explode('-',$arrayProduct[0]->getStatus());
			$stt1=ucfirst( $t1[0] ) .' '. ucfirst( $t1[1] );}
			if($arrayProduct[1]->getStatus()=='none') {$stt2='none';}
			else {$t2=explode('-',$arrayProduct[1]->getStatus());
			$stt2=ucfirst( $t2[0] ) .' '. ucfirst( $t2[1] );}
			if($arrayProduct[2]->getStatus()=='none') {$stt3='none';}
			else {$t3=explode('-',$arrayProduct[2]->getStatus());
			$stt3=ucfirst( $t3[0] ) .' '. ucfirst( $t3[1] );}
		  	echo '<div class="SPsearch" style="float:left; margin-left:0px" id="img'.$arrayProduct[0]->getId().'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        	<a href="index.php?product-detail='.$arrayProduct[0]->getId().'"><div class="imgSPsearch"> 
            	<img src="photo/'.$arrayProduct[0]->getImage().'" style="width:100%; height:100%"  />
                <i class="far fa-futbol fa-2x" style="position:absolute; right:15px; bottom:10px"></i>
                <div class="hoverSP" id="sp'.$arrayProduct[0]->getId().'">
                	<h5 class="muangay"><b>MUA NGAY</b></h5>
                </div>
            </div></a>
            <p class="status">'.$stt1.'</p>
            <a href="index.php?product-detail='.$arrayProduct[0]->getId().'"><h5 class="nameSP"><b>'.$arrayProduct[0]->getName().'</b></h5></a>
            <h5 class="priceSPsearch"><b>'.$arrayProduct[0]->getPrice().' VND</b></h5>
       		</div>
			
			
			 <div class="SPsearch" style="float:left; margin-left:18px" id="img'.$arrayProduct[1]->getId().'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        <a href="index.php?product-detail='.$arrayProduct[1]->getId().'"><div class="imgSPsearch"> 
           <img src="photo/'.$arrayProduct[1]->getImage().'" style="width:100%; height:100%"  />
           <i class="far fa-futbol fa-2x" style="position:absolute; right:15px; bottom:10px"></i>
           <div class="hoverSP" id="sp'.$arrayProduct[1]->getId().'">
           <h5 class="muangay"><b>MUA NGAY</b></h5>
           </div>    
         </div></a>
            <p class="status">'.$stt2.'</p>
            <a href="index.php?product-detail='.$arrayProduct[1]->getId().'"><h5 class="nameSP"><b>'.$arrayProduct[1]->getName().'</b></h5></a>
            <h5 class="priceSPsearch"><b>'.$arrayProduct[1]->getPrice().' VND</b></h5>
        </div>
		
		
		<div class="SPsearch" style="float:right" id="img'.$arrayProduct[2]->getId().'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        <a href="index.php?product-detail='.$arrayProduct[2]->getId().'"><div class="imgSPsearch"> 
           <img src="photo/'.$arrayProduct[2]->getImage().'" style="width:100%; height:100%"  />
           <i class="far fa-futbol fa-2x" style="position:absolute; right:15px; bottom:10px"></i>
           <div class="hoverSP" id="sp'.$arrayProduct[2]->getId().'">
           <h5 class="muangay"><b>MUA NGAY</b></h5>
            </div>
        </div></a>
            <p class="status">'.$stt3.'</p>
            <a href="index.php?product-detail='.$arrayProduct[2]->getId().'"><h5 class="nameSP"><b>'.$arrayProduct[2]->getName().'</b></h5></a>
            <h5 class="priceSPsearch"><b>'.$arrayProduct[2]->getPrice().' VND</b></h5>
        </div>
		</div>';
			if($i != $numItems) {echo '<div style="width:100%; margin:auto; height:530px">';}
			$count=0;
			$arrayProduct=array();
		  }  
		  if ($i == $numItems-1 && $count==1) {
		   	if($arrayProduct[0]->getStatus()=='none') {$stt1='none';}
			else {$t1=explode('-',$arrayProduct[0]->getStatus());
			$stt1=ucfirst( $t1[0] ) .' '. ucfirst( $t1[1] );}
		  echo '<div class="SPsearch" style="float:left; margin-left:0px" id="img'.$arrayProduct[0]->getId().'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        	<a href="index.php?product-detail='.$arrayProduct[0]->getId().'"><div class="imgSPsearch"> 
            	<img src="photo/'.$arrayProduct[0]->getImage().'" style="width:100%; height:100%"  />
                <i class="far fa-futbol fa-2x" style="position:absolute; right:15px; bottom:10px"></i>
                <div class="hoverSP" id="sp'.$arrayProduct[0]->getId().'">
                	<h5 class="muangay"><b>MUA NGAY</b></h5>
                </div>
            </div></a>
            <p class="status">'.$stt1.'</p>
            <a href="index.php?product-detail='.$arrayProduct[0]->getId().'"><h5 class="nameSP"><b>'.$arrayProduct[0]->getName().'</b></h5></a>
            <h5 class="priceSPsearch"><b>'.$arrayProduct[0]->getPrice().' VND</b></h5>
       		</div></div>';	
		  }
		  if ($i == $numItems-1 && $count==2) {
		 	if($arrayProduct[0]->getStatus()=='none') {$stt1='none';}
			else {$t1=explode('-',$arrayProduct[0]->getStatus());
			$stt1=ucfirst( $t1[0] ) .' '. ucfirst( $t1[1] );}
			if($arrayProduct[1]->getStatus()=='none') {$stt2='none';}
			else {$t2=explode('-',$arrayProduct[1]->getStatus());
			$stt2=ucfirst( $t2[0] ) .' '. ucfirst( $t2[1] );}
		  	echo '<div class="SPsearch" style="float:left; margin-left:0px" id="img'.$arrayProduct[0]->getId().'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        	<a href="index.php?product-detail='.$arrayProduct[0]->getId().'"><div class="imgSPsearch"> 
            	<img src="photo/'.$arrayProduct[0]->getImage().'" style="width:100%; height:100%"  />
                <i class="far fa-futbol fa-2x" style="position:absolute; right:15px; bottom:10px"></i>
                <div class="hoverSP" id="sp'.$arrayProduct[0]->getId().'">
                	<h5 class="muangay"><b>MUA NGAY</b></h5>
                </div>
            </div></a>
            <p class="status">'.$stt1.'</p>
            <a href="index.php?product-detail='.$arrayProduct[0]->getId().'"><h5 class="nameSP"><b>'.$arrayProduct[0]->getName().'</b></h5></a>
            <h5 class="priceSPsearch"><b>'.$arrayProduct[0]->getPrice().' VND</b></h5>
       		</div>
			
			
			 <div class="SPsearch" style="float:left; margin-left:18px" id="img'.$arrayProduct[1]->getId().'"  onmouseover="hoverSP1(this);" onmouseout="hoverSP2(this);">
        <a href="index.php?product-detail='.$arrayProduct[0]->getId().'"><div class="imgSPsearch"> 
           <img src="photo/'.$arrayProduct[1]->getImage().'" style="width:100%; height:100%"  />
           <i class="far fa-futbol fa-2x" style="position:absolute; right:15px; bottom:10px"></i>
           <div class="hoverSP" id="sp'.$arrayProduct[1]->getId().'">
           <h5 class="muangay"><b>MUA NGAY</b></h5>
           </div>    
         </div></a>
            <p class="status">'.$stt2.'</p>
            <a href="index.php?product-detail='.$arrayProduct[1]->getId().'"><h5 class="nameSP"><b>'.$arrayProduct[1]->getName().'</b></h5></a>
            <h5 class="priceSPsearch"><b>'.$arrayProduct[1]->getPrice().' VND</b></h5>
        </div></div>';
		  }
	}
?>
