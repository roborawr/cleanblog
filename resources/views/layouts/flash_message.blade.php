@if (Session('flash_message'))
    <?php
    $status = session('flash_message') ? 'sucess' : 'failed';
    ?>
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>{{session('flash_message')}}<i class="icon fa fa-check"></i> Success!</h4>
    </div>
@endif