<?php get_header(); ?>
<section>
    <div class="container">
        <div class="row">
            <h2 class="col-12 title text-center">
                <?php pll_e('К сожалению, такой страницы тут нет'); ?>
            </h2>
            <div class="d-none col-lg-4 col-md-3 d-md-flex"></div>
            <a href="<?php echo home_url(); ?>" class="subtitle text-center col-12 col-md-6 col-lg-4 error__button"><?php pll_e('Попробуйте это'); ?></a>
            <div class="d-none col-lg-4 col-md-3 d-md-flex"></div>
        </div>
    </div>
</section>
<style>
    .error__button{
            background-color: #2b5600;
            color: #fff;
    }
    .error__button:hover{
        color: #ce803a;
    }
    @media screen and ( max-width: 767px ){
        h2.title{
            font-size: 1.2rem;
        }
    }
</style>
<?php get_footer(); ?>