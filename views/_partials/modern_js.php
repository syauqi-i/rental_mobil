<?php
/**
 * Shared JS partial — include before </body> on all module pages
 */
?>
<script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('sb-admin-2/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('sb-admin-2/') ?>/js/sb-admin-2.min.js"></script>
<script>
(function(){
  var overlay   = document.getElementById('sidebarOverlay');
  var topToggle = document.getElementById('sidebarToggleTop');
  function open(){ document.body.classList.add('sidebar-toggled'); if(overlay) overlay.style.display='block'; }
  function close(){ document.body.classList.remove('sidebar-toggled'); if(overlay) overlay.style.display=''; }
  if(topToggle) topToggle.addEventListener('click', function(){ document.body.classList.contains('sidebar-toggled') ? close() : open(); });
  if(overlay)   overlay.addEventListener('click', close);
  window.addEventListener('resize', function(){ if(window.innerWidth > 768) close(); });
})();
</script>
