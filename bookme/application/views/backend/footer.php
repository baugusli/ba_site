<div id="footer">
    <div id="footer-content">
           Captain's Hub - Copyright © 2015, All Rights Reserved | 
        <?php echo $this->lang->line('licensed_under'); ?> GPLv3 |
        <span id="select-language" class="badge badge-inverse">
        	<?php echo ucfirst($this->config->item('language')); ?>
        </span>
    </div>
    
    <div id="footer-user-display-name">
        <?php echo $this->lang->line('hello') . ', ' . $user_display_name; ?>!
    </div>
</div>

<script 
    type="text/javascript" 
    src="<?php echo $base_url; ?>assets/js/backend.js"></script>
<script 
    type="text/javascript" 
    src="<?php echo $base_url; ?>assets/js/general_functions.js"></script>
</body>
</html>
