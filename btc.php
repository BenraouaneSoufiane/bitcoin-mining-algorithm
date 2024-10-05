<?php



require 'vendor/autoload.php';
use AndKom\Bitcoin\Address\Output\OutputFactory;


$payload = ["jsonrpc" => "2.0", "method" => "getblocktemplate", "params" => [["mode"=>"template","rules"=> ["segwit"]]] ];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://bitcoin-rpc.publicnode.com");
//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
//curl_setopt($ch, CURLOPT_USERPWD, "user" . ":" . "pass");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
//curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
$previous_block_hash = swapEndianness(json_decode($response)->result->previousblockhash);

$h = json_decode($response)->result->height;
$b = json_decode($response)->result->bits;
print_r($h."\r\n");














$h =863776;
//$h =863803;































/*
print_r(bchexdec(swapEndianness('0000000000000000000039922cfac04beb554b6d171d5b9f1bd36c93cf7943c1'))."\r\n");
print_r(bchexdec(swapEndianness('38404947b3150708339ee9ceac74fc908ceb536c8d32b538243977ffb2e37cea'))."\r\n");
print_r(strval(bchexdec(swapEndianness('38404947b3150708339ee9ceac74fc908ceb536c8d32b538243977ffb2e37cea'))/bchexdec(swapEndianness('0000000000000000000039922cfac04beb554b6d171d5b9f1bd36c93cf7943c1')))."\r\n");
print_r(strval(bchexdec(swapEndianness(bcdechex('688291840')))/bchexdec(swapEndianness(bcdechex('1725913228'))))."\r\n");
print_r(strval(bchexdec(swapEndianness(bcdechex('386082139')))/bchexdec(swapEndianness(bcdechex('1724856182'))))."\r\n");


print_r(bchexdec(swapEndianness('00000000000000000000f93d15742d7bfa9e6bb51eed51b4cae5c4cbc2c74f17'))."\r\n");
print_r(bchexdec(swapEndianness('1af07fda20f8290d663880ef396aad691983806c246d076a4474cac5952cb702'))."\r\n");
print_r(strval(bchexdec(swapEndianness('1af07fda20f8290d663880ef396aad691983806c246d076a4474cac5952cb702'))/bchexdec(swapEndianness('00000000000000000000f93d15742d7bfa9e6bb51eed51b4cae5c4cbc2c74f17')))."\r\n");
print_r(strval(bchexdec(swapEndianness(bcdechex('562888704')))/bchexdec(swapEndianness(bcdechex('4205593713'))))."\r\n");
print_r(strval(bchexdec(swapEndianness(bcdechex('386082139')))/bchexdec(swapEndianness(bcdechex('1725018376'))))."\r\n");
*/
/*
print_r(bchexdec('000000000000000000013ece0756efddfb5836a76b2fce38b493e23cb2f13881')."\r\n");
print_r(bchexdec('e80cfad022e83630ce1b960bdd758ca977b15c03f39b415bf29b2a787b268b46')."\r\n");
print_r(bcdiv(bchexdec('e80cfad022e83630ce1b960bdd758ca977b15c03f39b415bf29b2a787b268b46'),bchexdec('000000000000000000013ece0756efddfb5836a76b2fce38b493e23cb2f13881'))."\r\n");
print_r(strval(637558784/2568745392)."\r\n");
print_r(strval(386082139/1724856195)."\r\n");

die();
*/
$block_header = '';

//$version = swapEndianness(bcdechex(536879104));
//$block_header .= $version;
//print_r($version."\r\n");
//print_r($block_header."\r\n");
$block_header .= $previous_block_hash;




//print_r('current_time:'.$ct."\r\n");
//$time = swapEndianness(bcdechex(intval(json_decode($response)->result->mintime)+40));
/*$time = swapEndianness(bcdechex($ct));
$block_header .= $time;
print_r('time:'.$time."\r\n");
print_r($block_header."\r\n");

$bits = swapEndianness(json_decode($response)->result->bits);
$block_header .= $bits;
print_r($bits ."\r\n");
print_r($block_header."\r\n");

//$nounce = swapEndianness(bcdechex(3876479641+1));
$nounce = swapEndianness(bcdechex($ct+(3600*24*30*12*2)));
$block_header .= $nounce;
print_r($nounce."\r\n");
print_r($block_header."\r\n");
*/



$r = file_get_contents('https://bitcoinexplorer.org/api/block/0');
//$r = file_get_contents('https://bitcoinexplorer.org/api/block/'.$h-2);
$r = json_decode($r);


