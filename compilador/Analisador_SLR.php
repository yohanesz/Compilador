<?php 

define('NAO_TERMINAIS', [
    1 => 'PROGRAMA',
    2 => 'LISTA_VAR', 
    3 => 'VAR', 
    4 => 'TIPO',
    5 => 'LISTA_COMANDOS',
    6 => 'ENQUANTO',
    7 => 'SE', 
    8 => 'PARA',
    9 => 'ATRIBUTO',
    10 => 'COMANDOS',
    11 => 'ATRBUICAO',
    12 => 'LEITURA',
    13 => 'INCREMENTO',
    14 => 'IMPRESSAO',
    15 => 'OPERACAO',
    16 => 'OP_INCREMENTO',
    17 => 'OPERADOR',
    18 => 'COMPARADOR',
    19 => 'SENAO',
    20 => 'COMPARACAO'
]);

class SLR{

    private $afd;
    public $lexico;

    public function __construct() {
        $this->afd = array(
            0 => ['ACTION' => ['programa' => 'S 2'],
            'GOTO' => [0 => ['$' => 1]]],
        1 => ['ACTION' => ['$' => 'ACC'],
            'GOTO' => [[]]],
        2 => ['ACTION' => ['id' => 'S 3'],
            'GOTO' => [[]]],
        3 => ['ACTION' => ['ap' => 'S 4'],
            'GOTO' => [[]]],
        4 => ['ACTION' => ['int' => 'S 5', 'char' => 'S 6', 'array' => 'S 7', 'string' => 'S 8'], // verificar se essa porra ta certa
            'GOTO' => [4 => ['id' => 9], 3 => ['id' => 11], 2 => ['fp' => 13]]],
        5 => ['ACTION' => ['id' => 'R 1 3'],
            'GOTO' => [[]]],
        6 => ['ACTION' => ['id' => 'R 1 3'],
            'GOTO' => [[]]],
        7 => ['ACTION' => ['id' => 'R 1 3'],
            'GOTO' => [[]]],
        8 => ['ACTION' => ['id' => 'R 1 3'],
            'GOTO' => [[]]],
        9 => ['ACTION' => ['id' => 'S 10'],
            'GOTO' => [[]]],
        10=> ['ACTION' => ['fc' => 'R 2 3', 'int' => 'R 2 3', 'char' => 'R 2 3', 'array' => 'R 2 3', 'string' => 'R 2 3'],
            'GOTO' => [[]]],
        11=> ['ACTION' => ['int' => 'S 5', 'char' => 'S 6', 'array' => 'S 7', 'string' => 'S 8', 'fp' => 'R 0 2'], 
            'GOTO' => [2 => ['fp' => 12]]],
        12=> ['ACTION' => ['fp' => 'R 3 2'], //fp
            'GOTO' => [[]]],
        13=> ['ACTION' => ['fp' => 'S 14'],
            'GOTO' => [[]]],
        14=> ['ACTION' => ['ac' => 'S 15'],
            'GOTO' => [[]]],
        15=> ['ACTION' => ['fc' => 'R 0 1', 'enquanto' => 'S 16', 'senao' => 'S 60', 'se' => 'S 29', 'para' => 'S 71'],
            'GOTO' => [5 => ['enquanto' => 61, 'se' => 63, 'senao' => 62, 'para' => 64, 'fc' => 69]]],
        16=> ['ACTION' => ['ap' => 'S 17'],
            'GOTO' => [[]]],
        17=> ['ACTION' => ['id' => 'S 18'],
            'GOTO' => [[]]],
        18=> ['ACTION' => ['maior' => 'S 19', 'menor' => 'S 20', 'maiorIgual' => 'S 22', 'menorIgual' => 'S 23', 'igual' => 'S 21', 'diferente' => 'S 24'],
            'GOTO' => [18 => ['const' => 83, 'caracter' => 83, 'string' => 83, 'id' => 83]]],
        19=> ['ACTION' => ['id' => 'R 1 18', 'const' => 'R 1 18', 'caracter' => 'R 1 18', 'string' => 'R 1 18'],
            'GOTO' => [[]]],
        20=> ['ACTION' => ['id' => 'R 1 18', 'const' => 'R 1 18', 'caracter' => 'R 1 18', 'string' => 'R 1 18'],
            'GOTO' => [[]]],
        21=> ['ACTION' => ['id' => 'R 1 18', 'const' => 'R 1 18', 'caracter' => 'R 1 18', 'string' => 'R 1 18'],
            'GOTO' => [[]]],
        22=> ['ACTION' => ['id' => 'R 1 18', 'const' => 'R 1 18', 'caracter' => 'R 1 18', 'string' => 'R 1 18'],
            'GOTO' => [[]]],
        23=> ['ACTION' => ['id' => 'R 1 18', 'const' => 'R 1 18', 'caracter' => 'R 1 18', 'string' => 'R 1 18'],
            'GOTO' => [[]]],
        24=> ['ACTION' => ['id' => 'R 1 18', 'const' => 'R 1 18', 'caracter' => 'R 1 18', 'string' => 'R 1 18'],
            'GOTO' => [[]]],
        25=> ['ACTION' => ['pv' => 'R 1 9'],
            'GOTO' => [[]]],
        26=> ['ACTION' => ['pv' => 'R 1 9'],
            'GOTO' => [[]]],
        27=> ['ACTION' => ['pv' => 'R 1 9'],
            'GOTO' => [[]]],
        28=> ['ACTION' => ['pv' => 'R 1 9'],    
            'GOTO' => [[]]],
        29=> ['ACTION' => ['ap' => 'S 30'],
            'GOTO' => [[]]],
        30=> ['ACTION' => ['id' => 'S 31'],
            'GOTO' => [[]]],
        31=> ['ACTION' => ['maior' => 'S 19', 'menor' => 'S 20', 'maiorIgual' => 'S 22', 'menorIgual' => 'S 23', 'igual' => 'S 21', 'diferente' => 'S 24'],
            'GOTO' => [18 => ['const' => 83, 'caracter' => 83, 'string' => 83, 'id' => 83]]],
        32=> ['ACTION' => ['id' => 'S 25', 'const' => 'S 26', 'caracter' => 'S 27', 'string' => 'S 28'],
            'GOTO' => [9 => ['fp' => 33]]],
        33=> ['ACTION' => ['fp' => 'S 34'],
            'GOTO' => [[]]],
        34=> ['ACTION' => ['ac' => 'S 35'],
            'GOTO' => [[]]],
        35=> ['ACTION' => ['id' => 'S 87', 'leia' => 'S 40', 'imprima' => 'S 50'],
            'GOTO' => [11 => ['fc' => 93], 12 => ['fc' => 93], 14 => ['fc' => 93], 15 => ['fc' => 93], 13 => ['fc' => 93]]],
        37=> ['ACTION' => ['id' => 'S 25', 'const' => 'S 26', 'caracter' => 'S 27', 'string' => 'S 28'],
            'GOTO' => [9 => ['pv' => 38]]],
        38=> ['ACTION' => ['pv' => 'S 39'],
            'GOTO' => [[]]],
        39=> ['ACTION' => ['fc' => 'R 4 11'],
            'GOTO' => [[]]],
        40=> ['ACTION' => ['ap' => 'S 41'],
            'GOTO' => [[]]],
        41=> ['ACTION' => ['id' => 'S 25', 'const' => 'S 26', 'caracter' => 'S 27', 'string' => 'S 28'],
            'GOTO' => [9 => ['fp' => 42]]],
        42=> ['ACTION' => ['fp' => 'S 43'],
            'GOTO' => [[]]],
        43=> ['ACTION' => ['pv' => 'S 44'],
            'GOTO' => [[]]],
        44=> ['ACTION' => ['leia' => 'R 5 12', 'imprima' => 'R 5 12', 'enquanto' => 'R 5 12', 'senao' => 'R 5 12', 'se' => 'R 5 12', 'para' => 'R 5 12'],
            'GOTO' => [[]]],
        46=> ['ACTION' => ['pv' => 'R 1 16'],
            'GOTO' => [[]]],
        47=> ['ACTION' => ['pv' => 'R 1 16'],
            'GOTO' => [[]]],
        48=> ['ACTION' => ['pv' => 'S 49'],
            'GOTO' => [[]]],
        49=> ['ACTION' => ['fp' => 'R 3 13', 'fc' => 'R 3 13'],
            'GOTO' => [[]]],
        50=> ['ACTION' => ['ap' => 'S 51'],
            'GOTO' => [[]]],
        51=> ['ACTION' => ['id' => 'S 25', 'const' => 'S 26', 'caracter' => 'S 27', 'string' => 'S 28'],
            'GOTO' => [9 => ['fp'=> 52]]],
        52=> ['ACTION' => ['fp' => 'S 53'],
            'GOTO' => [[]]],
        53=> ['ACTION' => ['pv' => 'S 54'],
            'GOTO' => [[]]],
        54=> ['ACTION' => ['leia' => 'R 5 14', 'imprima' => 'R 5 14', 'enquanto' => 'R 5 14', 'senao' => 'R 5 14', 'se' => 'R 5 14', 'para' => 'R 5 14'],
            'GOTO'=> [[]]],
        56=> ['ACTION' => ['id' => 'S 25', 'const' => 'S 26', 'caracter' => 'S 27', 'string' => 'S 28'],
            'GOTO' => [9 => ['fp' => 57]]],
        57=> ['ACTION' => ['fp' => 'S 58'],
            'GOTO' => [[]]],
        58=> ['ACTION' => ['pv' => 'S 59'],
            'GOTO' => [[]]],
        59=> ['ACTION' => ['leia' => 'R 5 15', 'imprima' => 'R 5 15', 'enquanto' => 'R 5 15', 'senao' => 'R 5 15', 'se' => 'R 5 15', 'para' => 'R 5 15'],
            'GOTO' => [[]]],
        60=> ['ACTION' => ['ac' => 'S 95'],
            'GOTO' => [[]]],
        61=> ['ACTION' => ['leia' => 'S 40', 'imprima' => 'S 50', 'enquanto' => 'S 16', 'senao' => 'S 60', 'se' => 'S 29', 'para' => 'S 71', 'fc' => 'R 0 5'],
            'GOTO' => [5 => ['enquanto' => 16, 'se' => 19, 'senao' => 60, 'para' => 71, 'fc' => 69]]],
        62=> ['ACTION' => ['leia' => 'S 40', 'imprima' => 'S 50', 'enquanto' => 'S 16', 'senao' => 'S 60', 'se' => 'S 29', 'para' => 'S 71', 'fc' => 'R 0 5'],
            'GOTO' => [5 => ['enquanto' => 16, 'se' => 19, 'senao' => 60, 'para' => 71, 'fc' => 69]]], //vou ter que mudar aqui no SE pra ir no SENAO
        63=> ['ACTION' => ['leia' => 'S 40', 'imprima' => 'S 50', 'enquanto' => 'S 16', 'senao' => 'S 60', 'se' => 'S 29', 'para' => 'S 71', 'fc' => 'R 0 5'],
            'GOTO' => [5 => ['enquanto' => 16, 'se' => 19, 'senao' => 60, 'para' => 71, 'fc' => 69]]],
        64=> ['ACTION' => ['leia' => 'S 40', 'imprima' => 'S 50', 'enquanto' => 'S 16', 'senao' => 'S 60', 'se' => 'S 29', 'para' => 'S 71', 'fc' => 'R 0 5'],
            'GOTO' => [5 => ['enquanto' => 16, 'se' => 19, 'senao' => 60, 'para' => 71, 'fc' => 69]]], 
        69=> ['ACTION' => ['fc' => 'S 70'],
            'GOTO' => [[]]],
        70=> ['ACTION' => ['$' => 'R 8 1'],
            'GOTO' => [[]]],
        71=> ['ACTION' => ['ap' => 'S 72'],
            'GOTO' => [[]]],
        72=> ['ACTION' => ['id' => 'S 87'],
            'GOTO' => [11 => ['id' => 73]]],
        73=> ['ACTION' => ['id' => 'S 80'],
            'GOTO' => [20 => ['id' => 74]]],
        74=> ['ACTION' => ['id' => 'S 87'],
            'GOTO' => [13 => ['fp' => 75]]],
        75=> ['ACTION' => ['fp' => 'S 76'], 
            'GOTO' => [[]]],
        76=> ['ACTION' => ['ac' => 'S 77'],
            'GOTO' => [[]]],
        77=> ['ACTION' => ['id' => 'S 87', 'leia' => 'S 40', 'imprima' => 'S 50'],
            'GOTO' => [11 => ['fp' => 78], 12 => ['fp' => 78], 14 => ['fp' => 78], 15 => ['fp' => 78], 13 => ['fp' => 78]]],
        78=> ['ACTION' => ['fc' => 'S 79'],
            'GOTO' => [[]]],
        79=> ['ACTION' => ['leia' => 'R 9 8', 'imprima' => 'R 9 8', 'enquanto' => 'R 9 8', 'senao' => 'R 9 8', 'se' => 'R 9 8', 'para' => 'R 9 8'],
            'GOTO' => [[]]],
        80=> ['ACTION' => ['maior' => 'S 19', 'menor' => 'S 20', 'maiorIgual' => 'S 22', 'menorIgual' => 'S 23', 'igual' => 'S 21', 'diferente' => 'S 24'],
            'GOTO' => [18 => ['id' => 81, 'const' => 81, 'caracter' => 81, 'string' => 81 ]]],
        81=> ['ACTION' => ['id' => 'S 25', 'const' => 'S 26', 'caracter' => 'S 27', 'string' => 'S 28'],
            'GOTO' => [9 => ['pv' => 96]]],
        83=> ['ACTION' => ['id' => 'S 25', 'const' => 'S 26', 'caracter' => 'S 27', 'string' => 'S 28'],
            'GOTO' => [9 => ['fp' => 84]]] ,
        84=> ['ACTION' => ['fp' => 'S 85'],
            'GOTO' => [[]]],
        85=> ['ACTION' => ['ac' => 'S 86'],
            'GOTO' => [[]]],
        86=> ['ACTION' => ['id' => 'S 87', 'leia' => 'S 40', 'imprima' => 'S 50'],
            'GOTO' => [11 => ['fc' => 92], 12 => ['fc' => 92], 14 => ['fc' => 92], 15 => ['fc' => 92], 13 => ['fc' => 92]]],
        87=> ['ACTION' => ['mais' => 'S 88', 'menos' => 'S 89', 'div' => 'S 90', 'mult' => 'S 91', 'igual' => 'S 37', 'menos_m' => 'S 46', 'mais_m' => 'S 47'],
            'GOTO' => [16 => ['pv' => 48], 17 => ['id' => 56, 'const' => 56, 'caracter' => 56, 'string' => 56]]],
        88=> ['ACTION' => ['id' => 'R 1 17', 'const' => 'R 1 17', 'caracter' => 'R 1 17', 'string' => 'R 1 17'],
            'GOTO' => [[]]],
        89=> ['ACTION' => ['id' => 'R 1 17', 'const' => 'R 1 17', 'caracter' => 'R 1 17', 'string' => 'R 1 17'],
            'GOTO' => [[]]],
        90=> ['ACTION' => ['id' => 'R 1 17', 'const' => 'R 1 17', 'caracter' => 'R 1 17', 'string' => 'R 1 17'],
            'GOTO' => [[]]],
        91=> ['ACTION' => ['id' => 'R 1 17', 'const' => 'R 1 17', 'caracter' => 'R 1 17', 'string' => 'R 1 17'],
            'GOTO' => [[]]],
        92=> ['ACTION' => ['fc' => 'S 98'],
            'GOTO' => [[]]],
        93=> ['ACTION' => ['fc' => 'S 94'],
            'GOTO' => [[]]],
        94=> ['ACTION' => ['leia' => 'R 9 7', 'imprima' => 'R 9 7', 'enquanto' => 'R 9 7', 'senao' => 'R 9 7', 'se' => 'R 9 7', 'para' => 'R 9 7'],
            'GOTO' => [[]]],
        95=> ['ACTION' => ['id' => 'S 87', 'leia' => 'S 40', 'imprima' => 'S 50'],
            'GOTO' => [11 => ['fc' => 96], 12 => ['fc'=>96], 14 => ['fc'=>96], 15 => ['fc'=>96], 13=>['fc'=>96]]],
        96=> ['ACTION' => ['fc' => 'S 97'],
            'GOTO' => [[]]],
        97=> ['ACTION' => ['leia' => 'R 4 19', 'imprima' => 'R 4 19', 'enquanto' => 'R 4 19', 'senao' => 'R 4 19', 'se' => 'R 4 19', 'para' => 'R 4 19'],
            'GOTO' => [[]]],
        98=> ['ACTION' => ['leia' => 'R 9 6', 'imprima' => 'R 9 6', 'enquanto' => 'R 9 6', 'senao' => 'R 9 6', 'se' => 'R 9 6', 'para' => 'R 9 6'],
            'GOTO' => [[]]]
        );

    }

