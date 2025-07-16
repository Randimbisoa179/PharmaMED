<!-- Modal pour Voir un Produit -->
<div class="modal fade" id="viewProductModal" tabindex="-1" aria-labelledby="viewProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="margin-top: 0%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewProductModalLabel">Détails du medicament</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenu dynamique pour afficher les détails du produit -->
                <p><strong>Numéro  :</strong> <span id="viewNumMedoc"></span></p>
                <p><strong>Designation :</strong> <span id="viewDesign"></span></p>
                <p><strong>Prix unitaire :</strong> <span id="viewprix_unitaire"></span> Ar</p>
                <p><strong>Stock :</strong> <span id="viewStock"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-check"></i> OK</button>
            </div>
        </div>
    </div>
</div>

<script>
// Remplir la modale "Voir un Produit"
    document.querySelectorAll('.view-product').forEach(button => {
        button.addEventListener('click', () => {
            const numMedoc = button.getAttribute('data-nummedoc');

            // fetch('/produits/${numProd}')
            //     .then(response => response.json())
            //     .then(data => {
            const design = button.getAttribute('data-design');
            const prix_unitaire = button.getAttribute('data-prix_unitaire');
            const stock = button.getAttribute('data-stock');

            // console.log(numProd, design, stock);

                document.getElementById('viewNumMedoc').textContent = numMedoc;
                document.getElementById('viewDesign').textContent = design;
                document.getElementById('viewprix_unitaire').textContent = prix_unitaire;
                document.getElementById('viewStock').textContent = stock;
            
        });
    });
</script>