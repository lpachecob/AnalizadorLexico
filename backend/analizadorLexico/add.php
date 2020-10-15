<?php
$url = parse_url($_SERVER['REQUEST_URI']);

if (empty($url['query'])) {
    echo 'Cargar archivo';
} else {
    $nombre = htmlspecialchars($_GET["archivo"]);
?>
    <div class="container-fluid">

        <br />
        <div class="row">
            <div class="col">
                <?php
                include("backend/analizadorLexico/stringtokenizer.class.php");
                include("backend/analizadorLexico/lexer.class.php");
                $txt = '';
                $fp = fopen("backend/files/" . $nombre, "r");
                while (!feof($fp)) $txt .= fgets($fp);
                fclose($fp);

                echo "<b>ENTRADA (backend/files/" . $nombre . ")</b>: <BR /><PRE>" . $txt . "</PRE>";
                ?>
            </div>
            <div class="col">
                <?php $lexer = new Lexer($txt); ?>
            </div>
        </div>
    </div>
<?php
}
