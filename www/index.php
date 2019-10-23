<html>

<head>
    <title>Hello...</title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./stylesheets/style.css">
</head>

<body>
    <?php

    $page = "main.php";

    if(isset($_GET['p'])) {
        if (is_numeric($_GET['p'])){
            $page = "page".$_GET['p'].".php";
        } else {
            if (isset($_GET['search'])){
                echo $_GET['search'];
            }else {
                $page = $_GET['p'].".php";
            }
            
        }
        //$page = $_GET['p']
            /*switch($_GET['p']) {
                case 1: 
                    $page = "page1.php";
                    break;
                case 2:
                    $page = "page2.php";
                    break;
                case 3:
                    $page = "page3.php";
                    break;
                case 4:
                    $page = "page4.php";
                    break;
                case 5:
                    $page = "page5.php";
                    break;
                case "products":
                    $page = "products.php";
                    break;
                default:
                    $page = "main.php";
            }*/
                
        }
    
    require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'connectDB.php';
    require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'header.php';
    echo "<div class='container-fluid'>";
    require dirname(__FILE__) . DIRECTORY_SEPARATOR . $page;
    echo "</div>";
    require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'footer.php';

   

    ?>
    
</body>

</html>