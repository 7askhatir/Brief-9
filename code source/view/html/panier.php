
<?php 

require '../../Database/database.php';



//FILL IN DATA BASE FOR TEST-----------------

$db = Database::connect();

//fill in client

// $stmt = $db->prepare(" Insert into client (ID,NOM,PRENOM,EMAIL,PASSWORD) value(?,?,?,?,?)");
// $stmt->execute(array(1,'testnom','testpre','test@test.com','azerty'));
// $stmt->execute(array(2,'testnom2','testpre2','test@test2.com','azerty2'));


// $stmt2 = $db->prepare("SELECT * FROM client");
// $stmt2->execute();

// if($stmt2->rowCount()){
//     while($row = $stmt2->fetch()){
//         print_r($row);
//     }
// }

//fill in produit
// $stmt = $db->prepare(" Insert into produit (ID_PRD,NOM,QTE_MAX,IMAGE,Id_cat,prix) value(?,?,?,?,?,?)");
// $stmt->execute(array(1,'prod1',25,'../imgs/Icon material-shopping-cart.svg',2,100));
// $stmt->execute(array(2,'prod2',30,'../imgs/Icon material-shopping-cart.svg',1,50));


//fill in panier_fixe
// $stmt = $db->prepare(" Insert into panier_fixe (ID_PFIX) value(?)");
// $stmt->execute(array(1));
// $stmt->execute(array(2));

//fill in contenir_panierfix
// $stmt = $db->prepare(" Insert into contenir_panierfix (ID_PRD,ID_PFIX,QTE) value(?,?,?)");
// $stmt->execute(array(1,2,5));
// $stmt->execute(array(2,2,7));
// $stmt->execute(array(1,1,10));
// $stmt->execute(array(2,1,3));


Database::disconnect();

// -------------------------------------------------------

$selectedProfucts=[];

session_start();
if(isset($_SESSION['productId'])){
    $selectedProfucts=array_unique($_SESSION['productId']);
    $_SESSION['productId'] = $selectedProfucts;
}


if(isset($_POST['deleteProduct'])){


    echo $_POST['idProductToDelete'];
    // print_r($_SESSION['productId']);
    $indexId = array_search($_POST['idProductToDelete'],$_SESSION['productId']);
    unset($_SESSION['productId'][$indexId]);
    header('Location: panier.php');
    // for($index=0; $index<count($_SESSION['productId']); $index ++){
        // if($_SESSION['productId'][$index] === $_POST['idProductToDelete']){
        //     unset($_SESSION['productId'][$index]);
        // }
        // echo $_SESSION['productId'][$index];
    // }

}


$qte=1;

if(isset($_POST['quantity'])){
    $qte = $_POST['quantity'];
    // $tot=$_POST['quantity']*$row['prix'];
    // echo $tot;
}


// if($selectedProfucts){

//     $db = Database::connect();

//     foreach($selectedProfucts as $idSelectedProduct){
//         $prods = $db->prepare("SELECT * FROM produit WHERE ID_PRD = $idSelectedProduct");
//         $prods->execute();
//     }
// }

?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../style/panier.css">
    <title>Document</title>