$bitstimey1 = bcmul(bcdiv(bchexdec(swapEndianness($r->bits)),$r->time,50),100000,50);
$versiononcey1 = bcmul(bcdiv($r->version,$r->nonce,50),100000,50);
/*print_r(strval($h-2)."\r\n");
print_r('version:'.$r->version."\r\n");
print_r('nonce:'.$r->nonce."\r\n");
print_r($versiononcey1."\r\n");

die(); */
/*$r = file_get_contents('https://bitcoinexplorer.org/api/block/1');
//$r = file_get_contents('https://bitcoinexplorer.org/api/block/'.$h-2);
$r = json_decode($r);*/
$merklerootprevioushy1 = '0';
//$merklerootprevioushy1 = bcmul(bcdiv(bchexdec(swapEndianness($r->merkleroot)),bchexdec(swapEndianness($r->previousblockhash)),50),10000,50);
//$synrealy1 = '6431578.7807550816';
//$x1 = $h-2;
$x1 = '0';
$rx1 = $h-2;
//$r = file_get_contents('https://bitcoinexplorer.org/api/block/'.$h-1);
$r = file_get_contents('https://bitcoinexplorer.org/api/block/'.$h-2);
$r = json_decode($r);
 //$r2 = file_get_contents('https://bitcoinexplorer.org/api/block/'.$h-1);
 //$r2 = json_decode($r2);
 //$t = $r->time;
$bitstimey2 = bcmul(bcdiv(bchexdec(swapEndianness($r->bits)),$r->time,50),100000,50);
$versiononcey2 = bcmul(bcdiv($r->version,$r->nonce,50),100000,50);
$merklerootprevioushy2 = bcmul(bcdiv(bchexdec(swapEndianness($r->merkleroot)),bchexdec(swapEndianness($r->previousblockhash)),50),10000,50);
//$synrealy2 = '109.1211821286';
$x2 = $h-2;
$rx2 = $h-1;
//$x2 = $h-1;
$v = $r->version;
$n = $r->nonce;
$t = $r->time;
 
 
 
 $bitstimea = bcdiv(bcsub($bitstimey2,$bitstimey1,50),bcsub($x2,$x1,50),50);
 $bitstimeb = bcsub($bitstimey2,bcmul($bitstimea,$x2,50),50);



 $r = file_get_contents('https://bitcoinexplorer.org/api/block/'.$h-1);
 $r = json_decode($r);


