<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/style/home.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <div class="logo"> </div>
        <input type="checkbox" id="checkboxNavbar">
        <label id="checkNavBtn" for="checkboxNavbar">
            <div class="menuIcon">
            <span></span>
            <span></span>
            <span></span>
            </div>
        </label>
        <div id="topNav">
            <ul>
                <li class="categorie">
                    <input type="checkbox" id="checkboxCategorie">
                    <a href="#">
                        <label class="categorieTitle" for="checkboxCategorie">
                            <div class="categorieIcon">
                            <span></span>
                            <span></span>
                            <span></span>
                            </div>
                            <p>Catégories</p> 
                        </label>
                    </a>
                    <ul id="categorieDropdown">
                        <li><a href="../html/categorie.php">CATEGORIE-1</a></li>
                        <li><a href="../html/categorie.php">CATEGORIE-2</a></li>
                        <li><a href="../html/categorie.php">CATEGORIE-3</a></li>
                        <li><a href="../html/categorie.php">CATEGORIE-4</a></li>
                        <li><a href="../html/categorie.php">CATEGORIE-5</a></li>
                        <li><a href="../html/categorie.php">CATEGORIE-6</a></li>
                        <li><a href="../html/categorie.php">CATEGORIE-7</a></li>
                        <li><a href="../html/categorie.php">CATEGORIE-10</a></li>
                        <li><a href="../html/categorie.php">CATEGORIE-11</a></li>
                        <li><a href="../html/categorie.php">CATEGORIE-12</a></li>
                        <li><a href="../html/categorie.php">CATEGORIE-13</a></li>
                        <li><a href="../html/categorie.php">CATEGORIE-14</a></li>
                    </ul>
                </li>
                <li class="search">
                    <form action="/action_page.php">
                        <input type="text" placeholder="Cherchez un produit ou une marque" name="search">
                        <button type="submit"><img src="view/icons/Icon-search.png" alt=""></button>
                    </form> 
                </li>
                <li class="panier"><a href="view/html/panier.php">
                        <div class="panierIcon"></div>
                        <span>Panier</span>
                    </a> 
                </li>
                <li class="deconnexion"><a href="view/html/inscription.php">
                        <div class="deconnexionIcon"></div>
                        <span>Se connecter/S'inscrire</span>
                    </a> 
                </li>
            </ul>
        </div>
    </nav>
    <!-- =============================================================================================================== -->

    <div class="container">
        <!-- include header -->
        <?php require 'include/header.php'; ?> 

        <section>
        <!-- write your code here -->
        </section>
    </div>
    
    <!-- include footer -->
    <?php require 'include/footer.php'; ?> 
 
</body>
</html>