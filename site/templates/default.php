<?php if($page->description() != '') { $page_description = $page->description(); } else { $page_description = excerpt(kirbytext($page->text()), 300); } ?>

<?php snippet('header', array('title' => $page->title(), 'page_description' => $page_description)); ?>
<?php snippet('menu') ?>
<?php $page->isChildOf($pages->find('terms')) || $page->isChildOf($pages->find('sources')) ? snippet('prevnext') : '' ; ?>

<section>
	<article>
		<h1><?php echo html($page->title()) ?></h1>
		<?php echo kirbytext($page->text()) ?>

		<?php $page->isChildOf($pages->find('terms')) || $page->isChildOf($pages->find('sources')) ? '' : snippet('submenu'); ?>
	
		<?php if($page->content()->has('Source')): ?>
		<?php if($page->source()->pages()->count() > 1) { echo '<h2>Sources</h2>'; } else { echo '<h2>Source</h2>'; } ?>
		<ul class="src">
			<? $n=0; foreach($page->source()->pages() as $source): $n++; ?>
			<li><a href="<?php echo $source->url() ?>"><?php echo html($source->title()) ?></a></li>
			<?php endforeach ?>
		</ul>
		<?php endif ?>

		<?php if($page->content()->has('Related')): ?>
		<?php if($page->related()->pages()->count() > 1) { echo '<h2>Related Terms</h2>'; } else { echo '<h2>Related Term</h2>'; } ?>
		<ul class="src">
			<? $n=0; foreach($page->related()->pages() as $related): $n++; ?>
			<li><a href="<?php echo $related->url() ?>"><?php echo html($related->title()) ?></a></li>
			<?php endforeach ?>
		</ul>
		<?php endif ?>

	</article>
</section>

<?php snippet('footer') ?>
