<?php
require_once('header.php');

if (isset($_SESSION['roleeeeeeee']) && $_SESSION['roleeeeeeee']) {

    $idEvent = isset($_GET['id_event']) ? Query::securisation($_GET['id_event']) : $_SESSION['idEvent'];
    $event   = Events::afficher2("SELECT * FROM events WHERE id='$idEvent'");

    // Pagination
    $parPage = 6; // cartes par page
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
    $offset = ($page - 1) * $parPage;

    $total = Query::CRUD("SELECT COUNT(*) FROM livre_or WHERE idEvent='$idEvent'")->rowCount();
    $pages = ceil($total / $parPage);

    $livre = Livre_or::afficher("SELECT * FROM livre_or WHERE idEvent='$idEvent' ORDER BY id DESC");
    ?> 
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Livre d’or | IHS-RDC EVENT</title>

        <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="shortcut icon" href="images/logo.png"/>

        <style>
            body { background:#f8f9fa; font-family: "Segoe UI", sans-serif; }
            .card-event { border-radius: 20px; box-shadow: 0 6px 20px rgba(0,0,0,0.1); }
            .card-message { border-radius: 15px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); transition:.3s; }
            .card-message:hover { transform: translateY(-5px); }
            .message-text { font-size: 0.95rem; color:#333; }
            .pagination .page-link { border-radius: 50% !important; margin: 0 5px; }
            .search-box { margin-bottom: 20px; }
            @media print {
                #btnPrint, #searchInput, .pagination { display:none; }
                body { background:white; }
                .card-message { box-shadow:none; border:1px solid #ddd; }
            }
        </style>
    </head>
    <body>
    <div class="container mt-4">

        <!-- Présentation -->
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-lg-6">
                <div class="card card-event text-center p-4">
                    <h1 class="fw-bold">📖 LIVRE D'OR</h1>
                    <h3 class="fw-bold text-primary">DU MARIAGE</h3>
                    <img src="docs/<?= $event->getLogo() ?>" class="img-fluid mx-auto mt-3" style="width:160px;" alt="logo">
                    <h4 class="mt-3 text-secondary">
                        <?= ucfirst(substr($event->getNom(), 0, strpos($event->getNom(), "&"))) ?>
                        💍
                        Nathalie
                    </h4> 
                    <p class="mt-4">✨ <?=(new DateTime($event->getDate()))->format("Y")?> ✨</p>
                    <p class="fst-italic">IHS-RDC | EVENT</p> 
                </div>
            </div>
        </div>

        <!-- Barre outils -->
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" id="searchInput" class="form-control search-box" placeholder="🔍 Rechercher un message ou invité...">
            </div>
            <div class="col-md-6 text-end">
                <button id="btnPrint" class="btn btn-outline-dark"><i class="mdi mdi-printer"></i> Imprimer</button>
            </div>
        </div>

        <!-- Mur de messages -->
        <div class="row" id="messageWall">
            <?php
            foreach ($livre as $item) {
                $idB = $item->getIdusers();
                $billet = Billet::afficher2("SELECT * FROM billet WHERE id='$idB'");
                ?>
                <div class="col-md-6 col-lg-4 mb-4 message-card">
                    <div class="card card-message p-3 h-100">
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-bold text-primary"><?= ucfirst($billet->getNom()) ?></h6>
                            <small class="text-muted"><?= date("d/m/Y H:i", strtotime($item->getDate())) ?></small>
                        </div>
                        <hr>
                        <p class="message-text"><?= nl2br(htmlspecialchars($item->getMessage())) ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <!-- Pagination -->
        <nav class="mt-3">
            <ul class="pagination justify-content-center">
                <?php if ($page > 1): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>&id_event=<?= $idEvent ?>">«</a></li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $pages; $i++): ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>&id_event=<?= $idEvent ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $pages): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>&id_event=<?= $idEvent ?>">»</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

    <!-- JS -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script>
        // Recherche dynamique
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let filter = this.value.toLowerCase();
            let cards = document.querySelectorAll(".message-card");
            cards.forEach(card => {
                let text = card.innerText.toLowerCase();
                card.style.display = text.includes(filter) ? "" : "none";
            });
        });

        // Impression
        document.getElementById("btnPrint").addEventListener("click", function() {
            window.print();
        });
    </script>
    </body>
    </html>
    <?php
} else {
    header("Location: login.html");
    exit;
}