/*if($merklerootprevioushy2>$merklerootprevioushy1 && bcdiv(bchexdec(swapEndianness($r->merkleroot)),bchexdec(swapEndianness($r->previousblockhash)),50) > $merklerootprevioushy1   ){
    //91
    //$versiononcea = bcdiv(bcsub($versiononcey2,$versiononcey1,50),bcsub($x2,$x1,50),50);
    $versiononcea = bcdiv(bcsub($versiononcey2,$versiononcey1,50),bcsub($rx2,$rx1,50),50);
    //$versiononceb = bcsub($versiononcey2,bcmul($versiononcea,$x2,50),50);
    $versiononceb = bcsub($versiononcey2,bcmul($versiononcea,$rx2,50),50);

    //$merklerootpreviousha = bcdiv(bcsub($merklerootprevioushy2,$merklerootprevioushy1,50),bcsub($x2,$x1,50),50);
    $merklerootpreviousha = bcdiv(bcsub($merklerootprevioushy2,$merklerootprevioushy1,50),bcsub($rx2,$rx1,50),50);
    //$merklerootprevioushb = bcsub($merklerootprevioushy2,bcmul($merklerootpreviousha,$x2,50),50);
    $merklerootprevioushb = bcsub($merklerootprevioushy2,bcmul($merklerootpreviousha,$rx2,50),50);

}elseif($merklerootprevioushy2>$merklerootprevioushy1){
        //$versiononcea = bcdiv(bcsub($versiononcey2,$versiononcey1,50),bcsub($x2,$x1,50),50);
    $versiononcea = bcmul(bcdiv(bcsub($versiononcey2,$versiononcey1,50),bcsub($rx2,$rx1,50),50),-1,50);
    $versiononceb = bcsub($versiononcey2,bcmul($versiononcea,$rx2,50),50);
        //$versiononceb = bcsub($versiononcey2,bcmul($versiononcea,$x2,50),50);
    //$merklerootpreviousha = bcdiv(bcsub($merklerootprevioushy2,$merklerootprevioushy1,50),bcsub($x2,$x1,50),50);

    $merklerootpreviousha = bcmul(bcdiv(bcsub($merklerootprevioushy2,$merklerootprevioushy1,50),bcsub($rx2,$rx1,50),50),-1,50);
    $merklerootprevioushb = bcsub($merklerootprevioushy2,bcmul($merklerootpreviousha,$rx2,50),50);
        //$merklerootprevioushb = bcsub($merklerootprevioushy2,bcmul($merklerootpreviousha,$x2,50),50);

}

if($merklerootprevioushy2<$merklerootprevioushy1 && bcdiv(bchexdec(swapEndianness($r->merkleroot)),bchexdec(swapEndianness($r->previousblockhash)),50) < $merklerootprevioushy1){
    //$versiononcea = bcdiv(bcsub($versiononcey2,$versiononcey1,50),bcsub($x2,$x1,50),50);
    $versiononcea = bcdiv(bcsub($versiononcey2,$versiononcey1,50),bcsub($rx2,$rx1,50),50);
    //$versiononceb = bcsub($versiononcey2,bcmul($versiononcea,$x2,50),50);
    $versiononceb = bcsub($versiononcey2,bcmul($versiononcea,$rx2,50),50);

    //$merklerootpreviousha = bcdiv(bcsub($merklerootprevioushy2,$merklerootprevioushy1,50),bcsub($x2,$x1,50),50);
    $merklerootpreviousha = bcdiv(bcsub($merklerootprevioushy2,$merklerootprevioushy1,50),bcsub($rx2,$rx1,50),50);
    //$merklerootprevioushb = bcsub($merklerootprevioushy2,bcmul($merklerootpreviousha,$x2,50),50);
    $merklerootprevioushb = bcsub($merklerootprevioushy2,bcmul($merklerootpreviousha,$rx2,50),50);
}elseif($merklerootprevioushy2<$merklerootprevioushy1){
    $versiononcea = bcmul(bcdiv(bcsub($versiononcey2,$versiononcey1,50),bcsub($rx2,$rx1,50),50),-1,50);
    $versiononceb = bcsub($versiononcey2,bcmul($versiononcea,$rx2,50),50);
    $merklerootpreviousha = bcmul(bcdiv(bcsub($merklerootprevioushy2,$merklerootprevioushy1,50),bcsub($rx2,$rx1,50),50),-1,50);
    $merklerootprevioushb = bcsub($merklerootprevioushy2,bcmul($merklerootpreviousha,$rx2,50),50);
}
*/





$versiononcea = bcdiv(bcsub($versiononcey2,$versiononcey1,50),bcsub($x2,$x1,50),50);
//$versiononcea = bcdiv(bcsub($versiononcey2,$versiononcey1,50),bcsub($rx2,$rx1,50),50);
$versiononceb = bcsub($versiononcey2,bcmul($versiononcea,$x2,50),50);
//$versiononceb = bcsub($versiononcey2,bcmul($versiononcea,$rx2,50),50);

$merklerootpreviousha = bcdiv(bcsub($merklerootprevioushy2,$merklerootprevioushy1,50),bcsub($x2,$x1,50),50);
//$merklerootpreviousha = bcdiv(bcsub($merklerootprevioushy2,$merklerootprevioushy1,50),bcsub($rx2,$rx1,50),50);
$merklerootprevioushb = bcsub($merklerootprevioushy2,bcmul($merklerootpreviousha,$x2,50),50);
//$merklerootprevioushb = bcsub($merklerootprevioushy2,bcmul($merklerootpreviousha,$rx2,50),50);

//$synreala = bcdiv(bcsub($synrealy2,$synrealy1,50),bcsub($x2,$x1,50),50);
//$synrealb = bcsub($synrealy2,bcmul($synreala,$x2,50),50);




 //$versiononcea = bcmul(bcdiv(bcsub($versiononcey2,$versiononcey1,50),bcsub($x2,$x1,50),50),-1,50);
 //$versiononcea = bcmul(bcdiv(bcsub($versiononcey2,$versiononcey1,50),bcsub($rx2,$rx1,50),50),-1,50);
 //$versiononcea = bcdiv(bcsub($versiononcey2,$versiononcey1,50),bcsub($x2,$x1,50),50);

 //$versiononceb = bcsub($versiononcey2,bcmul($versiononcea,$x2,50),50);
 //$versiononceb = bcsub($versiononcey2,bcmul($versiononcea,$rx2,50),50);

 //$merklerootpreviousha = bcmul(bcdiv(bcsub($merklerootprevioushy2,$merklerootprevioushy1,50),bcsub($x2,$x1,50),50),-1,50);
 //$merklerootpreviousha = bcmul(bcdiv(bcsub($merklerootprevioushy2,$merklerootprevioushy1,50),bcsub($rx2,$rx1,50),50),-1,50);
 //$merklerootpreviousha = bcdiv(bcsub($merklerootprevioushy2,$merklerootprevioushy1,50),bcsub($x2,$x1,50),50);
 //$merklerootprevioushb = bcsub($merklerootprevioushy2,bcmul($merklerootpreviousha,$x2,50),50);
 //$merklerootprevioushb = bcsub($merklerootprevioushy2,bcmul($merklerootpreviousha,$rx2,50),50);
 
 $previous_block_hash = swapEndianness($r->previousblockhash);
 
 

