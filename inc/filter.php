<?php
function filter_deals_example($data){

	$args = array(
		'posts_per_page' => '5',
		'tax_query' => array(
			'relation' => 'AND'
		)
	);

	if(isset($data['location']) && isset($data['location']) !== '') {
		array_push($args['tax_query'], array(
			'taxonomy'=>'location',
			'field'    => 'name',
			'terms' => array($data['location'])
		));
	}

	if(isset($data['type']) && isset($data['type']) !== '') {
		array_push($args['tax_query'], array(
			'taxonomy'=>'type',
			'field'    => 'name',
			'terms' => array($data['type'])
		));
	}
	if(isset($data['price']) && isset($data['price']) !== '') {
		array_push($args['tax_query'], array(
			'taxonomy'=>'price',
			'field'    => 'name',
			'terms' => array($data['price'])
		));
	}




	$custom_filter = new WP_Query($args);


	if(!empty($_POST)){
		/* Это вывод результата поиска */

		if ( $custom_filter->have_posts() ) :



			/* Start the Loop */
			while ( $custom_filter->have_posts() ) :
				$custom_filter->the_post();

				the_title();



			endwhile;



		else : echo "no find posts";

		endif;
	} else {
		/* Это вывод по умолчанию. Архив Deals*/

		$default_query = new WP_Query(array('post_type'=>'deals','posts_per_page'=>5));

		$i=0;
		if ( $default_query->have_posts() ) :



			/* Start the Loop */
			while ( $default_query->have_posts() ) :
				$default_query->the_post();

				$i++;

				if($i == 1){

				} else {
					the_title();
					echo "<br>";
					the_content();
					echo "<br>";
					the_permalink();
					echo "<br>";
					the_excerpt();
					echo "<br>";
					echo get_the_date();
					echo "<hr>";
				}



			endwhile;



		else : echo "no find posts";

		endif;
	}




}