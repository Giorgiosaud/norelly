<?php
if (! function_exists('show_slider')) :
/**
 * Display an optional post thumbnail.
 *
 */
function show_slider()
{
    $id=get_sub_field('id');
    $i=0;
    $countSlides=count(get_sub_field('slide'));

    if (have_rows('slide')):
        if ($countSlides>1):
            ?>
        <div id="<?= $id?>" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">


           <?php

           while (have_rows('slide')) : the_row();


           ?>
           <li data-target="#<?= $id?>" data-slide-to="<?php echo $i;
            $i++;
            ?>" class="<?php if ($i==1) {
                echo 'active';
            }
            ?>"></li>
            <?php
            endwhile;
            $i=0;
            ?>
        </ol>
        <?php 
        endif;
        ?>
        <div class="carousel-inner" role="listbox">
           <?php
           while (have_rows('slide')) : the_row();
           $image = get_sub_field('image');
           $size='slider';
           ?>
           <div class="item <?php if ($i==0) {
            echo 'active';
        }
        $i++;
        ?>">
        <?= wp_get_attachment_image($image, $size);
        ?>

        <div class="carousel-caption2">
         <h1 class="tituloSlide"><?php the_sub_field('title')?></h1>
         <p class="descripcionSlide"><?php the_sub_field('description')?></p>
         <a href="<?php the_sub_field('link')?>" class="btn btn-default <?php the_sub_field('button_type')?>"><?php the_sub_field('button_text')?></a>
     </div>
 </div>
 <?php
 endwhile;
 ?>
</div>
<?php
else :
    echo 'no rows found';

endif;
?>
</div>
<?php

}
endif;
if (! function_exists('show_section')) {
    function show_section()
    {
        if (have_rows('article')):
            while (have_rows('article')) : the_row();
        show_article();
        endwhile;
        endif;
    }
}
if (! function_exists('show_article')) {
    function show_article()
    {
        if (get_row_layout() == 'one_column') {
            show_one_column();
        } elseif (get_row_layout() == 'contact_form') {
            show_contact_form();
        } elseif (get_row_layout() == 'two_columns') {
            show_two_columns();
        } elseif (get_row_layout() == 'list') {
            show_list();
        } elseif (get_row_layout() == 'clients_logos') {
            show_clients_logos();
        }
    }
}
if (! function_exists('show_one_column')) :
    function show_one_column()
{
    ?>    
    <?php the_sub_field('article')?>
    <?php

}
endif;
if (! function_exists('show_contact_form')) :
    function show_contact_form()
{
    ?>
    <article class='articulo Form'>
        <div class="Form__title">    
            <?php the_sub_field('title')?>
        </div>
        <form action="send_contact" method="POST" accept-charset="utf-8" id="submitContactForm">



            <div class="Form__content">
                <div class="col-xs-12 col-md-6">
                    <input required type="text" name="name" value="" placeholder="Ingrese su Nombre">
                    <input required type="text" name="last_name" value="" placeholder="Ingrese su Apellido">
                    <input required type="email" name="email" value="" placeholder="Ingrese su Email">
                    <input required type="text" name="phone" value="" placeholder="Ingrese su Numero Telefonico">
                    <input required type="hidden" name="action" id="inputAction" class="form-control" value="send_contact">
                </div>
                <div class="col-xs-12 col-md-6">
                    <textarea required name="message" placeholder="Ingrese su Mensaje" rows="8"></textarea>
                </div>
                <div class="col-xs-12 button">
                    <button type="submit">Send</button>
                </div>
            </div>
        </form>
    </article>
    <?php

}
endif;
if (! function_exists('show_two_columns')) :
    function show_two_columns()
{
    $image = get_sub_field('image');
    $size='ImagenArticulo';
    ?>
    <article class='articulo'>
        <div class="imagen-articulo"><?= wp_get_attachment_image($image, $size);
            ?></div>
            <div class="texto-articulo"><?php the_sub_field('description')?></div>

        </article>
        <?php

    }
    endif;
    if (! function_exists('show_list')) {
        function show_list()
        {
            ?>
            <article class='articulo lista' style="color:<?php the_sub_field('color_text') ?>">
                <div class="titulo-lista"><?php the_sub_field('title')?></div>
                <?php
                if (have_rows('items')):
                    ?>
                <div class="list-items">
                    <?php
                    while (have_rows('items')) : the_row();
                    show_list_item();
                    endwhile;
                    ?>
                    <div class="clearfix"></div>
                </div>
                <?php
                endif;
                ?>
            </article>
            <?php

        }
    }
    if (!function_exists('show_list_item')) {
        function show_list_item()
        {
            $image = get_sub_field('icon');
            $size='IconoLista';
            
            ?>
            <div class="list-item">
                <?php
                if (get_sub_field('link')) {
                    ?>
                    <a href="<?php the_sub_field('link')?>">
                        <?= wp_get_attachment_image($image,$size)?>
                        <?php the_sub_field('description') ?>
                    </a>
                    <?php
                }
                else{
                    ?>
                    <?= wp_get_attachment_image($image,$size)?>
                    <?php the_sub_field('description') ?>
                    <?php
                }
                ?>


            </div>
            <?php

        }
    }
    if (!function_exists('clients_logos')) {
        function show_liclients_logosst_item()
        {
            $image = get_sub_field('icon');
            $size='Icono';
            ?>
            <div class="list-item">
             <a href="<?php the_sub_field('link')?>">
                <?= wp_get_attachment_image($image, $size);
                ?>
                <?php the_sub_field('description') ?>
            </a>
        </div>
        <?php

    }
}


if (! function_exists('show_clients_logos')) {
    function show_clients_logos()
    {
        ?>
        <article class='articulo Clients' style="color:<?php the_sub_field('color_text') ?>">
            <div class="Clients__title"><?php the_sub_field('title')?></div>
            <?php
            if (have_rows('client')):
                ?>
            <div class="Clients__List">
                <?php
                while (have_rows('client')) : the_row();
                show_list_clients();
                endwhile;
                ?>
            </div>
            <?php
            endif;
            ?>
        </article>
        <?php

    }
}
if (!function_exists('show_list_clients')) {
    function show_list_clients()
    {
        $image = get_sub_field('logo');
        $size='full';
        ?>
        <div class="Clients__logo">
           <a href="<?php 
           if(get_sub_field('link')){
            the_sub_field('link');
        }
        else{
            echo '#';
        }
        ?>">
        <?= wp_get_attachment_image($image, $size);?>
    </a>
</div>
<?php

}
}