    public function parser($entrada){
        $pilha = array();
        array_push($pilha,0);
        echo "\nPilha:".implode(' ',$pilha);
        $i = 0;
        
        while ($entrada){
            if (array_key_exists( $entrada[$i]->tok, $this->afd[end($pilha)]['ACTION'])) {
                $move = $this->afd[end($pilha)]['ACTION'][$entrada[$i]->tok];
            } else {
                return false;
            } 

            $acao = explode(' ',$move);
            echo " | Ação:".$move;
            switch($acao[0]){
                case 'S': // Shift - Empilha e avança o ponteiro
                    array_push($pilha,$acao[1]);
                    $i++;
                    break;
                case 'R': // Reduce - Desempilha e Desvia (para indicar a redução)  
                    for ($j = 0; $j<$acao[1]; $j++)
                        array_pop($pilha);
                    echo ' | Reduzio para '.NAO_TERMINAIS[$acao[2]] . ' ';                    
                    $desvio = $this->afd[end($pilha)]['GOTO'][$acao[2]][$entrada[$i]->tok];
                    array_push($pilha,$desvio);
                    break;
                case 'ACC': // Accept
                    echo ' Sintatico Ok';
                    return true;
                default:
                    echo 'Erro';
                    return false;
            }

            // $this->analisadorSemantico->analiseSemantica(end($pilha),$entrada[$i]->valor);

            echo "\nPilha:".implode('-',$pilha);
            // echo $entrada[$i]->tok;
            echo " => TOK: (" . $entrada[$i]->tok . ", ". $entrada[$i]->valor . ") </br>";
        }
    }

}


   

    


?>