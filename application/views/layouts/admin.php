<?=View::factory('layouts/shared/header')?>
<h1><?=format::friendly_model_name(Router::$controller)?></h1>
<?=$content?>
<?=View::factory('layouts/shared/footer')?>