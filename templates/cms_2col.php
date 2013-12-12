<div class="row">
    <div class="col-md-8">

        <h1><?= isset($page->title) ? $page->title : '' ?></h1>
        <div>
            <?= isset($page->content) ? $page->content : '' ?>
        </div>

    </div>
    <div class="col-md-4">

        <h1>Sidebar</h1>

        <ul class="nav nav-pills nav-stacked">


            <?php

            foreach($subnav as $item) {

                $html = '';

                if(isset($item->active) && $item->active) {
                    $html .= '<li class="active">';
                } else {
                    $html .= '<li>';
                }

                $html .= '<a href="?page_id=' . $item->id . '">';
                $html .= $item->title;
                $html .= '</a>';
                $html .= '</li>';

                print $html;
            }

            ?>

        </ul>
    </div>
</div>




