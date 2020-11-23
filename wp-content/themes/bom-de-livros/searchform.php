<form action="/" method="get" class="pos-r">
    <input type="text" name="s" placeholder="O que você está procurando?" id="search" value="<?php the_search_query(); ?>" />
    <button class="submit-search" aria-label="Realizar Busca">
        <i class="fa fa-search t-white t-xg"></i>
    </button>
</form>