<div id="search">
    <div class="extended">
        <?= Form::open('search/extended', array('id' => 'search_form')) ?>
         <?php $search = Session::instance()->get('search');  ?>
        <h1>Erweiterte Suche</h1>
        <div class="left">
            <p>Suche beschränken auf ein Thema: <?= Form::select('theme', $themes, HTML::chars(Arr::get($search, 'theme', 'all')), array('style' => 'width:205px')) ?></p>
            <p> Suchzeitraum eingrenzen : von <span class="start"></span> - bis <span class="end"></span></p>
            <div id="slider">

            </div>
            <div class="skala"></div>
            <?= Form::hidden('min', HTML::chars(Arr::get($search, 'min', 1200))) ?>
            <?= Form::hidden('max', HTML::chars(Arr::get($search, 'max', date('Y',time())))) ?>
            <p>Suchbegriff(e) :    <?= Form::input('text', Arr::get($search, 'text', __('Searchtext')), array('style' => 'width:310px')) ?></p>

            <p>Thesaurus aktivieren :<?= Form::checkbox('thesaurus', NULL, (bool) Arr::get($_POST, 'thesaurus', FALSE)) ?></p>
        </div>
        <div class="left">
            <p>Suchbereich:
     
            </p>
            <p><?= Form::checkbox('title', NULL, (bool) Arr::get($search, 'title', $checked)) ?> In den Tabellentiteln und den Variablenbezeichnungen der Datentabellen</p>
            <p><?= Form::checkbox('source', NULL, (bool) Arr::get($search, 'source', $checked)) ?> In dem Quellenteil der Datentabellen</p>
            <p><?= Form::checkbox('description', NULL, (bool) Arr::get($search, 'description', $checked)) ?> In den Studienbeschreibungen</p>
            <div style="float:left;"> <?= Form::submit('search', __('search'), array('class' => 'button', 'style' => 'width:150px;float:left;margin: 0px 5px;')) ?>
                <?= HTML::anchor('search/clear', __('reset'), array('class' => 'button', 'style' => 'width:130px;display:block;text-align:center;float:left;margin: 0px 5px;')) ?>
            </div>
        </div>
        <?= Form::close() ?>
    </div>
    <div class="clear"></div>
    <hr/>
  
    <?= $results ?>

</div>