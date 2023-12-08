<?php
// Clé de connexion (chemin depuis l'utilisation des maisons)
include"../connexion.php";
                    
                    if(mysqli_connect_errno()) {
                        echo "erreur de connexion à la base ".mysqli_connexion_error();
                    }
                    // Je définie la requête
                    $sql = "select * from propriétaire";
                    $result = mysqli_query($cnx, $sql);
                    echo "<div class='table-responsive'>";
                    echo "<table class='table'>";
                    echo "<thead>";
                    echo "<th class='bg-transparent'>"."ID"."</th>";
                    echo "<th class='bg-transparent'>"."Nom"."</th>";
                    echo "<th class='bg-transparent'>"."Prénom"."</th>";
                    echo "<th class='bg-transparent'>"."Téléphone"."</th>";
                    echo "<th class='bg-transparent'>"."Email"."</th>";
                    echo "</thead>";
                    echo "<tbody class='table-group-divider'>";
                    // Pour l'ensemble des lignes du jeu résultats, répète
                    while($row = mysqli_fetch_row($result)) {
                        echo "<tr>";
                        for ($i=0; $i < count($row); $i++) { 
                            echo '<td class="bg-transparent"><div class="overflow-auto"style="max-height:200px;">'.$row[$i].'</div></td>';
                        }
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                    // Annule le jeu de résultats
                    mysqli_free_result($result);
                    // Ferme la connexion à la base de données
                    mysqli_close($cnx);
?>