<?php
/**
 * Content page search form.
 */
 ?>

<form role="search" method="get" id="searchform" action="<?php
  echo home_url( '/' ); ?>" class="navbar-search pull-right">

  <div class="nav-collapse collapse">
    <input type="text" value="" name="s" id="s" title="Search."
      class="input-medium search-query" placeholder="Search..."/>

    <button type="submit" class="btn">
      <i class="icon-search"></i>
    </button>
  </div>
</form>