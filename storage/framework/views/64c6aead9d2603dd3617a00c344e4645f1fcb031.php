<form method="post" action="<?php echo e(route('partner.create')); ?>">
    <?php echo e(csrf_field()); ?>

<div class="par_input pull-left">
    <ul class="list-unstyled">
        <li>
            <input name="name" type="text" placeholder="请问贵姓">
        </li>
        <li>
            <input name="phone" type="text" placeholder="联系方式">
        </li>
        
            
        
        <li>
           <textarea name="des"  rows="4" placeholder="加盟意向"></textarea>
        </li>
        <li>
           <button type="submit">申请加盟</button>
        </li>

    </ul>
</div>
</form>