$txs = array();
$raw_txs = '';

foreach(json_decode($response)->result->transactions as $index => $tx){    
    $txs[]=$tx->hash;
    $raw_txs .= $tx->data;
    $merkle_root = merklize($txs);
    $merklroot = bchexdec($merkle_root);
    $merklroot = bcdiv($merklroot,bchexdec($previous_block_hash),50);
    //$merklroot = '0.44991787694';
    $mr = $merkle_root; 
    $merklerootprevioushinterx1 = bcdiv(bcsub($merklroot,$merklerootprevioushb,50),$merklerootpreviousha,50);
    if($index === 1){
    //if(bchexdec(merklize($txs))/bchexdec($previous_block_hash) > $merklerootprevioushy1 && bchexdec(merklize($txs))/bchexdec($previous_block_hash) < $merklerootprevioushy2){

       

        $r = file_get_contents('https://bitcoinexplorer.org/api/block/'.$h-1);
        $r = json_decode($r);
        //$block_header = substr($block_header,0,8);
        $ct = round(microtime(true));
        $init = $r->time;
        $bits = swapEndianness($r->bits);
        //$bits = swapEndianness($r->bits);
        $merklroot = bcmul(bcdiv(bchexdec(swapEndianness($r->merkleroot)),bchexdec(swapEndianness($r->previousblockhash)),50),10000,50);
    //$merklroot = '0.44991787694';
    /*if($merklerootprevioushy2>$merklerootprevioushy1 && $merklroot>bcadd($merklerootprevioushy2,bcsub($merklerootprevioushy2,$merklerootprevioushy1,50))){
        //$krr = bcdiv($merklroot,bcsub($merklerootprevioushy2,$merklerootprevioushy1,50),50);
        $krr = bcdiv($merklroot,$merklerootprevioushy2,50);
        //$krr = explode('.',$krr)[0];
        $merklroot = bcdiv($merklroot,$krr,50);
    }*/
    //$merklroot = '0.42';

    $mr = swapEndianness($r->merkleroot);   
        /*if(  $merklroot > $merklerootprevioushy2 ){
           die();
        }*/
        $old = $merklerootpreviousha;
     
        for($i= 1;$i<=1000;$i++){
            //$bitstimea = bcsub($bitstimea,$i,50);
            //$merklerootpreviousha = bcadd($merklerootpreviousha,bcdiv(bcdiv(bchexdec(swapEndianness($r->bits)),$r->time,50),10,50),50);
            //$merklerootpreviousha = bcadd($merklerootpreviousha,bcdiv(bcdiv(bchexdec(swapEndianness($r->bits)),$r->time,50),10,50),50);
            //$bitstimea = bcsub($bitstimea,bcdiv(bcdiv(bchexdec(swapEndianness($r->bits)),$r->time,50),10,50),50);
            
            //$merklerootpreviousha = bcadd($merklerootpreviousha,'0.001',50);
            //$versiononcea = bcadd($versiononcea,$i,50);

            $merklerootprevioushinterx1 = bcdiv(bcsub($merklroot,$merklerootprevioushb,50),$merklerootpreviousha,50);
            
            $bitstime = bcmul(bcdiv(bchexdec(swapEndianness($r->bits)),$init,50),100000,50);
            print_r($bitstime."\r\n");

           
        
            $merklerootprevioushinterx2 = bcdiv(bcsub($bitstime,$bitstimeb,50),$bitstimea,50);

            $merklerootprevioushintera = bcdiv(bcsub($bitstime,$merklroot,50),bcsub($merklerootprevioushinterx2,$merklerootprevioushinterx1,50),50);
            $merklerootprevioushinterb = bcsub($bitstime,bcmul($merklerootprevioushintera,$merklerootprevioushinterx2,50),50);
            
            
            $x = bcdiv(bcsub(bcdiv($merklerootprevioushinterb,$versiononcea,50),bcdiv($versiononceb,$versiononcea,50),50),bcsub(1,bcdiv($merklerootprevioushintera,$versiononcea,50),50),50);
            //$ox = bcdiv(bcsub(bcdiv($merklerootprevioushinterb,$synreala,50),bcdiv($synrealb/$synreala,50),50),bcsub(1,bcdiv($merklerootprevioushintera,$synreala,50),50),50);
            //$x = $h-1;
            print_r('intersection with time line:'.$merklerootprevioushinterx2."\r\n");

            $rate = bcadd(bcmul($versiononcea,$x,50),$versiononceb,50);
            //$orate = bcadd(bcmul($synreala,$ox,50),$synrealb,50);
            $rate = bcdiv($rate,100000,50);


            print_r($rate."\r\n");
            print_r($merklerootpreviousha."\r\n");
            print_r($merklerootprevioushintera."\r\n");
            print_r($old."\r\n");
            print_r(bcsub($merklerootpreviousha,$old,50)."\r\n");
            print_r($versiononcea."\r\n");
            print_r($bitstimea."\r\n");
            print_r($r->version."\r\n");
            print_r($r->nonce."\r\n");
            print_r($r->time."\r\n");
            print_r(bcdiv($r->version,$r->nonce,50)."\r\n");            
            print_r('i:'.$i."\r\n");
            print_r('merkleroot:'.$merklroot."\r\n");
            print_r('versionnoncey1:'.$versiononcey1."\r\n");
            print_r('versionnoncey2:'.$versiononcey2."\r\n"); 
            print_r('merklerootpreviousbhy1:'.$merklerootprevioushy1."\r\n");
            print_r('merklerootpreviousbhy2:'.$merklerootprevioushy2."\r\n");
            $merklerootpreviousha = matchrates($rate,bcdiv($r->version,$r->nonce,50),$merklerootpreviousha);
            if(abs(bcsub($merklerootpreviousha,matchrates($rate,bcdiv($r->version,$r->nonce,50),$merklerootpreviousha),50))<'0.0000000000000001' ){
                break;
            }
            //print_r('syn/real:'.bcdiv($rate,bcdiv($r->version,$r->nonce,50),50)."\r\n");
            //print_r('orate:'.$orate."\r\n");
            /*print_r('h:'.$h."\r\n");
            $r = file_get_contents('https://bitcoinexplorer.org/api/block/'.$h-3);
            $r = json_decode($r);
            print_r(bcdiv($r->version,$r->nonce,50)."\r\n");            */
           

            /*if($versiononcey1>$versiononcey2 && $rate < bcsub($versiononcey2,bcsub($versiononcey1,$versiononcey2))){
                //$vnr = bcdiv($rate,bcsub($versiononcey1,$versiononcey2,50),50);
                $vnr = bcdiv($rate,$versiononcey2,50);
               
                $vnr = explode('.',$vnr)[0];
                $rate = bcdiv($rate,$vnr,50);
                $rate = bcdiv($rate,100000,50);
                print_r($rate."\r\n");
                print_r($vnr);
                die();
            }*/
            /*if(abs(bcdiv($r->version,$r->nonce,50)-$rate)<=0.01){
               die();                
            }*/
            //die();

            
            //$rate = '1.546798123587987';
//$n = '1000000000000000';
//print_r(strpos($x,'.'));
/*$xl = strlen($x);
for($i=strlen($rate)-strpos($rate,'.');$i>=1;$i--){
    $version = str_replace('-','',str_replace('.','',substr($rate,0,-$i)));
    $nonce = '1';
    for($j=$i;$j<strlen($rate)-1-strpos($rate,'.');$j++){
        $nonce .= '0';
    }
    print_r($version."\r\n");
    print_r($nonce."\r\n");
    print_r($version/$nonce."\r\n");
    $vp = explode(' ',primeFactors($version));
    $np = explode(' ',primeFactors($nonce));
    if(strlen(bcdechex($version))<=8 && strlen(bcdechex($nonce))<=8){
        contructbh($version,$previous_block_hash,$mr,$bits,$init,$nonce);
    
    if(empty($vp[count($vp)-1])){
        unset($vp[count($vp)-1]);
    } 
    if(empty($np[count($np)-1])){
        unset($np[count($np)-1]);
    }   
    

    foreach($vp as $k => $v){
        foreach($np as $k2 => $v2){
            if($v === $v2 ){
                unset($vp[$k]);
                unset($np[$k2]);
                $nv = 1;
                $nn = 1;
                
                foreach($vp as $k3 => $v3){
                    $nv = $nv*intval($v3);                                       
                }
                print_r($nv."\r\n");
                foreach($np as $k3 => $v3){
                    $nn = $nn*intval($v3);                                       
                }
                print_r($nn."\r\n");
                print_r($nv/$nn."\r\n");
                $n = $nn;
            //if($x>$x1 ){
                if(strlen(bcdechex($nv))<=8 && strlen(bcdechex($nn))<=8){
                    contructbh($nv,$previous_block_hash,$mr,$bits,$init,$nn);
                }

                
                break;            

            }
        }
        $done= false;
    }
    }else{
    break;
    }
    print_r('-----------'."\r\n");

    $nonce = '';
}*/
            //print_r('version:'.$v."\r\n");
           
        //}
           //break; 
            //$init = $init+1;
            
        }
        break;





    }
    if($index == 1){
        break;
    }
    print_r($index."\r\n");
    print_r($h."\r\n");
}
/*$rtxs = json_decode($response)->result->transactions;
for($i=count($rtxs)-1;$i>=count($rtxs)-1-1000;$i=$i-1){
    $txs[]=$rtxs[$i]->hash;
+$raw_txs .= $rtxs[$i]->data;
}*/
//print_r($txs);
function merklize($txs){
    $txidsBEbinary = [];
    foreach ($txs as $txidBE) {
        // covert to binary, then flip
        $txidsBEbinary[] = binFlipByteOrder(hex2bin($txidBE));
    }
    $root = merkleroot($txidsBEbinary);
    
    return bin2hex(binFlipByteOrder($root));
}





