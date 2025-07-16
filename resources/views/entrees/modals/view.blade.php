<!-- MODAL POUR VOIR UNE ENTREE -->
<div class="modal fade" id="viewEntreeModal" tabindex="-1" aria-labelledby="viewEntreeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="margin-top: 0%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewEntreeModalLabel">Détails de l'Entrée</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Numéro Entrée :</strong> <span id="viewNumEntree"></span></p>
                <p><strong>Medicament :</strong> <span id="viewProduit"></span></p>
                <p><strong>Quantité :</strong> <span id="viewStockEntree"></span></p>
                <p><strong>Date :</strong> <span id="viewDateEntree"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-check"></i> OK  </button>
            </div>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.view-entree').forEach(button => {
        button.addEventListener('click', () => {
            const entree = JSON.parse(button.getAttribute('data-entree'));

            document.getElementById('viewNumEntree').textContent = entree.numEntree;
            document.getElementById('viewProduit').textContent = entree.produit.Design;
            document.getElementById('viewStockEntree').textContent = entree.stockEntree;
            document.getElementById('viewDateEntree').textContent = entree.dateEntree;
        });
    });
</script>
