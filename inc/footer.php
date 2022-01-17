<footer class="bg-dark text-white">
    <div class="text-center">
        <p>
            <!-- Appel de la fonction footer -->
        <?php 
        setlocale(LC_ALL, 'fr_FR');
        echo strftime("%A %e %B %Y");
        echo ' - ';
        date_default_timezone_set("Europe/Paris");
        echo date('H:i:s');
        ?>
        </p>
    </div>
</footer>