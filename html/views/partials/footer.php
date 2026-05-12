<?php
/**
 * Peu comu de totes les pagines renderitzades amb render_page().
 *
 * Tanca el document HTML obert a header.php i carrega el JavaScript global.
 */
?>
<footer class="orbit-footer">
    <div class="orbit-footer__track">
        <span>CAS3 IAW</span>
        <span class="orbit-footer__gap"></span>
        <span>2025–2026</span>
    </div>
</footer>
<script src="<?= h(asset_url('js/app.js')) ?>" defer></script>
</body>
</html>
