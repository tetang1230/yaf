<?php
/**
 * @describe:
 * @author: Jerry Yang(hy0kle@gmail.com)
 * */
class LogModel
{
    const TABLE_NAME = 'log';

    public static function info($input, $output)
    {
        $save_data = array(
            'request'   => $input,
            'response'  => $output,
            'create_time' => time(),
        );

        $sql = sprintf('INSERT INTO `%s` SET `request` = "%s", `response` = "%s", `create_time` = "%d"', 
            self::TABLE_NAME, addslashes($input), addslashes($output), time());
        return DB::query($sql);
    }
}
/* vi:set ts=4 sw=4 et fdm=marker: */

