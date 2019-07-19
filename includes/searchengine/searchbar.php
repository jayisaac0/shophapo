<div class="col-sm-12 col-md-12">
    <form class="navbar-form navbar-left " role="form" method="POST" action="" id = "search" name = "search">
        <div class="form-group ">
            <div class="col-sm-12">
                <input id="searchengine" type="searchengine" class="form-control"  placeholder = "Search for business name or user name" value="" size="30" name = "search_text" onkeyup="showResult(this.value)"  />
            </div>
        </div>
    </form>
</div>

<?php require_once 'includes/searchengine/searchfunction.php'; ?>