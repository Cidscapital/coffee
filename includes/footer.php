
    <!-- Alertyfy JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <?php if(isset($_SESSION['successmessage'])){ ?>
    <script> alertify.set('notifier','position', 'top-right');
            alertify.success('<?php echo $_SESSION['successmessage'];
                                unset($_SESSION['successmessage']); ?>');
    </script>
    <?php } ?>
</body>
</html>