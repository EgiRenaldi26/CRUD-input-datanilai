<?php
        include('./input-config.php');
        session_destroy();

        echo"
            <script>
                alert ('logout Berhasil')
                window.location='login.php';
            </script>
            
        ";
    ?>