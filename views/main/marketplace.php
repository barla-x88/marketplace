<?php var_dump($pageContent) ?>

<?php for ($i = 0; $i < $pageCount; $i++): ?>
    <button <?php echo ($currentPage === $i + 1) ? 'disabled' : ''?>>
        <a href="?page=<?php echo $i + 1 ?>">Page <?php echo $i + 1 ?></a>
    </button>
<?php endfor; ?>