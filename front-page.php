<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package theme-4w4
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<section class="cours">
			<?php
			/* Start the Loop */
			$precedent="XXXXXX";
			while ( have_posts() ) :
				the_post();
                $titre = get_the_title();
				$sigle = substr($titre,0,7);
				$nbHeure = substr($titre,-4,3);
				$titrePartiel = substr($titre,8,-6);
                $session = substr($titre,4,1);
                //$contenu = get_the_content();
                //$resume = substr($contenu,0,200);
				$typeCours = get_field('type_de_cours');
				 if($precedent != $typeCours): ?>
                <?php   if($precedent != "XXXXXX") :?>
                    </section>
                    <?php endif ?>
                    <h2><?php echo $typeCours?></h2>
					<section>
					 
					 <?php endif ?>
			   <article>
				   <p><?php echo $sigle . " - " . $typeCours; ?></p>
				   <a href="<?php echo get_permalink()?>"><?php echo $titrePartiel;?></a>
				   <p>Session <?php echo $session; ?></p>
				   <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="0000d4" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg>

			   </article>

			   <?php 
			   $precedent = $typeCours;
				endwhile
			   ?>
			   
			</section>
			
		
			<?php endif;?>
	</main><!-- #main -->


<?php
get_sidebar();
get_footer();
