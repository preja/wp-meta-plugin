<?php
/**
 * @var PRVP_PostData $view
 */

$post_content = esc_html($view->post_content);

unset($view->post_content);
$table = "";
$table .= PRVP_HtmlUtil::beginTable(array("Key", "Value"), "Post data");
$table .= PRVP_HtmlUtil::createBodyRows($view);
$table.=  PRVP_HtmlUtil::row(array('post_content', $post_content));
$table .= PRVP_HtmlUtil::endTable();
echo $table;