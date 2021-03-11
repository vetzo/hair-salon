<?php extract($args['fields']); ?>
<div class="block">
    <div class="block__heading">
        <h1><?php echo esc_html( $heading ); ?></h1>
    </div><!-- /.block__heading -->

    <div class="block__image">
        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
    </div><!-- /.block__image -->

    <div class="block__content">
        <?php echo $content; ?>
    </div><!-- /.block__content -->
</div><!-- /.block -->