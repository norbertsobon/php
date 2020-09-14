<!DOCTYPE html>
<html lang="PL/pl">
<head>
    <meta charset="UTF-8" />
    <title>Tabela</title>
    <style>
        table, td{
            border: 2px solid black;
        }
        table{
            border-collapse: collapse;
            box-shadow: 10px 10px 28px 0px rgba(0,0,0,0.75);
        }
        td{
            text-align: center;
        }
    </style>
</head>
<body>
<?php
abstract class Tabela{
    public $wysokosc;
    public $szerokosc;
    static public $tab;    
    public function __construct($wysokosc, $szerokosc){
        for($i = 0; $i < $wysokosc; $i++){
            for($j = 0; $j < $szerokosc; $j++){
                if(empty(self::$tab[$i][$j])){
                    self::$tab[$i][$j] = "";
                }
            }
        }
    }
    abstract public function rysujTabele($wysokosc, $szerokosc, $wysokoscKomorki, $szerokoscKomorki);
    final public function wpiszWPole($wysokosc, $szerokosc, $tekst){
        self::$tab[$wysokosc][$szerokosc] = $tekst;
    }
}
class Tabela2 extends Tabela{
    public $wysokoscKomorki;
    public $szerokoscKomorki;    
    public function __construct($wysokosc, $szerokosc, $wysokoscKomorki, $szerokoscKomorki){
        parent::__construct($wysokosc, $szerokosc);
        $this -> rysujTabele($wysokosc, $szerokosc, $wysokoscKomorki, $szerokoscKomorki);
    }    
    //override
    public function rysujTabele($wysokosc, $szerokosc, $wysokoscKomorki, $szerokoscKomorki){
        echo '<table>';
        for($i = 0; $i < $wysokosc; $i++){
            echo '<tr>';
            for($j = 0; $j < $szerokosc; $j++){
                echo <<<varr
                <td height="$wysokoscKomorki" width="$szerokoscKomorki">
varr;                
                echo Tabela::$tab[$i][$j].'</td>';            
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}
//Program główny
Tabela::wpiszWPole(0,0,"działa?");
Tabela::wpiszWPole(4,9,"działa!");
Tabela::wpiszWPole(3,6,"super");
Tabela::wpiszWPole(3,5,"ok");
$obiekt = new Tabela2(5, 10, 35, 50);
?>
</body>
</html>
