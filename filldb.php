<?php
//co bdd
$pdo = new PDO("mysql:host=den1.mysql6.gear.host;dbname=cakephpcmjsg","cakephpcmjsg","Ca57dL?Z~k9v",array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$str = file_get_contents('films.json');
$titles = json_decode($str, true);

foreach ($titles['feed']['entry'] as $mov){
	$currtitle= $mov['im:name']['label'];
	$content = file_get_contents("http://www.omdbapi.com/?apikey=f26a44c6&t=".str_replace(" ","+",$currtitle));
    	$result  = json_decode($content, true);
	try{
		if ($result['Released']){
		  $date = date("Y-m-d H:i",strtotime($result['Released']));
        }else{
			$date = "1970-01-01 00:00";
		}
        if ($result['Runtime']){
		  $duree = intval($result['Runtime']);
        }else{
			$duree = 0;
		}
        if ($result['Plot']){
		  $synopsis = $result['Plot'];
        }else{
			$synopsis = "";
		}
		$req  = $pdo->prepare("INSERT INTO Film(titre,dateSortie,duree,synopsis,DISPO) VALUES ('".$currtitle."','".$date."',".$duree.",'".$synopsis."',1);");
		$req->execute();
	} catch(PDOException $e){
            print "Erreur:".$e->getMessage()."<br>";
            die();
    }
}
/*
$req  = $pdo->prepare("INSERT INTO Film('titre','dateSortie','duree','synopsis','DISPO') VALUES ('".$currtitle."','".$result->Released."','".intval($result->Runtime)."','".$result->Plot."',1)");
$req->execute();*/