die();



function matchrates($inputerate, $outputrate, $mkha){    
    $initial = '10';
    $initialtoreduce = '100';
    for($i=1;$i<=20;$i++){
        if(abs(bcsub($outputrate,$inputerate,50))<$initialtoreduce && abs(bcsub($outputrate,$inputerate,50))>bcdiv($initialtoreduce,'10',50)){
            $initial = bcdiv($initialtoreduce,'100',50);
        } 
        $initialtoreduce = bcdiv($initialtoreduce,'10',50);
    }
    

        $mkha = bcsub($mkha,$initial,50);
        
    return $mkha;
}
function contructbh($nv,$previous_block_hash,$mr,$bits,$init,$n){
    $time = swapEndianness(bcdechex($init));
    //$block_header .= $time;
    //$block_header .= $bits;
        $nonce = swapEndianness(trait_hex(bcdechex($n)));
        //print_r('i:'.$i."\r\n");
        //print_r('bitstime:'.$bitstime."\r\n");
        print_r('init:'.$init."\r\n");
        //print_r('x:'.$x."\r\n");

        print_r('noncehex:'.$nonce."\r\n");
        print_r('nonce:'.$n."\r\n");

        //print_r('rate:'.$rate."\r\n");
        print_r('version:'.$nv."\r\n");
        //print_r('rate version/nonce 2:'.$versiononcey2."\r\n");

        
        //$block_header .= $nonce;
        $block_header = swapEndianness(trait_hex(bcdechex($nv))).$previous_block_hash.$mr.$time.$bits.$nonce;
        print_r('block header:'.$block_header."\r\n");

        $hash = hash('sha256',hash('sha256', hex2bin($block_header), true));
    
        print_r('block hash:'.$hash."\r\n");

        if(substr($hash,-17)=='00000000000000000'){
            return;
        }
}
function primeFactors($n) { 
    $str = '';	
	// Print the number of 2s 
	// that divide n 
	while ($n % 2 == 0) { 
		$str .= "2 "; 
		$n = $n / 2; 
	} 

	// n must be odd at this point. 
	// So, we can skip one element 
	// (i.e., we can start from i = 3 
	// and increment by 2) 
	for ($i = 3; $i <= sqrt($n); $i += 2) { 
		
		// While i divides n, print i and divide n 
		while ($n % $i == 0) { 
			$str .= "$i "; 
			$n = $n / $i; 
		} 
	} 

	// This condition is to handle the case 
	// when n is a prime number greater than 2 
	if ($n > 2) { 
		$str .= "$n"; 
	}
    return $str; 
} 




