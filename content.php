<!-- content.php -->
<h2 id="page-title"></h2>
<div id="custom-content"></div>

<script>
    document.getElementById('page-title').innerHTML = '<?php echo $pageTitle; ?>';

    // Sprawdź, czy zmienna $customContent jest ustawiona
    <?php if (isset($customContent)) : ?>
        document.getElementById('custom-content').innerHTML = <?php echo json_encode($customContent, JSON_HEX_QUOT | JSON_HEX_TAG); ?>;
    <?php endif; ?>
</script>

