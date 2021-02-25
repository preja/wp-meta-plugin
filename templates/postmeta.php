<?php
/* @var PRVP_PostMeta $view */
$table = "";
$table .= PRVP_HtmlUtil::beginTable(array("Key", "Value"),"Post meta");
$table .= PRVP_HtmlUtil::createBodyRows($view);
$table.=  PRVP_HtmlUtil::row(array('post_content', $post_content));
$table .= PRVP_HtmlUtil::endTable();
echo $table;