</head>
<body>
    <!-- start top-navbar -->
    <!-- <nav>
       <div id="topNav">
            <a class="logo" href="home.html"></a>
            <ul>
                <li class="categorie">
                    <a href="categorie.html">
                        <div class="categorieTitle">
                            <div class="categorieIcon">
                            <span></span>
                            <span></span>
                            <span></span>
                            </div>
                            <p>Catégories</p> 
                        </div>
                    </a>
                    <ul class="categorieDropdown">
                        <li><a href="#">Catégorie-1</a></li>
                        <li><a href="#">Catégorie-2</a></li>
                        <li><a href="#">Catégorie-3</a></li>
                    </ul>
                </li>
                <li class="search">
                    <form action="/action_page.php">
                        <input type="text" placeholder="Cherchez un produit ou une marque" name="search">
                        <button type="submit">Submit</button>
                    </form> 
                </li>
                <li><a href="panier.html">
                        <div class="panierIcon"></div>
                        <span>Panier</span>
                    </a> 
                </li>
                <li><a href="inscription.html">
                        <div class="connextionIcon"></div>
                        <span>Se connecter</span>
                    </a> 
                </li>
            </ul>
        </div>
    </nav> -->
    <!-- end top-navbar -->

    <section>

        
        <div class="blank"></div>

        <div class="flex_center_justify">

            <div class="container_80">

                <p class="price_size">Panier standard</p>

                <div class="blank_md"></div>

                <div class="flex_">
                    <p class="width_40 titles_container">ARTICLE</p>
                    <p class="width_20 flex_center_all titles_container">QUANTITE</p>
                    <p class="width_20 flex_center_all titles_container">PRIX UNITAIRE</p>
                    <p class="width_20 flex_center_all titles_container">SOUS-TOTAL</p>

                </div>

                <div class="flex_ panier_container shadow">

                    <div class="width_40 panierFSolo font_size_1 padding_inside border_right">
                        <div class="flex_start">
                            <img class="size_imgs" src="../imgs/Icon material-shopping-cart.svg" alt=""> 
                            <p class="name_margin_left">nom du panier</p>
                        </div>
                        <div class="flex_between sm_margin_top">
                            <span class="flex_center color_blue"> <i class="fas fa-eye icon_margin"></i> <p class="toUpperCase">voir le contenu</p></span>
                            <span class="flex_center color_blue"><i class="fas fa-trash-alt icon_margin"></i><p class="toUpperCase">supprimer</p> </span>
                        </div>
                    </div>

                    <div class="width_20 padding_inside border_right flex_center_all"><input class="quantity" type="number" id="quantity" name="quantity" value="1" min="1" max="5"></div>

                    <div class="width_20 padding_inside border_right flex_center_all price_size">100 Mad</div>
                    <input class="price_value" type="hidden" value="100">

                    <div class="width_20 padding_inside flex_center_all price_size color_blue subTot">100 Mad</div>


                </div>
                                
            </div>

        </div>

        <div class="blank"></div>

        <div class="line_seperator"></div>

        <div class="blank"></div>

        <div class="flex_center_justify">

            <div class="container_80">

                <p class="price_size">Panier personnalisée</p>

                <div class="blank_md"></div>

                <?php
                    if($selectedProfucts){

                        $db = Database::connect();

                        foreach($selectedProfucts as $idSelectedProduct){
                            $prods = $db->prepare("SELECT * FROM produit WHERE ID_PRD = $idSelectedProduct");
                            $prods->execute();
                            if($prods->rowCount()){
                                while($row = $prods->fetch()){ ?>

                                    <div class="flex_ panier_container shadow">

                                    <div class="width_40 panierFSolo font_size_1 padding_inside border_right">
                                        <div class="flex_start">
                                            <img class="size_imgs" src="<?php echo $row['IMAGE']; ?>" alt=""> 
                                            <p class="name_margin_left"><?php echo $row['NOM']; ?></p>
                                        </div>
                                        
                                        <div class="flex_between sm_margin_top">
                                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                                <input type="hidden" name="idProductToDelete" value="<?php echo $idSelectedProduct; ?>">
                                                <span class="flex_center color_blue"><i class="fas fa-trash-alt icon_margin"></i><input class="toUpperCase remove_input_style color_blue font_size_1" type="submit" name="deleteProduct" value="supprimer"> </span>
                                            </form>
                                        </div>
                                        
                                    </div>

                                    

                                    <div class="width_20 padding_inside border_right flex_center_all">
                                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                                            <input class="quantity" type="number" value="1" name="quantity" min="1" max="<?php echo $row['QTE_MAX']; ?>">
                                        </form>
                                    </div>

                                    <div class="width_20 padding_inside border_right flex_center_all price_size"><?php echo $row['prix'].' Mad'; ?></div>
                                    <input class="price_value" type="hidden" value="<?php echo $row['prix']; ?>">
                                    

                                    <?php  
                                    
                                    
                                    ?>

                                    <div class="width_20 padding_inside flex_center_all price_size color_blue subTot"><?php echo ($row['prix']*$qte); ?> Mad</div>


                                    </div>


                        <?php }
                            }else { ?> <p>Ce produit n'existe pas !</p> <?php } ?>
                        <?php }
                        Database::disconnect();
                    }else { ?> <p>Aucun produit selectionné !</p> <?php } ?>

                <!-- <div class="flex_ panier_container shadow">

                    <div class="width_40 panierFSolo font_size_1 padding_inside border_right">
                        <div class="flex_start">
                            <img class="size_imgs" src="../imgs/Icon material-shopping-cart.svg" alt=""> 
                            <p class="name_margin_left">nom du produit</p>
                        </div>
                        <div class="flex_between sm_margin_top">
                            <span class="flex_center color_blue"><i class="fas fa-trash-alt icon_margin"></i><p class="toUpperCase">supprimer</p> </span>
                        </div>
                    </div>

                    <div class="width_20 padding_inside border_right flex_center_all"><input class="quantity" type="number" id="quantity" name="quantity" value="1" min="1" max="5"></div>

                    <div class="width_20 padding_inside border_right flex_center_all price_size">100 Mad</div>

                    <div class="width_20 padding_inside flex_center_all price_size color_blue">100 Mad</div>


                </div> -->
                                
            </div>

        </div>


       

    </section>

    <!-- start footer -->
    <!-- <footer>
        <div class="topDiv">

        </div>
        <div class="bottomDiv">

        </div>

    </footer> -->
    <!-- end footer -->

    <script>
        function subTotPrice(){
            $(".quantity").click((event) => {
                console.log($(event.currentTarget).val());
                console.log('index ',$(".quantity").index(event.currentTarget));

                var price_value = $(`.price_value:eq(${$(".quantity").index(event.currentTarget)})`).val();
                console.log(price_value);

                $(`.subTot:eq(${$(".quantity").index(event.currentTarget)})`).html(`${price_value*($(event.currentTarget).val())} Mad`);
                // console.log($(".subTot"));
            })
        }
        subTotPrice();


    </script>
</body>
</html>