function trait_hex($hex){
    if(strlen($hex)==7){
       return '0'.$hex;
    }elseif(strlen($hex)==6){
        return '00'.$hex;
    }elseif(strlen($hex)==5){
        return '000'.$hex;
    }elseif(strlen($hex)==4){
        return '0000'.$hex;
    }elseif(strlen($hex)==3){
        return '00000'.$hex;
    }elseif(strlen($hex)==2){
        return '000000'.$hex;
    }elseif(strlen($hex)==1){
        return '0000000'.$hex;
    }elseif(strlen($hex)==8){
        return $hex;
    }
}









$block_txs = 'fd';
//$txs_count = swapEndianness('0'.bcdechex(count(json_decode($response)->result->transactions)));
$txs_count = swapEndianness('0'.bcdechex('1001'));

$block_txs .= $txs_count;
print_r($txs_count."\r\n");
print_r('block_txs:'.$block_txs."\r\n");

$coinbase_tx = '';

$tx_version = '01000000';
$coinbase_tx .= $tx_version;

$input_count = '01';
$coinbase_tx .= $input_count;

$input0 = '0000000000000000000000000000000000000000000000000000000000000000';
$coinbase_tx .= $input0;

$vout = 'ffffffff';
$coinbase_tx .= $vout;

$sig_size = '08';
$coinbase_tx .= $sig_size;

