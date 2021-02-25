<?php

/**
 * Class PRVP_HtmlUtil
 * produce html code
 */
class PRVP_HtmlUtil {


	/**
	 * @param array $columns
	 *
	 * @return string
	 */
	public static function beginTable( $columns = [], $caption ) {
		$style = "";
		$begin = '<table>
			<thead>
			    <caption style="font-weight: bolder; text-align: left;">'. esc_html($caption) .' </caption>
				<tr>' .
		         self::row( $columns, "th" ) .

		         '</tr>
            </thead>';

		return $begin;
	}

	/**
	 * @param array  $columns
	 * @param string $tag
	 *
	 * @return string
	 */
	public static function row( $columns = [], $tag = "td" ) {
		if ( ! in_array( [ "td", "th" ], $tag ) ) {
			$tag = "td";
		}
		$row = "";
		foreach ( $columns as $col ) {
			$row .= '<' . $tag . ' class="key-column">' . self::printContent( $col ) . "</$tag>";
		}

		return $row;
	}

	/**
	 * @param array $data
	 *
	 * @return string
	 */
	public static function createBodyRows( $data = [] ) {
		$rows = "";
		foreach ( $data as $key => $value ) {
			$rows .= "<tr>" . self::row( [ $key, $value ] ) . "</tr>";;
		}

		return $rows;
	}

	/*
	 * @return string
	 */
	public static function endTable() {
		return "</<table>";
	}

	/**
	 * @param $value
	 *
	 * @return false|string
	 */
	private static function printContent( $value ) {
		if ( is_array( $value ) ) {
			return json_encode( $value );
		}

		return esc_html( $value );
	}

	/**
	 * @param     $title
	 * @param int $size
	 *
	 * @return string
	 */
	public static function header( $title, $size = 3 ) {
		if ( ( $size > 6 ) && $size <= 0 ) {
			$size = 3;
		}
		$size = (int) $size;

		return "<div><h$size>" . esc_html( $title ) . "</h$size></div>";
     }

}