<?php 

$naoTerminais = [
    '1' => 'PROGRAMA',
    '2' => 'LISTA_VAR', 
    '3' => 'VAR', 
    '4' => 'TIPO',
    '5' => 'LISTA_COMANDOS',
    '6' => 'ENQUANTO',
    '7' => 'SE', 
    '8' => 'PARA',
    '9' => 'ATRIBUTO',
    '10'=> 'COMANDOS',
    '11'=> 'ATRBUICAO',
    '12'=> 'LEITURA',
    '13'=> 'INCREMENTO',
    '14'=> 'IMPRESSAO',
    '15'=> 'OPERACAO',
    '16'=> 'OP_INCREMENTO',
    '17'=> 'OPERADOR',
    '18'=> 'COMPARADOR',
    '19'=> 'SENAO',
    '20'=> 'COMPARACAO'
];

$tabela = [
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
    5 => ['ACTION' => ['id' => 'R 1'],
            'GOTO' => [[]]],
    6 => ['ACTION' => ['id' => 'R 1'],
            'GOTO' => [[]]],
    7 => ['ACTION' => ['id' => 'R 1'],
            'GOTO' => [[]]],
    8 => ['ACTION' => ['id' => 'R 1'],
            'GOTO' => [[]]],
    9 => ['ACTION' => ['id' => 'S 10'],
            'GOTO' => [[]]],
    10=> ['ACTION' => ['fc' => 'R 2', 'int' => 'R 2', 'char' => 'R 2', 'array' => 'R 2', 'string' => 'R 2'],
            'GOTO' => [[]]],
    11=> ['ACTION' => ['int' => 'S 5', 'char' => 'S 6', 'array' => 'S 7', 'string' => 'S 8', '$' => 'R 0'],
            'GOTO' => [2 => ['fp' => 12]]],
    12=> ['ACTION' => ['fp' => 'R 3'], //fp
            'GOTO' => [[]]],
    13=> ['ACTION' => ['fp' => 'S 14'],
            'GOTO' => [[]]],
    14=> ['ACTION' => ['ac' => 'S 15'],
            'GOTO' => [[]]],
    15=> ['ACTION' => ['fc' => 'R 0', 'enquanto' => 'S 16', 'senao' => 'S 60', 'se' => 'S 29', 'para' => 'S 71'],
            'GOTO' => [5 => ['enquanto' => 61, 'se' => 63, 'senao' => 62, 'para' => 64, 'fc' => 69]]],
    16=> ['ACTION' => ['ap' => 'S 17'],
            'GOTO' => [[]]],
    17=> ['ACTION' => ['id' => 'S 18'],
            'GOTO' => [[]]],
    18=> ['ACTION' => ['maior' => 'S 19', 'menor' => 'S 20', 'maiorIgual' => 'S 22', 'menorIgual' => 'S 23', 'diferente' => 'S 24']]
] 

class Analisador_SLR {
}




?>