$script_sig = '04233fa04e028b12';
$coinbase_tx .= $script_sig;

$sequence = 'ffffffff';
$coinbase_tx .= $sequence;

$output_count = '01';
$coinbase_tx .= $output_count;

$amount = swapEndianness('00000000'.bcdechex(json_decode($response)->result->coinbasevalue));
$coinbase_tx .= $amount;

$script_pubkey_size = '19';
$coinbase_tx .= $script_pubkey_size;

$script_pubkey = OutputFactory::p2pkh(hex2bin('5b51839dcb63a253462de025267175394b846bd1'))->hex();
$coinbase_tx .= $script_pubkey;

$locktime = '00000000';
$coinbase_tx .= $locktime;

//print_r($raw_txs."\r\n");

$block = $block_header.$block_txs.$coinbase_tx.$raw_txs;



$height = json_decode($response)->result->height;
$payload = ["jsonrpc" => "2.0", "method" => "submitblock", "params" => [$block] ];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://bitcoin-rpc.publicnode.com");
//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
//curl_setopt($ch, CURLOPT_USERPWD, "user" . ":" . "pass");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
//curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$submission = curl_exec($ch);
print_r('block_height:'.$height."\r\n");
print_r($submission);



$f = fopen('getblocktemplate.json','w');
fwrite($f,prettyPrint($response));
fclose($f);

$f = fopen('block.txt','w');
fwrite($f,$block);
fclose($f);



//print_r(bchexdec(swapEndianness('f5cece1200000000')));

/*$address = OutputFactory::p2pk(hex2bin('032009d2feb1c3f0137861d03400108a62ea7bebbfa6bd7d7ecd3f6becc611d25c'))->address(); 
print_r($address."\r\n");
print_r(OutputFactory::p2pkh(hex2bin('5b51839dcb63a253462de025267175394b846bd1'))->hex()."\r\n");
//print_r($factory->p2pkh(hex2bin('0f4af1959c868f534508b109371b2d9c2f0a51bc')));
print_r(hash('ripemd160',hash('sha256',hex2bin('032009d2feb1c3f0137861d03400108a62ea7bebbfa6bd7d7ecd3f6becc611d25c'),true))."\r\n");*/
//print_r(bchexdec(swapEndianness('df08'))."\r\n");
//print_r(hash('sha256',hash('sha256','00c0ab23effd4e5c721d2be3e608599d4226ec9f5aa58d08a29c01000000000000000000357baed0b771fea63e15255a74a2b24d2960cd3399e6f5819fbcbffe3f521e6f6f70cf665b25031799620ee7')));
//effd4e5c721d2be3e608599d4226ec9f5aa58d08a29c01000000000000000000
//6f2f4c4d05f9846cca9f52e2d7ea9cd10f9b00eccefa497571bad5c11b1972c3

/*$r = file_get_contents('https://bitcoinexplorer.org/api/mining/next-block/txids');
$f = fopen('txs.json','w');
fwrite($f,$r);
fclose($f);
$r = json_decode($r);
print_r(count($r)."\r\n");


$txidsBEbinary = [];
foreach ($r as $txidBE) {
    // covert to binary, then flip
    $txidsBEbinary[] = binFlipByteOrder(hex2bin($txidBE));
}
$root = merkleroot($txidsBEbinary);

echo bin2hex(binFlipByteOrder($root)) . PHP_EOL;
*/

