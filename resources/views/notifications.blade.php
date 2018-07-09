<style>
.alert{
	position: fixed;
    top: 20px;
    left: 20px;
    color: white;
    z-index: 1;
}
</style>

<?php

    $vars = Session::all();
    foreach ($vars as $key => $value) {
        switch($key) {
            case 'success':
            case 'error':
            case 'warning':
            case 'info':
            if($key == 'error'){
              $key = 'danger';
            }
                ?>
                <div class="alert">
                    <div class="">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>{{ ucfirst($key) }}:</strong> {!! $value !!}
                    </div>
                </div>
                <?php
                Session::forget($key);
                break;
            default:
        }
    }

?>
