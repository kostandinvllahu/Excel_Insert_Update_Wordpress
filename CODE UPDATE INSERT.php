<?php
global $wpdb;
 $table_name = $wpdb->prefix . 'excelvalues'; 

if(isset($_POST["submit_file"]))
{
 $file = $_FILES["file"]["tmp_name"];
 $file_open = fopen($file,"r");
 while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
 {
 $Anrede = $csv[0];
 $Titel = $csv[1];
 $Nachname = $csv[2];
 $Vorname = $csv[3];
 $Strasse = $csv[4];
 $LKZ = $csv[5];
 $PLZ = $csv[6];
 $Ort = $csv[7];
 $Mobil = $csv[8];
 $Email = $csv[9];
 $Geburtsdatum = $csv[10];
 $Eintrittsdatum = $csv[11];
 $Prüfungsjahr = $csv[12];
 $Vermittlung = $csv[13];
 $Bezirk = $csv[14];
 $Kartennummer = $csv[15];
 $LinkQR = $csv[16];
 $count = $wpdb->get_var("SELECT COUNT(*) FFOM {$table_name} where Kartennummer='$Kartennummer'");
 if($count > 0){
	 $wpdb->query($wpdb->prepare("UPDATE $table_name SET  Anrede = '$Anrede', Titel='$Titel',Nachname='$Nachname',Vorname='$Vorname',Strasse='$Strasse',LKZ='$LKZ',PLZ='$PLZ',Ort='$Ort',Mobil='$Mobil',Email='$Email',Geburtsdatum='$Geburtsdatum',Eintrittsdatum='$Eintrittsdatum',Prüfungsjahr='$Prüfungsjahr',Vermittlung='$Vermittlung',Bezirk='$Bezirk',Kartennummer='$Kartennummer',LinkQR='$LinkQR' WHERE Kartennummer='$Kartennummer'"));
 }else{
	$wpdb->query("INSERT INTO $table_name(ID, Anrede, Titel,Nachname,Vorname,Strasse,LKZ,PLZ,Ort,Mobil,Email,Geburtsdatum,Eintrittsdatum,Prüfungsjahr,Vermittlung,Bezirk,Kartennummer,LinkQR) VALUES(NULL, '$Anrede', '$Titel', '$Nachname', '$Vorname', '$Strasse', '$LKZ', '$PLZ', '$Ort', '$Mobil', '$Email', '$Geburtsdatum', '$Eintrittsdatum', '$Prüfungsjahr', '$Vermittlung', '$Bezirk', '$Kartennummer', '$LinkQR')"); 
 } 
 }
 }
 ?>