/*$payload = ["jsonrpc" => "2.0", "method" => "getblock", "params" => ["000000004d15e01d3ffc495df7bb638c2b35c5b5dd0ba405615f513e3393f0c7",0] ];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://bitcoin-rpc.publicnode.com");
//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
//curl_setopt($ch, CURLOPT_USERPWD, "user" . ":" . "pass");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
//curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);
print_r(json_decode($response)->result->height."\r\n");
print_r($response);

*/

function binFlipByteOrder($string) {
    return implode('', array_reverse(str_split($string, 1)));
}

function merkleroot($txids) {

    // Check for when the result is ready, otherwise recursion
    if (count($txids) === 1) {
        return $txids[0];
    }

    // Calculate the next row of hashes
    $pairhashes = [];
    while (count($txids) > 0) {
        if (count($txids) >= 2) {
            // Get first two
            $pair_first = $txids[0];
            $pair_second = $txids[1];

            // Hash them
            $pair = $pair_first.$pair_second;
            $pairhashes[] = hash('sha256', hash('sha256', $pair, true), true);

            // Remove those two from the array
            unset($txids[0]);
            unset($txids[1]);

            // Re-set the indexes (the above just nullifies the values) and make a new array without the original first two slots.
            $txids = array_values($txids);
        }

        if (count($txids) == 1) {
            // Get the first one twice
            $pair_first = $txids[0];
            $pair_second = $txids[0];

            // Hash it with itself
            $pair = $pair_first.$pair_second;
            $pairhashes[] = hash('sha256', hash('sha256', $pair, true), true);

            // Remove it from the array
            unset($txids[0]);

            // Re-set the indexes (the above just nullifies the values) and make a new array without the original first two slots.
            $txids = array_values($txids);
        }
    }

    return merkleroot($pairhashes);
}



function swapEndianness($hex) {
    return implode('', array_reverse(str_split($hex, 2)));
}
function bcdechex($dec) {
    $hex = '';
    do {    
        $last = bcmod($dec, 16);
        $hex = dechex($last).$hex;
        $dec = bcdiv(bcsub($dec, $last), 16);
    } while($dec>0);
    return $hex;
}
function bchexdec($hex)
{
    $dec = 0;
    $len = strlen($hex);
    for ($i = 1; $i <= $len; $i++) {
        $dec = bcadd($dec, bcmul(strval(hexdec($hex[$i - 1])), bcpow('16', strval($len - $i))));
    }
    return $dec;
}

//print_r(bchexdec(swapEndianness('01000000'))."\r\n");
//print_r(bcdechex('756158321')."\r\n");
//swapEndianness(bcdechex('756158321')).;



/*
$payload = ["jsonrpc" => "2.0", "method" => "getblock", "params" => ["0000000000000000000276d3ca589280a5169fdb57c2b6c331a70f325f9c6b8f",0] ];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://bitcoin-rpc.publicnode.com");
//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
//curl_setopt($ch, CURLOPT_USERPWD, "user" . ":" . "pass");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
//curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);


$f = fopen('getblock.txt','w');
fwrite($f,json_decode($response)->result);
fclose($f);
*/
function prettyPrint( $json )
{
    $result = '';
    $level = 0;
    $in_quotes = false;
    $in_escape = false;
    $ends_line_level = NULL;
    $json_length = strlen( $json );

    for( $i = 0; $i < $json_length; $i++ ) {
        $char = $json[$i];
        $new_line_level = NULL;
        $post = "";
        if( $ends_line_level !== NULL ) {
            $new_line_level = $ends_line_level;
            $ends_line_level = NULL;
        }
        if ( $in_escape ) {
            $in_escape = false;
        } else if( $char === '"' ) {
            $in_quotes = !$in_quotes;
        } else if( ! $in_quotes ) {
            switch( $char ) {
                case '}': case ']':
                    $level--;
                    $ends_line_level = NULL;
                    $new_line_level = $level;
                    break;

                case '{': case '[':
                    $level++;
                case ',':
                    $ends_line_level = $level;
                    break;

                case ':':
                    $post = " ";
                    break;

                case " ": case "\t": case "\n": case "\r":
                    $char = "";
                    $ends_line_level = $new_line_level;
                    $new_line_level = NULL;
                    break;
            }
        } else if ( $char === '\\' ) {
            $in_escape = true;
        }
        if( $new_line_level !== NULL ) {
            $result .= "\n".str_repeat( "\t", $new_line_level );
        }
        $result .= $char.$post;
    }

    return $result;
}