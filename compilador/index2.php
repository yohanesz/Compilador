<?php

require("token.php");
require("Analisador_lexico.php");
require("Analisador_SLR.php");

$listatokens = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entrada = str_replace(array("\r", "\n"), ' ', $_POST["inputString"]);

    $analisador = new Analisador_lexico();
    $analisador->analisa($entrada);

    $asc = new SLR();
    $asc->parser($analisador->tokens);
    $historico = $asc->historico;
}
?>
<!DOCTYPE html>
<html data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/codemirror.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.13/mode/javascript/javascript.min.js"></script>
    <title>Compilador</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap');

        html, body {
            height: 100%;
            font-family: 'Manrope', sans-serif;
        }

        .form-container {
            max-width: 80%;
            margin: auto;
        }

        .textarea {
            width: 100%;
            padding: 10px;
        }

        .btn-analisar {
            background-color: #212529;
            color: #f8f9fa;
            padding: 10px 20px;
        }

        .table-container {
            margin-top: 30px;
        }

        .table th {
            background-color: #212529;
            color: white;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .token-cell {
            padding: 5px 10px;
        }

        .CodeMirror {
        width: 100% !important;
        min-width: 600px;
        height: 300px;
        }

        .CodeMirror-linenumbers {
            display: none;
        }

        .CodeMirror-line {
            padding-left: 4% !important;
        }
    }
    </style>
</head>
<body class="bg-light">
    
<header class="text-center bg-dark d-flex flex-row justify-content-between">
        <h1 class="text-start fs-3 p-2 mb-0 mx-2 text-light"><strong>Compilador</strong></h1>
    </header>

    <div class="container pt-5">
        <!-- Form Section -->
        <form method="POST" class="mb-3 d-flex justify-content-start align-items-start flex-column w-100" onsubmit="updateTextarea()">
    <textarea name="inputString" id="editor"><?php echo isset($_POST['inputString']) ? htmlspecialchars($_POST['inputString']) : ''; ?></textarea>
    <button class="btn btn-analisar mt-2" type="submit">Analisar</button>
</form>

<script>
    var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
        mode: "javascript",
        lineNumbers: true,
        theme: "default"
    });

    function updateTextarea() {
        document.getElementById("editor").value = editor.getValue();
    }
</script>


        <!-- Tokens Section -->
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="4" class="text-center">TOKENS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $count = 0; 
                    echo "<tr>";
                    foreach ($analisador->tokens as $item) {
                        echo "<td class='token-cell'>
                                <span style='color: gray;'>&lt;</span>
                                <strong>{$item->tok}, {$item->valor}</strong>
                                <span style='color: gray;'>&gt;</span>
                              </td>";
                        $count++; 
                        if ($count % 4 == 0) {
                            echo "</tr>";
                            if ($count < count($analisador->tokens)) {
                                echo "<tr>";
                            }
                        }
                    }
                    if ($count % 4 != 0) {
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- History Section -->
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">PILHA</th>
                        <th class="text-center">AÇÃO</th>
                        <th class="text-center">TOKEN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($historico)): ?>
                        <?php foreach ($historico as $item): ?>
                            <tr>
                                <td class="text-dark text-center"><?php echo $item['pilha']; ?></td>
                                <td class="text-dark text-center"><?php echo $item['acao']; ?></td>
                                <td class="text-dark text-center"><?php echo $item['token']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
